<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_incapacidad")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuIncapacidadRepository")
 */
class RhuIncapacidad
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_incapacidad_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoIncapacidadPk;                    
    
    /**
     * @ORM\Column(name="numero", type="integer")
     */    
    private $numero = 0;     
    
    /**
     * @ORM\Column(name="fecha", type="date")
     */    
    private $fecha;    
    
    /**
     * @ORM\Column(name="fecha_desde", type="date")
     */    
    private $fechaDesde;    
    
    /**
     * @ORM\Column(name="fecha_hasta", type="date")
     */    
    private $fechaHasta;    
    
    /**
     * @ORM\Column(name="numero_eps", type="string", length=30, nullable=true)
     */    
    private $numeroEps;     
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer", nullable=true)
     */    
    private $codigoEmpleadoFk; 
    
    /**
     * @ORM\Column(name="codigo_entidad_salud_fk", type="integer", nullable=true)
     */    
    private $codigoEntidadSaludFk;
    
    /**
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad = 0;                       
          
    /**
     * @ORM\Column(name="codigo_centro_costo_fk", type="integer", nullable=true)
     */    
    private $codigoCentroCostoFk;         
    
    /**
     * @ORM\Column(name="codigo_incapacidad_diagnostico_fk", type="integer", nullable=true)
     */    
    private $codigoIncapacidadDiagnosticoFk;    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;     
    
    /**
     * @ORM\Column(name="codigo_incapacidad_tipo_fk", type="integer", nullable=true)
     */    
    private $codigoIncapacidadTipoFk;
    
    /**     
     * @ORM\Column(name="estado_transcripcion", type="boolean")
     */    
    private $estadoTranscripcion = 0;
    
    /**     
     * @ORM\Column(name="estado_cobrar", type="boolean")
     */    
    private $estadoCobrar = 0;
    
    /**     
     * @ORM\Column(name="estado_prorroga", type="boolean")
     */    
    private $estadoProrroga = 0;
    
    /**
     * @ORM\Column(name="vr_incapacidad", type="float")
     */
    private $vrIncapacidad = 0;
    
    /**
     * @ORM\Column(name="vr_pagado", type="float")
     */
    private $vrPagado = 0;
    
    /**
     * @ORM\Column(name="vr_saldo", type="float")
     */
    private $vrSaldo = 0;
         
    /**
     * @ORM\Column(name="porcentaje_pago", type="float")
     */
    private $porcentajePago = 0;    
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuIncapacidadTipo", inversedBy="incapacidadesIncapacidadTipoRel")
     * @ORM\JoinColumn(name="codigo_incapacidad_tipo_fk", referencedColumnName="codigo_incapacidad_tipo_pk")
     */
    protected $incapacidadTipoRel;     
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCentroCosto", inversedBy="incapacidadesCentroCostoRel")
     * @ORM\JoinColumn(name="codigo_centro_costo_fk", referencedColumnName="codigo_centro_costo_pk")
     */
    protected $centroCostoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEntidadSalud", inversedBy="incapacidadesEntidadSaludRel")
     * @ORM\JoinColumn(name="codigo_entidad_salud_fk", referencedColumnName="codigo_entidad_salud_pk")
     */
    protected $entidadSaludRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEmpleado", inversedBy="incapacidadesEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;    
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuIncapacidadDiagnostico", inversedBy="incapacidadesIncapacidadDiagnosticoRel")
     * @ORM\JoinColumn(name="codigo_incapacidad_diagnostico_fk", referencedColumnName="codigo_incapacidad_diagnostico_pk")
     */
    protected $incapacidadDiagnosticoRel; 
      
    

    /**
     * Get codigoIncapacidadPk
     *
     * @return integer 
     */
    public function getCodigoIncapacidadPk()
    {
        return $this->codigoIncapacidadPk;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return RhuIncapacidad
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return RhuIncapacidad
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
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return RhuIncapacidad
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
     * @return RhuIncapacidad
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
     * Set numeroEps
     *
     * @param string $numeroEps
     * @return RhuIncapacidad
     */
    public function setNumeroEps($numeroEps)
    {
        $this->numeroEps = $numeroEps;

        return $this;
    }

    /**
     * Get numeroEps
     *
     * @return string 
     */
    public function getNumeroEps()
    {
        return $this->numeroEps;
    }

    /**
     * Set codigoEmpleadoFk
     *
     * @param integer $codigoEmpleadoFk
     * @return RhuIncapacidad
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
     * Set codigoEntidadSaludFk
     *
     * @param integer $codigoEntidadSaludFk
     * @return RhuIncapacidad
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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return RhuIncapacidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set codigoCentroCostoFk
     *
     * @param integer $codigoCentroCostoFk
     * @return RhuIncapacidad
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
     * Set codigoIncapacidadDiagnosticoFk
     *
     * @param integer $codigoIncapacidadDiagnosticoFk
     * @return RhuIncapacidad
     */
    public function setCodigoIncapacidadDiagnosticoFk($codigoIncapacidadDiagnosticoFk)
    {
        $this->codigoIncapacidadDiagnosticoFk = $codigoIncapacidadDiagnosticoFk;

        return $this;
    }

    /**
     * Get codigoIncapacidadDiagnosticoFk
     *
     * @return integer 
     */
    public function getCodigoIncapacidadDiagnosticoFk()
    {
        return $this->codigoIncapacidadDiagnosticoFk;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return RhuIncapacidad
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
     * Set codigoIncapacidadTipoFk
     *
     * @param integer $codigoIncapacidadTipoFk
     * @return RhuIncapacidad
     */
    public function setCodigoIncapacidadTipoFk($codigoIncapacidadTipoFk)
    {
        $this->codigoIncapacidadTipoFk = $codigoIncapacidadTipoFk;

        return $this;
    }

    /**
     * Get codigoIncapacidadTipoFk
     *
     * @return integer 
     */
    public function getCodigoIncapacidadTipoFk()
    {
        return $this->codigoIncapacidadTipoFk;
    }

    /**
     * Set estadoTranscripcion
     *
     * @param boolean $estadoTranscripcion
     * @return RhuIncapacidad
     */
    public function setEstadoTranscripcion($estadoTranscripcion)
    {
        $this->estadoTranscripcion = $estadoTranscripcion;

        return $this;
    }

    /**
     * Get estadoTranscripcion
     *
     * @return boolean 
     */
    public function getEstadoTranscripcion()
    {
        return $this->estadoTranscripcion;
    }

    /**
     * Set estadoCobrar
     *
     * @param boolean $estadoCobrar
     * @return RhuIncapacidad
     */
    public function setEstadoCobrar($estadoCobrar)
    {
        $this->estadoCobrar = $estadoCobrar;

        return $this;
    }

    /**
     * Get estadoCobrar
     *
     * @return boolean 
     */
    public function getEstadoCobrar()
    {
        return $this->estadoCobrar;
    }

    /**
     * Set estadoProrroga
     *
     * @param boolean $estadoProrroga
     * @return RhuIncapacidad
     */
    public function setEstadoProrroga($estadoProrroga)
    {
        $this->estadoProrroga = $estadoProrroga;

        return $this;
    }

    /**
     * Get estadoProrroga
     *
     * @return boolean 
     */
    public function getEstadoProrroga()
    {
        return $this->estadoProrroga;
    }

    /**
     * Set vrIncapacidad
     *
     * @param float $vrIncapacidad
     * @return RhuIncapacidad
     */
    public function setVrIncapacidad($vrIncapacidad)
    {
        $this->vrIncapacidad = $vrIncapacidad;

        return $this;
    }

    /**
     * Get vrIncapacidad
     *
     * @return float 
     */
    public function getVrIncapacidad()
    {
        return $this->vrIncapacidad;
    }

    /**
     * Set vrPagado
     *
     * @param float $vrPagado
     * @return RhuIncapacidad
     */
    public function setVrPagado($vrPagado)
    {
        $this->vrPagado = $vrPagado;

        return $this;
    }

    /**
     * Get vrPagado
     *
     * @return float 
     */
    public function getVrPagado()
    {
        return $this->vrPagado;
    }

    /**
     * Set vrSaldo
     *
     * @param float $vrSaldo
     * @return RhuIncapacidad
     */
    public function setVrSaldo($vrSaldo)
    {
        $this->vrSaldo = $vrSaldo;

        return $this;
    }

    /**
     * Get vrSaldo
     *
     * @return float 
     */
    public function getVrSaldo()
    {
        return $this->vrSaldo;
    }

    /**
     * Set porcentajePago
     *
     * @param float $porcentajePago
     * @return RhuIncapacidad
     */
    public function setPorcentajePago($porcentajePago)
    {
        $this->porcentajePago = $porcentajePago;

        return $this;
    }

    /**
     * Get porcentajePago
     *
     * @return float 
     */
    public function getPorcentajePago()
    {
        return $this->porcentajePago;
    }

    /**
     * Set incapacidadTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidadTipo $incapacidadTipoRel
     * @return RhuIncapacidad
     */
    public function setIncapacidadTipoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidadTipo $incapacidadTipoRel = null)
    {
        $this->incapacidadTipoRel = $incapacidadTipoRel;

        return $this;
    }

    /**
     * Get incapacidadTipoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuIncapacidadTipo 
     */
    public function getIncapacidadTipoRel()
    {
        return $this->incapacidadTipoRel;
    }

    /**
     * Set centroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCentroCosto $centroCostoRel
     * @return RhuIncapacidad
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
     * Set entidadSaludRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEntidadSalud $entidadSaludRel
     * @return RhuIncapacidad
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
     * Set empleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadoRel
     * @return RhuIncapacidad
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
     * Set incapacidadDiagnosticoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidadDiagnostico $incapacidadDiagnosticoRel
     * @return RhuIncapacidad
     */
    public function setIncapacidadDiagnosticoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidadDiagnostico $incapacidadDiagnosticoRel = null)
    {
        $this->incapacidadDiagnosticoRel = $incapacidadDiagnosticoRel;

        return $this;
    }

    /**
     * Get incapacidadDiagnosticoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuIncapacidadDiagnostico 
     */
    public function getIncapacidadDiagnosticoRel()
    {
        return $this->incapacidadDiagnosticoRel;
    }
}
