<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_liquidacion_adicionales")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuLiquidacionAdicionalesRepository")
 */
class RhuLiquidacionAdicionales
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_liquidacion_adicional_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoLiquidacionAdicionalPk;
    
    /**
     * @ORM\Column(name="codigo_liquidacion_fk", type="integer", nullable=true)
     */    
    private $codigoLiquidacionFk;
    
    /**
     * @ORM\Column(name="codigo_credito_fk", type="integer", nullable=true)
     */    
    private $codigoCreditoFk;
    
    /**
     * @ORM\Column(name="codigo_liquidacion_adicional_concepto_fk", type="integer", nullable=true)
     */    
    private $codigoLiquidacionAdicionalConceptoFk;    
    
    /**
     * @ORM\Column(name="vr_deduccion", type="float")
     */
    private $vrDeduccion = 0;
    
    /**
     * @ORM\Column(name="vr_bonificacion", type="float")
     */
    private $vrBonificacion = 0;
    
    /**
     * @ORM\Column(name="detalle", type="string", length=250, nullable=true)
     */    
    private $detalle;     
        
    /**
     * @ORM\ManyToOne(targetEntity="RhuLiquidacion", inversedBy="liquidacionesAdicionalesLiquidacionRel")
     * @ORM\JoinColumn(name="codigo_liquidacion_fk", referencedColumnName="codigo_liquidacion_pk")
     */
    protected $liquidacionRel;

    /**
     * @ORM\ManyToOne(targetEntity="RhuCredito", inversedBy="liquidacionesAdicionalesCreditoRel")
     * @ORM\JoinColumn(name="codigo_credito_fk", referencedColumnName="codigo_credito_pk")
     */
    protected $creditoRel;    
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuLiquidacionAdicionalesConcepto", inversedBy="liquidacionesAdicionalesLiquidacionAdicionalConceptoRel")
     * @ORM\JoinColumn(name="codigo_liquidacion_adicional_concepto_fk", referencedColumnName="codigo_liquidacion_adicional_concepto_pk")
     */
    protected $liquidacionAdicionalConceptoRel;    



    /**
     * Get codigoLiquidacionAdicionalPk
     *
     * @return integer 
     */
    public function getCodigoLiquidacionAdicionalPk()
    {
        return $this->codigoLiquidacionAdicionalPk;
    }

    /**
     * Set codigoLiquidacionFk
     *
     * @param integer $codigoLiquidacionFk
     * @return RhuLiquidacionAdicionales
     */
    public function setCodigoLiquidacionFk($codigoLiquidacionFk)
    {
        $this->codigoLiquidacionFk = $codigoLiquidacionFk;

        return $this;
    }

    /**
     * Get codigoLiquidacionFk
     *
     * @return integer 
     */
    public function getCodigoLiquidacionFk()
    {
        return $this->codigoLiquidacionFk;
    }

    /**
     * Set codigoCreditoFk
     *
     * @param integer $codigoCreditoFk
     * @return RhuLiquidacionAdicionales
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
     * Set codigoLiquidacionAdicionalConceptoFk
     *
     * @param integer $codigoLiquidacionAdicionalConceptoFk
     * @return RhuLiquidacionAdicionales
     */
    public function setCodigoLiquidacionAdicionalConceptoFk($codigoLiquidacionAdicionalConceptoFk)
    {
        $this->codigoLiquidacionAdicionalConceptoFk = $codigoLiquidacionAdicionalConceptoFk;

        return $this;
    }

    /**
     * Get codigoLiquidacionAdicionalConceptoFk
     *
     * @return integer 
     */
    public function getCodigoLiquidacionAdicionalConceptoFk()
    {
        return $this->codigoLiquidacionAdicionalConceptoFk;
    }

    /**
     * Set vrDeduccion
     *
     * @param float $vrDeduccion
     * @return RhuLiquidacionAdicionales
     */
    public function setVrDeduccion($vrDeduccion)
    {
        $this->vrDeduccion = $vrDeduccion;

        return $this;
    }

    /**
     * Get vrDeduccion
     *
     * @return float 
     */
    public function getVrDeduccion()
    {
        return $this->vrDeduccion;
    }

    /**
     * Set vrBonificacion
     *
     * @param float $vrBonificacion
     * @return RhuLiquidacionAdicionales
     */
    public function setVrBonificacion($vrBonificacion)
    {
        $this->vrBonificacion = $vrBonificacion;

        return $this;
    }

    /**
     * Get vrBonificacion
     *
     * @return float 
     */
    public function getVrBonificacion()
    {
        return $this->vrBonificacion;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return RhuLiquidacionAdicionales
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
     * Set liquidacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionRel
     * @return RhuLiquidacionAdicionales
     */
    public function setLiquidacionRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionRel = null)
    {
        $this->liquidacionRel = $liquidacionRel;

        return $this;
    }

    /**
     * Get liquidacionRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuLiquidacion 
     */
    public function getLiquidacionRel()
    {
        return $this->liquidacionRel;
    }

    /**
     * Set creditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCredito $creditoRel
     * @return RhuLiquidacionAdicionales
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

    /**
     * Set liquidacionAdicionalConceptoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionalesConcepto $liquidacionAdicionalConceptoRel
     * @return RhuLiquidacionAdicionales
     */
    public function setLiquidacionAdicionalConceptoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionalesConcepto $liquidacionAdicionalConceptoRel = null)
    {
        $this->liquidacionAdicionalConceptoRel = $liquidacionAdicionalConceptoRel;

        return $this;
    }

    /**
     * Get liquidacionAdicionalConceptoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionalesConcepto 
     */
    public function getLiquidacionAdicionalConceptoRel()
    {
        return $this->liquidacionAdicionalConceptoRel;
    }
}
