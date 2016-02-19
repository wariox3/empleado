<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /*$message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('maestradaz3@gmail.com')
                ->setTo('maestradaz3@gmail.com')
                ->setBody('Hola mundo', 'text/html');
        $this->get('mailer')->send($message);  */
        
        return $this->render('EmpleadoFrontEndBundle:Default:index.html.twig');
    }
    
    public function menuAction()
    {
        /*$arUsuario = new \Brasa\SeguridadBundle\Entity\User();
        $arUsuario = $this->get('security.context')->getToken()->getUser();
        $strUsuario = $arUsuario->getNombreCorto();        
         * 
         */
        //$destinatario = $this->contenedor->getParameter('contact_email');
        //$obj = new \Brasa\GeneralBundle\MisClases\CambiarBD();
        //$obj->setUpAppConnection($this);
        //\Brasa\GeneralBundle\MisClases\CambiarBD::setUpAppConnection();
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        $arUsuario = $this->get('security.context')->getToken()->getUser();         
        return $this->render('EmpleadoFrontEndBundle:General:menu.html.twig', array('Usuario' => $arUsuario->getNombre()));
    }      
}
