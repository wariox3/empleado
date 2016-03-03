<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tur_puesto")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\TurPuestoRepository")
 */
class TurPuesto
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_puesto_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPuestoPk;        
    
    /**
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;      
    
    /**
     * @ORM\Column(name="telefono", type="string", length=30, nullable=true)
     */
    private $telefono;     
    
    /**
     * @ORM\Column(name="celular", type="string", length=30, nullable=true)
     */
    private $celular;     
    
    /**
     * @ORM\Column(name="contacto", type="string", length=90, nullable=true)
     */
    private $contacto;    

    /**
     * @ORM\Column(name="telefono_contacto", type="string", length=30, nullable=true)
     */
    private $telefonoContacto;    

    /**
     * @ORM\Column(name="celular_contacto", type="string", length=30, nullable=true)
     */
    private $celularContacto;    
    
    /**
     * @ORM\Column(name="codigo_cliente_fk", type="integer", nullable=true)
     */    
    private $codigoClienteFk;    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;   
    
    /**
     * @ORM\ManyToOne(targetEntity="TurCliente", inversedBy="puestosClienteRel")
     * @ORM\JoinColumn(name="codigo_cliente_fk", referencedColumnName="codigo_cliente_pk")
     */
    protected $clienteRel;         
    
    /**
     * @ORM\OneToMany(targetEntity="TurProgramacionDetalle", mappedBy="puestoRel")
     */
    protected $programacionesDetallesPuestoRel;        

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->programacionesDetallesPuestoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoPuestoPk
     *
     * @return integer 
     */
    public function getCodigoPuestoPk()
    {
        return $this->codigoPuestoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return TurPuesto
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
     * Set telefono
     *
     * @param string $telefono
     * @return TurPuesto
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return TurPuesto
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return TurPuesto
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return string 
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set telefonoContacto
     *
     * @param string $telefonoContacto
     * @return TurPuesto
     */
    public function setTelefonoContacto($telefonoContacto)
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }

    /**
     * Get telefonoContacto
     *
     * @return string 
     */
    public function getTelefonoContacto()
    {
        return $this->telefonoContacto;
    }

    /**
     * Set celularContacto
     *
     * @param string $celularContacto
     * @return TurPuesto
     */
    public function setCelularContacto($celularContacto)
    {
        $this->celularContacto = $celularContacto;

        return $this;
    }

    /**
     * Get celularContacto
     *
     * @return string 
     */
    public function getCelularContacto()
    {
        return $this->celularContacto;
    }

    /**
     * Set codigoClienteFk
     *
     * @param integer $codigoClienteFk
     * @return TurPuesto
     */
    public function setCodigoClienteFk($codigoClienteFk)
    {
        $this->codigoClienteFk = $codigoClienteFk;

        return $this;
    }

    /**
     * Get codigoClienteFk
     *
     * @return integer 
     */
    public function getCodigoClienteFk()
    {
        return $this->codigoClienteFk;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return TurPuesto
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set clienteRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurCliente $clienteRel
     * @return TurPuesto
     */
    public function setClienteRel(\Empleado\FrontEndBundle\Entity\TurCliente $clienteRel = null)
    {
        $this->clienteRel = $clienteRel;

        return $this;
    }

    /**
     * Get clienteRel
     *
     * @return \Empleado\FrontEndBundle\Entity\TurCliente 
     */
    public function getClienteRel()
    {
        return $this->clienteRel;
    }

    /**
     * Add programacionesDetallesPuestoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurProgramacionDetalle $programacionesDetallesPuestoRel
     * @return TurPuesto
     */
    public function addProgramacionesDetallesPuestoRel(\Empleado\FrontEndBundle\Entity\TurProgramacionDetalle $programacionesDetallesPuestoRel)
    {
        $this->programacionesDetallesPuestoRel[] = $programacionesDetallesPuestoRel;

        return $this;
    }

    /**
     * Remove programacionesDetallesPuestoRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurProgramacionDetalle $programacionesDetallesPuestoRel
     */
    public function removeProgramacionesDetallesPuestoRel(\Empleado\FrontEndBundle\Entity\TurProgramacionDetalle $programacionesDetallesPuestoRel)
    {
        $this->programacionesDetallesPuestoRel->removeElement($programacionesDetallesPuestoRel);
    }

    /**
     * Get programacionesDetallesPuestoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProgramacionesDetallesPuestoRel()
    {
        return $this->programacionesDetallesPuestoRel;
    }
}
