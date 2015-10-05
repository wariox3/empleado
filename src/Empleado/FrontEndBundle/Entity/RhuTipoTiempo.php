<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_tipo_tiempo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuTipoTiempoRepository")
 */
class RhuTipoTiempo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_tipo_tiempo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoTipoTiempoPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */    
    private $nombre;      

    /**
     * @ORM\Column(name="factor", type="integer", nullable=true)
     */    
    private $factor = 0;    
    
    /**
     * @ORM\Column(name="factor_horas_dia", type="integer", nullable=true)
     */    
    private $factorHorasDia = 8;     
    
    /**
     * @ORM\OneToMany(targetEntity="RhuContrato", mappedBy="tipoTiempoRel")
     */
    protected $contratosTipoTiempoRel;         
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratosTipoTiempoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoTipoTiempoPk
     *
     * @return integer 
     */
    public function getCodigoTipoTiempoPk()
    {
        return $this->codigoTipoTiempoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuTipoTiempo
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
     * Set factor
     *
     * @param integer $factor
     * @return RhuTipoTiempo
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;

        return $this;
    }

    /**
     * Get factor
     *
     * @return integer 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set factorHorasDia
     *
     * @param integer $factorHorasDia
     * @return RhuTipoTiempo
     */
    public function setFactorHorasDia($factorHorasDia)
    {
        $this->factorHorasDia = $factorHorasDia;

        return $this;
    }

    /**
     * Get factorHorasDia
     *
     * @return integer 
     */
    public function getFactorHorasDia()
    {
        return $this->factorHorasDia;
    }

    /**
     * Add contratosTipoTiempoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosTipoTiempoRel
     * @return RhuTipoTiempo
     */
    public function addContratosTipoTiempoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosTipoTiempoRel)
    {
        $this->contratosTipoTiempoRel[] = $contratosTipoTiempoRel;

        return $this;
    }

    /**
     * Remove contratosTipoTiempoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContrato $contratosTipoTiempoRel
     */
    public function removeContratosTipoTiempoRel(\Empleado\FrontEndBundle\Entity\RhuContrato $contratosTipoTiempoRel)
    {
        $this->contratosTipoTiempoRel->removeElement($contratosTipoTiempoRel);
    }

    /**
     * Get contratosTipoTiempoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContratosTipoTiempoRel()
    {
        return $this->contratosTipoTiempoRel;
    }
}
