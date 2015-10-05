<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_pago_tipo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuPagoTipoRepository")
 */
class RhuPagoTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoTipoPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=50)
     */         
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="RhuPago", mappedBy="pagoTipoRel")
     */
    protected $pagosPagoTipoRel;     
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosPagoTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoPagoTipoPk
     *
     * @return integer 
     */
    public function getCodigoPagoTipoPk()
    {
        return $this->codigoPagoTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuPagoTipo
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
     * Add pagosPagoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosPagoTipoRel
     * @return RhuPagoTipo
     */
    public function addPagosPagoTipoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosPagoTipoRel)
    {
        $this->pagosPagoTipoRel[] = $pagosPagoTipoRel;

        return $this;
    }

    /**
     * Remove pagosPagoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPago $pagosPagoTipoRel
     */
    public function removePagosPagoTipoRel(\Empleado\FrontEndBundle\Entity\RhuPago $pagosPagoTipoRel)
    {
        $this->pagosPagoTipoRel->removeElement($pagosPagoTipoRel);
    }

    /**
     * Get pagosPagoTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagosPagoTipoRel()
    {
        return $this->pagosPagoTipoRel;
    }
}
