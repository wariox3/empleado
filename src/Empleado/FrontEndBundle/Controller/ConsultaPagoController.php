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
        $this->listar($form);         
        if($form->isValid()) {
            if($request->request->get('OpImprimir')) {
                $codigoPago = $request->request->get('OpImprimir');                
                $objFormatoPago = new \Empleado\FrontEndBundle\Formatos\FormatoPago();
                $objFormatoPago->Generar($this, $codigoPago);                
            }
            if($form->isValid()) {
            if($form->get('BtnExcel')->isClicked()) {
                //$this->filtrarLista($form);
                $this->listar();
                $this->generarExcel();
            }
        }
        }
        $arPagos = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);                                       
        return $this->render('EmpleadoFrontEndBundle:Consultas/Pago:lista.html.twig', array(
            'form' => $form->createView(),
            'arPagos' => $arPagos
            ));
    }   
    
    private function listar($form) {
        $em = $this->getDoctrine()->getManager(); 
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        
        $arUsuario = $this->get('security.context')->getToken()->getUser();        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:RhuPago')->listaDql(
                $arUsuario->getCodigoEmpleadoFk(),    
                $form->get('TxtNumero')->getData(),
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
    
    private function generarExcel() {
        $em = $this->getDoctrine()->getManager();        
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
                    ->setCellValue('B1', 'NÚMERO')
                    ->setCellValue('C1', 'TIPO')
                    ->setCellValue('D1', 'IDENTIFICACIÓN')
                    ->setCellValue('E1', 'EMPLEADO')
                    ->setCellValue('F1', 'CENTRO COSTO')
                    ->setCellValue('G1', 'PERIODO PAGO')
                    ->setCellValue('H1', 'FECHA PAGO DESDE')
                    ->setCellValue('I1', 'FECHA PAGO HASTA')
                    ->setCellValue('J1', 'DÍAS PERIODO')
                    ->setCellValue('K1', 'VR SALARIO EMPLEADO')
                    ->setCellValue('L1', 'VR SALARIO PERIODO')
                    ->setCellValue('M1', 'VR AUX TRANSPORTE')
                    ->setCellValue('N1', 'VR EPS')
                    ->setCellValue('O1', 'VR PENSIÓN')
                    ->setCellValue('P1', 'VR DEDUCCIONES')    
                    ->setCellValue('Q1', 'VR DEVENGADO')
                    ->setCellValue('R1', 'VR INGRESO BASE COTIZACIÓN')
                    ->setCellValue('S1', 'VR INGRESO BASE PRESTACIONAL')
                    ->setCellValue('T1', 'VE NETO PAGAR');

        $i = 2;
        $query = $em->createQuery($this->strDqlLista);
        //$arPagos = new \Brasa\RecursoHumanoBundle\Entity\RhuPago();
        $arPagos = $query->getResult();
        foreach ($arPagos as $arPago) {            
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $arPago->getCodigoPagoPk())
                    ->setCellValue('B' . $i, $arPago->getNumero())
                    ->setCellValue('C' . $i, $arPago->getPagoTipoRel()->getNombre())
                    ->setCellValue('D' . $i, $arPago->getEmpleadoRel()->getNumeroIdentificacion())
                    ->setCellValue('E' . $i, $arPago->getEmpleadoRel()->getNombreCorto())
                    ->setCellValue('F' . $i, $arPago->getCentroCostoRel()->getNombre())
                    ->setCellValue('G' . $i, $arPago->getFechaDesde()->format('Y-m-d'). " - " .$arPago->getFechaHasta()->format('Y-m-d'))
                    ->setCellValue('H' . $i, $arPago->getFechaDesdePago()->format('Y-m-d'))
                    ->setCellValue('I' . $i, $arPago->getFechaHastaPago()->format('Y-m-d'))
                    ->setCellValue('J' . $i, $arPago->getDiasPeriodo())
                    ->setCellValue('K' . $i, $arPago->getVrSalarioEmpleado())
                    ->setCellValue('L' . $i, $arPago->getVrSalarioPeriodo())
                    ->setCellValue('M' . $i, $arPago->getVrAuxilioTransporte())
                    ->setCellValue('N' . $i, $arPago->getVrEps())
                    ->setCellValue('O' . $i, $arPago->getVrPension())
                    ->setCellValue('P' . $i, $arPago->getVrDeducciones())
                    ->setCellValue('Q' . $i, $arPago->getVrDevengado())
                    ->setCellValue('R' . $i, $arPago->getVrIngresoBaseCotizacion())
                    ->setCellValue('S' . $i, $arPago->getVrIngresoBasePrestacion())
                    ->setCellValue('T' . $i, $arPago->getVrNeto());
            $i++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('pagos');
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Pagos.xlsx"');
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
