<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Empleado\FrontEndBundle\Form\Type\UserType;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
class ProcesoRegistroController extends Controller
{  
    
    public function nuevoAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        
        $form = $this->createFormBuilder()                                    
          ->add('numeroIdentificacion', 'text', array('label'  => 'Numero','data' => "", 'required' => true))                                                                           
          ->add('BtnRegistrar', 'submit', array('label'  => 'Registrarse'))                                            
          ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) { 
            if($form->get('BtnRegistrar')->isClicked()) {
                $numeroIdentificacion = $form->get('numeroIdentificacion')->getData();
                $arEmpleado = new \Empleado\FrontEndBundle\Entity\RhuEmpleado();
                $arEmpleado = $em->getRepository('EmpleadoFrontEndBundle:RhuEmpleado')->findOneBy(array('numeroIdentificacion' => $numeroIdentificacion));            
                if($arEmpleado) {
                    $arUsuarioValidar = new \Empleado\FrontEndBundle\Entity\Usuario();             
                    $arUsuarioValidar = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->findOneBy(array('username' => $numeroIdentificacion));                
                    if(!$arUsuarioValidar) {
                        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
                        $arUsuario->setUsername($arEmpleado->getNumeroIdentificacion());
                        $arUsuario->setEmail($arEmpleado->getCorreo());
                        $arUsuario->setIsActive(1);
                        $arUsuario->setCodigoEmpleadoFk($arEmpleado->getCodigoEmpleadoPk());
                        $arUsuario->setNombre($arEmpleado->getNombreCorto());
                        $arUsuario->setRoles('ROLE_USER');
                        $psswd = substr( md5(microtime()), 1, 8);
                        $arUsuario->setPassword(password_hash($psswd, PASSWORD_BCRYPT));                    
                        
                        $message = \Swift_Message::newInstance()
                                ->setSubject('Hello Email')
                                ->setFrom('maestradaz3@gmail.com')
                                ->setTo('maestradaz3@gmail.com')
                                ->setBody('Hola mundo', 'text/html');
                        $this->get('mailer')->send($message);                        
                        
                          
                         

                        $mailer = $this->container->get('mailer');
                        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                                ->setUsername('maestradaz3@gmail.com')
                                ->setPassword('70143086...');
                        $mailer = \Swift_Mailer::newInstance($transport);
                        $message = \Swift_Message::newInstance('Test')
                                ->setSubject('Hello Email')
                                ->setFrom('maestradaz3@gmail.com')
                                ->setTo('maestradaz3@gmail.com')
                                ->setBody('Hola mundo', 'text/html');    
                        $this->get('mailer')->send($message);
                        //$em->flush();
                        //return $this->redirect($this->generateUrl('emp_admin_usuario_lista'));                        
                    } else {
                        echo "El usuario ya esta registrado en el sistema, si no recuerda presione el boton recuperar clave";
                    }
                } else {
                    echo "El empleado con este numero de identificacion no existe";
                }                
            }

            /*$em->persist($arUsuario);
            $arUsuario = $form->getData();
            $arUsuarioValidar = new \Empleado\FrontEndBundle\Entity\Usuario();             
            $arUsuarioValidar = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->findOneBy(array('username' => $arUsuario->getNumeroIdentificacion()));
            if(count($arUsuarioValidar) <= 0) {
                $arEmpleado = new \Empleado\FrontEndBundle\Entity\RhuEmpleado();
                $arEmpleado = $em->getRepository('EmpleadoFrontEndBundle:RhuEmpleado')->findOneBy(array('numeroIdentificacion' => $arUsuario->getNumeroIdentificacion()));
                if(count($arEmpleado) > 0) {
                    $arUsuario->setUsername($arUsuario->getNumeroIdentificacion());
                    $arUsuario->setEmail($arEmpleado->getCorreo());
                    $arUsuario->setIsActive(1);
                    $arUsuario->setCodigoEmpleadoFk($arEmpleado->getCodigoEmpleadoPk());
                    $arUsuario->setNombre($arEmpleado->getNombreCorto());
                    $arUsuario->setRoles('ROLE_USER');
                    $arUsuario->setPassword(password_hash($arUsuario->getPassword(), PASSWORD_BCRYPT));                    
                    $em->flush();
                    return $this->redirect($this->generateUrl('emp_admin_usuario_lista'));
                }else {
                    echo "<br /><br /><br /><br />No existe el empleado";
                }                
            } else {
                echo "<br /><br /><br /><br />Este usuario ya existe";
            } 
             * 
             */           
        }
        return $this->render('EmpleadoFrontEndBundle:Proceso/Seguridad:registro.html.twig', array(
            'form' => $form->createView(),
        ));
    }              
}
