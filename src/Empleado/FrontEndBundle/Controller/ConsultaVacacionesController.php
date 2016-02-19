<?php

namespace Empleado\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultaVacacionesController extends Controller
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
                $codigoVacacion = $request->request->get('OpImprimir');                
                $objFormatoVacacion = new \Empleado\FrontEndBundle\Formatos\FormatoVacaciones();
                $objFormatoVacacion->Generar($this, $codigoVacacion);                
            }
            if($form->isValid()) {
            if($form->get('BtnExcel')->isClicked()) {
                //$this->filtrarLista($form);
                $this->listar($form);
                $this->generarExcel();
            }
        }
        }
        $arVacaciones = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 50);                                       
        return $this->render('EmpleadoFrontEndBundle:Consultas/Vacaciones:lista.html.twig', array(
            'form' => $form->createView(),
            'arVacaciones' => $arVacaciones
            ));
    }   
    
    private function listar($form) {
        $em = $this->getDoctrine()->getManager(); 
        $arUsuario = new \Empleado\FrontEndBundle\Entity\Usuario();
        
        $arUsuario = $this->get('security.context')->getToken()->getUser();        
        $this->strDqlLista = $em->getRepository('EmpleadoFrontEndBundle:RhuVacacion')->listaDql(
                $arUsuario->getCodigoEmpleadoFk(),    
                $form->get('TxtCodigoVacacion')->getData(),
                ""                
        );  
    }
    
    private function formularioLista() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();        
        $form = $this->createFormBuilder()                                    
            ->add('TxtCodigoVacacion', 'text', array('label'  => 'CodigoVacacion','data' => ""))                                                               
            ->add('BtnExcel', 'submit', array('label'  => 'Excel',))
            ->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar'))                                            
            ->getForm();        
        return $form;
    }
    
    private function generarExcel() {
        $em = $this->getDoctrine()->getManager();
        ob_clean();
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
                            ->setCellValue('A1', 'Codigo')
                            ->setCellValue('B1', 'Centro Costo')
                            ->setCellValue('C1', 'Desde')
                            ->setCellValue('D1', 'Hasta')
                            ->setCellValue('E1', 'Identificación')
                            ->setCellValue('F1', 'Empleado')
                            ->setCellValue('G1', 'Dias')
                            ->setCellValue('H1', 'Vr Vacaciones')
                            ->setCellValue('I1', 'Pagado');

                $i = 2;
                $query = $em->createQuery($this->strDqlLista);
                $arVacaciones = new \Empleado\FrontEndBundle\Entity\RhuVacacion();
                $arVacaciones = $query->getResult();
                
                foreach ($arVacaciones as $arVacacion) {
                    if ($arVacacion->getEstadoPagado() == 1)
                    {
                        $Estado = "SI";
                    }
                    else
                    {
                        $Estado = "NO"; 
                    }
                    
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A' . $i, $arVacacion->getCodigoVacacionPk())
                            ->setCellValue('B' . $i, $arVacacion->getCentroCostoRel()->getNombre())
                            ->setCellValue('C' . $i, $arVacacion->getFechaDesdeDisfrute())
                            ->setCellValue('D' . $i, $arVacacion->getFechaHastaDisfrute())
                            ->setCellValue('E' . $i, $arVacacion->getEmpleadoRel()->getNumeroIdentificacion())
                            ->setCellValue('F' . $i, $arVacacion->getEmpleadoRel()->getNombreCorto())
                            ->setCellValue('G' . $i, $arVacacion->getDiasVacaciones())
                            ->setCellValue('H' . $i, round($arVacacion->getVrVacacion()))
                            ->setCellValue('I' . $i, $Estado);
                    $i++;
                }

                $objPHPExcel->getActiveSheet()->setTitle('Vacaciones');
                $objPHPExcel->setActiveSheetIndex(0);

                // Redirect output to a client’s web browser (Excel2007)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Vacaciones.xlsx"');
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
