<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_credito_tipo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuCreditoTipoRepository")
 */
class RhuCreditoTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_credito_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCreditoTipoPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */    
    private $nombre;
    
    /**
     * @ORM\Column(name="cupo_maximo", type="integer", nullable=true)
     */    
    private $cupoMaximo;
    
    /**
     * @ORM\OneToMany(targetEntity="RhuCredito", mappedBy="creditoTipoRel")
     */
    protected $creditosCreditoTipoRel;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creditosCreditoTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoCreditoTipoPk
     *
     * @return integer 
     */
    public function getCodigoCreditoTipoPk()
    {
        return $this->codigoCreditoTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuCreditoTipo
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
     * Set cupoMaximo
     *
     * @param integer $cupoMaximo
     * @return RhuCreditoTipo
     */
    public function setCupoMaximo($cupoMaximo)
    {
        $this->cupoMaximo = $cupoMaximo;

        return $this;
    }

    /**
     * Get cupoMaximo
     *
     * @return integer 
     */
    public function getCupoMaximo()
    {
        return $this->cupoMaximo;
    }

    /**
     * Add creditosCreditoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCredito $creditosCreditoTipoRel
     * @return RhuCreditoTipo
     */
    public function addCreditosCreditoTipoRel(\Empleado\FrontEndBundle\Entity\RhuCredito $creditosCreditoTipoRel)
    {
        $this->creditosCreditoTipoRel[] = $creditosCreditoTipoRel;

        return $this;
    }

    /**
     * Remove creditosCreditoTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCredito $creditosCreditoTipoRel
     */
    public function removeCreditosCreditoTipoRel(\Empleado\FrontEndBundle\Entity\RhuCredito $creditosCreditoTipoRel)
    {
        $this->creditosCreditoTipoRel->removeElement($creditosCreditoTipoRel);
    }

    /**
     * Get creditosCreditoTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreditosCreditoTipoRel()
    {
        return $this->creditosCreditoTipoRel;
    }
}
