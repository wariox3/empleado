<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_pago_concepto")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuPagoConceptoRepository")
 */
class RhuPagoConcepto
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_concepto_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoConceptoPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */    
    private $nombre;            
    
    /**
     * @ORM\Column(name="compone_salario", type="boolean")
     */    
    private $componeSalario = 0; 

    /**
     * @ORM\Column(name="compone_porcentaje", type="boolean")
     */    
    private $componePorcentaje = 0;     

    /**
     * @ORM\Column(name="compone_valor", type="boolean")
     */    
    private $componeValor = 0;     
    
    /**
     * @ORM\Column(name="por_porcentaje", type="float")
     */
    private $porPorcentaje = 0;     
    
    /**
     * @ORM\Column(name="prestacional", type="boolean")
     */    
    private $prestacional = 0;     
    
    /**
     * @ORM\Column(name="operacion", type="integer")
     */
    private $operacion = 0;            
    
    /**
     * @ORM\Column(name="concepto_adicion", type="boolean")
     */    
    private $conceptoAdicion = 0;     
    
    /**
     * @ORM\Column(name="concepto_auxilio_transporte", type="boolean")
     */    
    private $conceptoAuxilioTransporte = 0;     
    
    /**
     * @ORM\Column(name="concepto_incapacidad", type="boolean")
     */    
    private $conceptoIncapacidad = 0;     
    
    /**
     * @ORM\OneToMany(targetEntity="RhuPagoDetalle", mappedBy="pagoConceptoRel")
     */
    protected $pagosDetallesPagoConceptoRel;     
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosDetallesPagoConceptoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoPagoConceptoPk
     *
     * @return integer 
     */
    public function getCodigoPagoConceptoPk()
    {
        return $this->codigoPagoConceptoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuPagoConcepto
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
     * Set componeSalario
     *
     * @param boolean $componeSalario
     * @return RhuPagoConcepto
     */
    public function setComponeSalario($componeSalario)
    {
        $this->componeSalario = $componeSalario;

        return $this;
    }

    /**
     * Get componeSalario
     *
     * @return boolean 
     */
    public function getComponeSalario()
    {
        return $this->componeSalario;
    }

    /**
     * Set componePorcentaje
     *
     * @param boolean $componePorcentaje
     * @return RhuPagoConcepto
     */
    public function setComponePorcentaje($componePorcentaje)
    {
        $this->componePorcentaje = $componePorcentaje;

        return $this;
    }

    /**
     * Get componePorcentaje
     *
     * @return boolean 
     */
    public function getComponePorcentaje()
    {
        return $this->componePorcentaje;
    }

    /**
     * Set componeValor
     *
     * @param boolean $componeValor
     * @return RhuPagoConcepto
     */
    public function setComponeValor($componeValor)
    {
        $this->componeValor = $componeValor;

        return $this;
    }

    /**
     * Get componeValor
     *
     * @return boolean 
     */
    public function getComponeValor()
    {
        return $this->componeValor;
    }

    /**
     * Set porPorcentaje
     *
     * @param float $porPorcentaje
     * @return RhuPagoConcepto
     */
    public function setPorPorcentaje($porPorcentaje)
    {
        $this->porPorcentaje = $porPorcentaje;

        return $this;
    }

    /**
     * Get porPorcentaje
     *
     * @return float 
     */
    public function getPorPorcentaje()
    {
        return $this->porPorcentaje;
    }

    /**
     * Set prestacional
     *
     * @param boolean $prestacional
     * @return RhuPagoConcepto
     */
    public function setPrestacional($prestacional)
    {
        $this->prestacional = $prestacional;

        return $this;
    }

    /**
     * Get prestacional
     *
     * @return boolean 
     */
    public function getPrestacional()
    {
        return $this->prestacional;
    }

    /**
     * Set operacion
     *
     * @param integer $operacion
     * @return RhuPagoConcepto
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;

        return $this;
    }

    /**
     * Get operacion
     *
     * @return integer 
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set conceptoAdicion
     *
     * @param boolean $conceptoAdicion
     * @return RhuPagoConcepto
     */
    public function setConceptoAdicion($conceptoAdicion)
    {
        $this->conceptoAdicion = $conceptoAdicion;

        return $this;
    }

    /**
     * Get conceptoAdicion
     *
     * @return boolean 
     */
    public function getConceptoAdicion()
    {
        return $this->conceptoAdicion;
    }

    /**
     * Set conceptoAuxilioTransporte
     *
     * @param boolean $conceptoAuxilioTransporte
     * @return RhuPagoConcepto
     */
    public function setConceptoAuxilioTransporte($conceptoAuxilioTransporte)
    {
        $this->conceptoAuxilioTransporte = $conceptoAuxilioTransporte;

        return $this;
    }

    /**
     * Get conceptoAuxilioTransporte
     *
     * @return boolean 
     */
    public function getConceptoAuxilioTransporte()
    {
        return $this->conceptoAuxilioTransporte;
    }

    /**
     * Set conceptoIncapacidad
     *
     * @param boolean $conceptoIncapacidad
     * @return RhuPagoConcepto
     */
    public function setConceptoIncapacidad($conceptoIncapacidad)
    {
        $this->conceptoIncapacidad = $conceptoIncapacidad;

        return $this;
    }

    /**
     * Get conceptoIncapacidad
     *
     * @return boolean 
     */
    public function getConceptoIncapacidad()
    {
        return $this->conceptoIncapacidad;
    }

    /**
     * Add pagosDetallesPagoConceptoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesPagoConceptoRel
     * @return RhuPagoConcepto
     */
    public function addPagosDetallesPagoConceptoRel(\Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesPagoConceptoRel)
    {
        $this->pagosDetallesPagoConceptoRel[] = $pagosDetallesPagoConceptoRel;

        return $this;
    }

    /**
     * Remove pagosDetallesPagoConceptoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesPagoConceptoRel
     */
    public function removePagosDetallesPagoConceptoRel(\Empleado\FrontEndBundle\Entity\RhuPagoDetalle $pagosDetallesPagoConceptoRel)
    {
        $this->pagosDetallesPagoConceptoRel->removeElement($pagosDetallesPagoConceptoRel);
    }

    /**
     * Get pagosDetallesPagoConceptoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagosDetallesPagoConceptoRel()
    {
        return $this->pagosDetallesPagoConceptoRel;
    }
}
