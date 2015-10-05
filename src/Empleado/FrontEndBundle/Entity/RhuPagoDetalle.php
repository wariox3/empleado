<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_pago_detalle")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuPagoDetalleRepository")
 */
class RhuPagoDetalle
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoDetallePk;
    
    /**
     * @ORM\Column(name="codigo_pago_fk", type="integer", nullable=true)
     */    
    private $codigoPagoFk;
    
    /**
     * @ORM\Column(name="codigo_credito_fk", type="integer", nullable=true)
     */    
    private $codigoCreditoFk;
    
    /**
     * @ORM\Column(name="vr_pago", type="float")
     */
    private $vrPago = 0;
    
    /**
     * @ORM\Column(name="operacion", type="integer")
     */
    private $operacion = 0;
    
    /**
     * @ORM\Column(name="vr_pago_operado", type="float")
     */
    private $vrPagoOperado = 0;
    
    /**
     * @ORM\Column(name="numero_horas", type="float")
     */
    private $numeroHoras = 0;
    
    /**
     * @ORM\Column(name="vr_hora", type="float")
     */
    private $vrHora = 0;
    
    /**
     * @ORM\Column(name="porcentaje_aplicado", type="float")
     */
    private $porcentajeAplicado = 0;
    
    /**
     * @ORM\Column(name="numero_dias", type="float")
     */
    private $numeroDias = 0;     
    
    /**
     * @ORM\Column(name="vr_dia", type="float")
     */
    private $vrDia = 0;    
    
    /**
     * @ORM\Column(name="vr_total", type="float")
     */
    private $vrTotal = 0;
    
    /**
     * @ORM\Column(name="detalle", type="string", length=250, nullable=true)
     */    
    private $detalle;     
    
    /**
     * @ORM\Column(name="codigo_pago_concepto_fk", type="integer", nullable=true)
     */    
    private $codigoPagoConceptoFk;    
    
    /**
     * @ORM\Column(name="vr_ingreso_base_cotizacion", type="float")
     */
    private $vrIngresoBaseCotizacion = 0;     

    /**
     * @ORM\Column(name="vr_ingreso_base_prestacion", type="float")
     */
    private $vrIngresoBasePrestacion = 0;    
    
    /**
     * @ORM\Column(name="codigo_programacion_pago_detalle_fk", type="integer", nullable=true)
     */    
    private $codigoProgramacionPagoDetalleFk;     
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuPago", inversedBy="pagosDetallesPagoRel")
     * @ORM\JoinColumn(name="codigo_pago_fk", referencedColumnName="codigo_pago_pk")
     */
    protected $pagoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuPagoConcepto", inversedBy="pagosDetallesPagoConceptoRel")
     * @ORM\JoinColumn(name="codigo_pago_concepto_fk", referencedColumnName="codigo_pago_concepto_pk")
     */
    protected $pagoConceptoRel;  
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCredito", inversedBy="pagosDetallesCreditoRel")
     * @ORM\JoinColumn(name="codigo_credito_fk", referencedColumnName="codigo_credito_pk")
     */
    protected $creditoRel;



    /**
     * Get codigoPagoDetallePk
     *
     * @return integer 
     */
    public function getCodigoPagoDetallePk()
    {
        return $this->codigoPagoDetallePk;
    }

    /**
     * Set codigoPagoFk
     *
     * @param integer $codigoPagoFk
     * @return RhuPagoDetalle
     */
    public function setCodigoPagoFk($codigoPagoFk)
    {
        $this->codigoPagoFk = $codigoPagoFk;

        return $this;
    }

    /**
     * Get codigoPagoFk
     *
     * @return integer 
     */
    public function getCodigoPagoFk()
    {
        return $this->codigoPagoFk;
    }

    /**
     * Set codigoCreditoFk
     *
     * @param integer $codigoCreditoFk
     * @return RhuPagoDetalle
     */
    public function setCodigoCreditoFk($codigoCreditoFk)
    {
        $this->codigoCreditoFk = $codigoCreditoFk;

        return $this;
    }

    /**
     * Get codigoCreditoFk
     *
     * @return integer 
     */
    public function getCodigoCreditoFk()
    {
        return $this->codigoCreditoFk;
    }

    /**
     * Set vrPago
     *
     * @param float $vrPago
     * @return RhuPagoDetalle
     */
    public function setVrPago($vrPago)
    {
        $this->vrPago = $vrPago;

        return $this;
    }

    /**
     * Get vrPago
     *
     * @return float 
     */
    public function getVrPago()
    {
        return $this->vrPago;
    }

    /**
     * Set operacion
     *
     * @param integer $operacion
     * @return RhuPagoDetalle
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;

        return $this;
    }

    /**
     * Get operacion
     *
     * @return integer 
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set vrPagoOperado
     *
     * @param float $vrPagoOperado
     * @return RhuPagoDetalle
     */
    public function setVrPagoOperado($vrPagoOperado)
    {
        $this->vrPagoOperado = $vrPagoOperado;

        return $this;
    }

    /**
     * Get vrPagoOperado
     *
     * @return float 
     */
    public function getVrPagoOperado()
    {
        return $this->vrPagoOperado;
    }

    /**
     * Set numeroHoras
     *
     * @param float $numeroHoras
     * @return RhuPagoDetalle
     */
    public function setNumeroHoras($numeroHoras)
    {
        $this->numeroHoras = $numeroHoras;

        return $this;
    }

    /**
     * Get numeroHoras
     *
     * @return float 
     */
    public function getNumeroHoras()
    {
        return $this->numeroHoras;
    }

    /**
     * Set vrHora
     *
     * @param float $vrHora
     * @return RhuPagoDetalle
     */
    public function setVrHora($vrHora)
    {
        $this->vrHora = $vrHora;

        return $this;
    }

    /**
     * Get vrHora
     *
     * @return float 
     */
    public function getVrHora()
    {
        return $this->vrHora;
    }

    /**
     * Set porcentajeAplicado
     *
     * @param float $porcentajeAplicado
     * @return RhuPagoDetalle
     */
    public function setPorcentajeAplicado($porcentajeAplicado)
    {
        $this->porcentajeAplicado = $porcentajeAplicado;

        return $this;
    }

    /**
     * Get porcentajeAplicado
     *
     * @return float 
     */
    public function getPorcentajeAplicado()
    {
        return $this->porcentajeAplicado;
    }

    /**
     * Set numeroDias
     *
     * @param float $numeroDias
     * @return RhuPagoDetalle
     */
    public function setNumeroDias($numeroDias)
    {
        $this->numeroDias = $numeroDias;

        return $this;
    }

    /**
     * Get numeroDias
     *
     * @return float 
     */
    public function getNumeroDias()
    {
        return $this->numeroDias;
    }

    /**
     * Set vrDia
     *
     * @param float $vrDia
     * @return RhuPagoDetalle
     */
    public function setVrDia($vrDia)
    {
        $this->vrDia = $vrDia;

        return $this;
    }

    /**
     * Get vrDia
     *
     * @return float 
     */
    public function getVrDia()
    {
        return $this->vrDia;
    }

    /**
     * Set vrTotal
     *
     * @param float $vrTotal
     * @return RhuPagoDetalle
     */
    public function setVrTotal($vrTotal)
    {
        $this->vrTotal = $vrTotal;

        return $this;
    }

    /**
     * Get vrTotal
     *
     * @return float 
     */
    public function getVrTotal()
    {
        return $this->vrTotal;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return RhuPagoDetalle
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set codigoPagoConceptoFk
     *
     * @param integer $codigoPagoConceptoFk
     * @return RhuPagoDetalle
     */
    public function setCodigoPagoConceptoFk($codigoPagoConceptoFk)
    {
        $this->codigoPagoConceptoFk = $codigoPagoConceptoFk;

        return $this;
    }

    /**
     * Get codigoPagoConceptoFk
     *
     * @return integer 
     */
    public function getCodigoPagoConceptoFk()
    {
        return $this->codigoPagoConceptoFk;
    }

    /**
     * Set vrIngresoBaseCotizacion
     *
     * @param float $vrIngresoBaseCotizacion
     * @return RhuPagoDetalle
     */
    public function setVrIngresoBaseCotizacion($vrIngresoBaseCotizacion)
    {
        $this->vrIngresoBaseCotizacion = $vrIngresoBaseCotizacion;

        return $this;
    }

    /**
     * Get vrIngresoBaseCotizacion
     *
     * @return float 
     */
    public function getVrIngresoBaseCotizacion()
    {
        return $this->vrIngresoBaseCotizacion;
    }

    /**
     * Set vrIngresoBasePrestacion
     *
     * @param float $vrIngresoBasePrestacion
     * @return RhuPagoDetalle
     */
    public function setVrIngresoBasePrestacion($vrIngresoBasePrestacion)
    {
        $this->vrIngresoBasePrestacion = $vrIngresoBasePrestacion;

        return $this;
    }

    /**
     * Get vrIngresoBasePrestacion
     *
     * @return float 
     */
    public function getVrIngresoBasePrestacion()
    {
        return $this->vrIngresoBasePrestacion;
    }

    /**
     * Set codigoProgramacionPagoDetalleFk
     *
     * @param integer $codigoProgramacionPagoDetalleFk
     * @return RhuPagoDetalle
     */
    public function setCodigoProgramacionPagoDetalleFk($codigoProgramacionPagoDetalleFk)
    {
        $this->codigoProgramacionPagoDetalleFk = $codigoProgramacionPagoDetalleFk;

        return $this;
    }

    /**
     * Get codigoProgramacionPagoDetalleFk
     *
     * @return integer 
     */
    public function getCodigoProgramacionPagoDetalleFk()
    {
        return $this->codigoProgramacionPagoDetalleFk;
    }

    /**
     * Set pagoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagoRel
     * @return RhuPagoDetalle
     */
    public function setPagoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagoRel = null)
    {
        $this->pagoRel = $pagoRel;

        return $this;
    }

    /**
     * Get pagoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuPago 
     */
    public function getPagoRel()
    {
        return $this->pagoRel;
    }

    /**
     * Set pagoConceptoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPagoConcepto $pagoConceptoRel
     * @return RhuPagoDetalle
     */
    public function setPagoConceptoRel(\Empleado\FrontEndBundle\Entity\RhuPagoConcepto $pagoConceptoRel = null)
    {
        $this->pagoConceptoRel = $pagoConceptoRel;

        return $this;
    }

    /**
     * Get pagoConceptoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuPagoConcepto 
     */
    public function getPagoConceptoRel()
    {
        return $this->pagoConceptoRel;
    }

    /**
     * Set creditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCredito $creditoRel
     * @return RhuPagoDetalle
     */
    public function setCreditoRel(\Empleado\FrontEndBundle\Entity\RhuCredito $creditoRel = null)
    {
        $this->creditoRel = $creditoRel;

        return $this;
    }

    /**
     * Get creditoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuCredito 
     */
    public function getCreditoRel()
    {
        return $this->creditoRel;
    }
}
