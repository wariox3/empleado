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
     * @ORM\Column(name="codigo_motivo_terminacion_contrato_fk", type="integer", nullable=true)
     */    
    private $codigoMotivoTerminacionContratoFk;
    
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
     * @ORM\Column(name="fecha_prorroga_inicio", type="date", nullable=true)
     */    
    private $fechaProrrogaInicio;    
    
    /**
     * @ORM\Column(name="fecha_prorroga_final", type="date", nullable=true)
     */    
    private $fechaProrrogaFinal;
    
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
     * @ORM\Column(name="codigo_entidad_salud_fk", type="integer", nullable=true)
     */    
    private $codigoEntidadSaludFk;    

    /**
     * @ORM\Column(name="codigo_entidad_pension_fk", type="integer", nullable=true)
     */    
    private $codigoEntidadPensionFk;
    
    /**
     * @ORM\Column(name="codigo_usuario", type="string", length=50, nullable=true)
     */    
    private $codigoUsuario;

     /**
     * @ORM\Column(name="codigo_entidad_caja_fk", type="integer", nullable=true)
     */    
    private $codigoEntidadCajaFk;
    
    /**
     * @ORM\Column(name="codigo_ciudad_contrato_fk", type="integer", nullable=true)
     */    
    private $codigoCiudadContratoFk;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEmpleado", inversedBy="contratosEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;    

    /**
     * @ORM\ManyToOne(targetEntity="RhuTipoTiempo", inversedBy="contratosTipoTiempoRel")
     * @ORM\JoinColumn(name="codigo_tipo_tiempo_fk", referencedColumnName="codigo_tipo_tiempo_pk")
     */
    protected $tipoTiempoRel;     
    
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
     * @ORM\ManyToOne(targetEntity="RhuMotivoTerminacionContrato", inversedBy="contratosMotivoTerminacionContratoRel")
     * @ORM\JoinColumn(name="codigo_motivo_terminacion_contrato_fk", referencedColumnName="codigo_motivo_terminacion_contrato_pk")
     */
    protected $terminacionContratoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEntidadSalud", inversedBy="contratosEntidadSaludRel")
     * @ORM\JoinColumn(name="codigo_entidad_salud_fk", referencedColumnName="codigo_entidad_salud_pk")
     */
    protected $entidadSaludRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEntidadPension", inversedBy="contratosEntidadPensionRel")
     * @ORM\JoinColumn(name="codigo_entidad_pension_fk", referencedColumnName="codigo_entidad_pension_pk")
     */
    protected $entidadPensionRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuLiquidacion", mappedBy="contratoRel")
     */
    protected $liquidacionesContratoRel; 

        
    
    /**
     * @ORM\OneToMany(targetEntity="RhuPago", mappedBy="contratoRel")
     */
    protected $pagosContratoRel;      
    
    /**
     * @ORM\OneToMany(targetEntity="RhuVacacion", mappedBy="contratoRel")
     */
    protected $vacacionesContratoRel;             
    
         

        
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liquidacionesContratoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagosContratoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vacacionesContratoRel = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set codigoMotivoTerminacionContratoFk
     *
     * @param integer $codigoMotivoTerminacionContratoFk
     * @return RhuContrato
     */
    public function setCodigoMotivoTerminacionContratoFk($codigoMotivoTerminacionContratoFk)
    {
        $this->codigoMotivoTerminacionContratoFk = $codigoMotivoTerminacionContratoFk;

        return $this;
    }

    /**
     * Get codigoMotivoTerminacionContratoFk
     *
     * @return integer 
     */
    public function getCodigoMotivoTerminacionContratoFk()
    {
        return $this->codigoMotivoTerminacionContratoFk;
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
     * Set fechaProrrogaInicio
     *
     * @param \DateTime $fechaProrrogaInicio
     * @return RhuContrato
     */
    public function setFechaProrrogaInicio($fechaProrrogaInicio)
    {
        $this->fechaProrrogaInicio = $fechaProrrogaInicio;

        return $this;
    }

    /**
     * Get fechaProrrogaInicio
     *
     * @return \DateTime 
     */
    public function getFechaProrrogaInicio()
    {
        return $this->fechaProrrogaInicio;
    }

    /**
     * Set fechaProrrogaFinal
     *
     * @param \DateTime $fechaProrrogaFinal
     * @return RhuContrato
     */
    public function setFechaProrrogaFinal($fechaProrrogaFinal)
    {
        $this->fechaProrrogaFinal = $fechaProrrogaFinal;

        return $this;
    }

    /**
     * Get fechaProrrogaFinal
     *
     * @return \DateTime 
     */
    public function getFechaProrrogaFinal()
    {
        return $this->fechaProrrogaFinal;
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
     * Set codigoEntidadSaludFk
     *
     * @param integer $codigoEntidadSaludFk
     * @return RhuContrato
     */
    public function setCodigoEntidadSaludFk($codigoEntidadSaludFk)
    {
        $this->codigoEntidadSaludFk = $codigoEntidadSaludFk;

        return $this;
    }

    /**
     * Get codigoEntidadSaludFk
     *
     * @return integer 
     */
    public function getCodigoEntidadSaludFk()
    {
        return $this->codigoEntidadSaludFk;
    }

    /**
     * Set codigoEntidadPensionFk
     *
     * @param integer $codigoEntidadPensionFk
     * @return RhuContrato
     */
    public function setCodigoEntidadPensionFk($codigoEntidadPensionFk)
    {
        $this->codigoEntidadPensionFk = $codigoEntidadPensionFk;

        return $this;
    }

    /**
     * Get codigoEntidadPensionFk
     *
     * @return integer 
     */
    public function getCodigoEntidadPensionFk()
    {
        return $this->codigoEntidadPensionFk;
    }

    /**
     * Set codigoUsuario
     *
     * @param string $codigoUsuario
     * @return RhuContrato
     */
    public function setCodigoUsuario($codigoUsuario)
    {
        $this->codigoUsuario = $codigoUsuario;

        return $this;
    }

    /**
     * Get codigoUsuario
     *
     * @return string 
     */
    public function getCodigoUsuario()
    {
        return $this->codigoUsuario;
    }

    /**
     * Set codigoEntidadCajaFk
     *
     * @param integer $codigoEntidadCajaFk
     * @return RhuContrato
     */
    public function setCodigoEntidadCajaFk($codigoEntidadCajaFk)
    {
        $this->codigoEntidadCajaFk = $codigoEntidadCajaFk;

        return $this;
    }

    /**
     * Get codigoEntidadCajaFk
     *
     * @return integer 
     */
    public function getCodigoEntidadCajaFk()
    {
        return $this->codigoEntidadCajaFk;
    }

    /**
     * Set codigoCiudadContratoFk
     *
     * @param integer $codigoCiudadContratoFk
     * @return RhuContrato
     */
    public function setCodigoCiudadContratoFk($codigoCiudadContratoFk)
    {
        $this->codigoCiudadContratoFk = $codigoCiudadContratoFk;

        return $this;
    }

    /**
     * Get codigoCiudadContratoFk
     *
     * @return integer 
     */
    public function getCodigoCiudadContratoFk()
    {
        return $this->codigoCiudadContratoFk;
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
     * Set terminacionContratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuMotivoTerminacionContrato $terminacionContratoRel
     * @return RhuContrato
     */
    public function setTerminacionContratoRel(\Empleado\FrontEndBundle\Entity\RhuMotivoTerminacionContrato $terminacionContratoRel = null)
    {
        $this->terminacionContratoRel = $terminacionContratoRel;

        return $this;
    }

    /**
     * Get terminacionContratoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuMotivoTerminacionContrato 
     */
    public function getTerminacionContratoRel()
    {
        return $this->terminacionContratoRel;
    }

    /**
     * Set entidadSaludRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEntidadSalud $entidadSaludRel
     * @return RhuContrato
     */
    public function setEntidadSaludRel(\Empleado\FrontEndBundle\Entity\RhuEntidadSalud $entidadSaludRel = null)
    {
        $this->entidadSaludRel = $entidadSaludRel;

        return $this;
    }

    /**
     * Get entidadSaludRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuEntidadSalud 
     */
    public function getEntidadSaludRel()
    {
        return $this->entidadSaludRel;
    }

    /**
     * Set entidadPensionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEntidadPension $entidadPensionRel
     * @return RhuContrato
     */
    public function setEntidadPensionRel(\Empleado\FrontEndBundle\Entity\RhuEntidadPension $entidadPensionRel = null)
    {
        $this->entidadPensionRel = $entidadPensionRel;

        return $this;
    }

    /**
     * Get entidadPensionRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuEntidadPension 
     */
    public function getEntidadPensionRel()
    {
        return $this->entidadPensionRel;
    }

    /**
     * Add liquidacionesContratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesContratoRel
     * @return RhuContrato
     */
    public function addLiquidacionesContratoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesContratoRel)
    {
        $this->liquidacionesContratoRel[] = $liquidacionesContratoRel;

        return $this;
    }

    /**
     * Remove liquidacionesContratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesContratoRel
     */
    public function removeLiquidacionesContratoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesContratoRel)
    {
        $this->liquidacionesContratoRel->removeElement($liquidacionesContratoRel);
    }

    /**
     * Get liquidacionesContratoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionesContratoRel()
    {
        return $this->liquidacionesContratoRel;
    }

    /**
     * Add pagosContratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosContratoRel
     * @return RhuContrato
     */
    public function addPagosContratoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosContratoRel)
    {
        $this->pagosContratoRel[] = $pagosContratoRel;

        return $this;
    }

    /**
     * Remove pagosContratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosContratoRel
     */
    public function removePagosContratoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosContratoRel)
    {
        $this->pagosContratoRel->removeElement($pagosContratoRel);
    }

    /**
     * Get pagosContratoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagosContratoRel()
    {
        return $this->pagosContratoRel;
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
}
