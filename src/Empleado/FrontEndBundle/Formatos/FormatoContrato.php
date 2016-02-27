<?php
namespace Brasa\RecursoHumanoBundle\Formatos;
class FormatoContrato extends \FPDF_FPDF {
    public static $em;
    
    public static $codigoContrato;
    
    public function Generar($miThis, $codigoContrato) {        
        ob_clean();
        $em = $miThis->getDoctrine()->getManager();
        self::$em = $em;
        self::$codigoContrato = $codigoContrato;
        $pdf = new FormatoContrato();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $this->Body($pdf);

        $pdf->Output("Contrato$codigoContrato.pdf", 'D');        
        
    } 
    
    public function Header() {
        $this->SetFillColor(236, 236, 236);        
        $this->SetFont('Arial','B',10);                        
        $this->EncabezadoDetalles();        
    }

    public function EncabezadoDetalles() {
        $arContrato = new \Brasa\RecursoHumanoBundle\Entity\RhuContrato();
        $arContrato = self::$em->getRepository('BrasaRecursoHumanoBundle:RhuContrato')->find(self::$codigoContrato);        
        $arContenidoFormato = new \Brasa\GeneralBundle\Entity\GenContenidoFormato();
        $arContenidoFormato = self::$em->getRepository('BrasaGeneralBundle:GenContenidoFormato')->find($arContrato->getCodigoContratoTipoFk());        
        $this->SetXY(10, 10);
        $this->Image('imagenes/logos/logo.jpg', 12, 13, 35, 17);
        //$this->Cell(185, 7, utf8_decode($arContenidoFormato->getTitulo()), 0, 0, 'C', 1);
        //$this->Text(10, 25, "Contrato numero: " . $arContrato->getCodigoContratoPk());
        $this->Ln(20);
    }

    public function Body($pdf) {
        $arConfiguracion = new \Brasa\GeneralBundle\Entity\GenConfiguracion();
        $arConfiguracion = self::$em->getRepository('BrasaGeneralBundle:GenConfiguracion')->find(1);        
        $arContrato = new \Brasa\RecursoHumanoBundle\Entity\RhuContrato();
        $arContrato = self::$em->getRepository('BrasaRecursoHumanoBundle:RhuContrato')->find(self::$codigoContrato);        
        $codigoContratoTipo = $arContrato->getCodigoContratoTipoFk();
        $arContratoTipo = new \Brasa\RecursoHumanoBundle\Entity\RhuContratoTipo();
        $arContratoTipo = self::$em->getRepository('BrasaRecursoHumanoBundle:RhuContratoTipo')->find($codigoContratoTipo);
        $codigoContenidoFormato = $arContratoTipo->getCodigoContenidoFormatoFk();
        $arContenidoFormato = new \Brasa\GeneralBundle\Entity\GenContenidoFormato();
        if ($codigoContratoTipo == null){
           $cadena = "El contrato no tiene asociado un formato tipo contrato"; 
        } else {
           if ($codigoContenidoFormato == null){
               $cadena = "El contrato no tiene un formato creado en el sistema";
           } else {
               $arContenidoFormato = self::$em->getRepository('BrasaGeneralBundle:GenContenidoFormato')->find($arContratoTipo->getCodigoContenidoFormatoFk());
               $cadena = $arContenidoFormato->getContenido();
             }
          }
        $pdf->SetXY(50, 36);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(110, 6, utf8_decode($arContenidoFormato->getTitulo()) , 0, 0, 'C');
        $pdf->SetXY(50, 44);
        $pdf->Cell(110, 6, utf8_decode($arConfiguracion->getNombreEmpresa()) , 0, 0, 'C');
        $pdf->SetXY(50, 50);
        $pdf->Cell(110, 6, utf8_decode("REGIONAL " . $arConfiguracion->getCiudadRel()->getDepartamentoRel()->getNombre()) , 0, 0, 'C');
        $pdf->SetXY(177, 56);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(25, 6, utf8_decode("N° " . $arContrato->getCodigoContratoPk()) , 0, 0, 'C');
        
        $pdf->SetXY(10, 72);
        $pdf->SetFont('Arial', '', 10);  
        //se reemplaza el contenido de la tabla tipo de proceso disciplinario
        $sustitucion1 = $arContrato->getEmpleadoRel()->getNumeroIdentificacion();
        $sustitucion2 = $arContrato->getEmpleadoRel()->getNombreCorto();
        $sustitucion3 = $arConfiguracion->getNitEmpresa();
        $sustitucion4 = $arConfiguracion->getNombreEmpresa();
        $sustitucion5 = $arContrato->getEmpleadoRel()->getDireccion();
        $sustitucion6 = $arConfiguracion->getDireccionEmpresa();
        $sustitucion7 = $arContrato->getEmpleadoRel()->getBarrio();
        $sustitucion8 = $arContrato->getEmpleadoRel()->getFechaNacimiento()->format('Y/m/d');
        $sustitucion9 = $arContrato->getEmpleadoRel()->getCiudadNacimientoRel()->getNombre();
        $sustitucion10 = $arContrato->getEmpleadoRel()->getCiudadRel()->getNombre();
        $sustitucion11 = $arContrato->getEmpleadoRel()->getCiudadNacimientoRel()->getDepartamentoRel()->getPaisRel()->getGentilicio();
        $sustitucion12 = $arContrato->getCargoRel()->getNombre();
        $sustitucion13 = number_format($arContrato->getVrSalario(), 2,'.',',');
        $sustitucion14 = $arContrato->getCentroCostoRel()->getPeriodoPagoRel()->getNombre();
        $sustitucion15 = $arContrato->getCentroCostoRel()->getDiasPago();
        $sustitucion16 = $arContrato->getFechaDesde()->format('Y/m/d');
        $sustitucion23 = $arContrato->getFechaHasta()->format('Y/m/d');
        $feci = $arContrato->getFechaDesde();
        $fecf = $arContrato->getFechaHasta();
        $sustitucion17 = $arContrato->getCiudadContratoRel()->getNombre();
        $sustitucion18 = $arContrato->getEmpleadoRel()->getCiudadExpedicionRel()->getNombre();
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $sustitucion19 = strftime("%d de %B de %Y", strtotime($sustitucion16));
        $sustitucion20 = $arContrato->getHorarioTrabajo();
        $sustitucion21 = strftime("%d de %B de %Y", strtotime($sustitucion16));
        //calculo meses        
        $interval = $feci->diff($fecf);
        $interval = round($interval->format('%a%') / 30);
        $sustitucion22 = $interval; 
        $sustitucion24 = strftime("%d de %B de %Y", strtotime($sustitucion23));
        $sustitucion25 = " - ".$arConfiguracion->getDigitoVerificacionEmpresa();
        $salarioLetras = self::$em->getRepository('BrasaRecursoHumanoBundle:RhuContrato')->numtoletras($arContrato->getVrSalario());
        $sustitucion26 = $salarioLetras." $(";
        $sustitucion26 .= number_format($arContrato->getVrSalario(), 2,'.',',');
        $sustitucion26 .= ")";
        $sustitucion27 = $arConfiguracion->getCiudadRel()->getNombre();
        //contenido de la cadena
        //$cadena = $arContenidoFormato->getContenido();
        $patron1 = '/#1/';
        $patron2 = '/#2/';
        $patron3 = '/#3/';
        $patron4 = '/#4/';
        $patron5 = '/#5/';
        $patron6 = '/#6/';
        $patron7 = '/#7/';
        $patron8 = '/#8/';
        $patron9 = '/#9/';
        $patron10 = '/#a/';
        $patron11 = '/#b/';
        $patron12 = '/#c/';
        $patron13 = '/#d/';
        $patron14 = '/#e/';
        $patron15 = '/#f/';
        $patron16 = '/#g/';
        $patron17 = '/#h/';
        $patron18 = '/#i/';
        $patron19 = '/#j/';
        $patron20 = '/#k/';
        $patron21 = '/#l/';
        $patron22 = '/#m/';
        $patron23 = '/#n/';
        $patron24 = '/#o/';
        $patron25 = '/#p/';
        $patron26 = '/#q/';
        $patron27 = '/#r/';
        //reemplazar en la cadena
        $cadenaCambiada = preg_replace($patron1, $sustitucion1, $cadena);
        $cadenaCambiada = preg_replace($patron2, $sustitucion2, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron3, $sustitucion3, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron4, $sustitucion4, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron5, $sustitucion5, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron6, $sustitucion6, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron7, $sustitucion7, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron8, $sustitucion8, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron9, $sustitucion9, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron10, $sustitucion10, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron11, $sustitucion11, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron12, $sustitucion12, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron13, $sustitucion13, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron14, $sustitucion14, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron15, $sustitucion15, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron16, $sustitucion16, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron17, $sustitucion17, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron18, $sustitucion18, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron19, $sustitucion19, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron20, $sustitucion20, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron21, $sustitucion21, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron22, $sustitucion22, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron23, $sustitucion23, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron24, $sustitucion24, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron25, $sustitucion25, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron26, $sustitucion26, $cadenaCambiada);
        $cadenaCambiada = preg_replace($patron27, $sustitucion27, $cadenaCambiada);
        $pdf->MultiCell(0,5, $cadenaCambiada);
   
    }

    public function Footer() {
        //$this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C'); 
        $this->Text(170, 290, utf8_decode('Página ') . $this->PageNo() . ' de {nb}');
    }    
}

?>


