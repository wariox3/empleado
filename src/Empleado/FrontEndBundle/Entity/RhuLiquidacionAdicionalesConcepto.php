<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_liquidacion_adicionales_concepto")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuLiquidacionAdicionalesConceptoRepository")
 */
class RhuLiquidacionAdicionalesConcepto
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_liquidacion_adicional_concepto_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoLiquidacionAdicionalConceptoPk;    
    
    /**
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */    
    private $nombre;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuLiquidacionAdicionales", mappedBy="liquidacionAdicionalConceptoRel")
     */
    protected $liquidacionesAdicionalesLiquidacionAdicionalConceptoRel;     
        
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liquidacionesAdicionalesLiquidacionAdicionalConceptoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoLiquidacionAdicionalConceptoPk
     *
     * @return integer 
     */
    public function getCodigoLiquidacionAdicionalConceptoPk()
    {
        return $this->codigoLiquidacionAdicionalConceptoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuLiquidacionAdicionalesConcepto
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
     * Add liquidacionesAdicionalesLiquidacionAdicionalConceptoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionAdicionalConceptoRel
     * @return RhuLiquidacionAdicionalesConcepto
     */
    public function addLiquidacionesAdicionalesLiquidacionAdicionalConceptoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionAdicionalConceptoRel)
    {
        $this->liquidacionesAdicionalesLiquidacionAdicionalConceptoRel[] = $liquidacionesAdicionalesLiquidacionAdicionalConceptoRel;

        return $this;
    }

    /**
     * Remove liquidacionesAdicionalesLiquidacionAdicionalConceptoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionAdicionalConceptoRel
     */
    public function removeLiquidacionesAdicionalesLiquidacionAdicionalConceptoRel(\Empleado\FrontEndBundle\Entity\RhuLiquidacionAdicionales $liquidacionesAdicionalesLiquidacionAdicionalConceptoRel)
    {
        $this->liquidacionesAdicionalesLiquidacionAdicionalConceptoRel->removeElement($liquidacionesAdicionalesLiquidacionAdicionalConceptoRel);
    }

    /**
     * Get liquidacionesAdicionalesLiquidacionAdicionalConceptoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionesAdicionalesLiquidacionAdicionalConceptoRel()
    {
        return $this->liquidacionesAdicionalesLiquidacionAdicionalConceptoRel;
    }
}
