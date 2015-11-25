<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_vacacion")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuVacacionRepository")
 */
class RhuVacacion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_vacacion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoVacacionPk;                          
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer", nullable=true)
     */    
    private $codigoEmpleadoFk;    
    
    /**
     * @ORM\Column(name="codigo_contrato_fk", type="integer", nullable=false)
     */    
    private $codigoContratoFk;    
    
    /**
     * @ORM\Column(name="fecha", type="date")
     */    
    private $fecha;    
    
    /**
     * @ORM\Column(name="fecha_desde_periodo", type="date")
     */    
    private $fechaDesdePeriodo;    
    
    /**
     * @ORM\Column(name="fecha_hasta_periodo", type="date")
     */    
    private $fechaHastaPeriodo;

    /**
     * @ORM\Column(name="fecha_desde_disfrute", type="date")
     */    
    private $fechaDesdeDisfrute;    
    
    /**
     * @ORM\Column(name="fecha_hasta_disfrute", type="date")
     */    
    private $fechaHastaDisfrute;    
    
    /**
     * @ORM\Column(name="vr_salud", type="float")
     */
    private $vrSalud = 0;
    
    /**
     * @ORM\Column(name="vr_pension", type="float")
     */
    private $vrPension = 0;
    
    /**
     * @ORM\Column(name="vr_ibc", type="float")
     */
    private $vrIbc = 0;
    
    /**
     * @ORM\Column(name="vr_deduccion", type="float")
     */
    private $vrDeduccion = 0;
    
    /**
     * @ORM\Column(name="vr_vacacion", type="float")
     */
    private $vrVacacion = 0;    
    
    /**
     * @ORM\Column(name="dias_vacaciones", type="integer")
     */
    private $diasVacaciones = 0;   

    /**
     * @ORM\Column(name="dias_disfrutados", type="integer")
     */
    private $diasDisfrutados = 0;     
    
    /**
     * @ORM\Column(name="dias_pagados", type="integer")
     */
    private $diasPagados = 0;     
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;
    
    /**
     * @ORM\Column(name="estado_pagado", type="boolean")
     */
    private $estadoPagado = 0;
    
    /**
     * @ORM\Column(name="codigo_centro_costo_fk", type="integer", nullable=true)
     */    
    private $codigoCentroCostoFk;   
    
    /**
     * @ORM\Column(name="vr_salario_actual", type="float")
     */
    private $vrSalarioActual = 0;     

    /**
     * @ORM\Column(name="vr_salario_promedio", type="float")
     */
    private $vrSalarioPromedio = 0;         

    /**
     * @ORM\Column(name="vr_vacacion_bruto", type="float")
     */
    private $vrVacacionBruto = 0;    
    
    /**
     * @ORM\Column(name="estado_autorizado", type="boolean")
     */
    private $estadoAutorizado = 0;    
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCentroCosto", inversedBy="vacacionesCentroCostoRel")
     * @ORM\JoinColumn(name="codigo_centro_costo_fk", referencedColumnName="codigo_centro_costo_pk")
     */
    protected $centroCostoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEmpleado", inversedBy="vacacionesEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;        
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuContrato", inversedBy="vacacionesContratoRel")
     * @ORM\JoinColumn(name="codigo_contrato_fk", referencedColumnName="codigo_contrato_pk")
     */
    protected $contratoRel;    
    
    /**
     * @ORM\OneToMany(targetEntity="RhuVacacionCredito", mappedBy="vacacionRel")
     */
    protected $VacacionesCreditosVacacionRel;
      

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->VacacionesCreditosVacacionRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoVacacionPk
     *
     * @return integer 
     */
    public function getCodigoVacacionPk()
    {
        return $this->codigoVacacionPk;
    }

    /**
     * Set codigoEmpleadoFk
     *
     * @param integer $codigoEmpleadoFk
     * @return RhuVacacion
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
     * @return RhuVacacion
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return RhuVacacion
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
     * Set fechaDesdePeriodo
     *
     * @param \DateTime $fechaDesdePeriodo
     * @return RhuVacacion
     */
    public function setFechaDesdePeriodo($fechaDesdePeriodo)
    {
        $this->fechaDesdePeriodo = $fechaDesdePeriodo;

        return $this;
    }

    /**
     * Get fechaDesdePeriodo
     *
     * @return \DateTime 
     */
    public function getFechaDesdePeriodo()
    {
        return $this->fechaDesdePeriodo;
    }

    /**
     * Set fechaHastaPeriodo
     *
     * @param \DateTime $fechaHastaPeriodo
     * @return RhuVacacion
     */
    public function setFechaHastaPeriodo($fechaHastaPeriodo)
    {
        $this->fechaHastaPeriodo = $fechaHastaPeriodo;

        return $this;
    }

    /**
     * Get fechaHastaPeriodo
     *
     * @return \DateTime 
     */
    public function getFechaHastaPeriodo()
    {
        return $this->fechaHastaPeriodo;
    }

    /**
     * Set fechaDesdeDisfrute
     *
     * @param \DateTime $fechaDesdeDisfrute
     * @return RhuVacacion
     */
    public function setFechaDesdeDisfrute($fechaDesdeDisfrute)
    {
        $this->fechaDesdeDisfrute = $fechaDesdeDisfrute;

        return $this;
    }

    /**
     * Get fechaDesdeDisfrute
     *
     * @return \DateTime 
     */
    public function getFechaDesdeDisfrute()
    {
        return $this->fechaDesdeDisfrute;
    }

    /**
     * Set fechaHastaDisfrute
     *
     * @param \DateTime $fechaHastaDisfrute
     * @return RhuVacacion
     */
    public function setFechaHastaDisfrute($fechaHastaDisfrute)
    {
        $this->fechaHastaDisfrute = $fechaHastaDisfrute;

        return $this;
    }

    /**
     * Get fechaHastaDisfrute
     *
     * @return \DateTime 
     */
    public function getFechaHastaDisfrute()
    {
        return $this->fechaHastaDisfrute;
    }

    /**
     * Set vrSalud
     *
     * @param float $vrSalud
     * @return RhuVacacion
     */
    public function setVrSalud($vrSalud)
    {
        $this->vrSalud = $vrSalud;

        return $this;
    }

    /**
     * Get vrSalud
     *
     * @return float 
     */
    public function getVrSalud()
    {
        return $this->vrSalud;
    }

    /**
     * Set vrPension
     *
     * @param float $vrPension
     * @return RhuVacacion
     */
    public function setVrPension($vrPension)
    {
        $this->vrPension = $vrPension;

        return $this;
    }

    /**
     * Get vrPension
     *
     * @return float 
     */
    public function getVrPension()
    {
        return $this->vrPension;
    }

    /**
     * Set vrIbc
     *
     * @param float $vrIbc
     * @return RhuVacacion
     */
    public function setVrIbc($vrIbc)
    {
        $this->vrIbc = $vrIbc;

        return $this;
    }

    /**
     * Get vrIbc
     *
     * @return float 
     */
    public function getVrIbc()
    {
        return $this->vrIbc;
    }

    /**
     * Set vrDeduccion
     *
     * @param float $vrDeduccion
     * @return RhuVacacion
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
     * Set vrVacacion
     *
     * @param float $vrVacacion
     * @return RhuVacacion
     */
    public function setVrVacacion($vrVacacion)
    {
        $this->vrVacacion = $vrVacacion;

        return $this;
    }

    /**
     * Get vrVacacion
     *
     * @return float 
     */
    public function getVrVacacion()
    {
        return $this->vrVacacion;
    }

    /**
     * Set diasVacaciones
     *
     * @param integer $diasVacaciones
     * @return RhuVacacion
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
     * Set diasDisfrutados
     *
     * @param integer $diasDisfrutados
     * @return RhuVacacion
     */
    public function setDiasDisfrutados($diasDisfrutados)
    {
        $this->diasDisfrutados = $diasDisfrutados;

        return $this;
    }

    /**
     * Get diasDisfrutados
     *
     * @return integer 
     */
    public function getDiasDisfrutados()
    {
        return $this->diasDisfrutados;
    }

    /**
     * Set diasPagados
     *
     * @param integer $diasPagados
     * @return RhuVacacion
     */
    public function setDiasPagados($diasPagados)
    {
        $this->diasPagados = $diasPagados;

        return $this;
    }

    /**
     * Get diasPagados
     *
     * @return integer 
     */
    public function getDiasPagados()
    {
        return $this->diasPagados;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return RhuVacacion
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
     * Set estadoPagado
     *
     * @param boolean $estadoPagado
     * @return RhuVacacion
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
     * Set codigoCentroCostoFk
     *
     * @param integer $codigoCentroCostoFk
     * @return RhuVacacion
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
     * Set vrSalarioActual
     *
     * @param float $vrSalarioActual
     * @return RhuVacacion
     */
    public function setVrSalarioActual($vrSalarioActual)
    {
        $this->vrSalarioActual = $vrSalarioActual;

        return $this;
    }

    /**
     * Get vrSalarioActual
     *
     * @return float 
     */
    public function getVrSalarioActual()
    {
        return $this->vrSalarioActual;
    }

    /**
     * Set vrSalarioPromedio
     *
     * @param float $vrSalarioPromedio
     * @return RhuVacacion
     */
    public function setVrSalarioPromedio($vrSalarioPromedio)
    {
        $this->vrSalarioPromedio = $vrSalarioPromedio;

        return $this;
    }

    /**
     * Get vrSalarioPromedio
     *
     * @return float 
     */
    public function getVrSalarioPromedio()
    {
        return $this->vrSalarioPromedio;
    }

    /**
     * Set vrVacacionBruto
     *
     * @param float $vrVacacionBruto
     * @return RhuVacacion
     */
    public function setVrVacacionBruto($vrVacacionBruto)
    {
        $this->vrVacacionBruto = $vrVacacionBruto;

        return $this;
    }

    /**
     * Get vrVacacionBruto
     *
     * @return float 
     */
    public function getVrVacacionBruto()
    {
        return $this->vrVacacionBruto;
    }

    /**
     * Set estadoAutorizado
     *
     * @param boolean $estadoAutorizado
     * @return RhuVacacion
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
     * Set centroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCentroCosto $centroCostoRel
     * @return RhuVacacion
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
     * Set empleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadoRel
     * @return RhuVacacion
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
     * Set contratoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratoRel
     * @return RhuVacacion
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
     * Add VacacionesCreditosVacacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacionCredito $vacacionesCreditosVacacionRel
     * @return RhuVacacion
     */
    public function addVacacionesCreditosVacacionRel(\Empleado\FrontEndBundle\Entity\RhuVacacionCredito $vacacionesCreditosVacacionRel)
    {
        $this->VacacionesCreditosVacacionRel[] = $vacacionesCreditosVacacionRel;

        return $this;
    }

    /**
     * Remove VacacionesCreditosVacacionRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuVacacionCredito $vacacionesCreditosVacacionRel
     */
    public function removeVacacionesCreditosVacacionRel(\Empleado\FrontEndBundle\Entity\RhuVacacionCredito $vacacionesCreditosVacacionRel)
    {
        $this->VacacionesCreditosVacacionRel->removeElement($vacacionesCreditosVacacionRel);
    }

    /**
     * Get VacacionesCreditosVacacionRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVacacionesCreditosVacacionRel()
    {
        return $this->VacacionesCreditosVacacionRel;
    }
}
