<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Empleado\FrontEndBundle\Form\Type\UserType;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
class ProcesoClaveController extends Controller
{  
    
    public function cambiarAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        
        $form = $this->createFormBuilder()                                              
          ->add('claveNueva', 'text', array('label'  => 'Numero','data' => "", 'required' => true))                                                                                           
          ->add('claveNueva2', 'text', array('label'  => 'Numero','data' => "", 'required' => true))                                                                           
          ->add('BtnCambiar', 'submit', array('label'  => 'Cambiar clave'))                                            
          ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) { 
            if($form->get('BtnCambiar')->isClicked()) {                
                $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
                $arUsuario = $this->get('security.context')->getToken()->getUser();                                 
                $strClaveNueva = $form->get('claveNueva')->getData();
                $strClaveNueva2 = $form->get('claveNueva2')->getData();                
                if($strClaveNueva == $strClaveNueva2) {
                    $strClave = password_hash($strClaveNueva, PASSWORD_BCRYPT);
                    $arUsuarioActualizar = new \Empleado\FrontEndBundle\Entity\Usuario();
                    $arUsuarioActualizar = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->find($arUsuario->getId());
                    $arUsuarioActualizar->setPassword($strClave);
                    $em->persist($arUsuarioActualizar);
                    $em->flush();    
                    $this->get('session')->getFlashBag()->add("informacion", "La clave se ha cambiado exitosamente");                                                
                } else {
                    $this->get('session')->getFlashBag()->add("error", "Las claves deben coincidir");                                                
                }
                //return $this->redirect($this->generateUrl('emp_cambiar_clave'));
            }          
        }
        return $this->render('EmpleadoFrontEndBundle:Proceso/Seguridad:cambiarClave.html.twig', array(
            'form' => $form->createView(),
        ));
    } 
    
    public function recuperarAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        
        $form = $this->createFormBuilder()                                    
          ->add('numeroIdentificacion', 'text', array('label'  => 'Numero','data' => "", 'required' => true))                                                                           
          ->add('BtnRecuperar', 'submit', array('label'  => 'Recuperar clave'))                                            
          ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) { 
            if($form->get('BtnRecuperar')->isClicked()) {
                $numeroIdentificacion = $form->get('numeroIdentificacion')->getData();
                $arEmpleado = new \Empleado\FrontEndBundle\Entity\RhuEmpleado();
                $arEmpleado = $em->getRepository('EmpleadoFrontEndBundle:RhuEmpleado')->findOneBy(array('numeroIdentificacion' => $numeroIdentificacion));            
                if($arEmpleado) {
                    $arUsuarioValidar = new \Empleado\FrontEndBundle\Entity\Usuario();             
                    $arUsuarioValidar = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->findOneBy(array('username' => $numeroIdentificacion));                
                    if($arUsuarioValidar) {
                        if($arEmpleado->getCorreo()) {
                            if($arEmpleado->getEstadoContratoActivo() == 1) {
                                $arConfiguracion = new \Empleado\FrontEndBundle\Entity\GenConfiguracion();
                                $arConfiguracion = $em->getRepository('EmpleadoFrontEndBundle:GenConfiguracion')->find(1);
                                $arUsuarioAct = new \Empleado\FrontEndBundle\Entity\Usuario();
                                $arUsuarioAct = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->find($arUsuarioValidar->getId());                            
                                $psswd = substr( md5(microtime()), 1, 8);
                                $arUsuarioAct->setPassword(password_hash($psswd, PASSWORD_BCRYPT));
                                $correoGeneral = $arConfiguracion->getCorreoGeneral();
                                $em->persist($arUsuarioAct);
                                $em->flush();
                                $strMensaje = "Se ha cambiado la clave con exito en la aplicacion para empleados de sogaApp <br />";
                                            $strMensaje .= "<table border='2'>";
                                            $strMensaje .= "<tr>";
                                            $strMensaje .= "<th>CODIGO</th>";
                                            $strMensaje .= "<th>IDENTIFICACION</th>";
                                            $strMensaje .= "<th>NOMBRE</th>";
                                            $strMensaje .= "<th>CLAVE NUEVA</th>";
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
                                    ->setFrom($correoGeneral, "SogaApp" )
                                    ->setTo(strtolower($arEmpleado->getCorreo()))
                                    ->setBody($strMensaje,'text/html');
                                $this->get('mailer')->send($message); 
                                $this->get('session')->getFlashBag()->add("suceso", "Clave cambiada con exito, verifique su correo electronico " . strtolower($correoGeneral) . " y vuelva a inicio de sesion");                            
                                

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
                            $this->get('session')->getFlashBag()->add("error", "El empleado no registra correo electronico por favor comuniquese con la empresa");                            
                        }                       
                    } else {
                        $this->get('session')->getFlashBag()->add("error", "No es posible recuperar la clave porque el empleado aun no esta registrado");                            
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
        return $this->render('EmpleadoFrontEndBundle:Proceso/Seguridad:recuperarClave.html.twig', array(
            'form' => $form->createView(),
        ));
    }     
}
