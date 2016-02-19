<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_credito")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuCreditoRepository")
 */
class RhuCredito
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_credito_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCreditoPk;
    
    /**
     * @ORM\Column(name="codigo_credito_tipo_fk", type="integer", nullable=true)
     */    
    private $codigoCreditoTipoFk;
    
    /**
     * @ORM\Column(name="codigo_credito_tipo_pago_fk", type="integer", nullable=true)
     */    
    private $codigoCreditoTipoPagoFk;
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer", nullable=true)
     */    
    private $codigoEmpleadoFk;        
    
    /**
     * @ORM\Column(name="fecha", type="date")
     */    
    private $fecha;     
    
    /**
     * @ORM\Column(name="vr_pagar", type="float")
     */
    private $vrPagar = 0;    

    /**
     * @ORM\Column(name="vr_cuota", type="float")
     */
    private $vrCuota = 0;
    
    /**
     * @ORM\Column(name="vr_cuota_temporal", type="float")
     */
    private $vrCuotaTemporal = 0;

    /**
     * @ORM\Column(name="saldo", type="float")
     */
    private $saldo = 0;    
    
    /**
     * @ORM\Column(name="saldo_total", type="float")
     */
    private $saldoTotal = 0;
    
    /**     
     * @ORM\Column(name="estado_pagado", type="boolean")
     */    
    private $estadoPagado = 0;     
    
    /**
     * @ORM\Column(name="numero_cuotas", type="integer")
     */
    private $numeroCuotas = 0;        
    
    /**
     * @ORM\Column(name="numero_cuota_actual", type="integer")
     */
    private $numeroCuotaActual = 0; 
    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios; 
    
    /**
     * @ORM\Column(name="aprobado", type="integer")
     */
    private $aprobado = 0;
    
    /**
     * @ORM\Column(name="seguro", type="integer")
     */
    private $seguro = 0;
    
    /**     
     * @ORM\Column(name="estado_suspendido", type="boolean")
     */    
    private $estadoSuspendido = 0;
    
    /**
     * @ORM\Column(name="vr_abonos", type="float")
     */
    private $vrAbonos = 0;    
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEmpleado", inversedBy="creditosEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel; 

    /**
     * @ORM\ManyToOne(targetEntity="RhuCreditoTipo", inversedBy="creditosCreditoTipoRel")
     * @ORM\JoinColumn(name="codigo_credito_tipo_fk", referencedColumnName="codigo_credito_tipo_pk")
     */
    protected $creditoTipoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuCreditoPago", mappedBy="creditoRel")
     */
    protected $creditosPagosCreditoRel;
    
    
    /**
     * @ORM\OneToMany(targetEntity="RhuPagoDetalle", mappedBy="creditoRel")
     */
    protected $pagosDetallesCreditoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCreditoTipoPago", inversedBy="creditosCreditoTipoPagoRel")
     * @ORM\JoinColumn(name="codigo_credito_tipo_pago_fk", referencedColumnName="codigo_credito_tipo_pago_pk")
     */
    protected $creditoTipoPagoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuLiquidacionAdicionales", mappedBy="creditoRel")
     */
    protected $liquidacionesAdicionalesCreditoRel;

    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creditosPagosCreditoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagosDetallesCreditoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->liquidacionesAdicionalesCreditoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoCreditoPk
     *
     * @return integer 
     */
    public function getCodigoCreditoPk()
    {
        return $this->codigoCreditoPk;
    }

    /**
     * Set codigoCreditoTipoFk
     *
     * @param integer $codigoCreditoTipoFk
     * @return RhuCredito
     */
    public function setCodigoCreditoTipoFk($codigoCreditoTipoFk)
    {
        $this->codigoCreditoTipoFk = $codigoCreditoTipoFk;

        return $this;
    }

    /**
     * Get codigoCreditoTipoFk
     *
     * @return integer 
     */
    public function getCodigoCreditoTipoFk()
    {
        return $this->codigoCreditoTipoFk;
    }

    /**
     * Set codigoCreditoTipoPagoFk
     *
     * @param integer $codigoCreditoTipoPagoFk
     * @return RhuCredito
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
     * Set codigoEmpleadoFk
     *
     * @param integer $codigoEmpleadoFk
     * @return RhuCredito
     */
    public function setCodigoEmpleadoFk($codigoEmpleadoFk)
    {
        $this->codigoEmpleadoFk = $codigoEmpleadoFk;

        return $this;
    }

    /**
     * Get codigoEmpleadoFk
     *
     * @return integer 
     */
    public function getCodigoEmpleadoFk()
    {
        return $this->codigoEmpleadoFk;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return RhuCredito
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set vrPagar
     *
     * @param float $vrPagar
     * @return RhuCredito
     */
    public function setVrPagar($vrPagar)
    {
        $this->vrPagar = $vrPagar;

        return $this;
    }

    /**
     * Get vrPagar
     *
     * @return float 
     */
    public function getVrPagar()
    {
        return $this->vrPagar;
    }

    /**
     * Set vrCuota
     *
     * @param float $vrCuota
     * @return RhuCredito
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
     * Set vrCuotaTemporal
     *
     * @param float $vrCuotaTemporal
     * @return RhuCredito
     */
    public function setVrCuotaTemporal($vrCuotaTemporal)
    {
        $this->vrCuotaTemporal = $vrCuotaTemporal;

        return $this;
    }

    /**
     * Get vrCuotaTemporal
     *
     * @return float 
     */
    public function getVrCuotaTemporal()
    {
        return $this->vrCuotaTemporal;
    }

    /**
     * Set saldo
     *
     * @param float $saldo
     * @return RhuCredito
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
     * Set saldoTotal
     *
     * @param float $saldoTotal
     * @return RhuCredito
     */
    public function setSaldoTotal($saldoTotal)
    {
        $this->saldoTotal = $saldoTotal;

        return $this;
    }

    /**
     * Get saldoTotal
     *
     * @return float 
     */
    public function getSaldoTotal()
    {
        return $this->saldoTotal;
    }

    /**
     * Set estadoPagado
     *
     * @param boolean $estadoPagado
     * @return RhuCredito
     */
    public function setEstadoPagado($estadoPagado)
    {
        $this->estadoPagado = $estadoPagado;

        return $this;
    }

    /**
     * Get estadoPagado
     *
     * @return boolean 
     */
    public function getEstadoPagado()
    {
        return $this->estadoPagado;
    }

    /**
     * Set numeroCuotas
     *
     * @param integer $numeroCuotas
     * @return RhuCredito
     */
    public function setNumeroCuotas($numeroCuotas)
    {
        $this->numeroCuotas = $numeroCuotas;

        return $this;
    }

    /**
     * Get numeroCuotas
     *
     * @return integer 
     */
    public function getNumeroCuotas()
    {
        return $this->numeroCuotas;
    }

    /**
     * Set numeroCuotaActual
     *
     * @param integer $numeroCuotaActual
     * @return RhuCredito
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

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return RhuCredito
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set aprobado
     *
     * @param integer $aprobado
     * @return RhuCredito
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * Get aprobado
     *
     * @return integer 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set seguro
     *
     * @param integer $seguro
     * @return RhuCredito
     */
    public function setSeguro($seguro)
    {
        $this->seguro = $seguro;

        return $this;
    }

    /**
     * Get seguro
     *
     * @return integer 
     */
    public function getSeguro()
    {
        return $this->seguro;
    }

    /**
     * Set estadoSuspendido
     *
     * @param boolean $estadoSuspendido
     * @return RhuCredito
     */
    public function setEstadoSuspendido($estadoSuspendido)
    {
        $this->estadoSuspendido = $estadoSuspendido;

        return $this;
    }

    /**
     * Get estadoSuspendido
     *
     * @return boolean 
     */
    public function getEstadoSuspendido()
    {
        return $this->estadoSuspendido;
    }

    /**
     * Set vrAbonos
     *
     * @param float $vrAbonos
     * @return RhuCredito
     */
    public function setVrAbonos($vrAbonos)
    {
        $this->vrAbonos = $vrAbonos;

        return $this;
    }

    /**
     * Get vrAbonos
     *
     * @return float 
     */
    public function getVrAbonos()
    {
        return $this->vrAbonos;
    }

    /**
     * Set empleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadoRel
     * @return RhuCredito
     */
    public function setEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadoRel = null)
    {
        $this->empleadoRel = $empleadoRel;

        return $this;
    }

    /**
     * Get empleadoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuEmpleado 
     */
    public function getEmpleadoRel()
    {
        return $this->empleadoRel;
    }

    /**
     * Set creditoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCreditoTipo $creditoTipoRel
     * @return RhuCredito
     */
    public function setCreditoTipoRel(\Empleado\FrontEndBundle\Entity\RhuCreditoTipo $creditoTipoRel = null)
    {
        $this->creditoTipoRel = $creditoTipoRel;

        return $this;
    }

    /**
     * Get creditoTipoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuCreditoTipo 
     */
    public function getCreditoTipoRel()
    {
        return $this->creditoTipoRel;
    }

    /**
     * Add creditosPagosCreditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCreditoPago $creditosPagosCreditoRel
     * @return RhuCredito
     */
    public function addCreditosPagosCreditoRel(\Empleado\FrontEndBundle\Entity\RhuCreditoPago $creditosPagosCreditoRel)
    {
        $this->creditosPagosCreditoRel[] = $creditosPagosCreditoRel;

        return $this;
    }

    /**
     * Remove creditosPagosCreditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCreditoPago $creditosPagosCreditoRel
     */
    public function removeCreditosPagosCreditoRel(\Empleado\FrontEndBundle\Entity\RhuCreditoPago $creditosPagosCreditoRel)
    {
        $this->creditosPagosCreditoRel->removeElement($creditosPagosCreditoRel);
    }

    /**
     * Get creditosPagosCreditoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreditosPagosCreditoRel()
    {
        return $this->creditosPagosCreditoRel;
    }

    /**
     * Add pagosDetallesCreditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesCreditoRel
     * @return RhuCredito
     */
    public function addPagosDetallesCreditoRel(\Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesCreditoRel)
    {
        $this->pagosDetallesCreditoRel[] = $pagosDetallesCreditoRel;

        return $this;
    }

    /**
     * Remove pagosDetallesCreditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesCreditoRel
     */
    public function removePagosDetallesCreditoRel(\Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesCreditoRel)
    {
        $this->pagosDetallesCreditoRel->removeElement($pagosDetallesCreditoRel);
    }

    /**
     * Get pagosDetallesCreditoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagosDetallesCreditoRel()
    {
        return $this->pagosDetallesCreditoRel;
    }

    /**
     * Set creditoTipoPagoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCreditoTipoPago $creditoTipoPagoRel
     * @return RhuCredito
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
     * Add liquidacionesAdicionalesCreditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesCreditoRel
     * @return RhuCredito
     */
    public function addLiquidacionesAdicionalesCreditoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesCreditoRel)
    {
        $this->liquidacionesAdicionalesCreditoRel[] = $liquidacionesAdicionalesCreditoRel;

        return $this;
    }

    /**
     * Remove liquidacionesAdicionalesCreditoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesCreditoRel
     */
    public function removeLiquidacionesAdicionalesCreditoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesCreditoRel)
    {
        $this->liquidacionesAdicionalesCreditoRel->removeElement($liquidacionesAdicionalesCreditoRel);
    }

    /**
     * Get liquidacionesAdicionalesCreditoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionesAdicionalesCreditoRel()
    {
        return $this->liquidacionesAdicionalesCreditoRel;
    }
}
