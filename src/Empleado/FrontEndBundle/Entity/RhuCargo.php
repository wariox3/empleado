<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_cargo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuCargoRepository")
 */
class RhuCargo
{
     /**
     * @ORM\Id
     * @ORM\Column(name="codigo_cargo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCargoPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */    
    private $nombre;          
    
    /**
     * @ORM\OneToMany(targetEntity="RhuContrato", mappedBy="cargoRel")
     */
    protected $contratosCargoRel;    

    /**
     * @ORM\OneToMany(targetEntity="RhuEmpleado", mappedBy="cargoRel")
     */
    protected $empleadosCargoRel;   
    
    /**
     * @ORM\OneToMany(targetEntity="RhuDisciplinario", mappedBy="cargoRel")
     */
    protected $disciplianriosCargoRel;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratosCargoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->empleadosCargoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoCargoPk
     *
     * @return integer 
     */
    public function getCodigoCargoPk()
    {
        return $this->codigoCargoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuCargo
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
     * Add contratosCargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosCargoRel
     * @return RhuCargo
     */
    public function addContratosCargoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosCargoRel)
    {
        $this->contratosCargoRel[] = $contratosCargoRel;

        return $this;
    }

    /**
     * Remove contratosCargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosCargoRel
     */
    public function removeContratosCargoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosCargoRel)
    {
        $this->contratosCargoRel->removeElement($contratosCargoRel);
    }

    /**
     * Get contratosCargoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContratosCargoRel()
    {
        return $this->contratosCargoRel;
    }

    /**
     * Add empleadosCargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadosCargoRel
     * @return RhuCargo
     */
    public function addEmpleadosCargoRel(\Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadosCargoRel)
    {
        $this->empleadosCargoRel[] = $empleadosCargoRel;

        return $this;
    }

    /**
     * Remove empleadosCargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadosCargoRel
     */
    public function removeEmpleadosCargoRel(\Empleado\FrontEndBundle\Entity\RhuEmpleado $empleadosCargoRel)
    {
        $this->empleadosCargoRel->removeElement($empleadosCargoRel);
    }

    /**
     * Get empleadosCargoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmpleadosCargoRel()
    {
        return $this->empleadosCargoRel;
    }

    /**
     * Add disciplianriosCargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplianriosCargoRel
     * @return RhuCargo
     */
    public function addDisciplianriosCargoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplianriosCargoRel)
    {
        $this->disciplianriosCargoRel[] = $disciplianriosCargoRel;

        return $this;
    }

    /**
     * Remove disciplianriosCargoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplianriosCargoRel
     */
    public function removeDisciplianriosCargoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplianriosCargoRel)
    {
        $this->disciplianriosCargoRel->removeElement($disciplianriosCargoRel);
    }

    /**
     * Get disciplianriosCargoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisciplianriosCargoRel()
    {
        return $this->disciplianriosCargoRel;
    }
}
