<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_credito_pago")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuCreditoPagoRepository")
 */
class RhuCreditoPago
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_credito_pago_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoCreditoPk;
    
    /**
     * @ORM\Column(name="codigo_credito_fk", type="integer")
     */    
    private $codigoCreditoFk;
    
    /**
     * @ORM\Column(name="codigo_pago_fk", type="integer", nullable=true)
     */    
    private $codigoPagoFk;
    
    /**
     * @ORM\Column(name="vr_cuota", type="float")
     */
    private $vrCuota = 0;
    
    /**
     * @ORM\Column(name="saldo", type="float")
     */
    private $saldo = 0;
    
    /**
     * @ORM\Column(name="numero_cuota_actual", type="integer")
     */
    private $numeroCuotaActual = 0;
    
    /**
     * @ORM\Column(name="fecha_pago", type="date")
     */    
    private $fechaPago;
    
    /**
     * @ORM\Column(name="codigo_credito_tipo_pago_fk", type="integer", nullable=true)
     */    
    private $codigoCreditoTipoPagoFk;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCredito", inversedBy="creditosPagosCreditoRel")
     * @ORM\JoinColumn(name="codigo_credito_fk", referencedColumnName="codigo_credito_pk")
     */
    protected $creditoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuPago", inversedBy="creditosPagosPagoRel")
     * @ORM\JoinColumn(name="codigo_pago_fk", referencedColumnName="codigo_pago_pk")
     */
    protected $pagoRel;

    /**
     * @ORM\ManyToOne(targetEntity="RhuCreditoTipoPago", inversedBy="creditosPagosCreditoTipoPagoRel")
     * @ORM\JoinColumn(name="codigo_credito_tipo_pago_fk", referencedColumnName="codigo_credito_tipo_pago_pk")
     */
    protected $creditoTipoPagoRel;
    
    


    /**
     * Get codigoPagoCreditoPk
     *
     * @return integer 
     */
    public function getCodigoPagoCreditoPk()
    {
        return $this->codigoPagoCreditoPk;
    }

    /**
     * Set codigoCreditoFk
     *
     * @param integer $codigoCreditoFk
     * @return RhuCreditoPago
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
     * Set codigoPagoFk
     *
     * @param integer $codigoPagoFk
     * @return RhuCreditoPago
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
     * Set vrCuota
     *
     * @param float $vrCuota
     * @return RhuCreditoPago
     */
    public function setVrCuota($vrCuota)
    {
        $this->vrCuota = $vrCuota;

        return $this;
    }

    /**
     * Get vrCuota
     *
     * @return float 
     */
    public function getVrCuota()
    {
        return $this->vrCuota;
    }

    /**
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     * @return RhuCreditoPago
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return \DateTime 
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set codigoCreditoTipoPagoFk
     *
     * @param integer $codigoCreditoTipoPagoFk
     * @return RhuCreditoPago
     */
    public function setCodigoCreditoTipoPagoFk($codigoCreditoTipoPagoFk)
    {
        $this->codigoCreditoTipoPagoFk = $codigoCreditoTipoPagoFk;

        return $this;
    }

    /**
     * Get codigoCreditoTipoPagoFk
     *
     * @return integer 
     */
    public function getCodigoCreditoTipoPagoFk()
    {
        return $this->codigoCreditoTipoPagoFk;
    }

    /**
     * Set creditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCredito $creditoRel
     * @return RhuCreditoPago
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
     * Set pagoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagoRel
     * @return RhuCreditoPago
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
     * Set creditoTipoPagoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCreditoTipoPago $creditoTipoPagoRel
     * @return RhuCreditoPago
     */
    public function setCreditoTipoPagoRel(\Empleado\FrontEndBundle\Entity\RhuCreditoTipoPago $creditoTipoPagoRel = null)
    {
        $this->creditoTipoPagoRel = $creditoTipoPagoRel;

        return $this;
    }

    /**
     * Get creditoTipoPagoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuCreditoTipoPago 
     */
    public function getCreditoTipoPagoRel()
    {
        return $this->creditoTipoPagoRel;
    }

    /**
     * Set saldo
     *
     * @param float $saldo
     * @return RhuCreditoPago
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return float 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set numeroCuotaActual
     *
     * @param integer $numeroCuotaActual
     * @return RhuCreditoPago
     */
    public function setNumeroCuotaActual($numeroCuotaActual)
    {
        $this->numeroCuotaActual = $numeroCuotaActual;

        return $this;
    }

    /**
     * Get numeroCuotaActual
     *
     * @return integer 
     */
    public function getNumeroCuotaActual()
    {
        return $this->numeroCuotaActual;
    }
}
