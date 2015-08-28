<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Empleado\FrontEndBundle\Form\Type\UserType;
class UsuarioController extends Controller
{
    var $strDqlLista = "";
    public function listaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $paginator  = $this->get('knp_paginator');
        $request = $this->getRequest();  
        $form = $this->formularioLista();
        $form->handleRequest($request);        
        $this->listar();
        $arUsuarios = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);                                       
        return $this->render('EmpleadoFrontEndBundle:Administracion/Usuarios:lista.html.twig', array(
            'form' => $form->createView(),
            'arUsuarios' => $arUsuarios
            ));
    }   
    
    public function nuevoAction($codigoUsuario) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();      
        if($codigoUsuario != 0) {
            $arUsuario = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->find($codigoUsuario);
        }    
        $form = $this->createForm(new UserType(), $arUsuario);
        $form->handleRequest($request);
        if ($form->isValid()) {            
            $em->persist($arUsuario);
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
                }                
            } else {
                echo "<br /><br /><br /><br />Este usuario ya existe";
            }            
        }
        return $this->render('EmpleadoFrontEndBundle:Administracion/Usuarios:nuevo.html.twig', array(
            'form' => $form->createView(),
        ));
    }    
    
    private function listar() {
        $em = $this->getDoctrine()->getManager();                        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:User')->listaDql();  
    }
    
    private function formularioLista() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();        
        $form = $this->createFormBuilder()                                    
            ->add('TxtNumero', 'text', array('label'  => 'Numero','data' => ""))                                                               
            ->add('BtnExcel', 'submit', array('label'  => 'Excel',))
            ->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar'))                                            
            ->getForm();        
        return $form;
    }          
}