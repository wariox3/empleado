<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_incapacidad_tipo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuIncapacidadTipoRepository")
 */
class RhuIncapacidadTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_incapacidad_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoIncapacidadTipoPk;                              
    
    /**
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */    
    private $nombre;     

    /**
     * @ORM\Column(name="codigo_pago_concepto_fk", type="integer")
     */    
    private $codigoPagoConceptoFk;     
    
    /**
     * @ORM\ManyToOne(targetEntity="RhuPagoConcepto", inversedBy="incapacidadesTiposPagoConceptoRel")
     * @ORM\JoinColumn(name="codigo_pago_concepto_fk", referencedColumnName="codigo_pago_concepto_pk")
     */
    protected $pagoConceptoRel;     
    
    /**
     * @ORM\OneToMany(targetEntity="RhuIncapacidad", mappedBy="incapacidadTipoRel")
     */
    protected $incapacidadesIncapacidadTipoRel; 
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->incapacidadesIncapacidadTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoIncapacidadTipoPk
     *
     * @return integer 
     */
    public function getCodigoIncapacidadTipoPk()
    {
        return $this->codigoIncapacidadTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuIncapacidadTipo
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
     * Set codigoPagoConceptoFk
     *
     * @param integer $codigoPagoConceptoFk
     * @return RhuIncapacidadTipo
     */
    public function setCodigoPagoConceptoFk($codigoPagoConceptoFk)
    {
        $this->codigoPagoConceptoFk = $codigoPagoConceptoFk;

        return $this;
    }

    /**
     * Get codigoPagoConceptoFk
     *
     * @return integer 
     */
    public function getCodigoPagoConceptoFk()
    {
        return $this->codigoPagoConceptoFk;
    }

    /**
     * Set pagoConceptoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPagoConcepto $pagoConceptoRel
     * @return RhuIncapacidadTipo
     */
    public function setPagoConceptoRel(\Empleado\FrontEndBundle\Entity\RhuPagoConcepto $pagoConceptoRel = null)
    {
        $this->pagoConceptoRel = $pagoConceptoRel;

        return $this;
    }

    /**
     * Get pagoConceptoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\RhuPagoConcepto 
     */
    public function getPagoConceptoRel()
    {
        return $this->pagoConceptoRel;
    }

    /**
     * Add incapacidadesIncapacidadTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesIncapacidadTipoRel
     * @return RhuIncapacidadTipo
     */
    public function addIncapacidadesIncapacidadTipoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesIncapacidadTipoRel)
    {
        $this->incapacidadesIncapacidadTipoRel[] = $incapacidadesIncapacidadTipoRel;

        return $this;
    }

    /**
     * Remove incapacidadesIncapacidadTipoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesIncapacidadTipoRel
     */
    public function removeIncapacidadesIncapacidadTipoRel(\Empleado\FrontEndBundle\Entity\RhuIncapacidad $incapacidadesIncapacidadTipoRel)
    {
        $this->incapacidadesIncapacidadTipoRel->removeElement($incapacidadesIncapacidadTipoRel);
    }

    /**
     * Get incapacidadesIncapacidadTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIncapacidadesIncapacidadTipoRel()
    {
        return $this->incapacidadesIncapacidadTipoRel;
    }
}
