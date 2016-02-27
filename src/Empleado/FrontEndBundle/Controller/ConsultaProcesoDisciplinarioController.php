<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultaProcesoDisciplinarioController extends Controller
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
                $codigoProcesoDisciplinario = $request->request->get('OpImprimir');
                $arProcesoDisciplinario = new \Empleado\FrontEndBundle\Entity\RhuDisciplinario();
                $arProcesoDisciplinario = $em->getRepository('EmpleadoFrontEndBundle:RhuDisciplinario')->find($codigoProcesoDisciplinario);
                $codigoProcesoDisciplinarioTipo = $arProcesoDisciplinario->getCodigoDisciplinarioTipoFk();
                $objFormatoCarta = new \Empleado\FrontEndBundle\Formatos\FormatoProcesoDisciplinario();
                $objFormatoCarta->Generar($this, $codigoProcesoDisciplinarioTipo, $codigoProcesoDisciplinario);
            }
        }
        $arProcesoDisciplinarios = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);
        return $this->render('EmpleadoFrontEndBundle:Consultas/ProcesoDisciplinario:lista.html.twig', array(
            'form' => $form->createView(),
            'arProcesoDisciplinarios' => $arProcesoDisciplinarios
            ));
    }

    private function listar($form) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        $arUsuario = $this->get('security.context')->getToken()->getUser();
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:RhuDisciplinario')->listaDql(
                $arUsuario->getCodigoEmpleadoFk(),
                $form->get('TxtCodigoProcesoDisciplinario')->getData()
        );
    }

    private function formularioLista() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $form = $this->createFormBuilder()
            ->add('TxtCodigoProcesoDisciplinario', 'text', array('label'  => 'CodigoProcesoDisciplinario','data' => ""))
            ->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar'))
            ->getForm();
        return $form;
    }
}
