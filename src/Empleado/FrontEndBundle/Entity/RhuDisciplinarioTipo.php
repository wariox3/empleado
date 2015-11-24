<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_disciplinario_tipo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuDisciplinarioTipoRepository")
 */
class RhuDisciplinarioTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_disciplinario_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoDisciplinarioTipoPk;        
    
    /**
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */    
    private $nombre; 
       
    /**
     * @ORM\OneToMany(targetEntity="RhuDisciplinario", mappedBy="disciplinarioTipoRel")
     */
    protected $disciplinariosDisciplinarioTipoRel;    


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disciplinariosDisciplinarioTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoDisciplinarioTipoPk
     *
     * @return integer 
     */
    public function getCodigoDisciplinarioTipoPk()
    {
        return $this->codigoDisciplinarioTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuDisciplinarioTipo
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
     * Add disciplinariosDisciplinarioTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioTipoRel
     * @return RhuDisciplinarioTipo
     */
    public function addDisciplinariosDisciplinarioTipoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioTipoRel)
    {
        $this->disciplinariosDisciplinarioTipoRel[] = $disciplinariosDisciplinarioTipoRel;

        return $this;
    }

    /**
     * Remove disciplinariosDisciplinarioTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioTipoRel
     */
    public function removeDisciplinariosDisciplinarioTipoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinario $disciplinariosDisciplinarioTipoRel)
    {
        $this->disciplinariosDisciplinarioTipoRel->removeElement($disciplinariosDisciplinarioTipoRel);
    }

    /**
     * Get disciplinariosDisciplinarioTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisciplinariosDisciplinarioTipoRel()
    {
        return $this->disciplinariosDisciplinarioTipoRel;
    }
}
