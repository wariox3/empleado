<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_disciplinario_motivo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuDisciplinarioMotivoRepository")
 */
class RhuDisciplinarioMotivo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_disciplinario_motivo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoDisciplinarioMotivoPk;        
    
    /**
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */    
    private $nombre;    
    
    /**
     * @ORM\OneToMany(targetEntity="RhuDisciplinario", mappedBy="disciplinarioMotivoRel")
     */
    protected $disciplinariosDisciplinarioMotivoRel;      

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disciplinariosDisciplinarioMotivoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoDisciplinarioMotivoPk
     *
     * @return integer 
     */
    public function getCodigoDisciplinarioMotivoPk()
    {
        return $this->codigoDisciplinarioMotivoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuDisciplinarioMotivo
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
     * Add disciplinariosDisciplinarioMotivoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioMotivoRel
     * @return RhuDisciplinarioMotivo
     */
    public function addDisciplinariosDisciplinarioMotivoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioMotivoRel)
    {
        $this->disciplinariosDisciplinarioMotivoRel[] = $disciplinariosDisciplinarioMotivoRel;

        return $this;
    }

    /**
     * Remove disciplinariosDisciplinarioMotivoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioMotivoRel
     */
    public function removeDisciplinariosDisciplinarioMotivoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioMotivoRel)
    {
        $this->disciplinariosDisciplinarioMotivoRel->removeElement($disciplinariosDisciplinarioMotivoRel);
    }

    /**
     * Get disciplinariosDisciplinarioMotivoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisciplinariosDisciplinarioMotivoRel()
    {
        return $this->disciplinariosDisciplinarioMotivoRel;
    }
}
