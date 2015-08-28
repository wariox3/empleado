<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultaPagoController extends Controller
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
        if($form->isValid()) {
            if($request->request->get('OpImprimir')) {
                $codigoPago = $request->request->get('OpImprimir');                
                $objFormatoPago = new \Empleado\FrontEndBundle\Formatos\FormatoPago();
                $objFormatoPago->Generar($this, $codigoPago);                
            }
        }
        $arPagos = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);                                       
        return $this->render('EmpleadoFrontEndBundle:Consultas/Pago:lista.html.twig', array(
            'form' => $form->createView(),
            'arPagos' => $arPagos
            ));
    }   
    
    private function listar() {
        $em = $this->getDoctrine()->getManager();  
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        $arUsuario = $this->get('security.context')->getToken()->getUser();        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:RhuPago')->listaDql(
                $arUsuario->getCodigoEmpleadoFk(),    
                "",
                ""                
        );  
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
