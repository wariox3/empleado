<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_contrato")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuContratoRepository")
 */
class RhuContrato
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_contrato_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoContratoPk;        
    
    /**
     * @ORM\Column(name="codigo_contrato_tipo_fk", type="integer")
     */    
    private $codigoContratoTipoFk;     
    
    /**
     * @ORM\Column(name="codigo_clasificacion_riesgo_fk", type="integer")
     */    
    private $codigoClasificacionRiesgoFk;    
    
    /**
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */    
    private $fecha;     
    
    /**
     * @ORM\Column(name="codigo_tipo_tiempo_fk", type="integer")
     */    
    private $codigoTipoTiempoFk;    

    /**
     * @ORM\Column(name="codigo_tipo_pension_fk", type="integer")
     */    
    private $codigoTipoPensionFk;    
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer")
     */    
    private $codigoEmpleadoFk;
    
    /**
     * @ORM\Column(name="fecha_desde", type="date", nullable=true)
     */    
    private $fechaDesde;    
    
    /**
     * @ORM\Column(name="fecha_hasta", type="date", nullable=true)
     */    
    private $fechaHasta; 
    
    /**
     * @ORM\Column(name="numero", type="string", length=30, nullable=true)
     */    
    private $numero;     
    
    /**
     * @ORM\Column(name="codigo_cargo_fk", type="integer")
     */    
    private $codigoCargoFk;    
    
    /**
     * @ORM\Column(name="cargo_descripcion", type="string", length=60, nullable=true)
     */    
    private $cargoDescripcion;
    
    /**
     * @ORM\Column(name="horario_trabajo", type="string", length=100, nullable=true)
     */    
    private $horarioTrabajo;
    
    /**
     * @ORM\Column(name="vr_salario", type="float")
     */
    private $VrSalario = 0;    
    
    /**
     * @ORM\Column(name="vr_salario_pago", type="float")
     */
    private $VrSalarioPago = 0;    
    
    /**     
     * @ORM\Column(name="estado_activo", type="boolean")
     */    
    private $estadoActivo = 1;     
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;    
    
    /**     
     * @ORM\Column(name="indefinido", type="boolean")
     */    
    private $indefinido = 0;     
    
    /**
     * @ORM\Column(name="codigo_centro_costo_fk", type="integer")
     */    
    private $codigoCentroCostoFk;     
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_cesantias", type="date", nullable=true)
     */    
    private $fechaUltimoPagoCesantias;    

    /**
     * @ORM\Column(name="fecha_ultimo_pago_vacaciones", type="date", nullable=true)
     */    
    private $fechaUltimoPagoVacaciones;    
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_primas", type="date", nullable=true)
     */    
    private $fechaUltimoPagoPrimas;        
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago", type="date", nullable=true)
     */    
    private $fechaUltimoPago;             
    
    /**     
     * @ORM\Column(name="estado_liquidado", type="boolean")
     */    
    private $estadoLiquidado = 0;   
    
    /**
     * Este factor se utiliza para saber de cuantas horas se compone un dia
     * @ORM\Column(name="factor", type="integer", nullable=true)     
     */    
    private $factor = 0;     
    
    /**
     * @ORM\Column(name="factor_horas_dia", type="integer", nullable=true)
     */    
    private $factorHorasDia = 0;    
    
    /**
     * @ORM\Column(name="codigo_tipo_cotizante_fk", type="integer", nullable=false)
     */    
    private $codigoTipoCotizanteFk;    

    /**
     * @ORM\Column(name="codigo_subtipo_cotizante_fk", type="integer", nullable=false)
     */    
    private $codigoSubtipoCotizanteFk;     
    
    /**     
     * @ORM\Column(name="salario_integral", type="boolean")
     */    
    private $salarioIntegral = 0;    
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEmpleado", inversedBy="contratosEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;    

    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCentroCosto", inversedBy="empleadosCentroCostoRel")
     * @ORM\JoinColumn(name="codigo_centro_costo_fk", referencedColumnName="codigo_centro_costo_pk")
     */
    protected $centroCostoRel;     

    /**
     * @ORM\ManyToOne(targetEntity="RhuContratoTipo", inversedBy="contratosContratoTipoRel")
     * @ORM\JoinColumn(name="codigo_contrato_tipo_fk", referencedColumnName="codigo_contrato_tipo_pk")
     */
    protected $contratoTipoRel;     
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCargo", inversedBy="contratosCargoRel")
     * @ORM\JoinColumn(name="codigo_cargo_fk", referencedColumnName="codigo_cargo_pk")
     */
    protected $cargoRel;  
    
    /**
     * @ORM\OneToMany(targetEntity="RhuContrato", mappedBy="empleadoRel")
     */
    protected $contratosEmpleadoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuTipoTiempo", inversedBy="contratosTipoTiempoRel")
     * @ORM\JoinColumn(name="codigo_tipo_tiempo_fk", referencedColumnName="codigo_tipo_tiempo_pk")
     */
    protected $tipoTiempoRel;   
    
    /**
     * @ORM\OneToMany(targetEntity="RhuVacacion", mappedBy="contratoRel")
     */
    protected $vacacionesContratoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuLiquidacion", mappedBy="liquidacionRel")
     */
    protected $liquidacionesAdicionalesLiquidacionRel;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratosEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vacacionesContratoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->liquidacionesAdicionalesLiquidacionRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoContratoPk
     *
     * @return integer 
     */
    public function getCodigoContratoPk()
    {
        return $this->codigoContratoPk;
    }

    /**
     * Set codigoContratoTipoFk
     *
     * @param integer $codigoContratoTipoFk
     * @return RhuContrato
     */
    public function setCodigoContratoTipoFk($codigoContratoTipoFk)
    {
        $this->codigoContratoTipoFk = $codigoContratoTipoFk;

        return $this;
    }

    /**
     * Get codigoContratoTipoFk
     *
     * @return integer 
     */
    public function getCodigoContratoTipoFk()
    {
        return $this->codigoContratoTipoFk;
    }

    /**
     * Set codigoClasificacionRiesgoFk
     *
     * @param integer $codigoClasificacionRiesgoFk
     * @return RhuContrato
     */
    public function setCodigoClasificacionRiesgoFk($codigoClasificacionRiesgoFk)
    {
        $this->codigoClasificacionRiesgoFk = $codigoClasificacionRiesgoFk;

        return $this;
    }

    /**
     * Get codigoClasificacionRiesgoFk
     *
     * @return integer 
     */
    public function getCodigoClasificacionRiesgoFk()
    {
        return $this->codigoClasificacionRiesgoFk;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return RhuContrato
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
     * Set codigoTipoTiempoFk
     *
     * @param integer $codigoTipoTiempoFk
     * @return RhuContrato
     */
    public function setCodigoTipoTiempoFk($codigoTipoTiempoFk)
    {
        $this->codigoTipoTiempoFk = $codigoTipoTiempoFk;

        return $this;
    }

    /**
     * Get codigoTipoTiempoFk
     *
     * @return integer 
     */
    public function getCodigoTipoTiempoFk()
    {
        return $this->codigoTipoTiempoFk;
    }

    /**
     * Set codigoTipoPensionFk
     *
     * @param integer $codigoTipoPensionFk
     * @return RhuContrato
     */
    public function setCodigoTipoPensionFk($codigoTipoPensionFk)
    {
        $this->codigoTipoPensionFk = $codigoTipoPensionFk;

        return $this;
    }

    /**
     * Get codigoTipoPensionFk
     *
     * @return integer 
     */
    public function getCodigoTipoPensionFk()
    {
        return $this->codigoTipoPensionFk;
    }

    /**
     * Set codigoEmpleadoFk
     *
     * @param integer $codigoEmpleadoFk
     * @return RhuContrato
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
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return RhuContrato
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime 
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     * @return RhuContrato
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime 
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return RhuContrato
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set codigoCargoFk
     *
     * @param integer $codigoCargoFk
     * @return RhuContrato
     */
    public function setCodigoCargoFk($codigoCargoFk)
    {
        $this->codigoCargoFk = $codigoCargoFk;

        return $this;
    }

    /**
     * Get codigoCargoFk
     *
     * @return integer 
     */
    public function getCodigoCargoFk()
    {
        return $this->codigoCargoFk;
    }

    /**
     * Set cargoDescripcion
     *
     * @param string $cargoDescripcion
     * @return RhuContrato
     */
    public function setCargoDescripcion($cargoDescripcion)
    {
        $this->cargoDescripcion = $cargoDescripcion;

        return $this;
    }

    /**
     * Get cargoDescripcion
     *
     * @return string 
     */
    public function getCargoDescripcion()
    {
        return $this->cargoDescripcion;
    }

    /**
     * Set horarioTrabajo
     *
     * @param string $horarioTrabajo
     * @return RhuContrato
     */
    public function setHorarioTrabajo($horarioTrabajo)
    {
        $this->horarioTrabajo = $horarioTrabajo;

        return $this;
    }

    /**
     * Get horarioTrabajo
     *
     * @return string 
     */
    public function getHorarioTrabajo()
    {
        return $this->horarioTrabajo;
    }

    /**
     * Set VrSalario
     *
     * @param float $vrSalario
     * @return RhuContrato
     */
    public function setVrSalario($vrSalario)
    {
        $this->VrSalario = $vrSalario;

        return $this;
    }

    /**
     * Get VrSalario
     *
     * @return float 
     */
    public function getVrSalario()
    {
        return $this->VrSalario;
    }

    /**
     * Set VrSalarioPago
     *
     * @param float $vrSalarioPago
     * @return RhuContrato
     */
    public function setVrSalarioPago($vrSalarioPago)
    {
        $this->VrSalarioPago = $vrSalarioPago;

        return $this;
    }

    /**
     * Get VrSalarioPago
     *
     * @return float 
     */
    public function getVrSalarioPago()
    {
        return $this->VrSalarioPago;
    }

    /**
     * Set estadoActivo
     *
     * @param boolean $estadoActivo
     * @return RhuContrato
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
     * Set comentarios
     *
     * @param string $comentarios
     * @return RhuContrato
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
     * Set indefinido
     *
     * @param boolean $indefinido
     * @return RhuContrato
     */
    public function setIndefinido($indefinido)
    {
        $this->indefinido = $indefinido;

        return $this;
    }

    /**
     * Get indefinido
     *
     * @return boolean 
     */
    public function getIndefinido()
    {
        return $this->indefinido;
    }

    /**
     * Set codigoCentroCostoFk
     *
     * @param integer $codigoCentroCostoFk
     * @return RhuContrato
     */
    public function setCodigoCentroCostoFk($codigoCentroCostoFk)
    {
        $this->codigoCentroCostoFk = $codigoCentroCostoFk;

        return $this;
    }

    /**
     * Get codigoCentroCostoFk
     *
     * @return integer 
     */
    public function getCodigoCentroCostoFk()
    {
        return $this->codigoCentroCostoFk;
    }

    /**
     * Set fechaUltimoPagoCesantias
     *
     * @param \DateTime $fechaUltimoPagoCesantias
     * @return RhuContrato
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
     * Set fechaUltimoPagoVacaciones
     *
     * @param \DateTime $fechaUltimoPagoVacaciones
     * @return RhuContrato
     */
    public function setFechaUltimoPagoVacaciones($fechaUltimoPagoVacaciones)
    {
        $this->fechaUltimoPagoVacaciones = $fechaUltimoPagoVacaciones;

        return $this;
    }

    /**
     * Get fechaUltimoPagoVacaciones
     *
     * @return \DateTime 
     */
    public function getFechaUltimoPagoVacaciones()
    {
        return $this->fechaUltimoPagoVacaciones;
    }

    /**
     * Set fechaUltimoPagoPrimas
     *
     * @param \DateTime $fechaUltimoPagoPrimas
     * @return RhuContrato
     */
    public function setFechaUltimoPagoPrimas($fechaUltimoPagoPrimas)
    {
        $this->fechaUltimoPagoPrimas = $fechaUltimoPagoPrimas;

        return $this;
    }

    /**
     * Get fechaUltimoPagoPrimas
     *
     * @return \DateTime 
     */
    public function getFechaUltimoPagoPrimas()
    {
        return $this->fechaUltimoPagoPrimas;
    }

    /**
     * Set fechaUltimoPago
     *
     * @param \DateTime $fechaUltimoPago
     * @return RhuContrato
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
     * Set estadoLiquidado
     *
     * @param boolean $estadoLiquidado
     * @return RhuContrato
     */
    public function setEstadoLiquidado($estadoLiquidado)
    {
        $this->estadoLiquidado = $estadoLiquidado;

        return $this;
    }

    /**
     * Get estadoLiquidado
     *
     * @return boolean 
     */
    public function getEstadoLiquidado()
    {
        return $this->estadoLiquidado;
    }

    /**
     * Set factor
     *
     * @param integer $factor
     * @return RhuContrato
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;

        return $this;
    }

    /**
     * Get factor
     *
     * @return integer 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set factorHorasDia
     *
     * @param integer $factorHorasDia
     * @return RhuContrato
     */
    public function setFactorHorasDia($factorHorasDia)
    {
        $this->factorHorasDia = $factorHorasDia;

        return $this;
    }

    /**
     * Get factorHorasDia
     *
     * @return integer 
     */
    public function getFactorHorasDia()
    {
        return $this->factorHorasDia;
    }

    /**
     * Set codigoTipoCotizanteFk
     *
     * @param integer $codigoTipoCotizanteFk
     * @return RhuContrato
     */
    public function setCodigoTipoCotizanteFk($codigoTipoCotizanteFk)
    {
        $this->codigoTipoCotizanteFk = $codigoTipoCotizanteFk;

        return $this;
    }

    /**
     * Get codigoTipoCotizanteFk
     *
     * @return integer 
     */
    public function getCodigoTipoCotizanteFk()
    {
        return $this->codigoTipoCotizanteFk;
    }

    /**
     * Set codigoSubtipoCotizanteFk
     *
     * @param integer $codigoSubtipoCotizanteFk
     * @return RhuContrato
     */
    public function setCodigoSubtipoCotizanteFk($codigoSubtipoCotizanteFk)
    {
        $this->codigoSubtipoCotizanteFk = $codigoSubtipoCotizanteFk;

        return $this;
    }

    /**
     * Get codigoSubtipoCotizanteFk
     *
     * @return integer 
     */
    public function getCodigoSubtipoCotizanteFk()
    {
        return $this->codigoSubtipoCotizanteFk;
    }

    /**
     * Set salarioIntegral
     *
     * @param boolean $salarioIntegral
     * @return RhuContrato
     */
    public function setSalarioIntegral($salarioIntegral)
    {
        $this->salarioIntegral = $salarioIntegral;

        return $this;
    }

    /**
     * Get salarioIntegral
     *
     * @return boolean 
     */
    public function getSalarioIntegral()
    {
        return $this->salarioIntegral;
    }

    /**
     * Set empleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadoRel
     * @return RhuContrato
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
     * Set centroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCentroCosto $centroCostoRel
     * @return RhuContrato
     */
    public function setCentroCostoRel(\Empleado\FrontEndBundle\Entity\RhuCentroCosto $centroCostoRel = null)
    {
        $this->centroCostoRel = $centroCostoRel;

        return $this;
    }

    /**
     * Get centroCostoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuCentroCosto 
     */
    public function getCentroCostoRel()
    {
        return $this->centroCostoRel;
    }

    /**
     * Set contratoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContratoTipo $contratoTipoRel
     * @return RhuContrato
     */
    public function setContratoTipoRel(\Empleado\FrontEndBundle\Entity\RhuContratoTipo $contratoTipoRel = null)
    {
        $this->contratoTipoRel = $contratoTipoRel;

        return $this;
    }

    /**
     * Get contratoTipoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuContratoTipo 
     */
    public function getContratoTipoRel()
    {
        return $this->contratoTipoRel;
    }

    /**
     * Set cargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCargo $cargoRel
     * @return RhuContrato
     */
    public function setCargoRel(\Empleado\FrontEndBundle\Entity\RhuCargo $cargoRel = null)
    {
        $this->cargoRel = $cargoRel;

        return $this;
    }

    /**
     * Get cargoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuCargo 
     */
    public function getCargoRel()
    {
        return $this->cargoRel;
    }

    /**
     * Add contratosEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosEmpleadoRel
     * @return RhuContrato
     */
    public function addContratosEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosEmpleadoRel)
    {
        $this->contratosEmpleadoRel[] = $contratosEmpleadoRel;

        return $this;
    }

    /**
     * Remove contratosEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosEmpleadoRel
     */
    public function removeContratosEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosEmpleadoRel)
    {
        $this->contratosEmpleadoRel->removeElement($contratosEmpleadoRel);
    }

    /**
     * Get contratosEmpleadoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContratosEmpleadoRel()
    {
        return $this->contratosEmpleadoRel;
    }

    /**
     * Set tipoTiempoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuTipoTiempo $tipoTiempoRel
     * @return RhuContrato
     */
    public function setTipoTiempoRel(\Empleado\FrontEndBundle\Entity\RhuTipoTiempo $tipoTiempoRel = null)
    {
        $this->tipoTiempoRel = $tipoTiempoRel;

        return $this;
    }

    /**
     * Get tipoTiempoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuTipoTiempo 
     */
    public function getTipoTiempoRel()
    {
        return $this->tipoTiempoRel;
    }

    /**
     * Add vacacionesContratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesContratoRel
     * @return RhuContrato
     */
    public function addVacacionesContratoRel(\Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesContratoRel)
    {
        $this->vacacionesContratoRel[] = $vacacionesContratoRel;

        return $this;
    }

    /**
     * Remove vacacionesContratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesContratoRel
     */
    public function removeVacacionesContratoRel(\Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesContratoRel)
    {
        $this->vacacionesContratoRel->removeElement($vacacionesContratoRel);
    }

    /**
     * Get vacacionesContratoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVacacionesContratoRel()
    {
        return $this->vacacionesContratoRel;
    }

    /**
     * Add liquidacionesAdicionalesLiquidacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesAdicionalesLiquidacionRel
     * @return RhuContrato
     */
    public function addLiquidacionesAdicionalesLiquidacionRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesAdicionalesLiquidacionRel)
    {
        $this->liquidacionesAdicionalesLiquidacionRel[] = $liquidacionesAdicionalesLiquidacionRel;

        return $this;
    }

    /**
     * Remove liquidacionesAdicionalesLiquidacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesAdicionalesLiquidacionRel
     */
    public function removeLiquidacionesAdicionalesLiquidacionRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesAdicionalesLiquidacionRel)
    {
        $this->liquidacionesAdicionalesLiquidacionRel->removeElement($liquidacionesAdicionalesLiquidacionRel);
    }

    /**
     * Get liquidacionesAdicionalesLiquidacionRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionesAdicionalesLiquidacionRel()
    {
        return $this->liquidacionesAdicionalesLiquidacionRel;
    }
}
