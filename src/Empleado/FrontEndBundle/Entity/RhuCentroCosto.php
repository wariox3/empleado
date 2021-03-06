<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_centro_costo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuCentroCostoRepository")
 */
class RhuCentroCosto
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_centro_costo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCentroCostoPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     */    
    private $nombre;
    
    /**
     * @ORM\Column(name="codigo_ciudad_fk", type="integer", nullable=true)
     */    
    private $codigoCiudadFk;

    /**
     * @ORM\Column(name="codigo_periodo_pago_fk", type="integer", nullable=true)
     */    
    private $codigoPeriodoPagoFk;       

    /**
     * @ORM\Column(name="fecha_ultimo_pago", type="date", nullable=true)
     */    
    private $fechaUltimoPago;     
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_programado", type="date", nullable=true)
     */    
    private $fechaUltimoPagoProgramado;    
    
    /**
     * @ORM\Column(name="correo", type="string", length=80, nullable=true)
     */    
    private $correo;    
    
    /**
     * @ORM\Column(name="codigo_interface", type="string", length=20, nullable=true)
     */    
    private $codigoInterface;    
    
    /**
     * Si existen programaciones de pago pendientes
     * @ORM\Column(name="pago_abierto", type="boolean")
     */    
    private $pagoAbierto = 0;    
    
    /**     
     * @ORM\Column(name="estado_activo", type="boolean")
     */    
    private $estadoActivo = 0;     

    /**     
     * @ORM\Column(name="generar_pago_automatico", type="boolean")
     */    
    private $generarPagoAutomatico = 0;    
    
    /**
     * @ORM\Column(name="hora_pago_automatico", type="time", nullable=true)
     */    
    private $horaPagoAutomatico;    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;     
    
    /**
     * @ORM\Column(name="porcentaje_administracion", type="float")
     */
    private $porcentajeAdministracion = 0;    
    
    /**
     * @ORM\Column(name="valor_administracion", type="float")
     */
    private $valorAdministracion = 0;     
    
    /**
     * @ORM\Column(name="codigo_sucursal_fk", type="integer", nullable=true)
     */    
    private $codigoSucursalFk;    
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_prima", type="date", nullable=true)
     */    
    private $fechaUltimoPagoPrima;    
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_cesantias", type="date", nullable=true)
     */    
    private $fechaUltimoPagoCesantias;    
    
    
    /**
     * @ORM\OneToMany(targetEntity="RhuPago", mappedBy="centroCostoRel")
     */
    protected $pagosCentroCostoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuPeriodoPago", inversedBy="centrosCostosPeriodoPagoRel")
     * @ORM\JoinColumn(name="codigo_periodo_pago_fk", referencedColumnName="codigo_periodo_pago_pk")
     */
    protected $periodoPagoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuDisciplinario", mappedBy="centroCostoRel")
     */
    protected $disciplinariosCentroCostoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuIncapacidad", mappedBy="centroCostoRel")
     */
    protected $incapacidadesCentroCostoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuVacacion", mappedBy="centroCostoRel")
     */
    protected $vacacionesCentroCostoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuLiquidacion", mappedBy="centroCostoRel")
     */
    protected $liquidacionesCentroCostoRel;
    
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosCentroCostoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->disciplinariosCentroCostoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->incapacidadesCentroCostoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vacacionesCentroCostoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->liquidacionesCentroCostoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoCentroCostoPk
     *
     * @return integer 
     */
    public function getCodigoCentroCostoPk()
    {
        return $this->codigoCentroCostoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuCentroCosto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codigoCiudadFk
     *
     * @param integer $codigoCiudadFk
     * @return RhuCentroCosto
     */
    public function setCodigoCiudadFk($codigoCiudadFk)
    {
        $this->codigoCiudadFk = $codigoCiudadFk;

        return $this;
    }

    /**
     * Get codigoCiudadFk
     *
     * @return integer 
     */
    public function getCodigoCiudadFk()
    {
        return $this->codigoCiudadFk;
    }

    /**
     * Set codigoPeriodoPagoFk
     *
     * @param integer $codigoPeriodoPagoFk
     * @return RhuCentroCosto
     */
    public function setCodigoPeriodoPagoFk($codigoPeriodoPagoFk)
    {
        $this->codigoPeriodoPagoFk = $codigoPeriodoPagoFk;

        return $this;
    }

    /**
     * Get codigoPeriodoPagoFk
     *
     * @return integer 
     */
    public function getCodigoPeriodoPagoFk()
    {
        return $this->codigoPeriodoPagoFk;
    }

    /**
     * Set fechaUltimoPago
     *
     * @param \DateTime $fechaUltimoPago
     * @return RhuCentroCosto
     */
    public function setFechaUltimoPago($fechaUltimoPago)
    {
        $this->fechaUltimoPago = $fechaUltimoPago;

        return $this;
    }

    /**
     * Get fechaUltimoPago
     *
     * @return \DateTime 
     */
    public function getFechaUltimoPago()
    {
        return $this->fechaUltimoPago;
    }

    /**
     * Set fechaUltimoPagoProgramado
     *
     * @param \DateTime $fechaUltimoPagoProgramado
     * @return RhuCentroCosto
     */
    public function setFechaUltimoPagoProgramado($fechaUltimoPagoProgramado)
    {
        $this->fechaUltimoPagoProgramado = $fechaUltimoPagoProgramado;

        return $this;
    }

    /**
     * Get fechaUltimoPagoProgramado
     *
     * @return \DateTime 
     */
    public function getFechaUltimoPagoProgramado()
    {
        return $this->fechaUltimoPagoProgramado;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return RhuCentroCosto
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set codigoInterface
     *
     * @param string $codigoInterface
     * @return RhuCentroCosto
     */
    public function setCodigoInterface($codigoInterface)
    {
        $this->codigoInterface = $codigoInterface;

        return $this;
    }

    /**
     * Get codigoInterface
     *
     * @return string 
     */
    public function getCodigoInterface()
    {
        return $this->codigoInterface;
    }

    /**
     * Set pagoAbierto
     *
     * @param boolean $pagoAbierto
     * @return RhuCentroCosto
     */
    public function setPagoAbierto($pagoAbierto)
    {
        $this->pagoAbierto = $pagoAbierto;

        return $this;
    }

    /**
     * Get pagoAbierto
     *
     * @return boolean 
     */
    public function getPagoAbierto()
    {
        return $this->pagoAbierto;
    }

    /**
     * Set estadoActivo
     *
     * @param boolean $estadoActivo
     * @return RhuCentroCosto
     */
    public function setEstadoActivo($estadoActivo)
    {
        $this->estadoActivo = $estadoActivo;

        return $this;
    }

    /**
     * Get estadoActivo
     *
     * @return boolean 
     */
    public function getEstadoActivo()
    {
        return $this->estadoActivo;
    }

    /**
     * Set generarPagoAutomatico
     *
     * @param boolean $generarPagoAutomatico
     * @return RhuCentroCosto
     */
    public function setGenerarPagoAutomatico($generarPagoAutomatico)
    {
        $this->generarPagoAutomatico = $generarPagoAutomatico;

        return $this;
    }

    /**
     * Get generarPagoAutomatico
     *
     * @return boolean 
     */
    public function getGenerarPagoAutomatico()
    {
        return $this->generarPagoAutomatico;
    }

    /**
     * Set horaPagoAutomatico
     *
     * @param \DateTime $horaPagoAutomatico
     * @return RhuCentroCosto
     */
    public function setHoraPagoAutomatico($horaPagoAutomatico)
    {
        $this->horaPagoAutomatico = $horaPagoAutomatico;

        return $this;
    }

    /**
     * Get horaPagoAutomatico
     *
     * @return \DateTime 
     */
    public function getHoraPagoAutomatico()
    {
        return $this->horaPagoAutomatico;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return RhuCentroCosto
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
     * Set porcentajeAdministracion
     *
     * @param float $porcentajeAdministracion
     * @return RhuCentroCosto
     */
    public function setPorcentajeAdministracion($porcentajeAdministracion)
    {
        $this->porcentajeAdministracion = $porcentajeAdministracion;

        return $this;
    }

    /**
     * Get porcentajeAdministracion
     *
     * @return float 
     */
    public function getPorcentajeAdministracion()
    {
        return $this->porcentajeAdministracion;
    }

    /**
     * Set valorAdministracion
     *
     * @param float $valorAdministracion
     * @return RhuCentroCosto
     */
    public function setValorAdministracion($valorAdministracion)
    {
        $this->valorAdministracion = $valorAdministracion;

        return $this;
    }

    /**
     * Get valorAdministracion
     *
     * @return float 
     */
    public function getValorAdministracion()
    {
        return $this->valorAdministracion;
    }

    /**
     * Set codigoSucursalFk
     *
     * @param integer $codigoSucursalFk
     * @return RhuCentroCosto
     */
    public function setCodigoSucursalFk($codigoSucursalFk)
    {
        $this->codigoSucursalFk = $codigoSucursalFk;

        return $this;
    }

    /**
     * Get codigoSucursalFk
     *
     * @return integer 
     */
    public function getCodigoSucursalFk()
    {
        return $this->codigoSucursalFk;
    }

    /**
     * Set fechaUltimoPagoPrima
     *
     * @param \DateTime $fechaUltimoPagoPrima
     * @return RhuCentroCosto
     */
    public function setFechaUltimoPagoPrima($fechaUltimoPagoPrima)
    {
        $this->fechaUltimoPagoPrima = $fechaUltimoPagoPrima;

        return $this;
    }

    /**
     * Get fechaUltimoPagoPrima
     *
     * @return \DateTime 
     */
    public function getFechaUltimoPagoPrima()
    {
        return $this->fechaUltimoPagoPrima;
    }

    /**
     * Set fechaUltimoPagoCesantias
     *
     * @param \DateTime $fechaUltimoPagoCesantias
     * @return RhuCentroCosto
     */
    public function setFechaUltimoPagoCesantias($fechaUltimoPagoCesantias)
    {
        $this->fechaUltimoPagoCesantias = $fechaUltimoPagoCesantias;

        return $this;
    }

    /**
     * Get fechaUltimoPagoCesantias
     *
     * @return \DateTime 
     */
    public function getFechaUltimoPagoCesantias()
    {
        return $this->fechaUltimoPagoCesantias;
    }

    /**
     * Add pagosCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosCentroCostoRel
     * @return RhuCentroCosto
     */
    public function addPagosCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosCentroCostoRel)
    {
        $this->pagosCentroCostoRel[] = $pagosCentroCostoRel;

        return $this;
    }

    /**
     * Remove pagosCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosCentroCostoRel
     */
    public function removePagosCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosCentroCostoRel)
    {
        $this->pagosCentroCostoRel->removeElement($pagosCentroCostoRel);
    }

    /**
     * Get pagosCentroCostoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagosCentroCostoRel()
    {
        return $this->pagosCentroCostoRel;
    }

    /**
     * Set periodoPagoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPeriodoPago $periodoPagoRel
     * @return RhuCentroCosto
     */
    public function setPeriodoPagoRel(\Empleado\FrontEndBundle\Entity\RhuPeriodoPago $periodoPagoRel = null)
    {
        $this->periodoPagoRel = $periodoPagoRel;

        return $this;
    }

    /**
     * Get periodoPagoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuPeriodoPago 
     */
    public function getPeriodoPagoRel()
    {
        return $this->periodoPagoRel;
    }

    /**
     * Add disciplinariosCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosCentroCostoRel
     * @return RhuCentroCosto
     */
    public function addDisciplinariosCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosCentroCostoRel)
    {
        $this->disciplinariosCentroCostoRel[] = $disciplinariosCentroCostoRel;

        return $this;
    }

    /**
     * Remove disciplinariosCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosCentroCostoRel
     */
    public function removeDisciplinariosCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosCentroCostoRel)
    {
        $this->disciplinariosCentroCostoRel->removeElement($disciplinariosCentroCostoRel);
    }

    /**
     * Get disciplinariosCentroCostoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisciplinariosCentroCostoRel()
    {
        return $this->disciplinariosCentroCostoRel;
    }

    /**
     * Add incapacidadesCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesCentroCostoRel
     * @return RhuCentroCosto
     */
    public function addIncapacidadesCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesCentroCostoRel)
    {
        $this->incapacidadesCentroCostoRel[] = $incapacidadesCentroCostoRel;

        return $this;
    }

    /**
     * Remove incapacidadesCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesCentroCostoRel
     */
    public function removeIncapacidadesCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesCentroCostoRel)
    {
        $this->incapacidadesCentroCostoRel->removeElement($incapacidadesCentroCostoRel);
    }

    /**
     * Get incapacidadesCentroCostoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIncapacidadesCentroCostoRel()
    {
        return $this->incapacidadesCentroCostoRel;
    }

    /**
     * Add vacacionesCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesCentroCostoRel
     * @return RhuCentroCosto
     */
    public function addVacacionesCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesCentroCostoRel)
    {
        $this->vacacionesCentroCostoRel[] = $vacacionesCentroCostoRel;

        return $this;
    }

    /**
     * Remove vacacionesCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesCentroCostoRel
     */
    public function removeVacacionesCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesCentroCostoRel)
    {
        $this->vacacionesCentroCostoRel->removeElement($vacacionesCentroCostoRel);
    }

    /**
     * Get vacacionesCentroCostoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVacacionesCentroCostoRel()
    {
        return $this->vacacionesCentroCostoRel;
    }

    /**
     * Add liquidacionesCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesCentroCostoRel
     * @return RhuCentroCosto
     */
    public function addLiquidacionesCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesCentroCostoRel)
    {
        $this->liquidacionesCentroCostoRel[] = $liquidacionesCentroCostoRel;

        return $this;
    }

    /**
     * Remove liquidacionesCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesCentroCostoRel
     */
    public function removeLiquidacionesCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesCentroCostoRel)
    {
        $this->liquidacionesCentroCostoRel->removeElement($liquidacionesCentroCostoRel);
    }

    /**
     * Get liquidacionesCentroCostoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionesCentroCostoRel()
    {
        return $this->liquidacionesCentroCostoRel;
    }
}
