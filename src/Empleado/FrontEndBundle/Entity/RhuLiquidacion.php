<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_liquidacion")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuLiquidacionRepository")
 */
class RhuLiquidacion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_liquidacion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoLiquidacionPk;            

    /**
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */    
    private $fecha;               
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer")
     */    
    private $codigoEmpleadoFk;

    /**
     * @ORM\Column(name="codigo_contrato_fk", type="integer")
     */    
    private $codigoContratoFk;    
    
    /**
     * @ORM\Column(name="codigo_centro_costo_fk", type="integer")
     */    
    private $codigoCentroCostoFk;
    
    /**
     * @ORM\Column(name="codigo_motivo_terminacion_contrato_fk", type="integer", nullable=true)
     */    
    private $codigoMotivoTerminacionContratoFk;
    
    /**
     * @ORM\Column(name="fecha_desde", type="date", nullable=true)
     */    
    private $fechaDesde;    
    
    /**
     * @ORM\Column(name="fecha_hasta", type="date", nullable=true)
     */    
    private $fechaHasta; 
    
    /**
     * @ORM\Column(name="numero_dias", type="string", length=30, nullable=true)
     */    
    private $numeroDias;                 
    
    /**
     * @ORM\Column(name="vr_cesantias", type="float")
     */
    private $VrCesantias = 0;    

    /**
     * @ORM\Column(name="vr_intereses_cesantias", type="float")
     */
    private $VrInteresesCesantias = 0;        

    /**
     * @ORM\Column(name="vr_prima", type="float")
     */
    private $VrPrima = 0;    

    /**
     * @ORM\Column(name="vr_deduccion_prima", type="float")
     */
    private $VrDeduccionPrima = 0;    
    
    /**
     * @ORM\Column(name="vr_vacaciones", type="float")
     */
    private $VrVacaciones = 0;    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;        
    
    /**
     * @ORM\Column(name="dias_cesantias", type="integer")
     */    
    private $diasCesantias = 0;    

    /**
     * @ORM\Column(name="dias_cesantias_descontar", type="integer")
     */    
    private $diasCesantiasDescontar = 0;    
    
    /**
     * @ORM\Column(name="dias_vacaciones", type="integer")
     */    
    private $diasVacaciones = 0;        
    
    /**
     * @ORM\Column(name="dias_vacaciones_descontar", type="integer")
     */    
    private $diasVacacionesDescontar = 0;     
    
    /**
     * @ORM\Column(name="dias_primas", type="integer")
     */    
    private $diasPrimas = 0;        

    /**
     * @ORM\Column(name="dias_primas_descontar", type="integer")
     */    
    private $diasPrimasDescontar = 0;    
    
    /**
     * @ORM\Column(name="dias_laborados", type="integer")
     */    
    private $diasLaborados = 0;    
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago", type="date", nullable=true)
     */    
    private $fechaUltimoPago;    

    /**
     * @ORM\Column(name="vr_ingreso_base_prestacion", type="float")
     */
    private $VrIngresoBasePrestacion = 0;     
    
    /**
     * @ORM\Column(name="vr_ingreso_base_prestacion_adicional", type="float")
     */
    private $VrIngresoBasePrestacionAdicional = 0;    

    /**
     * @ORM\Column(name="vr_ingreso_base_prestacion_total", type="float")
     */
    private $VrIngresoBasePrestacionTotal = 0;     
    
    /**
     * @ORM\Column(name="dias_adicionales_ibp", type="integer")
     */    
    private $diasAdicionalesIBP = 0;            
    
    /**
     * @ORM\Column(name="vr_base_prestaciones", type="float")
     */
    private $VrBasePrestaciones = 0;    

    /**
     * @ORM\Column(name="vr_base_prestaciones_total", type="float")
     */
    private $VrBasePrestacionesTotal = 0;    
    
    /**
     * @ORM\Column(name="vr_auxilio_transporte", type="float")
     */
    private $VrAuxilioTransporte = 0;    
    
    /**
     * @ORM\Column(name="vr_salario", type="float")
     */
    private $VrSalario = 0;     

    /**
     * @ORM\Column(name="vr_salario_vacaciones", type="float")
     */
    private $VrSalarioVacaciones = 0;     
    
    /**
     * @ORM\Column(name="vr_total", type="float")
     */
    private $VrTotal = 0;    
    
    /**     
     * @ORM\Column(name="liquidar_cesantias", type="boolean")
     */    
    private $liquidarCesantias = 0;

    /**     
     * @ORM\Column(name="liquidar_vacaciones", type="boolean")
     */    
    private $liquidarVacaciones = 0;    

    /**     
     * @ORM\Column(name="liquidar_prima", type="boolean")
     */    
    private $liquidarPrima = 0;        
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_primas", type="date", nullable=true)
     */    
    private $fechaUltimoPagoPrimas;
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_vacaciones", type="date", nullable=true)
     */    
    private $fechaUltimoPagoVacaciones;
    
    /**
     * @ORM\Column(name="fecha_ultimo_pago_cesantias", type="date", nullable=true)
     */    
    private $fechaUltimoPagoCesantias;    
    
    /**
     * @ORM\Column(name="vr_deducciones", type="float")
     */
    private $VrDeducciones = 0; 
    
    /**
     * @ORM\Column(name="vr_bonificaciones", type="float")
     */
    private $VrBonificaciones = 0;
    
    /**     
     * @ORM\Column(name="estado_autorizado", type="boolean")
     */    
    private $estadoAutorizado = 0;
    
    /**     
     * @ORM\Column(name="estado_generado", type="boolean")
     */    
    private $estadoGenerado = 0;
    
    /**
     * @ORM\Column(name="fecha_inicio_contrato", type="date", nullable=true)
     */    
    private $fechaInicioContrato;     
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEmpleado", inversedBy="liquidacionesEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;        
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCentroCosto", inversedBy="liquidacionesCentroCostoRel")
     * @ORM\JoinColumn(name="codigo_centro_costo_fk", referencedColumnName="codigo_centro_costo_pk")
     */
    protected $centroCostoRel;     

    /**
     * @ORM\ManyToOne(targetEntity="RhuContrato", inversedBy="liquidacionesContratoRel")
     * @ORM\JoinColumn(name="codigo_contrato_fk", referencedColumnName="codigo_contrato_pk")
     */
    protected $contratoRel;    
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuMotivoTerminacionContrato", inversedBy="liquidacionesMotivoTerminacionContratoRel")
     * @ORM\JoinColumn(name="codigo_motivo_terminacion_contrato_fk", referencedColumnName="codigo_motivo_terminacion_contrato_pk")
     */
    protected $motivoTerminacionRel;

    /**
     * @ORM\OneToMany(targetEntity="RhuLiquidacionAdicionales", mappedBy="liquidacionRel")
     */
    protected $liquidacionesAdicionalesLiquidacionRel;  

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liquidacionesAdicionalesLiquidacionRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoLiquidacionPk
     *
     * @return integer 
     */
    public function getCodigoLiquidacionPk()
    {
        return $this->codigoLiquidacionPk;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return RhuLiquidacion
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
     * Set codigoEmpleadoFk
     *
     * @param integer $codigoEmpleadoFk
     * @return RhuLiquidacion
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
     * Set codigoContratoFk
     *
     * @param integer $codigoContratoFk
     * @return RhuLiquidacion
     */
    public function setCodigoContratoFk($codigoContratoFk)
    {
        $this->codigoContratoFk = $codigoContratoFk;

        return $this;
    }

    /**
     * Get codigoContratoFk
     *
     * @return integer 
     */
    public function getCodigoContratoFk()
    {
        return $this->codigoContratoFk;
    }

    /**
     * Set codigoCentroCostoFk
     *
     * @param integer $codigoCentroCostoFk
     * @return RhuLiquidacion
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
     * Set codigoMotivoTerminacionContratoFk
     *
     * @param integer $codigoMotivoTerminacionContratoFk
     * @return RhuLiquidacion
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
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return RhuLiquidacion
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
     * @return RhuLiquidacion
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
     * Set numeroDias
     *
     * @param string $numeroDias
     * @return RhuLiquidacion
     */
    public function setNumeroDias($numeroDias)
    {
        $this->numeroDias = $numeroDias;

        return $this;
    }

    /**
     * Get numeroDias
     *
     * @return string 
     */
    public function getNumeroDias()
    {
        return $this->numeroDias;
    }

    /**
     * Set VrCesantias
     *
     * @param float $vrCesantias
     * @return RhuLiquidacion
     */
    public function setVrCesantias($vrCesantias)
    {
        $this->VrCesantias = $vrCesantias;

        return $this;
    }

    /**
     * Get VrCesantias
     *
     * @return float 
     */
    public function getVrCesantias()
    {
        return $this->VrCesantias;
    }

    /**
     * Set VrInteresesCesantias
     *
     * @param float $vrInteresesCesantias
     * @return RhuLiquidacion
     */
    public function setVrInteresesCesantias($vrInteresesCesantias)
    {
        $this->VrInteresesCesantias = $vrInteresesCesantias;

        return $this;
    }

    /**
     * Get VrInteresesCesantias
     *
     * @return float 
     */
    public function getVrInteresesCesantias()
    {
        return $this->VrInteresesCesantias;
    }

    /**
     * Set VrPrima
     *
     * @param float $vrPrima
     * @return RhuLiquidacion
     */
    public function setVrPrima($vrPrima)
    {
        $this->VrPrima = $vrPrima;

        return $this;
    }

    /**
     * Get VrPrima
     *
     * @return float 
     */
    public function getVrPrima()
    {
        return $this->VrPrima;
    }

    /**
     * Set VrDeduccionPrima
     *
     * @param float $vrDeduccionPrima
     * @return RhuLiquidacion
     */
    public function setVrDeduccionPrima($vrDeduccionPrima)
    {
        $this->VrDeduccionPrima = $vrDeduccionPrima;

        return $this;
    }

    /**
     * Get VrDeduccionPrima
     *
     * @return float 
     */
    public function getVrDeduccionPrima()
    {
        return $this->VrDeduccionPrima;
    }

    /**
     * Set VrVacaciones
     *
     * @param float $vrVacaciones
     * @return RhuLiquidacion
     */
    public function setVrVacaciones($vrVacaciones)
    {
        $this->VrVacaciones = $vrVacaciones;

        return $this;
    }

    /**
     * Get VrVacaciones
     *
     * @return float 
     */
    public function getVrVacaciones()
    {
        return $this->VrVacaciones;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return RhuLiquidacion
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
     * Set diasCesantias
     *
     * @param integer $diasCesantias
     * @return RhuLiquidacion
     */
    public function setDiasCesantias($diasCesantias)
    {
        $this->diasCesantias = $diasCesantias;

        return $this;
    }

    /**
     * Get diasCesantias
     *
     * @return integer 
     */
    public function getDiasCesantias()
    {
        return $this->diasCesantias;
    }

    /**
     * Set diasCesantiasDescontar
     *
     * @param integer $diasCesantiasDescontar
     * @return RhuLiquidacion
     */
    public function setDiasCesantiasDescontar($diasCesantiasDescontar)
    {
        $this->diasCesantiasDescontar = $diasCesantiasDescontar;

        return $this;
    }

    /**
     * Get diasCesantiasDescontar
     *
     * @return integer 
     */
    public function getDiasCesantiasDescontar()
    {
        return $this->diasCesantiasDescontar;
    }

    /**
     * Set diasVacaciones
     *
     * @param integer $diasVacaciones
     * @return RhuLiquidacion
     */
    public function setDiasVacaciones($diasVacaciones)
    {
        $this->diasVacaciones = $diasVacaciones;

        return $this;
    }

    /**
     * Get diasVacaciones
     *
     * @return integer 
     */
    public function getDiasVacaciones()
    {
        return $this->diasVacaciones;
    }

    /**
     * Set diasVacacionesDescontar
     *
     * @param integer $diasVacacionesDescontar
     * @return RhuLiquidacion
     */
    public function setDiasVacacionesDescontar($diasVacacionesDescontar)
    {
        $this->diasVacacionesDescontar = $diasVacacionesDescontar;

        return $this;
    }

    /**
     * Get diasVacacionesDescontar
     *
     * @return integer 
     */
    public function getDiasVacacionesDescontar()
    {
        return $this->diasVacacionesDescontar;
    }

    /**
     * Set diasPrimas
     *
     * @param integer $diasPrimas
     * @return RhuLiquidacion
     */
    public function setDiasPrimas($diasPrimas)
    {
        $this->diasPrimas = $diasPrimas;

        return $this;
    }

    /**
     * Get diasPrimas
     *
     * @return integer 
     */
    public function getDiasPrimas()
    {
        return $this->diasPrimas;
    }

    /**
     * Set diasPrimasDescontar
     *
     * @param integer $diasPrimasDescontar
     * @return RhuLiquidacion
     */
    public function setDiasPrimasDescontar($diasPrimasDescontar)
    {
        $this->diasPrimasDescontar = $diasPrimasDescontar;

        return $this;
    }

    /**
     * Get diasPrimasDescontar
     *
     * @return integer 
     */
    public function getDiasPrimasDescontar()
    {
        return $this->diasPrimasDescontar;
    }

    /**
     * Set diasLaborados
     *
     * @param integer $diasLaborados
     * @return RhuLiquidacion
     */
    public function setDiasLaborados($diasLaborados)
    {
        $this->diasLaborados = $diasLaborados;

        return $this;
    }

    /**
     * Get diasLaborados
     *
     * @return integer 
     */
    public function getDiasLaborados()
    {
        return $this->diasLaborados;
    }

    /**
     * Set fechaUltimoPago
     *
     * @param \DateTime $fechaUltimoPago
     * @return RhuLiquidacion
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
     * Set VrIngresoBasePrestacion
     *
     * @param float $vrIngresoBasePrestacion
     * @return RhuLiquidacion
     */
    public function setVrIngresoBasePrestacion($vrIngresoBasePrestacion)
    {
        $this->VrIngresoBasePrestacion = $vrIngresoBasePrestacion;

        return $this;
    }

    /**
     * Get VrIngresoBasePrestacion
     *
     * @return float 
     */
    public function getVrIngresoBasePrestacion()
    {
        return $this->VrIngresoBasePrestacion;
    }

    /**
     * Set VrIngresoBasePrestacionAdicional
     *
     * @param float $vrIngresoBasePrestacionAdicional
     * @return RhuLiquidacion
     */
    public function setVrIngresoBasePrestacionAdicional($vrIngresoBasePrestacionAdicional)
    {
        $this->VrIngresoBasePrestacionAdicional = $vrIngresoBasePrestacionAdicional;

        return $this;
    }

    /**
     * Get VrIngresoBasePrestacionAdicional
     *
     * @return float 
     */
    public function getVrIngresoBasePrestacionAdicional()
    {
        return $this->VrIngresoBasePrestacionAdicional;
    }

    /**
     * Set VrIngresoBasePrestacionTotal
     *
     * @param float $vrIngresoBasePrestacionTotal
     * @return RhuLiquidacion
     */
    public function setVrIngresoBasePrestacionTotal($vrIngresoBasePrestacionTotal)
    {
        $this->VrIngresoBasePrestacionTotal = $vrIngresoBasePrestacionTotal;

        return $this;
    }

    /**
     * Get VrIngresoBasePrestacionTotal
     *
     * @return float 
     */
    public function getVrIngresoBasePrestacionTotal()
    {
        return $this->VrIngresoBasePrestacionTotal;
    }

    /**
     * Set diasAdicionalesIBP
     *
     * @param integer $diasAdicionalesIBP
     * @return RhuLiquidacion
     */
    public function setDiasAdicionalesIBP($diasAdicionalesIBP)
    {
        $this->diasAdicionalesIBP = $diasAdicionalesIBP;

        return $this;
    }

    /**
     * Get diasAdicionalesIBP
     *
     * @return integer 
     */
    public function getDiasAdicionalesIBP()
    {
        return $this->diasAdicionalesIBP;
    }

    /**
     * Set VrBasePrestaciones
     *
     * @param float $vrBasePrestaciones
     * @return RhuLiquidacion
     */
    public function setVrBasePrestaciones($vrBasePrestaciones)
    {
        $this->VrBasePrestaciones = $vrBasePrestaciones;

        return $this;
    }

    /**
     * Get VrBasePrestaciones
     *
     * @return float 
     */
    public function getVrBasePrestaciones()
    {
        return $this->VrBasePrestaciones;
    }

    /**
     * Set VrBasePrestacionesTotal
     *
     * @param float $vrBasePrestacionesTotal
     * @return RhuLiquidacion
     */
    public function setVrBasePrestacionesTotal($vrBasePrestacionesTotal)
    {
        $this->VrBasePrestacionesTotal = $vrBasePrestacionesTotal;

        return $this;
    }

    /**
     * Get VrBasePrestacionesTotal
     *
     * @return float 
     */
    public function getVrBasePrestacionesTotal()
    {
        return $this->VrBasePrestacionesTotal;
    }

    /**
     * Set VrAuxilioTransporte
     *
     * @param float $vrAuxilioTransporte
     * @return RhuLiquidacion
     */
    public function setVrAuxilioTransporte($vrAuxilioTransporte)
    {
        $this->VrAuxilioTransporte = $vrAuxilioTransporte;

        return $this;
    }

    /**
     * Get VrAuxilioTransporte
     *
     * @return float 
     */
    public function getVrAuxilioTransporte()
    {
        return $this->VrAuxilioTransporte;
    }

    /**
     * Set VrSalario
     *
     * @param float $vrSalario
     * @return RhuLiquidacion
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
     * Set VrSalarioVacaciones
     *
     * @param float $vrSalarioVacaciones
     * @return RhuLiquidacion
     */
    public function setVrSalarioVacaciones($vrSalarioVacaciones)
    {
        $this->VrSalarioVacaciones = $vrSalarioVacaciones;

        return $this;
    }

    /**
     * Get VrSalarioVacaciones
     *
     * @return float 
     */
    public function getVrSalarioVacaciones()
    {
        return $this->VrSalarioVacaciones;
    }

    /**
     * Set VrTotal
     *
     * @param float $vrTotal
     * @return RhuLiquidacion
     */
    public function setVrTotal($vrTotal)
    {
        $this->VrTotal = $vrTotal;

        return $this;
    }

    /**
     * Get VrTotal
     *
     * @return float 
     */
    public function getVrTotal()
    {
        return $this->VrTotal;
    }

    /**
     * Set liquidarCesantias
     *
     * @param boolean $liquidarCesantias
     * @return RhuLiquidacion
     */
    public function setLiquidarCesantias($liquidarCesantias)
    {
        $this->liquidarCesantias = $liquidarCesantias;

        return $this;
    }

    /**
     * Get liquidarCesantias
     *
     * @return boolean 
     */
    public function getLiquidarCesantias()
    {
        return $this->liquidarCesantias;
    }

    /**
     * Set liquidarVacaciones
     *
     * @param boolean $liquidarVacaciones
     * @return RhuLiquidacion
     */
    public function setLiquidarVacaciones($liquidarVacaciones)
    {
        $this->liquidarVacaciones = $liquidarVacaciones;

        return $this;
    }

    /**
     * Get liquidarVacaciones
     *
     * @return boolean 
     */
    public function getLiquidarVacaciones()
    {
        return $this->liquidarVacaciones;
    }

    /**
     * Set liquidarPrima
     *
     * @param boolean $liquidarPrima
     * @return RhuLiquidacion
     */
    public function setLiquidarPrima($liquidarPrima)
    {
        $this->liquidarPrima = $liquidarPrima;

        return $this;
    }

    /**
     * Get liquidarPrima
     *
     * @return boolean 
     */
    public function getLiquidarPrima()
    {
        return $this->liquidarPrima;
    }

    /**
     * Set fechaUltimoPagoPrimas
     *
     * @param \DateTime $fechaUltimoPagoPrimas
     * @return RhuLiquidacion
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
     * Set fechaUltimoPagoVacaciones
     *
     * @param \DateTime $fechaUltimoPagoVacaciones
     * @return RhuLiquidacion
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
     * Set fechaUltimoPagoCesantias
     *
     * @param \DateTime $fechaUltimoPagoCesantias
     * @return RhuLiquidacion
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
     * Set VrDeducciones
     *
     * @param float $vrDeducciones
     * @return RhuLiquidacion
     */
    public function setVrDeducciones($vrDeducciones)
    {
        $this->VrDeducciones = $vrDeducciones;

        return $this;
    }

    /**
     * Get VrDeducciones
     *
     * @return float 
     */
    public function getVrDeducciones()
    {
        return $this->VrDeducciones;
    }

    /**
     * Set VrBonificaciones
     *
     * @param float $vrBonificaciones
     * @return RhuLiquidacion
     */
    public function setVrBonificaciones($vrBonificaciones)
    {
        $this->VrBonificaciones = $vrBonificaciones;

        return $this;
    }

    /**
     * Get VrBonificaciones
     *
     * @return float 
     */
    public function getVrBonificaciones()
    {
        return $this->VrBonificaciones;
    }

    /**
     * Set estadoAutorizado
     *
     * @param boolean $estadoAutorizado
     * @return RhuLiquidacion
     */
    public function setEstadoAutorizado($estadoAutorizado)
    {
        $this->estadoAutorizado = $estadoAutorizado;

        return $this;
    }

    /**
     * Get estadoAutorizado
     *
     * @return boolean 
     */
    public function getEstadoAutorizado()
    {
        return $this->estadoAutorizado;
    }

    /**
     * Set estadoGenerado
     *
     * @param boolean $estadoGenerado
     * @return RhuLiquidacion
     */
    public function setEstadoGenerado($estadoGenerado)
    {
        $this->estadoGenerado = $estadoGenerado;

        return $this;
    }

    /**
     * Get estadoGenerado
     *
     * @return boolean 
     */
    public function getEstadoGenerado()
    {
        return $this->estadoGenerado;
    }

    /**
     * Set fechaInicioContrato
     *
     * @param \DateTime $fechaInicioContrato
     * @return RhuLiquidacion
     */
    public function setFechaInicioContrato($fechaInicioContrato)
    {
        $this->fechaInicioContrato = $fechaInicioContrato;

        return $this;
    }

    /**
     * Get fechaInicioContrato
     *
     * @return \DateTime 
     */
    public function getFechaInicioContrato()
    {
        return $this->fechaInicioContrato;
    }

    /**
     * Set empleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadoRel
     * @return RhuLiquidacion
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
     * @return RhuLiquidacion
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
     * Set contratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratoRel
     * @return RhuLiquidacion
     */
    public function setContratoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratoRel = null)
    {
        $this->contratoRel = $contratoRel;

        return $this;
    }

    /**
     * Get contratoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuContrato 
     */
    public function getContratoRel()
    {
        return $this->contratoRel;
    }

    /**
     * Set motivoTerminacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuMotivoTerminacionContrato $motivoTerminacionRel
     * @return RhuLiquidacion
     */
    public function setMotivoTerminacionRel(\Empleado\FrontEndBundle\Entity\RhuMotivoTerminacionContrato $motivoTerminacionRel = null)
    {
        $this->motivoTerminacionRel = $motivoTerminacionRel;

        return $this;
    }

    /**
     * Get motivoTerminacionRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuMotivoTerminacionContrato 
     */
    public function getMotivoTerminacionRel()
    {
        return $this->motivoTerminacionRel;
    }

    /**
     * Add liquidacionesAdicionalesLiquidacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionRel
     * @return RhuLiquidacion
     */
    public function addLiquidacionesAdicionalesLiquidacionRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionRel)
    {
        $this->liquidacionesAdicionalesLiquidacionRel[] = $liquidacionesAdicionalesLiquidacionRel;

        return $this;
    }

    /**
     * Remove liquidacionesAdicionalesLiquidacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionRel
     */
    public function removeLiquidacionesAdicionalesLiquidacionRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionRel)
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
