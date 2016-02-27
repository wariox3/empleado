<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_carta_tipo")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuCartaTipoRepository")
 */
class RhuCartaTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_carta_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCartaTipoPk;        
    
    /**
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */    
    private $nombre;
    
    /**     
     * @ORM\Column(name="especial", type="boolean")
     */    
    private $especial = 0;
    
    /**
     * @ORM\Column(name="codigo_contenido_formato_fk", type="integer", nullable=true)
     */    
    private $codigoContenidoFormatoFk;
    
       

       
    /**
     * @ORM\ManyToOne(targetEntity="Empleado\FrontEndBundle\Entity\GenContenidoFormato", inversedBy="cartasTiposContenidoFormatoRel")
     * @ORM\JoinColumn(name="codigo_contenido_formato_fk", referencedColumnName="codigo_contenido_formato_pk")
     */
    protected $contenidoFormatoRel;
    

    /**
     * Get codigoCartaTipoPk
     *
     * @return integer 
     */
    public function getCodigoCartaTipoPk()
    {
        return $this->codigoCartaTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return RhuCartaTipo
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
     * Set especial
     *
     * @param boolean $especial
     * @return RhuCartaTipo
     */
    public function setEspecial($especial)
    {
        $this->especial = $especial;

        return $this;
    }

    /**
     * Get especial
     *
     * @return boolean 
     */
    public function getEspecial()
    {
        return $this->especial;
    }

    /**
     * Set codigoContenidoFormatoFk
     *
     * @param integer $codigoContenidoFormatoFk
     * @return RhuCartaTipo
     */
    public function setCodigoContenidoFormatoFk($codigoContenidoFormatoFk)
    {
        $this->codigoContenidoFormatoFk = $codigoContenidoFormatoFk;

        return $this;
    }

    /**
     * Get codigoContenidoFormatoFk
     *
     * @return integer 
     */
    public function getCodigoContenidoFormatoFk()
    {
        return $this->codigoContenidoFormatoFk;
    }

    /**
     * Set contenidoFormatoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\GenContenidoFormato $contenidoFormatoRel
     * @return RhuCartaTipo
     */
    public function setContenidoFormatoRel(\Empleado\FrontEndBundle\Entity\GenContenidoFormato $contenidoFormatoRel = null)
    {
        $this->contenidoFormatoRel = $contenidoFormatoRel;

        return $this;
    }

    /**
     * Get contenidoFormatoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\GenContenidoFormato 
     */
    public function getContenidoFormatoRel()
    {
        return $this->contenidoFormatoRel;
    }
}
