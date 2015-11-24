<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultaCartaLaboralController extends Controller
{
    var $strDqlLista = "";
    public function listaAction()
    {        
        $em = $this->getDoctrine()->getManager();
        $paginator  = $this->get('knp_paginator');
        $request = $this->getRequest();  
        $form = $this->formularioLista();
        $form->handleRequest($request);        
        $this->listar($form);         
        if($form->isValid()) {
            if($request->request->get('OpImprimir')) {
                $codigoContrato = $request->request->get('OpImprimir');
                $arContrato = new \Empleado\FrontEndBundle\Entity\RhuContrato();
                $arContrato = $em->getRepository('EmpleadoFrontEndBundle:RhuContrato')->find($codigoContrato);
                if ($arContrato->getEstadoActivo() == 1){
                    $objFormatoCartaLaboral = new \Empleado\FrontEndBundle\Formatos\FormatoCartaLaboralVigente();
                    $objFormatoCartaLaboral->Generar($this, $codigoContrato);
                } else {
                    $objFormatoCartaLaboral = new \Empleado\FrontEndBundle\Formatos\FormatoCartaLaboralRetirado();
                    $objFormatoCartaLaboral->Generar($this, $codigoContrato);                   
                }
            }
        }
        $arContratos = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);                                       
        return $this->render('EmpleadoFrontEndBundle:Consultas/CartaLaboral:lista.html.twig', array(
            'form' => $form->createView(),
            'arContratos' => $arContratos
            ));
    }   
    
    private function listar($form) {
        $em = $this->getDoctrine()->getManager();  
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        $arUsuario = $this->get('security.context')->getToken()->getUser();        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:RhuContrato')->listaDql(
                $arUsuario->getCodigoEmpleadoFk(),    
                $form->get('TxtCodigoContrato')->getData()                
        );  
    }
    
    private function formularioLista() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();        
        $form = $this->createFormBuilder()                                    
            ->add('TxtCodigoContrato', 'text', array('label'  => 'CodigoContrato','data' => ""))                                                               
            ->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar'))                                            
            ->getForm();        
        return $form;
    }          
}
