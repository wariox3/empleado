<?php

namespace Empleado\FrontEndBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_ciudad")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\GenCiudadRepository")
 */
class GenCiudad
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_ciudad_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCiudadPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=50)
     * @Assert\NotNull()(message="Debe escribir un nombre")
     */
    private $nombre;
   
    /**
     * @ORM\Column(name="codigo_departamento_fk", type="integer")
     */
    private $codigoDepartamentoFk;     

    /**
     * @ORM\Column(name="codigo_ruta_predeterminada_fk", type="integer", nullable=true)
     */
    private $codigoRutaPredeterminadaFk;    
    
    /**
     * @ORM\Column(name="codigo_interface", type="string", length=15)
     */
    private $codigoInterface;    

    /**
     * @ORM\Column(name="codigo_dane", type="string", length=3)
     */
    private $codigoDane;     
    
    /**
     * @ORM\ManyToOne(targetEntity="GenDepartamento", inversedBy="ciudadesRel")
     * @ORM\JoinColumn(name="codigo_departamento_fk", referencedColumnName="codigo_departamento_pk")
     */
    protected $departamentoRel;    
    
    /**
     * @ORM\OneToMany(targetEntity="GenConfiguracion", mappedBy="ciudadRel")
     */
    protected $configuracionesRel;
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->configuracionesRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoCiudadPk
     *
     * @return integer 
     */
    public function getCodigoCiudadPk()
    {
        return $this->codigoCiudadPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return GenCiudad
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
     * Set codigoDepartamentoFk
     *
     * @param integer $codigoDepartamentoFk
     * @return GenCiudad
     */
    public function setCodigoDepartamentoFk($codigoDepartamentoFk)
    {
        $this->codigoDepartamentoFk = $codigoDepartamentoFk;

        return $this;
    }

    /**
     * Get codigoDepartamentoFk
     *
     * @return integer 
     */
    public function getCodigoDepartamentoFk()
    {
        return $this->codigoDepartamentoFk;
    }

    /**
     * Set codigoRutaPredeterminadaFk
     *
     * @param integer $codigoRutaPredeterminadaFk
     * @return GenCiudad
     */
    public function setCodigoRutaPredeterminadaFk($codigoRutaPredeterminadaFk)
    {
        $this->codigoRutaPredeterminadaFk = $codigoRutaPredeterminadaFk;

        return $this;
    }

    /**
     * Get codigoRutaPredeterminadaFk
     *
     * @return integer 
     */
    public function getCodigoRutaPredeterminadaFk()
    {
        return $this->codigoRutaPredeterminadaFk;
    }

    /**
     * Set codigoInterface
     *
     * @param string $codigoInterface
     * @return GenCiudad
     */
    public function setCodigoInterface($codigoInterface)
    {
        $this->codigoInterface = $codigoInterface;

        return $this;
    }

    /**
     * Get codigoInterface
     *
     * @return string 
     */
    public function getCodigoInterface()
    {
        return $this->codigoInterface;
    }

    /**
     * Set codigoDane
     *
     * @param string $codigoDane
     * @return GenCiudad
     */
    public function setCodigoDane($codigoDane)
    {
        $this->codigoDane = $codigoDane;

        return $this;
    }

    /**
     * Get codigoDane
     *
     * @return string 
     */
    public function getCodigoDane()
    {
        return $this->codigoDane;
    }

    /**
     * Set departamentoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\GenDepartamento $departamentoRel
     * @return GenCiudad
     */
    public function setDepartamentoRel(\Empleado\FrontEndBundle\Entity\GenDepartamento $departamentoRel = null)
    {
        $this->departamentoRel = $departamentoRel;

        return $this;
    }

    /**
     * Get departamentoRel
     *
     * @return \Empleado\FrontEndBundle\Entity\GenDepartamento 
     */
    public function getDepartamentoRel()
    {
        return $this->departamentoRel;
    }

    /**
     * Add configuracionesRel
     *
     * @param \Empleado\FrontEndBundle\Entity\GenConfiguracion $configuracionesRel
     * @return GenCiudad
     */
    public function addConfiguracionesRel(\Empleado\FrontEndBundle\Entity\GenConfiguracion $configuracionesRel)
    {
        $this->configuracionesRel[] = $configuracionesRel;

        return $this;
    }

    /**
     * Remove configuracionesRel
     *
     * @param \Empleado\FrontEndBundle\Entity\GenConfiguracion $configuracionesRel
     */
    public function removeConfiguracionesRel(\Empleado\FrontEndBundle\Entity\GenConfiguracion $configuracionesRel)
    {
        $this->configuracionesRel->removeElement($configuracionesRel);
    }

    /**
     * Get configuracionesRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConfiguracionesRel()
    {
        return $this->configuracionesRel;
    }
}
