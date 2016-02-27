<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_disciplinario")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuDisciplinarioRepository")
 */
class RhuDisciplinario
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_disciplinario_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoDisciplinarioPk;        
    
    /**
     * @ORM\Column(name="codigo_disciplinario_tipo_fk", type="integer")
     */    
    private $codigoDisciplinarioTipoFk; 
    
    
    /**
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */    
    private $fecha;         
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer")
     */    
    private $codigoEmpleadoFk;             
    
    /**
     * @ORM\Column(name="asunto", type="string", length=500, nullable=true)
     */    
    private $asunto;     
    
    /**
     * @ORM\Column(name="comentarios", type="text", nullable=true)
     */    
    private $comentarios;
    
    /**
     * @ORM\Column(name="suspension", type="string", length=200, nullable=true)
     */    
    private $suspension;
    
    /**
     * @ORM\Column(name="descargos", type="text", nullable=true)
     */    
    private $descargos;
    
    /**     
     * @ORM\Column(name="estado_autorizado", type="boolean")
     */    
    private $estadoAutorizado = 0;
    
    /**
     * @ORM\Column(name="codigo_centro_costo_fk", type="integer")
     */    
    private $codigoCentroCostoFk;
    
    /**
     * @ORM\Column(name="codigo_usuario", type="string", length=50, nullable=true)
     */    
    private $codigoUsuario;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuEmpleado", inversedBy="disciplinariosEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;         

    /**
     * @ORM\ManyToOne(targetEntity="RhuDisciplinarioTipo", inversedBy="disciplinariosDisciplinarioTipoRel")
     * @ORM\JoinColumn(name="codigo_disciplinario_tipo_fk", referencedColumnName="codigo_disciplinario_tipo_pk")
     */
    protected $disciplinarioTipoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuCentroCosto", inversedBy="disciplinariosCentroCostoRel")
     * @ORM\JoinColumn(name="codigo_centro_costo_fk", referencedColumnName="codigo_centro_costo_pk")
     */
    protected $centroCostoRel;




    /**
     * Get codigoDisciplinarioPk
     *
     * @return integer
     */
    public function getCodigoDisciplinarioPk()
    {
        return $this->codigoDisciplinarioPk;
    }

    /**
     * Set codigoDisciplinarioTipoFk
     *
     * @param integer $codigoDisciplinarioTipoFk
     *
     * @return RhuDisciplinario
     */
    public function setCodigoDisciplinarioTipoFk($codigoDisciplinarioTipoFk)
    {
        $this->codigoDisciplinarioTipoFk = $codigoDisciplinarioTipoFk;

        return $this;
    }

    /**
     * Get codigoDisciplinarioTipoFk
     *
     * @return integer
     */
    public function getCodigoDisciplinarioTipoFk()
    {
        return $this->codigoDisciplinarioTipoFk;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return RhuDisciplinario
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
     *
     * @return RhuDisciplinario
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
     * Set asunto
     *
     * @param string $asunto
     *
     * @return RhuDisciplinario
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get asunto
     *
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     *
     * @return RhuDisciplinario
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
     * Set suspension
     *
     * @param string $suspension
     *
     * @return RhuDisciplinario
     */
    public function setSuspension($suspension)
    {
        $this->suspension = $suspension;

        return $this;
    }

    /**
     * Get suspension
     *
     * @return string
     */
    public function getSuspension()
    {
        return $this->suspension;
    }

    /**
     * Set descargos
     *
     * @param string $descargos
     *
     * @return RhuDisciplinario
     */
    public function setDescargos($descargos)
    {
        $this->descargos = $descargos;

        return $this;
    }

    /**
     * Get descargos
     *
     * @return string
     */
    public function getDescargos()
    {
        return $this->descargos;
    }

    /**
     * Set estadoAutorizado
     *
     * @param boolean $estadoAutorizado
     *
     * @return RhuDisciplinario
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
     * Set codigoCentroCostoFk
     *
     * @param integer $codigoCentroCostoFk
     *
     * @return RhuDisciplinario
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
     * Set empleadoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadoRel
     *
     * @return RhuDisciplinario
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
     * Set disciplinarioTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo $disciplinarioTipoRel
     *
     * @return RhuDisciplinario
     */
    public function setDisciplinarioTipoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo $disciplinarioTipoRel = null)
    {
        $this->disciplinarioTipoRel = $disciplinarioTipoRel;

        return $this;
    }

    /**
     * Get disciplinarioTipoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo
     */
    public function getDisciplinarioTipoRel()
    {
        return $this->disciplinarioTipoRel;
    }

    /**
     * Set centroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCentroCosto $centroCostoRel
     *
     * @return RhuDisciplinario
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
     * Set codigoUsuario
     *
     * @param string $codigoUsuario
     *
     * @return RhuDisciplinario
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
}
