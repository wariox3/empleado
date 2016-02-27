<?php

namespace Empleado\FrontEndBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_empleado")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuEmpleadoRepository")
 */

class RhuEmpleado
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_empleado_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoEmpleadoPk;
    
    /**
     * @ORM\Column(name="codigo_tipo_identificacion_fk", type="string", length=1, nullable=true)
     */    
    private $codigoTipoIdentificacionFk;     
    
    /**
     * @ORM\Column(name="numero_identificacion", type="string", length=20, nullable=false, unique=true)
     */
         
    private $numeroIdentificacion;
    
    /**
     * @ORM\Column(name="libreta_militar", type="string", length=20, nullable=true)
     */
         
    private $libretaMilitar;
    
    /**
     * @ORM\Column(name="nombre_corto", type="string", length=80, nullable=true)
     */    
    private $nombreCorto;    

    /**
     * @ORM\Column(name="nombre1", type="string", length=30, nullable=true)
     */    
    private $nombre1;        
    
    /**
     * @ORM\Column(name="nombre2", type="string", length=30, nullable=true)
     */    
    private $nombre2;    
    
    /**
     * @ORM\Column(name="apellido1", type="string", length=30, nullable=true)
     */    
    private $apellido1;    

    /**
     * @ORM\Column(name="apellido2", type="string", length=30, nullable=true)
     */    
    private $apellido2;    
    
    /**
     * @ORM\Column(name="telefono", type="string", length=15, nullable=true)
     */    
    private $telefono;    
    
    /**
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     */    
    private $celular; 
    
    /**
     * @ORM\Column(name="direccion", type="string", length=30, nullable=true)
     */    
    private $direccion; 
    
    /**
     * @ORM\Column(name="codigo_ciudad_fk", type="integer", nullable=true)
     */    
    private $codigoCiudadFk;
    
    /**
     * @ORM\Column(name="codigo_ciudad_expedicion_fk", type="integer", nullable=true)
     */    
    private $codigoCiudadExpedicionFk;
    
    /**
     * @ORM\Column(name="barrio", type="string", length=100, nullable=true)
     */    
    private $barrio;    
    
    /**
     * @ORM\Column(name="codigo_rh_fk", type="integer", nullable=true)
     */    
    private $codigoRhPk;     
    
    /**
     * @ORM\Column(name="codigo_sexo_fk", type="string", length=1, nullable=true)
     */    
    private $codigoSexoFk;     
    
    /**
     * @ORM\Column(name="correo", type="string", length=80, nullable=true)
     */    
    private $correo;     
        
    /**
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */ 
    
    private $fecha_nacimiento; 
    
    /**
     * @ORM\Column(name="codigo_ciudad_nacimiento_fk", type="integer", nullable=true)
     */    
    private $codigoCiudadNacimientoFk;
    
     /**
     * @ORM\Column(name="codigo_estado_civil_fk", type="string", length=1, nullable=true)
     */
    
    private $codigoEstadoCivilFk;
    
    /**
     * @ORM\Column(name="cuenta", type="string", length=80, nullable=true)
     */    
    private $cuenta;    
    
    /**
     * @ORM\Column(name="codigo_banco_fk", type="integer", nullable=true)
     */    
    private $codigoBancoFk;         
    
    /**
     * @ORM\Column(name="codigo_centro_costo_fk", type="integer", nullable=true)
     */    
    private $codigoCentroCostoFk;           
    
    /**
     * @ORM\Column(name="codigo_cargo_fk", type="integer", nullable=true)
     */    
    private $codigoCargoFk;    
    
    /**
     * @ORM\Column(name="cargo_descripcion", type="string", length=60, nullable=true)
     */    
    private $cargoDescripcion;      
    
    /**
     * @ORM\Column(name="auxilio_transporte", type="boolean")
     */    
    private $auxilioTransporte = 0;     
    
    /**
     * @ORM\Column(name="vr_salario", type="float")
     */
    private $VrSalario = 0;
    
    
    /**
     * @ORM\Column(name="fecha_expedicion_identificacion", type="date", nullable=true)
     */ 
    
    private $fechaExpedicionIdentificacion;
    
    /**
     * @ORM\Column(name="codigo_entidad_salud_fk", type="integer", nullable=true)
     */    
    private $codigoEntidadSaludFk;    

    /**
     * @ORM\Column(name="codigo_entidad_pension_fk", type="integer", nullable=true)
     */    
    private $codigoEntidadPensionFk;    
    
    /**
     * @ORM\Column(name="codigo_tipo_pension_fk", type="integer", nullable=true)
     */    
    private $codigoTipoPensionFk;     

    /**
     * @ORM\Column(name="codigo_entidad_caja_fk", type="integer", nullable=true)
     */    
    private $codigoEntidadCajaFk;     
    
    /**     
     * @ORM\Column(name="estado_activo", type="boolean")
     */    
    private $estadoActivo = 1;
    
    /**     
     * @ORM\Column(name="estado_contrato_activo", type="boolean")
     */    
    private $estadoContratoActivo = 0;

    /**
     * @ORM\Column(name="codigo_contrato_ultimo_fk", type="integer", nullable=true)
     */    
    private $codigoContratoUltimoFk;
    
    /**     
     * @ORM\Column(name="cabeza_hogar", type="boolean")
     */    
    private $cabezaHogar= 0;
    
    
    /**     
     * @ORM\Column(name="camisa", type="string", length=10, nullable=true)
     */    
    private $camisa;
    
    /**     
     * @ORM\Column(name="jeans", type="string", length=10, nullable=true)
     */    
    private $jeans;
    
    /**     
     * @ORM\Column(name="calzado", type="string", length=10,  nullable=true)
     */    
    private $calzado;
    
    /**
     * @ORM\Column(name="codigo_clasificacion_riesgo_fk", type="integer", nullable=true)
     */    
    private $codigoClasificacionRiesgoFk;     
    
    /**
     * @ORM\Column(name="fecha_contrato", type="date", nullable=true)
     */    
    private $fechaContrato;   
    
    /**
     * @ORM\Column(name="fecha_finaliza_contrato", type="date", nullable=true)
     */    
    private $fechaFinalizaContrato;    
    
    /**     
     * @ORM\Column(name="contrato_indefinido", type="boolean")
     */    
    private $contratoIndefinido = 0;
    
    /**     
     * Empleado pagado por la entidad de salud, exonerado de los pagos
     * @ORM\Column(name="pagado_entidad_salud", type="boolean")
     */    
    private $pagadoEntidadSalud = 0;    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;     
    
    /**
     * @ORM\Column(name="codigo_tipo_tiempo_fk", type="integer", nullable=true)
     */    
    private $codigoTipoTiempoFk;     
    
    /**
     * @ORM\Column(name="horas_laboradas_periodo", type="float")
     */
    private $horasLaboradasPeriodo = 0;
    
    /**
     * @ORM\Column(name="padre_familia", type="float")
     */
    private $padreFamilia = 0;
    
    /**
     * @ORM\Column(name="codigo_empleado_estudio_tipo_fk", type="integer", length=4, nullable=true)
     */    
    private $codigoEmpleadoEstudioTipoFk;
    
    //Relaciones
    
    /**
     * @ORM\OneToMany(targetEntity="RhuPago", mappedBy="empleadoRel")
     */
    protected $pagosEmpleadoRel;    

    /**
     * @ORM\ManyToOne(targetEntity="RhuEntidadSalud", inversedBy="empleadosEntidadSaludRel")
     * @ORM\JoinColumn(name="codigo_entidad_salud_fk", referencedColumnName="codigo_entidad_salud_pk")
     */
    protected $entidadSaludRel;     
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEntidadPension", inversedBy="empleadosEntidadPensionRel")
     * @ORM\JoinColumn(name="codigo_entidad_pension_fk", referencedColumnName="codigo_entidad_pension_pk")
     */
    protected $entidadPensionRel;
   
    /**
     * @ORM\ManyToOne(targetEntity="RhuCargo", inversedBy="empleadosCargoRel")
     * @ORM\JoinColumn(name="codigo_cargo_fk", referencedColumnName="codigo_cargo_pk")
     */
    protected $cargoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuBanco", inversedBy="empleadosBancoRel")
     * @ORM\JoinColumn(name="codigo_banco_fk", referencedColumnName="codigo_banco_pk")
     */
    protected $bancoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuDisciplinario", mappedBy="empleadoRel")
     */
    protected $disciplinariosEmpleadoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuIncapacidad", mappedBy="empleadoRel")
     */
    protected $incapacidadesEmpleadoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuVacacion", mappedBy="empleadoRel")
     */
    protected $vacacionesEmpleadoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuLiquidacion", mappedBy="empleadoRel")
     */
    protected $liquidacionesEmpleadoRel;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->disciplinariosEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->incapacidadesEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vacacionesEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->liquidacionesEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoEmpleadoPk
     *
     * @return integer 
     */
    public function getCodigoEmpleadoPk()
    {
        return $this->codigoEmpleadoPk;
    }

    /**
     * Set codigoTipoIdentificacionFk
     *
     * @param string $codigoTipoIdentificacionFk
     * @return RhuEmpleado
     */
    public function setCodigoTipoIdentificacionFk($codigoTipoIdentificacionFk)
    {
        $this->codigoTipoIdentificacionFk = $codigoTipoIdentificacionFk;

        return $this;
    }

    /**
     * Get codigoTipoIdentificacionFk
     *
     * @return string 
     */
    public function getCodigoTipoIdentificacionFk()
    {
        return $this->codigoTipoIdentificacionFk;
    }

    /**
     * Set numeroIdentificacion
     *
     * @param string $numeroIdentificacion
     * @return RhuEmpleado
     */
    public function setNumeroIdentificacion($numeroIdentificacion)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;

        return $this;
    }

    /**
     * Get numeroIdentificacion
     *
     * @return string 
     */
    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }

    /**
     * Set libretaMilitar
     *
     * @param string $libretaMilitar
     * @return RhuEmpleado
     */
    public function setLibretaMilitar($libretaMilitar)
    {
        $this->libretaMilitar = $libretaMilitar;

        return $this;
    }

    /**
     * Get libretaMilitar
     *
     * @return string 
     */
    public function getLibretaMilitar()
    {
        return $this->libretaMilitar;
    }

    /**
     * Set nombreCorto
     *
     * @param string $nombreCorto
     * @return RhuEmpleado
     */
    public function setNombreCorto($nombreCorto)
    {
        $this->nombreCorto = $nombreCorto;

        return $this;
    }

    /**
     * Get nombreCorto
     *
     * @return string 
     */
    public function getNombreCorto()
    {
        return $this->nombreCorto;
    }

    /**
     * Set nombre1
     *
     * @param string $nombre1
     * @return RhuEmpleado
     */
    public function setNombre1($nombre1)
    {
        $this->nombre1 = $nombre1;

        return $this;
    }

    /**
     * Get nombre1
     *
     * @return string 
     */
    public function getNombre1()
    {
        return $this->nombre1;
    }

    /**
     * Set nombre2
     *
     * @param string $nombre2
     * @return RhuEmpleado
     */
    public function setNombre2($nombre2)
    {
        $this->nombre2 = $nombre2;

        return $this;
    }

    /**
     * Get nombre2
     *
     * @return string 
     */
    public function getNombre2()
    {
        return $this->nombre2;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     * @return RhuEmpleado
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string 
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     * @return RhuEmpleado
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string 
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return RhuEmpleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return RhuEmpleado
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return RhuEmpleado
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set codigoCiudadFk
     *
     * @param integer $codigoCiudadFk
     * @return RhuEmpleado
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
     * Set codigoCiudadExpedicionFk
     *
     * @param integer $codigoCiudadExpedicionFk
     * @return RhuEmpleado
     */
    public function setCodigoCiudadExpedicionFk($codigoCiudadExpedicionFk)
    {
        $this->codigoCiudadExpedicionFk = $codigoCiudadExpedicionFk;

        return $this;
    }

    /**
     * Get codigoCiudadExpedicionFk
     *
     * @return integer 
     */
    public function getCodigoCiudadExpedicionFk()
    {
        return $this->codigoCiudadExpedicionFk;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return RhuEmpleado
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;

        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set codigoRhPk
     *
     * @param integer $codigoRhPk
     * @return RhuEmpleado
     */
    public function setCodigoRhPk($codigoRhPk)
    {
        $this->codigoRhPk = $codigoRhPk;

        return $this;
    }

    /**
     * Get codigoRhPk
     *
     * @return integer 
     */
    public function getCodigoRhPk()
    {
        return $this->codigoRhPk;
    }

    /**
     * Set codigoSexoFk
     *
     * @param string $codigoSexoFk
     * @return RhuEmpleado
     */
    public function setCodigoSexoFk($codigoSexoFk)
    {
        $this->codigoSexoFk = $codigoSexoFk;

        return $this;
    }

    /**
     * Get codigoSexoFk
     *
     * @return string 
     */
    public function getCodigoSexoFk()
    {
        return $this->codigoSexoFk;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return RhuEmpleado
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
     * Set fecha_nacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return RhuEmpleado
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set codigoCiudadNacimientoFk
     *
     * @param integer $codigoCiudadNacimientoFk
     * @return RhuEmpleado
     */
    public function setCodigoCiudadNacimientoFk($codigoCiudadNacimientoFk)
    {
        $this->codigoCiudadNacimientoFk = $codigoCiudadNacimientoFk;

        return $this;
    }

    /**
     * Get codigoCiudadNacimientoFk
     *
     * @return integer 
     */
    public function getCodigoCiudadNacimientoFk()
    {
        return $this->codigoCiudadNacimientoFk;
    }

    /**
     * Set codigoEstadoCivilFk
     *
     * @param string $codigoEstadoCivilFk
     * @return RhuEmpleado
     */
    public function setCodigoEstadoCivilFk($codigoEstadoCivilFk)
    {
        $this->codigoEstadoCivilFk = $codigoEstadoCivilFk;

        return $this;
    }

    /**
     * Get codigoEstadoCivilFk
     *
     * @return string 
     */
    public function getCodigoEstadoCivilFk()
    {
        return $this->codigoEstadoCivilFk;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return RhuEmpleado
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set codigoBancoFk
     *
     * @param integer $codigoBancoFk
     * @return RhuEmpleado
     */
    public function setCodigoBancoFk($codigoBancoFk)
    {
        $this->codigoBancoFk = $codigoBancoFk;

        return $this;
    }

    /**
     * Get codigoBancoFk
     *
     * @return integer 
     */
    public function getCodigoBancoFk()
    {
        return $this->codigoBancoFk;
    }

    /**
     * Set codigoCentroCostoFk
     *
     * @param integer $codigoCentroCostoFk
     * @return RhuEmpleado
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
     * Set codigoCargoFk
     *
     * @param integer $codigoCargoFk
     * @return RhuEmpleado
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
     * @return RhuEmpleado
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
     * Set auxilioTransporte
     *
     * @param boolean $auxilioTransporte
     * @return RhuEmpleado
     */
    public function setAuxilioTransporte($auxilioTransporte)
    {
        $this->auxilioTransporte = $auxilioTransporte;

        return $this;
    }

    /**
     * Get auxilioTransporte
     *
     * @return boolean 
     */
    public function getAuxilioTransporte()
    {
        return $this->auxilioTransporte;
    }

    /**
     * Set VrSalario
     *
     * @param float $vrSalario
     * @return RhuEmpleado
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
     * Set fechaExpedicionIdentificacion
     *
     * @param \DateTime $fechaExpedicionIdentificacion
     * @return RhuEmpleado
     */
    public function setFechaExpedicionIdentificacion($fechaExpedicionIdentificacion)
    {
        $this->fechaExpedicionIdentificacion = $fechaExpedicionIdentificacion;

        return $this;
    }

    /**
     * Get fechaExpedicionIdentificacion
     *
     * @return \DateTime 
     */
    public function getFechaExpedicionIdentificacion()
    {
        return $this->fechaExpedicionIdentificacion;
    }

    /**
     * Set codigoEntidadSaludFk
     *
     * @param integer $codigoEntidadSaludFk
     * @return RhuEmpleado
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
     * @return RhuEmpleado
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
     * Set codigoTipoPensionFk
     *
     * @param integer $codigoTipoPensionFk
     * @return RhuEmpleado
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
     * Set codigoEntidadCajaFk
     *
     * @param integer $codigoEntidadCajaFk
     * @return RhuEmpleado
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
     * Set estadoActivo
     *
     * @param boolean $estadoActivo
     * @return RhuEmpleado
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
     * Set cabezaHogar
     *
     * @param boolean $cabezaHogar
     * @return RhuEmpleado
     */
    public function setCabezaHogar($cabezaHogar)
    {
        $this->cabezaHogar = $cabezaHogar;

        return $this;
    }

    /**
     * Get cabezaHogar
     *
     * @return boolean 
     */
    public function getCabezaHogar()
    {
        return $this->cabezaHogar;
    }

    /**
     * Set camisa
     *
     * @param string $camisa
     * @return RhuEmpleado
     */
    public function setCamisa($camisa)
    {
        $this->camisa = $camisa;

        return $this;
    }

    /**
     * Get camisa
     *
     * @return string 
     */
    public function getCamisa()
    {
        return $this->camisa;
    }

    /**
     * Set jeans
     *
     * @param string $jeans
     * @return RhuEmpleado
     */
    public function setJeans($jeans)
    {
        $this->jeans = $jeans;

        return $this;
    }

    /**
     * Get jeans
     *
     * @return string 
     */
    public function getJeans()
    {
        return $this->jeans;
    }

    /**
     * Set calzado
     *
     * @param string $calzado
     * @return RhuEmpleado
     */
    public function setCalzado($calzado)
    {
        $this->calzado = $calzado;

        return $this;
    }

    /**
     * Get calzado
     *
     * @return string 
     */
    public function getCalzado()
    {
        return $this->calzado;
    }

    /**
     * Set codigoClasificacionRiesgoFk
     *
     * @param integer $codigoClasificacionRiesgoFk
     * @return RhuEmpleado
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
     * Set fechaContrato
     *
     * @param \DateTime $fechaContrato
     * @return RhuEmpleado
     */
    public function setFechaContrato($fechaContrato)
    {
        $this->fechaContrato = $fechaContrato;

        return $this;
    }

    /**
     * Get fechaContrato
     *
     * @return \DateTime 
     */
    public function getFechaContrato()
    {
        return $this->fechaContrato;
    }

    /**
     * Set fechaFinalizaContrato
     *
     * @param \DateTime $fechaFinalizaContrato
     * @return RhuEmpleado
     */
    public function setFechaFinalizaContrato($fechaFinalizaContrato)
    {
        $this->fechaFinalizaContrato = $fechaFinalizaContrato;

        return $this;
    }

    /**
     * Get fechaFinalizaContrato
     *
     * @return \DateTime 
     */
    public function getFechaFinalizaContrato()
    {
        return $this->fechaFinalizaContrato;
    }

    /**
     * Set contratoIndefinido
     *
     * @param boolean $contratoIndefinido
     * @return RhuEmpleado
     */
    public function setContratoIndefinido($contratoIndefinido)
    {
        $this->contratoIndefinido = $contratoIndefinido;

        return $this;
    }

    /**
     * Get contratoIndefinido
     *
     * @return boolean 
     */
    public function getContratoIndefinido()
    {
        return $this->contratoIndefinido;
    }

    /**
     * Set pagadoEntidadSalud
     *
     * @param boolean $pagadoEntidadSalud
     * @return RhuEmpleado
     */
    public function setPagadoEntidadSalud($pagadoEntidadSalud)
    {
        $this->pagadoEntidadSalud = $pagadoEntidadSalud;

        return $this;
    }

    /**
     * Get pagadoEntidadSalud
     *
     * @return boolean 
     */
    public function getPagadoEntidadSalud()
    {
        return $this->pagadoEntidadSalud;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return RhuEmpleado
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
     * Set codigoTipoTiempoFk
     *
     * @param integer $codigoTipoTiempoFk
     * @return RhuEmpleado
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
     * Set horasLaboradasPeriodo
     *
     * @param float $horasLaboradasPeriodo
     * @return RhuEmpleado
     */
    public function setHorasLaboradasPeriodo($horasLaboradasPeriodo)
    {
        $this->horasLaboradasPeriodo = $horasLaboradasPeriodo;

        return $this;
    }

    /**
     * Get horasLaboradasPeriodo
     *
     * @return float 
     */
    public function getHorasLaboradasPeriodo()
    {
        return $this->horasLaboradasPeriodo;
    }

    /**
     * Set padreFamilia
     *
     * @param float $padreFamilia
     * @return RhuEmpleado
     */
    public function setPadreFamilia($padreFamilia)
    {
        $this->padreFamilia = $padreFamilia;

        return $this;
    }

    /**
     * Get padreFamilia
     *
     * @return float 
     */
    public function getPadreFamilia()
    {
        return $this->padreFamilia;
    }

    /**
     * Set codigoEmpleadoEstudioTipoFk
     *
     * @param integer $codigoEmpleadoEstudioTipoFk
     * @return RhuEmpleado
     */
    public function setCodigoEmpleadoEstudioTipoFk($codigoEmpleadoEstudioTipoFk)
    {
        $this->codigoEmpleadoEstudioTipoFk = $codigoEmpleadoEstudioTipoFk;

        return $this;
    }

    /**
     * Get codigoEmpleadoEstudioTipoFk
     *
     * @return integer 
     */
    public function getCodigoEmpleadoEstudioTipoFk()
    {
        return $this->codigoEmpleadoEstudioTipoFk;
    }

    /**
     * Add pagosEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosEmpleadoRel
     * @return RhuEmpleado
     */
    public function addPagosEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosEmpleadoRel)
    {
        $this->pagosEmpleadoRel[] = $pagosEmpleadoRel;

        return $this;
    }

    /**
     * Remove pagosEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosEmpleadoRel
     */
    public function removePagosEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosEmpleadoRel)
    {
        $this->pagosEmpleadoRel->removeElement($pagosEmpleadoRel);
    }

    /**
     * Get pagosEmpleadoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagosEmpleadoRel()
    {
        return $this->pagosEmpleadoRel;
    }

    /**
     * Set entidadSaludRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEntidadSalud $entidadSaludRel
     * @return RhuEmpleado
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
     * @return RhuEmpleado
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
     * Set cargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCargo $cargoRel
     * @return RhuEmpleado
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
     * Set bancoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuBanco $bancoRel
     * @return RhuEmpleado
     */
    public function setBancoRel(\Empleado\FrontEndBundle\Entity\RhuBanco $bancoRel = null)
    {
        $this->bancoRel = $bancoRel;

        return $this;
    }

    /**
     * Get bancoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuBanco 
     */
    public function getBancoRel()
    {
        return $this->bancoRel;
    }

    /**
     * Add disciplinariosEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosEmpleadoRel
     * @return RhuEmpleado
     */
    public function addDisciplinariosEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosEmpleadoRel)
    {
        $this->disciplinariosEmpleadoRel[] = $disciplinariosEmpleadoRel;

        return $this;
    }

    /**
     * Remove disciplinariosEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosEmpleadoRel
     */
    public function removeDisciplinariosEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosEmpleadoRel)
    {
        $this->disciplinariosEmpleadoRel->removeElement($disciplinariosEmpleadoRel);
    }

    /**
     * Get disciplinariosEmpleadoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisciplinariosEmpleadoRel()
    {
        return $this->disciplinariosEmpleadoRel;
    }

    /**
     * Add incapacidadesEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesEmpleadoRel
     * @return RhuEmpleado
     */
    public function addIncapacidadesEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesEmpleadoRel)
    {
        $this->incapacidadesEmpleadoRel[] = $incapacidadesEmpleadoRel;

        return $this;
    }

    /**
     * Remove incapacidadesEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesEmpleadoRel
     */
    public function removeIncapacidadesEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesEmpleadoRel)
    {
        $this->incapacidadesEmpleadoRel->removeElement($incapacidadesEmpleadoRel);
    }

    /**
     * Get incapacidadesEmpleadoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIncapacidadesEmpleadoRel()
    {
        return $this->incapacidadesEmpleadoRel;
    }

    /**
     * Add vacacionesEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesEmpleadoRel
     * @return RhuEmpleado
     */
    public function addVacacionesEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesEmpleadoRel)
    {
        $this->vacacionesEmpleadoRel[] = $vacacionesEmpleadoRel;

        return $this;
    }

    /**
     * Remove vacacionesEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesEmpleadoRel
     */
    public function removeVacacionesEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuVacacion $vacacionesEmpleadoRel)
    {
        $this->vacacionesEmpleadoRel->removeElement($vacacionesEmpleadoRel);
    }

    /**
     * Get vacacionesEmpleadoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVacacionesEmpleadoRel()
    {
        return $this->vacacionesEmpleadoRel;
    }

    /**
     * Add liquidacionesEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesEmpleadoRel
     * @return RhuEmpleado
     */
    public function addLiquidacionesEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesEmpleadoRel)
    {
        $this->liquidacionesEmpleadoRel[] = $liquidacionesEmpleadoRel;

        return $this;
    }

    /**
     * Remove liquidacionesEmpleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesEmpleadoRel
     */
    public function removeLiquidacionesEmpleadoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacion $liquidacionesEmpleadoRel)
    {
        $this->liquidacionesEmpleadoRel->removeElement($liquidacionesEmpleadoRel);
    }

    /**
     * Get liquidacionesEmpleadoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionesEmpleadoRel()
    {
        return $this->liquidacionesEmpleadoRel;
    }

    /**
     * Set estadoContratoActivo
     *
     * @param boolean $estadoContratoActivo
     * @return RhuEmpleado
     */
    public function setEstadoContratoActivo($estadoContratoActivo)
    {
        $this->estadoContratoActivo = $estadoContratoActivo;

        return $this;
    }

    /**
     * Get estadoContratoActivo
     *
     * @return boolean 
     */
    public function getEstadoContratoActivo()
    {
        return $this->estadoContratoActivo;
    }

    /**
     * Set codigoContratoUltimoFk
     *
     * @param integer $codigoContratoUltimoFk
     * @return RhuEmpleado
     */
    public function setCodigoContratoUltimoFk($codigoContratoUltimoFk)
    {
        $this->codigoContratoUltimoFk = $codigoContratoUltimoFk;

        return $this;
    }

    /**
     * Get codigoContratoUltimoFk
     *
     * @return integer 
     */
    public function getCodigoContratoUltimoFk()
    {
        return $this->codigoContratoUltimoFk;
    }
}
