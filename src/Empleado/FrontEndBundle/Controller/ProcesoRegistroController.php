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
                        if($arEmpleado->getCorreo()) {
                            if($arEmpleado->getEstadoContratoActivo() == 1) {
                                $arConfiguracion = new \Empleado\FrontEndBundle\Entity\GenConfiguracion();
                                $arConfiguracion = $em->getRepository('EmpleadoFrontEndBundle:GenConfiguracion')->find(1);
                                $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
                                $arUsuario->setUsername($arEmpleado->getNumeroIdentificacion());
                                $arUsuario->setEmail($arEmpleado->getCorreo());
                                $arUsuario->setIsActive(1);
                                $arUsuario->setCodigoEmpleadoFk($arEmpleado->getCodigoEmpleadoPk());
                                $arUsuario->setNombre($arEmpleado->getNombreCorto());
                                $arUsuario->setRoles('ROLE_USER');
                                $psswd = substr( md5(microtime()), 1, 8);
                                $arUsuario->setPassword(password_hash($psswd, PASSWORD_BCRYPT));                                           
                                $em->persist($arUsuario);
                                $em->flush();
                                $strMensaje = "Se ha registrado con exito en la aplicacion para empleados de sogaApp <br />";
                                            $strMensaje .= "<table border='2'>";
                                            $strMensaje .= "<tr>";
                                            $strMensaje .= "<th>CODIGO</th>";
                                            $strMensaje .= "<th>IDENTIFICACION</th>";
                                            $strMensaje .= "<th>NOMBRE</th>";
                                            $strMensaje .= "<th>CLAVE</th>";
                                            $strMensaje .= "</tr>";

                                            $strMensaje .= "<tr>";
                                            $strMensaje .= "<td>" . $arEmpleado->getCodigoEmpleadoPk() . "</td>";
                                            $strMensaje .= "<td>" . $arEmpleado->getNumeroIdentificacion() . "</td>";
                                            $strMensaje .= "<td>" . $arEmpleado->getNombreCorto() . "</td>";
                                            $strMensaje .= "<td>" . $psswd . "</td>";
                                            $strMensaje .= "</tr>";

                                            $strMensaje .= "</table><br /><br />";
                                $strMensaje .= "Recuerde cambiar su clave al ingresar a la aplicacion";

                                $message = \Swift_Message::newInstance()
                                    ->setSubject('Asignacion clave AppSoga para ' . $arConfiguracion->getNombreEmpresa())
                                    ->setFrom('jefedesarrollo@jgefectivo.com', "SogaApp" )
                                    ->setTo(strtolower($arEmpleado->getCorreo()))
                                    ->setBody($strMensaje,'text/html');
                                $this->get('mailer')->send($message); 
                                $this->get('session')->getFlashBag()->add("suceso", "Usuario creado con exito, verifique su correo electronico " . strtolower($arEmpleado->getCorreo()) . " y vuelva a inicio de sesion");                            


                                /*$transport = \Swift_SmtpTransport::newInstance('mail.jgefectivo.com', 25)
                                  ->setUsername('jefedesarrollo@jgefectivo.com')
                                  ->setPassword('jefeD2015');

                                $mailer = \Swift_Mailer::newInstance($transport);
                                $message = \Swift_Message::newInstance('Prueba de correo')
                                  ->setFrom(array('sogainformacion@gmail.com' => 'prueba'))
                                  ->setTo(array('maestradaz3@gmail.com', 'other@domain.org' => 'A name'))
                                  ->setBody('Correo de prueba');
                                // Send the message
                                $result = $mailer->send($message);*/                                                                        

                                //$em->flush();                                
                            }  else {
                                $this->get('session')->getFlashBag()->add("error", "El empleado ya se encuentra retirado de la compañia o no tiene contrato vigente");                            
                            }                            
                        } else {
                            $this->get('session')->getFlashBag()->add("error", "Este empleado no registra correo electronico por favor comuniquese con la empresa");                            
                        }                       
                    } else {
                        $this->get('session')->getFlashBag()->add("error", "El usuario ya esta registrado en el sistema, si no recuerda presione el boton recuperar clave");                            
                    }
                } else {
                    $this->get('session')->getFlashBag()->add("error", "El empleado con este numero de identificacion no existe");                                                
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
