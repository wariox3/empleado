<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_contenido_formato")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\GenContenidoFormatoRepository")
 */
class GenContenidoFormato
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_contenido_formato_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoContenidoFormatoPk;
    
    /**
     * @ORM\Column(name="numero_formato", type="integer", nullable=true)
     */    
    private $numero_formato;    

    /**
     * @ORM\Column(name="titulo", type="string", length=300, nullable=true)
     */    
    private $titulo;     
    
    /**
     * @ORM\Column(name="contenido", type="text", nullable=true)
     */    
    private $contenido; 
    
     /**
     * @ORM\OneToMany(targetEntity="Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo", mappedBy="contenidoFormatoRel")
     */
    protected $disciplinariosTiposContenidoFormatoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="Empleado\FrontEndBundle\Entity\RhuCartaTipo", mappedBy="contenidoFormatoRel")
     */
    protected $cartasTiposContenidoFormatoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="Empleado\FrontEndBundle\Entity\RhuContratoTipo", mappedBy="contenidoFormatoRel")
     */
    protected $contratosTiposContenidoFormatoRel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disciplinariosTiposContenidoFormatoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cartasTiposContenidoFormatoRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratosTiposContenidoFormatoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoContenidoFormatoPk
     *
     * @return integer
     */
    public function getCodigoContenidoFormatoPk()
    {
        return $this->codigoContenidoFormatoPk;
    }

    /**
     * Set numeroFormato
     *
     * @param integer $numeroFormato
     *
     * @return GenContenidoFormato
     */
    public function setNumeroFormato($numeroFormato)
    {
        $this->numero_formato = $numeroFormato;

        return $this;
    }

    /**
     * Get numeroFormato
     *
     * @return integer
     */
    public function getNumeroFormato()
    {
        return $this->numero_formato;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return GenContenidoFormato
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     *
     * @return GenContenidoFormato
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Add disciplinariosTiposContenidoFormatoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo $disciplinariosTiposContenidoFormatoRel
     *
     * @return GenContenidoFormato
     */
    public function addDisciplinariosTiposContenidoFormatoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo $disciplinariosTiposContenidoFormatoRel)
    {
        $this->disciplinariosTiposContenidoFormatoRel[] = $disciplinariosTiposContenidoFormatoRel;

        return $this;
    }

    /**
     * Remove disciplinariosTiposContenidoFormatoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo $disciplinariosTiposContenidoFormatoRel
     */
    public function removeDisciplinariosTiposContenidoFormatoRel(\Empleado\FrontEndBundle\Entity\RhuDisciplinarioTipo $disciplinariosTiposContenidoFormatoRel)
    {
        $this->disciplinariosTiposContenidoFormatoRel->removeElement($disciplinariosTiposContenidoFormatoRel);
    }

    /**
     * Get disciplinariosTiposContenidoFormatoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisciplinariosTiposContenidoFormatoRel()
    {
        return $this->disciplinariosTiposContenidoFormatoRel;
    }

    /**
     * Add cartasTiposContenidoFormatoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCartaTipo $cartasTiposContenidoFormatoRel
     *
     * @return GenContenidoFormato
     */
    public function addCartasTiposContenidoFormatoRel(\Empleado\FrontEndBundle\Entity\RhuCartaTipo $cartasTiposContenidoFormatoRel)
    {
        $this->cartasTiposContenidoFormatoRel[] = $cartasTiposContenidoFormatoRel;

        return $this;
    }

    /**
     * Remove cartasTiposContenidoFormatoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuCartaTipo $cartasTiposContenidoFormatoRel
     */
    public function removeCartasTiposContenidoFormatoRel(\Empleado\FrontEndBundle\Entity\RhuCartaTipo $cartasTiposContenidoFormatoRel)
    {
        $this->cartasTiposContenidoFormatoRel->removeElement($cartasTiposContenidoFormatoRel);
    }

    /**
     * Get cartasTiposContenidoFormatoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCartasTiposContenidoFormatoRel()
    {
        return $this->cartasTiposContenidoFormatoRel;
    }

    /**
     * Add contratosTiposContenidoFormatoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContratoTipo $contratosTiposContenidoFormatoRel
     *
     * @return GenContenidoFormato
     */
    public function addContratosTiposContenidoFormatoRel(\Empleado\FrontEndBundle\Entity\RhuContratoTipo $contratosTiposContenidoFormatoRel)
    {
        $this->contratosTiposContenidoFormatoRel[] = $contratosTiposContenidoFormatoRel;

        return $this;
    }

    /**
     * Remove contratosTiposContenidoFormatoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\RhuContratoTipo $contratosTiposContenidoFormatoRel
     */
    public function removeContratosTiposContenidoFormatoRel(\Empleado\FrontEndBundle\Entity\RhuContratoTipo $contratosTiposContenidoFormatoRel)
    {
        $this->contratosTiposContenidoFormatoRel->removeElement($contratosTiposContenidoFormatoRel);
    }

    /**
     * Get contratosTiposContenidoFormatoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratosTiposContenidoFormatoRel()
    {
        return $this->contratosTiposContenidoFormatoRel;
    }
}
