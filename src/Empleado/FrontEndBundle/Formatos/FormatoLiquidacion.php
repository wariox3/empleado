<?php
namespace Empleado\FrontEndBundle\Formatos;

class FormatoLiquidacion extends \FPDF_FPDF {
    public static $em;
    
    public static $codigoLiquidacion;

    public function Generar($miThis, $codigoLiquidacion) {
        ob_clean();
        $em = $miThis->getDoctrine()->getManager();
        self::$em = $em;
        self::$codigoLiquidacion = $codigoLiquidacion;
        $pdf = new FormatoLiquidacion();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $this->Body($pdf);

        $pdf->Output("Liquidacion$codigoLiquidacion.pdf", 'D');

    }

    public function Header() {
        $arConfiguracion = new \Empleado\FrontEndBundle\Entity\GenConfiguracion();
        $arConfiguracion = self::$em->getRepository('EmpleadoFrontEndBundle:GenConfiguracion')->find(1);
        $this->SetFillColor(200, 200, 200);
        $this->SetFont('Arial','B',10);
        //Logo
        $this->SetXY(53, 10);
        $this->Image('imagenes/logos/logo.jpg', 12, 13, 35, 17);
        //INFORMACIÓN EMPRESA
        $this->Cell(143, 7, utf8_decode("COMPROBANTE PAGO DE PRESTACIONES SOCIALES"), 0, 0, 'C', 1);
        $this->SetXY(53, 18);
        $this->SetFont('Arial','B',9);
        $this->Cell(20, 4, "EMPRESA:", 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getNombreEmpresa(), 0, 0, 'L', 0);
        $this->SetXY(53, 22);
        $this->Cell(20, 4, "NIT:", 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getNitEmpresa()." - ". $arConfiguracion->getDigitoVerificacionEmpresa(), 0, 0, 'L', 0);
        $this->SetXY(53, 26);
        $this->Cell(20, 4, utf8_decode("DIRECCIÓN:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getDireccionEmpresa(), 0, 0, 'L', 0);
        $this->SetXY(53, 30);
        $this->Cell(20, 4, utf8_decode("TELÉFONO:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getTelefonoEmpresa(), 0, 0, 'L', 0);
        $this->Ln(1);
        $this->EncabezadoDetalles();
    }

    public function EncabezadoDetalles() {
        $arLiquidacion = new \Empleado\FrontEndBundle\Entity\RhuLiquidacion();
        $arLiquidacion = self::$em->getRepository('EmpleadoFrontEndBundle:RhuLiquidacion')->find(self::$codigoLiquidacion);
        $intY = 42;
        //FILA 1
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(236, 236, 236);
        $this->SetXY(10, $intY);
        $this->Cell(35, 5, utf8_decode("LIQUIDACIÓN:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(20, 5, $arLiquidacion->getCodigoLiquidacionPk(), 1, 0, 'L', 1);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(35, 5, "CENTRO COSTO:", 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(95, 5, utf8_decode($arLiquidacion->getCentroCostoRel()->getNombre()), 1, 0, 'L', 1);
        //FILA 2
        $intY += 5;
        $this->SetFont('Arial', 'B', 8);
        $this->SetXY(10, $intY);
        $this->Cell(35, 5, utf8_decode("DOCUMENTO:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(20, 5, $arLiquidacion->getEmpleadoRel()->getNumeroIdentificacion(), 1, 0, 'L', 1);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(35, 5, "EMPLEADO:", 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(95, 5, utf8_decode($arLiquidacion->getEmpleadoRel()->getNombreCorto()), 1, 0, 'L', 1);
        //FILA 3
        $intY += 5;
        $this->SetFont('Arial', 'B', 8);
        $this->SetXY(10, $intY);
        $this->Cell(35, 5, utf8_decode("FECHA INGRESO:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(20, 5, $arLiquidacion->getFechaDesde()->format('Y/m/d'), 1, 0, 'L', 1);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(35, 5, utf8_decode("NÚMERO CUENTA:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(27, 5, $arLiquidacion->getEmpleadoRel()->getCuenta(), 1, 0, 'L', 1);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(38, 5, utf8_decode("DIAS LABORADOS:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(30, 5, $arLiquidacion->getNumeroDias(), 1, 0, 'R', 1);
        //Fila 4
        $intY += 5;
        $this->SetFont('Arial', 'B', 8);
        $this->SetXY(10, $intY);
        $this->Cell(35, 5, utf8_decode("FECHA RETIRO:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(20, 5, $arLiquidacion->getFechaHasta()->format('Y/m/d'), 1, 0, 'L', 1);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(35, 5, "BANCO:", 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 6.5);
        $this->Cell(27, 5, utf8_decode($arLiquidacion->getEmpleadoRel()->getBancoRel()->getNombre()), 1, 0, 'L', 1);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(38, 5, utf8_decode("DÍAS NÓMINA ADICIONAL:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 7);
        $this->Cell(30, 5, $arLiquidacion->getDiasAdicionalesIBP(), 1, 0, 'R', 1);
        //FILA 5
        $intY += 5;
        $this->SetFont('Arial', 'B', 8);
        $this->SetXY(10, $intY);
        $this->Cell(35, 5, utf8_decode("MOTIVO RETIRO:"), 1, 0, 'L', 1);
        $this->SetFont('Arial', '', 8);
        $this->Cell(150, 5, utf8_decode($arLiquidacion->getMotivoTerminacionRel()->getMotivo()), 1, 0, 'L', 1);
        //BLOQUE BASE LIQUIDACIÓN
        $intX = 123;
        $intY = 70;
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(236, 236, 236);
        $this->SetXY($intX, $intY);
        $this->Cell(40, 5, utf8_decode("BASE:"), 1, 0, 'L', 1);
        $this->SetXY($intX, $intY + 6);
        $this->Cell(40, 5, "BASE PRESTACIONES:", 1, 0, 'L', 1);
        $this->SetXY($intX, $intY + 12);
        $this->Cell(40, 5, "AUXILIO TRANSPORTE:", 1, 0, 'L', 1);
        $this->SetXY($intX, $intY + 18);
        $this->Cell(40, 5, "TOTAL BASE:", 1, 0, 'L', 1);
        $intX = 163;
        $this->SetFont('Arial', '', 8);
        $this->SetFillColor(272, 272, 272);
        $this->SetXY($intX, $intY);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrIngresoBasePrestacionTotal(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX, $intY + 6);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrBasePrestaciones(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX, $intY + 12);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrAuxilioTransporte(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX, $intY + 18);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrBasePrestacionesTotal(), 0, '.', ','), 1, 0, 'R', 1);
        //BLOQUE TOTALES
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(236, 236, 236);
        $intX = 35;
        $this->SetXY($intX + 73, 96);
        $this->Cell(15, 5, utf8_decode("DIAS"), 1, 0, 'R', 1);
        $this->SetXY($intX + 88, 96);
        $this->Cell(15, 5, utf8_decode("D. AUS"), 1, 0, 'R', 1);        
        $this->SetXY($intX + 103, 96);
        $this->Cell(25, 5, utf8_decode("DESDE"), 1, 0, 'L', 1);
        $this->SetXY($intX + 128, 96);
        $this->Cell(32, 5, utf8_decode("TOTAL"), 1, 0, 'R', 1);

        $this->SetXY($intX + 28, 102);
        $this->Cell(43, 5, utf8_decode("CESANTÍAS:"), 1, 0, 'L', 1);
        $this->SetXY($intX + 28, 108);
        $this->Cell(43, 5, "INTERESES:", 1, 0, 'L', 1);
        $this->SetXY($intX + 28, 114);
        $this->Cell(43, 5, "PRIMA SEMESTRAL:", 1, 0, 'L', 1);
        $this->SetXY($intX + 28, 120);
        $this->Cell(43, 5, "VACACIONES:", 1, 0, 'L', 1);
        $this->SetXY($intX + 28, 126);
        $this->Cell(43, 5, "DEDUCCIONES", 1, 0, 'L', 1);
        $this->SetXY($intX + 28, 132);
        $this->Cell(43, 5, "DEDUCCIONES PRIMAS:", 1, 0, 'L', 1);
        $this->SetXY($intX + 28, 138);
        $this->Cell(43, 5, "BONIFICACIONES:", 1, 0, 'L', 1);
        $this->SetXY($intX + 28, 144);
        $this->Cell(43, 5, "TOTAL:", 1, 0, 'L', 1);

        $this->SetFont('Arial', '', 8);
        $this->SetFillColor(272, 272, 272);
        $this->SetXY($intX + 73, 102);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasCesantias(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 73, 108);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasCesantias(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 73, 114);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasPrimas(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 73, 120);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasVacaciones(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 73, 126);
        $this->Cell(15, 5, "", 1, 0, 'R', 1);
        $this->SetXY($intX + 73, 132);
        $this->Cell(15, 5, "", 1, 0, 'R', 1);
        
        $this->SetXY($intX + 88, 102);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasCesantiasDescontar(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 88, 108);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasCesantiasDescontar(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 88, 114);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasPrimasDescontar(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 88, 120);
        $this->Cell(15, 5, number_format($arLiquidacion->getDiasVacacionesDescontar(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 88, 126);
        $this->Cell(15, 5, "", 1, 0, 'R', 1);
        $this->SetXY($intX + 88, 132);
        $this->Cell(15, 5, "", 1, 0, 'R', 1);
        
        $this->SetXY($intX + 103, 102);
        if ($arLiquidacion->getFechaUltimoPagoCesantias() == null){
            $fechaUltimoPagoCesantias = "SIN FECHA";
        } else {
            $fechaUltimoPagoCesantias = $arLiquidacion->getFechaUltimoPagoCesantias()->format('Y-m-d');
        }
        $this->Cell(25, 5, $fechaUltimoPagoCesantias, 1, 0, 'L', 1);
        $this->SetXY($intX + 103, 108);
        $this->Cell(25, 5, $fechaUltimoPagoCesantias, 1, 0, 'L', 1);
        $this->SetXY($intX + 103, 114);
        if ($arLiquidacion->getFechaUltimoPagoPrimas() == null){
            $fechaUltimoPagoPrimas = "SIN FECHA";
        } else {
            $fechaUltimoPagoPrimas = $arLiquidacion->getFechaUltimoPagoPrimas()->format('Y-m-d');
        }
        $this->Cell(25, 5, $fechaUltimoPagoPrimas, 1, 0, 'L', 1);
        $this->SetXY($intX + 103, 120);
        if ($arLiquidacion->getFechaUltimoPagoVacaciones() == null){
            $fechaUltimoPagoVacaciones = "SIN FECHA";
        } else {
            $fechaUltimoPagoVacaciones = $arLiquidacion->getFechaUltimoPagoVacaciones()->format('Y-m-d');
        }
        $this->Cell(25, 5, $fechaUltimoPagoVacaciones, 1, 0, 'L', 1);
        $this->SetXY($intX + 103, 126);
        $this->Cell(25, 5, "", 1, 0, 'L', 1);
        $this->SetXY($intX + 103, 132);
        $this->Cell(25, 5, "", 1, 0, 'L', 1);

        //$intX = 163;
        $this->SetXY($intX + 128, 102);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrCesantias(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 128, 108);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrInteresesCesantias(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 128, 114);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrPrima(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 128, 120);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrVacaciones(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 128, 126);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrDeducciones(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 128, 132);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrDeduccionPrima(), 0, '.', ','), 1, 0, 'R', 1);
        $this->SetXY($intX + 128, 138);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrBonificaciones(), 0, '.', ','), 1, 0, 'R', 1);

        $this->SetFont('Arial', 'B', 8);
        $this->SetXY($intX + 128, 144);
        $this->Cell(32, 5, number_format($arLiquidacion->getVrTotal(), 0, '.', ','), 1, 0, 'R', 1);

        $this->Ln(15);

        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(236, 236, 236);
        $this->Cell(185, 7, "DESCUENTOS - BONIFICACIONES", 1, 0, 'C', 1);
        $this->Ln();
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.2);
        $this->SetFont('Arial', 'B', 7);
        $header = array(utf8_decode('CÓDIGO'), 'TIPO', 'CONCEPTO', 'VALOR','OBSERVACIONES');

        //creamos la cabecera de la tabla.
        $w = array(12, 50, 50, 17,56);
        for ($i = 0; $i < count($header); $i++)
            if ($i == 0 || $i == 1)
                $this->Cell($w[$i], 4, $header[$i], 1, 0, 'L', 1);
            else
                $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', 1);

        //Restauraci�n de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $this->Ln(4);
        $this->Footer($arLiquidacion);
    }

    public function Body($pdf) {
        $arLiquidacionAdicionales = new \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales();
        $arLiquidacionAdicionales = self::$em->getRepository('EmpleadoFrontEndBundle:RhuLiquidacionAdicionales')->findBy(array('codigoLiquidacionFk' => self::$codigoLiquidacion));
        $pdf->SetX(10);
        $pdf->SetFont('Arial', '', 7);
        foreach ($arLiquidacionAdicionales as $arLiquidacionAdicional) {
            $pdf->Cell(12, 4, $arLiquidacionAdicional->getCodigoLiquidacionAdicionalPk(), 1, 0, 'L');

            if($arLiquidacionAdicional->getCodigoCreditoFk()) {
                $pdf->Cell(50, 4, $arLiquidacionAdicional->getCreditoRel()->getCreditoTipoRel()->getNombre(), 1, 0, 'L');
            } else {
                if ($arLiquidacionAdicional->getCodigoLiquidacionAdicionalConceptoFk() == null){
                    $pdf->Cell(50, 4, utf8_decode("BONIFICACIÓN"), 1, 0, 'L');
                }else{
                    $pdf->Cell(50, 4, utf8_decode($arLiquidacionAdicional->getLiquidacionAdicionalConceptoRel()->getNombre()), 1, 0, 'L');
                }
            }    
            if ($arLiquidacionAdicional->getCodigoLiquidacionAdicionalConceptoFk() == null){
                $pdf->Cell(50, 4, "DESCUENTO EMPRESA USUARIA", 1, 0, 'L');
            }else{
                $pdf->Cell(50, 4, utf8_decode($arLiquidacionAdicional->getLiquidacionAdicionalConceptoRel()->getNombre()), 1, 0, 'L');
            }
            if ($arLiquidacionAdicional->getCodigoLiquidacionAdicionalConceptoFk() == 1){
                $pdf->Cell(17, 4, number_format($arLiquidacionAdicional->getVrDeduccion(), 0,'.',','), 1, 0, 'R');
            }else {
                $pdf->Cell(17, 4, number_format($arLiquidacionAdicional->getVrBonificacion(), 0,'.',','), 1, 0, 'R');
            }
            $pdf->SetFont('Arial', '', 6.5);
            $pdf->Cell(56, 4, utf8_decode($arLiquidacionAdicional->getDetalle()), 1, 0, 'L');
            $pdf->Ln();
            $pdf->SetAutoPageBreak(true, 15);
        }
        $pdf->SetY(218);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(24, 4,utf8_decode("Con la entrega de esta Liquidación Final, expreso que la EMPRESA se encuentra a Paz y Salvo por todo concepto prestacional y salarial."), 0, 0, 'L');
        
            $pdf->SetAutoPageBreak(1, 15);
    }

    public function Footer() {
        $arConfiguracion = new \Empleado\FrontEndBundle\Entity\GenConfiguracion();
        $arConfiguracion = self::$em->getRepository('EmpleadoFrontEndBundle:GenConfiguracion')->find(1);
        $arLiquidacion = new \Empleado\FrontEndBundle\Entity\RhuLiquidacion();
        $arLiquidacion = self::$em->getRepository('EmpleadoFrontEndBundle:RhuLiquidacion')->find(self::$codigoLiquidacion);
        $this->SetFont('Arial', 'B', 9);
        
        $this->Text(10, 240, "FIRMA: _____________________________________________");
        $this->Text(10, 247, $arLiquidacion->getEmpleadoRel()->getNombreCorto());
        $this->Text(10, 254, "C.C.:     ______________________ de ____________________");
        $this->Text(105, 240, "FIRMA: _____________________________________________");
        $this->Text(105, 247, $arConfiguracion->getNombreEmpresa());
        $this->Text(105, 254, "NIT: ". $arConfiguracion->getNitEmpresa()." - ". $arConfiguracion->getDigitoVerificacionEmpresa());
        $this->SetFont('Arial', '', 8);
        $this->Text(170, 290, utf8_decode('Página ') . $this->PageNo() . ' de {nb}');
    }
}

?>
