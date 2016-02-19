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
                    $arUsuario->setRoles($arUsuario->getRoles());
                    $arUsuario->setPassword(password_hash($arUsuario->getPassword(), PASSWORD_BCRYPT));                    
                    $em->flush();
                    return $this->redirect($this->generateUrl('emp_admin_usuario_lista'));
                }else {
                    echo "<br /><br /><br /><br />No existe el empleado";
                }                
            } else {
                echo "<br /><br /><br /><br />Este usuario ya existe";
            }            
        }
        return $this->render('EmpleadoFrontEndBundle:Administracion/Usuarios:nuevo.html.twig', array(
            'form' => $form->createView(),
        ));
    } 
    
    public function editarAction($codigoUsuario) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();      
        
        $arUsuario = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->find($codigoUsuario);
        if ($arUsuario->getRoles() == "ROLE_ADMIN"){
            $rol = "ADMINISTRADOR";
        } else {
            $rol = "USUARIO";
        }
        $form = $this->createFormBuilder()
            ->add('roles', 'choice', array('choices' => array($arUsuario->getRoles() => $rol ,'ROLE_ADMIN' => 'ADMINISTRADOR', 'ROLE_USER' => 'USUARIO')))
            ->add('numeroIdentificacion', 'text', array('data' => $arUsuario->getNumeroIdentificacion(), 'required' => true))
            ->add('password', 'password', array('data' => '', 'required' => false))                
            ->add('guardar', 'submit', array('label' => 'Guardar'))            
            ->getForm();                    
        $form->handleRequest($request);
        if ($form->isValid()) {            
            $em->persist($arUsuario);
            //$arUsuario = $form->getData();
            $arUsuarioValidar = new \Empleado\FrontEndBundle\Entity\Usuario();             
            $arUsuarioValidar = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->findOneBy(array('username' => $form->get('numeroIdentificacion')->getData()));
            if(count($arUsuarioValidar) >= 0) {
                $arEmpleado = new \Empleado\FrontEndBundle\Entity\RhuEmpleado();
                $arEmpleado = $em->getRepository('EmpleadoFrontEndBundle:RhuEmpleado')->findOneBy(array('numeroIdentificacion' => $form->get('numeroIdentificacion')->getData()));
                if(count($arEmpleado) > 0) {
                    $arUsuario->setUsername($form->get('numeroIdentificacion')->getData());
                    if ($form->get('password')->getData() != ""){
                        $arUsuario->setPassword(password_hash($form->get('password')->getData(), PASSWORD_BCRYPT));
                    }else {
                        $arUsuario->setPassword($arUsuario->getPassword());
                    }
                    $arUsuario->setRoles($form->get('roles')->getData());
                    $em->persist($arUsuario);
                    $em->flush();
                    return $this->redirect($this->generateUrl('emp_admin_usuario_lista'));
                }else {
                    echo "<br /><br /><br /><br />No existe el empleado";
                }                
            } else {
                echo "<br /><br /><br /><br />Este usuario no existe";
            }            
        }
        return $this->render('EmpleadoFrontEndBundle:Administracion/Usuarios:editar.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    private function listar() {
        $em = $this->getDoctrine()->getManager();                        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->listaDql();  
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
