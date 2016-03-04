<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultaProgramacionController extends Controller
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
            
        }
        $arProgramacionDetalles = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);
        return $this->render('EmpleadoFrontEndBundle:Consultas/ProgramacionDetalle:lista.html.twig', array(
            'form' => $form->createView(),
            'arProgramacionDetalles' => $arProgramacionDetalles
            ));
    }

    private function listar($form) {
        $em = $this->getDoctrine()->getManager();
        $dateFecha = new \DateTime('now');
        $intAnio = $dateFecha->format('Y');
        $intMes = $dateFecha->format('m');        
        $intMesAnterior = $intMes - 1;
        $intMesSiguiente = $intMes + 1;
        if($intMesSiguiente > 12) {
            $intMesSiguiente = 12;
        }
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        $arUsuario = $this->get('security.context')->getToken()->getUser();
        //$arRecurso = $em->getRepository('EmpleadoFrontEndBundle:Usuario')->findOneBy(array('username' => $arUsuario->getUsername()));
        $arEmpleado = $em->getRepository('EmpleadoFrontEndBundle:RhuEmpleado')->findOneBy(array('numeroIdentificacion' => $arUsuario->getUsername()));
        $arRecurso = $em->getRepository('EmpleadoFrontEndBundle:TurRecurso')->findOneBy(array('codigoEmpleadoFk' => $arEmpleado->getCodigoEmpleadoPk()));
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:TurProgramacionDetalle')->consultaDetalleDql(
                $arRecurso->getCodigoRecursoPk(),
                //$form->get('TxtCodigoProcesoDisciplinario')->getData(),
                intval($intAnio),
                intval($intMesAnterior),
                intval($intMes),
                intval($intMesSiguiente)
        );
    }

    private function formularioLista() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $form = $this->createFormBuilder()
            //->add('TxtCodigoProcesoDisciplinario', 'text', array('label'  => 'CodigoProcesoDisciplinario','data' => ""))
            //->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar'))
            ->getForm();
        return $form;
    }
}
