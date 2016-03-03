<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tur_recurso_tipo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\TurRecursoTipoRepository")
 */
class TurRecursoTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_recurso_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoRecursoTipoPk;               
    
    /**
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */    
    private $nombre;             
    
    /**
     * @ORM\OneToMany(targetEntity="TurRecurso", mappedBy="recursoTipoRel")
     */
    protected $recursosRecursoTipoRel; 


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recursosRecursoTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoRecursoTipoPk
     *
     * @return integer 
     */
    public function getCodigoRecursoTipoPk()
    {
        return $this->codigoRecursoTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return TurRecursoTipo
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
     * Add recursosRecursoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurRecurso $recursosRecursoTipoRel
     * @return TurRecursoTipo
     */
    public function addRecursosRecursoTipoRel(\Empleado\FrontEndBundle\Entity\TurRecurso $recursosRecursoTipoRel)
    {
        $this->recursosRecursoTipoRel[] = $recursosRecursoTipoRel;

        return $this;
    }

    /**
     * Remove recursosRecursoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurRecurso $recursosRecursoTipoRel
     */
    public function removeRecursosRecursoTipoRel(\Empleado\FrontEndBundle\Entity\TurRecurso $recursosRecursoTipoRel)
    {
        $this->recursosRecursoTipoRel->removeElement($recursosRecursoTipoRel);
    }

    /**
     * Get recursosRecursoTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecursosRecursoTipoRel()
    {
        return $this->recursosRecursoTipoRel;
    }
}
