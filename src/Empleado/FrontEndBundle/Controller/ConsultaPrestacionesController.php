<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultaPrestacionesController extends Controller
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
                $codigoLiquidacion = $request->request->get('OpImprimir');                
                $objFormatoLiquidacion = new \Empleado\FrontEndBundle\Formatos\FormatoLiquidacion();
                $objFormatoLiquidacion->Generar($this, $codigoLiquidacion);                
            }
            if($form->isValid()) {
            if($form->get('BtnExcel')->isClicked()) {
                //$this->filtrarLista($form);
                $this->listar($form);
                $this->generarExcel();
            }
        }
        }
        $arLiquidaciones = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);                                       
        return $this->render('EmpleadoFrontEndBundle:Consultas/Liquidaciones:lista.html.twig', array(
            'form' => $form->createView(),
            'arLiquidaciones' => $arLiquidaciones
            ));
    }   
    
    private function listar($form) {
        $em = $this->getDoctrine()->getManager(); 
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        
        $arUsuario = $this->get('security.context')->getToken()->getUser();        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:RhuLiquidacion')->listaDql(
                $arUsuario->getCodigoEmpleadoFk(),    
                $form->get('TxtCodigoLiquidacion')->getData(),
                ""                
        );  
    }
    
    private function formularioLista() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();        
        $form = $this->createFormBuilder()                                    
            ->add('TxtCodigoLiquidacion', 'text', array('label'  => 'CodigoLiquidacion','data' => ""))                                                               
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
                    ->setCellValue('B1', 'EMPLEADO')
                    ->setCellValue('C1', 'CENTRO COSTOS')
                    ->setCellValue('D1', 'CONTRATO')
                    ->setCellValue('E1', 'FECHA DESDE')
                    ->setCellValue('F1', 'FECHA HASTA')
                    ->setCellValue('G1', 'VR AUX TRANSPORTE')
                    ->setCellValue('H1', 'VR CESANTIAS')
                    ->setCellValue('I1', 'VR INTERESES CESANTIAS')
                    ->setCellValue('J1', 'VR PRIMA')
                    ->setCellValue('K1', 'VR DEDUCCIONES PRIMA')
                    ->setCellValue('L1', 'VR VACACIONES')
                    ->setCellValue('M1', 'DÍAS CESANTIAS')
                    ->setCellValue('N1', 'DÍAS VACACIONES')
                    ->setCellValue('O1', 'DÍAS PRIMA')
                    ->setCellValue('P1', 'FECHA ULTIMO PAGO')
                    ->setCellValue('Q1', 'VR INGRESO BASE PRESTACIONAL')
                    ->setCellValue('R1', 'VR INGRESO BASE PRESTACIONAL TOTAL')
                    ->setCellValue('S1', 'VR BASE PRESTACIONES')
                    ->setCellValue('T1', 'VR BASE PRESTACIONES TOTAL')
                    ->setCellValue('U1', 'VR SALARIO')
                    ->setCellValue('V1', 'VR SALARIO VACACIONES')
                    ->setCellValue('W1', 'FECHA ULTIMA PAGO PRIMAS')
                    ->setCellValue('X1', 'FECHA ULTIMA PAGO VACACIONES')
                    ->setCellValue('Y1', 'FECHA ULTIMA PAGO CESANTIAS')
                    ->setCellValue('Z1', 'VR DEDUCCIONES')
                    ->setCellValue('AA1', 'VR BONIFICACIONES')
                    ->setCellValue('AB1', 'VR TOTAL')
                    ->setCellValue('AC1', 'COMENTARIOS');    
        $i = 2;
        $query = $em->createQuery($this->strDqlLista);
        $arLiquidaciones = new \Empleado\FrontEndBundle\Entity\RhuLiquidacion();
        $arLiquidaciones = $query->getResult();
        foreach ($arLiquidaciones as $arLiquidacion) {
            if ($arLiquidacion->getFechaUltimoPagoPrimas() == null){
                $fechaUltimaPagoPrimas = "SIN FECHA";
            }else{
                $fechaUltimaPagoPrimas = $arLiquidacion->getFechaUltimoPagoPrimas()->format('Y-m-d');
            }
            if ($arLiquidacion->getFechaUltimoPagoVacaciones() == null){
                $fechaUltimaPagoVacaciones = "SIN FECHA";
            }else{
                $fechaUltimaPagoVacaciones = $arLiquidacion->getFechaUltimoPagoVacaciones()->format('Y-m-d');
            }
            if ($arLiquidacion->getFechaUltimoPagoCesantias() == null){
                $fechaUltimaPagoCesantias = "SIN FECHA";
            }else{
                $fechaUltimaPagoCesantias = $arLiquidacion->getFechaUltimoPagoCesantias()->format('Y-m-d');
            }
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $arLiquidacion->getCodigoLiquidacionPk())
                    ->setCellValue('B' . $i, $arLiquidacion->getEmpleadoRel()->getNombreCorto())
                    ->setCellValue('C' . $i, $arLiquidacion->getCentroCostoRel()->getNombre())
                    ->setCellValue('D' . $i, $arLiquidacion->getCodigoContratoFk())
                    ->setCellValue('E' . $i, $arLiquidacion->getFechaDesde()->format('Y-m-d'))
                    ->setCellValue('F' . $i, $arLiquidacion->getFechaHasta()->format('Y-m-d'))
                    ->setCellValue('G' . $i, $arLiquidacion->getVrAuxilioTransporte())
                    ->setCellValue('H' . $i, $arLiquidacion->getVrCesantias())
                    ->setCellValue('I' . $i, $arLiquidacion->getVrInteresesCesantias())
                    ->setCellValue('J' . $i, $arLiquidacion->getVrPrima())
                    ->setCellValue('K' . $i, $arLiquidacion->getVrDeduccionPrima())
                    ->setCellValue('L' . $i, $arLiquidacion->getVrVacaciones())
                    ->setCellValue('M' . $i, $arLiquidacion->getDiasCesantias())
                    ->setCellValue('N' . $i, $arLiquidacion->getDiasVacaciones())
                    ->setCellValue('O' . $i, $arLiquidacion->getDiasPrimas())
                    ->setCellValue('P' . $i, $arLiquidacion->getFechaUltimoPago())
                    ->setCellValue('Q' . $i, $arLiquidacion->getVrIngresoBasePrestacion())
                    ->setCellValue('R' . $i, $arLiquidacion->getVrIngresoBasePrestacionTotal())
                    ->setCellValue('S' . $i, $arLiquidacion->getVrBasePrestaciones())
                    ->setCellValue('T' . $i, $arLiquidacion->getVrBasePrestacionesTotal())
                    ->setCellValue('U' . $i, $arLiquidacion->getVrSalario())
                    ->setCellValue('V' . $i, $arLiquidacion->getVrSalarioVacaciones())
                    ->setCellValue('W' . $i, $fechaUltimaPagoPrimas)
                    ->setCellValue('X' . $i, $fechaUltimaPagoVacaciones)
                    ->setCellValue('Y' . $i, $fechaUltimaPagoCesantias)
                    ->setCellValue('Z' . $i, $arLiquidacion->getVrDeducciones())
                    ->setCellValue('AA' . $i, $arLiquidacion->getVrBonificaciones())
                    ->setCellValue('AB' . $i, $arLiquidacion->getVrTotal())
                    ->setCellValue('AC' . $i, $arLiquidacion->getComentarios());
            $i++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Liquidaciones');
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Liquidaciones.xlsx"');
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
