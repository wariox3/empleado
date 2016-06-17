<?php
namespace Empleado\FrontEndBundle\Formatos;
class FormatoPago extends \FPDF_FPDF {
    public static $em;
    
    public static $codigoPago;
    
    public function Generar($miThis, $codigoPago, $strRuta = "") {        
        ob_clean();
        $em = $miThis->getDoctrine()->getManager();
        self::$em = $em;
        self::$codigoPago = $codigoPago;
        $pdf = new FormatoPago();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $pdf->SetFillColor(200, 200, 200);
        $this->Body($pdf);
        if($strRuta == "") {
            $pdf->Output("Pago$codigoPago.pdf", 'D');        
        } else {
            $pdf->Output($strRuta."Pago$codigoPago.pdf", 'F');        
        }
        
        
    } 
    
    public function Header() {
        $arPago = new \Empleado\FrontEndBundle\Entity\RhuPago();
        $arPago = self::$em->getRepository('EmpleadoFrontEndBundle:RhuPago')->find(self::$codigoPago);
        $arConfiguracion = new \Empleado\FrontEndBundle\Entity\RhuPago();
        $arConfiguracion = self::$em->getRepository('EmpleadoFrontEndBundle:GenConfiguracion')->find(1);
        $this->SetFillColor(200, 200, 200);        
        $this->SetFont('Arial','B',10);
        //Logo
        $this->SetXY(53, 14);
        $this->Image('imagenes/logos/logo.jpg', 12, 15, 35, 17);
        //INFORMACIÓN EMPRESA
        $this->Cell(150, 7, utf8_decode("COMPROBANTE PAGO ". $arPago->getPagoTipoRel()->getNombre().""), 0, 0, 'C', 1);
        $this->SetXY(53, 21);
        $this->SetFont('Arial','B',9);
        $this->Cell(20, 4, "EMPRESA:", 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getNombreEmpresa(), 0, 0, 'L', 0);
        $this->SetXY(53, 25);
        $this->Cell(20, 4, "NIT:", 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getNitEmpresa()." - ". $arConfiguracion->getDigitoVerificacionEmpresa(), 0, 0, 'L', 0);
        $this->SetXY(53, 29);
        $this->Cell(20, 4, utf8_decode("DIRECCIÓN:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getDireccionEmpresa(), 0, 0, 'L', 0);
        $this->SetXY(53, 33);
        $this->Cell(20, 4, utf8_decode("TELÉFONO:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getTelefonoEmpresa(), 0, 0, 'L', 0);
        //FILA 1
        $this->SetXY(10, 40);
        $this->SetFont('Arial','B',6.5);
        $this->Cell(22, 6, "PAGO:" , 1, 0, 'L', 1);
        $this->SetFillColor(255, 255, 255);
        $this->SetFont('Arial','',7);
        $this->Cell(78, 6, $arPago->getCodigoPagoPk() , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 6, "FECHA:" , 1, 0, 'L', 1);
        $this->SetFont('Arial','',7);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(69, 6, $arPago->getFechaHasta()->format('Y/m/d') , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        //FILA 2
        $this->SetXY(10, 45);
        $this->SetFont('Arial','B',7);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(22, 6, "EMPLEADO:" , 1, 0, 'L', 1);                            
        $this->SetFont('Arial','',6);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(78, 6, utf8_decode($arPago->getEmpleadoRel()->getNombreCorto()) , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 6, "IDENTIFICACION:" , 1, 0, 'L', 1);
        $this->SetFont('Arial','',7);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(24, 6, $arPago->getEmpleadoRel()->getNumeroIdentificacion() , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 6, "CUENTA:" , 1, 0, 'L', 1);
        $this->SetFont('Arial','',7);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(21, 6, $arPago->getEmpleadoRel()->getCuenta() , 1, 0, 'L', 1);
        //FILA 3
        $this->SetXY(10, 50);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(22, 6, "CARGO:" , 1, 0, 'L', 1 );                            
        $this->SetFont('Arial','',6);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(78, 6, utf8_decode($arPago->getContratoRel()->getCargoRel()->getNombre()) , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 6, "EPS:" , 1, 0, 'L', 1);
        $this->SetFont('Arial','',6);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(24, 6, utf8_decode($arPago->getContratoRel()->getEntidadSaludRel()->getNombre()) , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 6, utf8_decode("PENSIÓN :") , 1, 0, 'L', 1);
        $this->SetFont('Arial','',6);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(21, 6, utf8_decode($arPago->getContratoRel()->getEntidadPensionRel()->getNombre()) , 1, 0, 'L', 1);
        //FILA 4
        $this->SetXY(10, 55);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(22, 6, "CENTRO COSTOS:" , 1, 0, 'L', 1);                            
        $this->SetFont('Arial','',6);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(78, 6, $arPago->getCentroCostoRel()->getNombre() , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 6, "DESDE:" , 1, 0, 'L', 1);
        $this->SetFont('Arial','',7);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(24, 6, $arPago->getFechaDesde()->format('Y/m/d') , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 6, "SALARIO:" , 1, 0, 'L', 1);
        $this->SetFont('Arial','',7);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(21, 6, number_format($arPago->getEmpleadoRel()->getVrSalario(), 0, '.', ',') , 1, 0, 'R', 1);
        //FILA 5
        $this->SetXY(10, 60);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(22, 5, "PERIODO PAGO:" , 1, 0, 'L', 1);                            
        $this->SetFont('Arial','',6.5);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(78, 5, $arPago->getCentroCostoRel()->getPeriodoPagoRel()->getNombre() , 1, 0, 'L', 1);
        $this->SetFont('Arial','B',6.5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(24, 5, "HASTA" , 1, 0, 'L', 1);
        $this->SetFont('Arial','',7);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(24, 5, $arPago->getFechaHasta()->format('Y/m/d') , 1, 0, 'L', 1);
        
        
        $this->SetFillColor(255, 255, 255);
        $this->Cell(45, 5, "" , 1, 0, 'R', 1);
        $this->EncabezadoDetalles();
        
    }

    public function EncabezadoDetalles() {
        $this->Ln(8);
        $header = array('CONCEPTO', 'DETALLE', 'HORAS', 'VR. HORA', '%', 'DEDUCCION', 'DEVENGADO');
        $this->SetFillColor(200, 200, 200);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.2);
        $this->SetFont('', 'B', 7);

        //creamos la cabecera de la tabla.
        $w = array(40, 83, 11, 14, 9, 18, 18);
        for ($i = 0; $i < count($header); $i++)
            if ($i == 0 || $i == 1)
                $this->Cell($w[$i], 4, $header[$i], 1, 0, 'L', 1);
            else
                $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', 1);

        //Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $this->Ln(4);
    }

    public function Body($pdf) {
        $pdf->SetX(10);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(200, 200, 200);
        $arPagoDetalle = new \Empleado\FrontEndBundle\Entity\RhuPagoDetalle();
        $arPagoDetalle = self::$em->getRepository('EmpleadoFrontEndBundle:RhuPagoDetalle')->findBy(array('codigoPagoFk' => self::$codigoPago));
        $arConfiguracion = new \Empleado\FrontEndBundle\Entity\RhuConfiguracion();
        $arConfiguracion = self::$em->getRepository('EmpleadoFrontEndBundle:RhuConfiguracion')->configuracionDatoCodigo(1);
        foreach ($arPagoDetalle as $arPagoDetalle) {            
            $pdf->SetFont('Arial', '', 6);
            $pdf->Cell(40, 4, $arPagoDetalle->getPagoConceptoRel()->getNombre(), 1, 0, 'L');
            $pdf->Cell(83, 4, utf8_decode($arPagoDetalle->getDetalle()), 1, 0, 'L');
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(11, 4, number_format($arPagoDetalle->getNumeroHoras(), 0, '.', ','), 1, 0, 'R');
            $pdf->Cell(14, 4, number_format($arPagoDetalle->getVrHora(), 0, '.', ','), 1, 0, 'R');
            $pdf->Cell(9, 4, number_format($arPagoDetalle->getPorcentajeAplicado(), 0, '.', ','), 1, 0, 'R');
            if($arPagoDetalle->getOperacion() == -1) {
                $pdf->Cell(18, 4, "-".number_format($arPagoDetalle->getVrPago(), 0, '.', ','), 1, 0, 'R');    
            } else {
                $pdf->Cell(18, 4, number_format(0, 0, '.', ','), 1, 0, 'R');    
            }            
            if($arPagoDetalle->getOperacion() == 1) {
                $pdf->Cell(18, 4, number_format($arPagoDetalle->getVrPago(), 0, '.', ','), 1, 0, 'R');    
            } else {
                $pdf->Cell(18, 4, number_format(0, 0, '.', ','), 1, 0, 'R');    
            }            
            $pdf->Ln();
            $pdf->SetAutoPageBreak(true, 15);
        }
            //TOTALES
            $arPago = new \Empleado\FrontEndBundle\Entity\RhuPago();
            $arPago = self::$em->getRepository('EmpleadoFrontEndBundle:RhuPago')->find(self::$codigoPago);
            $pdf->Ln(4);
            $pdf->Cell(143, 4, "", 0, 0, 'R');
            $pdf->SetFont('Arial', 'B', 7);
            $this->SetFillColor(200, 200, 200);
            $pdf->Cell(30, 4, "TOTAL DEDUCCIONES:", 1, 0, 'R',true);
            $pdf->Cell(20, 4, "-".number_format($arPago->getVrDeducciones(), 0, '.', ','), 1, 0, 'R');
            $pdf->Ln();
            $pdf->Cell(143, 4, "", 0, 0, 'R');
            $pdf->Cell(30, 4, "TOTAL DEVENGADO:", 1, 0, 'R',true);
            $pdf->Cell(20, 4, number_format($arPago->getVrDevengado(), 0, '.', ','), 1, 0, 'R');
            $pdf->Ln();
            $pdf->Cell(143, 4, "", 0, 0, 'R');
            $pdf->Cell(30, 4, "NETO PAGAR", 1, 0, 'R',true);
            $pdf->Cell(20, 4, number_format($arPago->getVrNeto(), 0, '.', ','), 1, 0, 'R');
            $pdf->Ln(8);
            // INFORMACION DE CREDITOS
            $arPagoDetalles = new \Empleado\FrontEndBundle\Entity\RhuPagoDetalle();
            $arPagoDetalles = self::$em->getRepository('EmpleadoFrontEndBundle:RhuPagoDetalle')->findBy(array('codigoPagoFk' => self::$codigoPago));
                $pdf->Cell(193, 4, utf8_decode("INFORMACIÓN DE CREDITOS"), 1, 0, 'L',true);
                $pdf->Ln(4);
                $pdf->Cell(24, 4, utf8_decode("CÓDIGO"), 1, 0, 'L',true);
                $pdf->Cell(24, 4, "FECHA", 1, 0, 'L',true);
                $pdf->Cell(25, 4, "VALOR CREDITO", 1, 0, 'L',true);
                $pdf->Cell(24, 4, "CUOTAS", 1, 0, 'L',true);
                $pdf->Cell(24, 4, "CUOTA ACTUAL", 1, 0, 'L',true);
                $pdf->Cell(24, 4, "SALDO", 1, 0, 'L',true);
                $pdf->Cell(24, 4, "APROBADO", 1, 0, 'L',true);
                $pdf->Cell(24, 4, "SUSPENDIDO", 1, 0, 'L',true);
                $pdf->Ln();
                $pdf->SetFont('Arial', '', 8);
                foreach ($arPagoDetalles as $arPagoDetalles) {
                    if ($arPagoDetalles->getCodigoCreditoFk() <> "" && $arPagoDetalles->getCodigoPagoConceptoFk() == $arConfiguracion->getCodigoCredito()) { 
                        $arCredito = new \Empleado\FrontEndBundle\Entity\RhuCredito();
                        $arCredito = self::$em->getRepository('EmpleadoFrontEndBundle:RhuCredito')->find($arPagoDetalles->getCodigoCreditoFk());
                        $arCreditoPago = new \Empleado\FrontEndBundle\Entity\RhuCreditoPago();
                        $arCreditoPago = self::$em->getRepository('EmpleadoFrontEndBundle:RhuCreditoPago')->findOneBy(array('codigoPagoFk' =>$arPagoDetalles->getCodigoPagoFk()));
                        $connection = self::$em->getConnection();
                        $strSql = "SELECT
                                    COUNT(rhu_credito_pago.fecha_pago) as registros,
                                    SUM(rhu_credito_pago.vr_cuota) as total
                                    FROM
                                    rhu_credito_pago
                                    INNER JOIN rhu_credito ON rhu_credito_pago.codigo_credito_fk = rhu_credito.codigo_credito_pk
                                    WHERE
                                    rhu_credito_pago.codigo_credito_fk = " .$arCredito->getCodigoCreditoPk(). " AND rhu_credito_pago.fecha_pago <= '" . date_format($arCreditoPago->getFechaPago(), ('Y-m-d')) . "' 
                                    ORDER BY
                                    rhu_credito_pago.fecha_pago ASC";                    
                        $statement = $connection->prepare($strSql);        
                        $statement->execute();
                        $resultados = $statement->fetchAll();
                        $saldo = $arCredito->getVrPagar() - $resultados[0]['total'];
                        $pdf->Cell(24, 4, $arCredito->getCodigoCreditoPk(), 1, 0, 'L');
                        $pdf->Cell(24, 4, $arCredito->getFecha()->format('Y/m/d'), 1, 0, 'L');
                        $pdf->Cell(25, 4, number_format($arCredito->getVrPagar(), 0, '.', ','), 1, 0, 'R');
                        $pdf->Cell(24, 4, $arCredito->getNumeroCuotas(), 1, 0, 'L');
                        $pdf->Cell(24, 4, $resultados[0]['registros'], 1, 0, 'L');
                        $pdf->Cell(24, 4, number_format($saldo, 0, '.', ','), 1, 0, 'R');
                        if ($arCredito->getAprobado() == 1){
                            $pdf->Cell(24, 4, "SI", 1, 0, 'L');
                        }
                        else {
                            $pdf->Cell(24, 4, "NO", 1, 0, 'L');
                        }
                        if ($arCredito->getEstadoSuspendido() == 1){
                            $pdf->Cell(24, 4, "SI", 1, 0, 'L');
                        }
                        else {
                            $pdf->Cell(24, 4, "NO", 1, 0, 'L');
                        }
                        $pdf->Ln();
                    }
                
                }
            $pdf->Ln(8);
            $pdf->SetFont('Arial', 'B', 7);
           
                    
    }

    public function Footer() {
        
        $this->SetFont('Arial','', 8);  
        $this->Text(170, 290, utf8_decode('Página ') . $this->PageNo() . ' de {nb}');
    }    
}

?>
