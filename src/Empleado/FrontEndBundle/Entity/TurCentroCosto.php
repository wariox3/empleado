<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tur_centro_costo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\TurCentroCostoRepository")
 */
class TurCentroCosto
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_centro_costo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCentroCostoPk;                    
    
    /**
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;                         
    
    /**
     * @ORM\OneToMany(targetEntity="TurRecurso", mappedBy="centroCostoRel")
     */
    protected $recursosCentroCostoRel; 
   
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recursosCentroCostoRel = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return TurCentroCosto
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
     * Add recursosCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurRecurso $recursosCentroCostoRel
     * @return TurCentroCosto
     */
    public function addRecursosCentroCostoRel(\Empleado\FrontEndBundle\Entity\TurRecurso $recursosCentroCostoRel)
    {
        $this->recursosCentroCostoRel[] = $recursosCentroCostoRel;

        return $this;
    }

    /**
     * Remove recursosCentroCostoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurRecurso $recursosCentroCostoRel
     */
    public function removeRecursosCentroCostoRel(\Empleado\FrontEndBundle\Entity\TurRecurso $recursosCentroCostoRel)
    {
        $this->recursosCentroCostoRel->removeElement($recursosCentroCostoRel);
    }

    /**
     * Get recursosCentroCostoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecursosCentroCostoRel()
    {
        return $this->recursosCentroCostoRel;
    }
}
