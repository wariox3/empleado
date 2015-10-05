<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_contrato_tipo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuContratoTipoRepository")
 */
class RhuContratoTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_contrato_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoContratoTipoPk;        
    
    /**
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */    
    private $nombre;  
    
    /**
     * @ORM\OneToMany(targetEntity="RhuContrato", mappedBy="contratoTipoRel")
     */
    protected $contratosContratoTipoRel;    

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratosContratoTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoContratoTipoPk
     *
     * @return integer 
     */
    public function getCodigoContratoTipoPk()
    {
        return $this->codigoContratoTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuContratoTipo
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
     * Add contratosContratoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosContratoTipoRel
     * @return RhuContratoTipo
     */
    public function addContratosContratoTipoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosContratoTipoRel)
    {
        $this->contratosContratoTipoRel[] = $contratosContratoTipoRel;

        return $this;
    }

    /**
     * Remove contratosContratoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosContratoTipoRel
     */
    public function removeContratosContratoTipoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosContratoTipoRel)
    {
        $this->contratosContratoTipoRel->removeElement($contratosContratoTipoRel);
    }

    /**
     * Get contratosContratoTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContratosContratoTipoRel()
    {
        return $this->contratosContratoTipoRel;
    }
}
