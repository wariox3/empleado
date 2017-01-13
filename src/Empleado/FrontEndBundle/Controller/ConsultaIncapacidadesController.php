<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultaIncapacidadesController extends Controller
{
    var $strDqlLista = "";
    public function listaAction() {        
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $paginator  = $this->get('knp_paginator');
        $request = $this->getRequest();  
        $form = $this->formularioLista();
        $form->handleRequest($request);        
        $this->listar($form);         
        if($form->isValid()) {
            if($form->get('BtnExcel')->isClicked()) {
                $this->listar($form);
                $this->generarExcel();
            }
        }
        $arIncapacidades = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);                                       
        return $this->render('EmpleadoFrontEndBundle:Consultas/Incapacidades:lista.html.twig', array(
            'form' => $form->createView(),
            'arIncapacidades' => $arIncapacidades
            ));
    }   
    
    private function listar($form) {
        $em = $this->getDoctrine()->getManager();  
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        $arUsuario = $this->get('security.context')->getToken()->getUser();        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:RhuIncapacidad')->listaDql(
                $arUsuario->getCodigoEmpleadoFk(),    
                $form->get('TxtCodigoIncapacidad')->getData()             
        );  
    }
    
    private function formularioLista() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();        
        $form = $this->createFormBuilder()                                    
            ->add('TxtCodigoIncapacidad', 'text', array('label'  => 'CodigoIncapacidad','data' => ""))                                                               
            ->add('BtnExcel', 'submit', array('label'  => 'Excel',))
            ->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar'))                                            
            ->getForm();        
        return $form;
    } 
    
    private function generarExcel() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $objPHPExcel = new \PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("EMPRESA")
            ->setLastModifiedBy("EMPRESA")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'CÓDIGO')
                    ->setCellValue('B1', 'NÚMERO INCAPACIDAD')
                    ->setCellValue('C1', 'NÚMERO EPS')
                    ->setCellValue('D1', 'EPS')
                    ->setCellValue('E1', 'IDENTIFICACIÓN')
                    ->setCellValue('F1', 'NOMBRE')
                    ->setCellValue('G1', 'CENTRO COSTO')
                    ->setCellValue('H1', 'DESDE')
                    ->setCellValue('I1', 'HASTA')
                    ->setCellValue('J1', 'DÍAS')
                    ->setCellValue('K1', 'VR INCAPACIDAD');

        $i = 2;
        $query = $em->createQuery($this->strDqlLista);        
        $arIncapacidades = $query->getResult();
        foreach ($arIncapacidades as $arIncapacidad) {            
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $arIncapacidad->getCodigoIncapacidadPk())
                    ->setCellValue('B' . $i, $arIncapacidad->getNumero())
                    ->setCellValue('C' . $i, $arIncapacidad->getNumeroEps())
                    ->setCellValue('D' . $i, $arIncapacidad->getEntidadSaludRel()->getNombre())
                    ->setCellValue('E' . $i, $arIncapacidad->getEmpleadoRel()->getnumeroIdentificacion())
                    ->setCellValue('F' . $i, $arIncapacidad->getEmpleadoRel()->getNombreCorto())
                    ->setCellValue('G' . $i, $arIncapacidad->getCentroCostoRel()->getNombre())
                    ->setCellValue('H' . $i, $arIncapacidad->getFechaDesde()->format('Y-m-d'))
                    ->setCellValue('I' . $i, $arIncapacidad->getFechaHasta()->format('Y-m-d'))
                    ->setCellValue('J' . $i, $arIncapacidad->getCantidad())
                    ->setCellValue('K' . $i, "$ ". round($arIncapacidad->getVrIncapacidad(),0));
            $i++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Incapacidades');
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Incapacidades.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('php://output');
        exit;
    }
}
