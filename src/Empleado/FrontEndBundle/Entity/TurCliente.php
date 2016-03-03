<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tur_cliente")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\TurClienteRepository")
 */
class TurCliente
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_cliente_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoClientePk;    
    
    /**
     * @ORM\Column(name="nit", type="string", length=15, nullable=false, unique=true)
     */
    private $nit;        
    
    /**
     * @ORM\Column(name="digito_verificacion", type="string", length=1, nullable=true)
     */
    private $digitoVerificacion;             
    
    /**
     * @ORM\Column(name="nombre_corto", type="string", length=50)
     */
    private $nombreCorto;                         
    
    /**
     * @ORM\Column(name="codigo_sector_fk", type="integer")
     */    
    private $codigoSectorFk;     
    
    /**
     * @ORM\Column(name="estrato", type="string", length=5, nullable=true)
     */
    private $estrato;                
    
    /**
     * @ORM\Column(name="plazo_pago", type="integer")
     */    
    private $plazoPago = 0;    
    
    /**
     * @ORM\Column(name="codigo_forma_pago_fk", type="integer", nullable=true)
     */    
    private $codigoFormaPagoFk;     
    
    /**
     * @ORM\Column(name="direccion", type="string", length=120, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(name="barrio", type="string", length=120, nullable=true)
     */
    private $barrio;    
    
    /**
     * @ORM\Column(name="codigo_ciudad_fk", type="integer", nullable=true)
     */
    private $codigoCiudadFk;         
    
    /**
     * @ORM\Column(name="telefono", type="string", length=30, nullable=true)
     */
    private $telefono;     
    
    /**
     * @ORM\Column(name="celular", type="string", length=20, nullable=true, nullable=true)
     */
    private $celular;    
        
    /**
     * @ORM\Column(name="fax", type="string", length=20, nullable=true, nullable=true)
     */
    private $fax;    
    
    /**
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    private $email;     
    
    /**
     * @ORM\Column(name="gerente", type="string", length=80, nullable=true)
     */
    private $gerente;    
    
    /**
     * @ORM\Column(name="calular_gerente", type="string", length=20, nullable=true)
     */
    private $celularGerente;  
    
    /**
     * @ORM\Column(name="financiero", type="string", length=80, nullable=true)
     */
    private $financiero;    
    
    /**
     * @ORM\Column(name="calular_financiero", type="string", length=20, nullable=true)
     */
    private $celularFinanciero;     
    
    /**
     * @ORM\Column(name="contacto", type="string", length=80, nullable=true)
     */
    private $contacto;    

    /**
     * @ORM\Column(name="calular_contacto", type="string", length=20, nullable=true)
     */
    private $celularContacto;     

    /**
     * @ORM\Column(name="telefono_contacto", type="string", length=20, nullable=true)
     */
    private $telefonoContacto;    
    
    /**
     * @ORM\Column(name="usuario", type="string", length=50, nullable=true)
     */    
    private $usuario;     
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */    
    private $comentarios;                    
    
    /**
     * @ORM\OneToMany(targetEntity="TurProgramacion", mappedBy="clienteRel")
     */
    protected $puestosClienteRel;

    /**
     * @ORM\OneToMany(targetEntity="TurPuesto", mappedBy="clienteRel")
     */
    protected $programacionesClienteRel;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->puestosClienteRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->programacionesClienteRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoClientePk
     *
     * @return integer 
     */
    public function getCodigoClientePk()
    {
        return $this->codigoClientePk;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return TurCliente
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set digitoVerificacion
     *
     * @param string $digitoVerificacion
     * @return TurCliente
     */
    public function setDigitoVerificacion($digitoVerificacion)
    {
        $this->digitoVerificacion = $digitoVerificacion;

        return $this;
    }

    /**
     * Get digitoVerificacion
     *
     * @return string 
     */
    public function getDigitoVerificacion()
    {
        return $this->digitoVerificacion;
    }

    /**
     * Set nombreCorto
     *
     * @param string $nombreCorto
     * @return TurCliente
     */
    public function setNombreCorto($nombreCorto)
    {
        $this->nombreCorto = $nombreCorto;

        return $this;
    }

    /**
     * Get nombreCorto
     *
     * @return string 
     */
    public function getNombreCorto()
    {
        return $this->nombreCorto;
    }

    /**
     * Set codigoSectorFk
     *
     * @param integer $codigoSectorFk
     * @return TurCliente
     */
    public function setCodigoSectorFk($codigoSectorFk)
    {
        $this->codigoSectorFk = $codigoSectorFk;

        return $this;
    }

    /**
     * Get codigoSectorFk
     *
     * @return integer 
     */
    public function getCodigoSectorFk()
    {
        return $this->codigoSectorFk;
    }

    /**
     * Set estrato
     *
     * @param string $estrato
     * @return TurCliente
     */
    public function setEstrato($estrato)
    {
        $this->estrato = $estrato;

        return $this;
    }

    /**
     * Get estrato
     *
     * @return string 
     */
    public function getEstrato()
    {
        return $this->estrato;
    }

    /**
     * Set plazoPago
     *
     * @param integer $plazoPago
     * @return TurCliente
     */
    public function setPlazoPago($plazoPago)
    {
        $this->plazoPago = $plazoPago;

        return $this;
    }

    /**
     * Get plazoPago
     *
     * @return integer 
     */
    public function getPlazoPago()
    {
        return $this->plazoPago;
    }

    /**
     * Set codigoFormaPagoFk
     *
     * @param integer $codigoFormaPagoFk
     * @return TurCliente
     */
    public function setCodigoFormaPagoFk($codigoFormaPagoFk)
    {
        $this->codigoFormaPagoFk = $codigoFormaPagoFk;

        return $this;
    }

    /**
     * Get codigoFormaPagoFk
     *
     * @return integer 
     */
    public function getCodigoFormaPagoFk()
    {
        return $this->codigoFormaPagoFk;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return TurCliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return TurCliente
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;

        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set codigoCiudadFk
     *
     * @param integer $codigoCiudadFk
     * @return TurCliente
     */
    public function setCodigoCiudadFk($codigoCiudadFk)
    {
        $this->codigoCiudadFk = $codigoCiudadFk;

        return $this;
    }

    /**
     * Get codigoCiudadFk
     *
     * @return integer 
     */
    public function getCodigoCiudadFk()
    {
        return $this->codigoCiudadFk;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return TurCliente
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
     * @return TurCliente
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
     * Set fax
     *
     * @param string $fax
     * @return TurCliente
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return TurCliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set gerente
     *
     * @param string $gerente
     * @return TurCliente
     */
    public function setGerente($gerente)
    {
        $this->gerente = $gerente;

        return $this;
    }

    /**
     * Get gerente
     *
     * @return string 
     */
    public function getGerente()
    {
        return $this->gerente;
    }

    /**
     * Set celularGerente
     *
     * @param string $celularGerente
     * @return TurCliente
     */
    public function setCelularGerente($celularGerente)
    {
        $this->celularGerente = $celularGerente;

        return $this;
    }

    /**
     * Get celularGerente
     *
     * @return string 
     */
    public function getCelularGerente()
    {
        return $this->celularGerente;
    }

    /**
     * Set financiero
     *
     * @param string $financiero
     * @return TurCliente
     */
    public function setFinanciero($financiero)
    {
        $this->financiero = $financiero;

        return $this;
    }

    /**
     * Get financiero
     *
     * @return string 
     */
    public function getFinanciero()
    {
        return $this->financiero;
    }

    /**
     * Set celularFinanciero
     *
     * @param string $celularFinanciero
     * @return TurCliente
     */
    public function setCelularFinanciero($celularFinanciero)
    {
        $this->celularFinanciero = $celularFinanciero;

        return $this;
    }

    /**
     * Get celularFinanciero
     *
     * @return string 
     */
    public function getCelularFinanciero()
    {
        return $this->celularFinanciero;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return TurCliente
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
     * Set celularContacto
     *
     * @param string $celularContacto
     * @return TurCliente
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
     * Set telefonoContacto
     *
     * @param string $telefonoContacto
     * @return TurCliente
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
     * Set usuario
     *
     * @param string $usuario
     * @return TurCliente
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return TurCliente
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
     * Add puestosClienteRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurProgramacion $puestosClienteRel
     * @return TurCliente
     */
    public function addPuestosClienteRel(\Empleado\FrontEndBundle\Entity\TurProgramacion $puestosClienteRel)
    {
        $this->puestosClienteRel[] = $puestosClienteRel;

        return $this;
    }

    /**
     * Remove puestosClienteRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurProgramacion $puestosClienteRel
     */
    public function removePuestosClienteRel(\Empleado\FrontEndBundle\Entity\TurProgramacion $puestosClienteRel)
    {
        $this->puestosClienteRel->removeElement($puestosClienteRel);
    }

    /**
     * Get puestosClienteRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPuestosClienteRel()
    {
        return $this->puestosClienteRel;
    }

    /**
     * Add programacionesClienteRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurPuesto $programacionesClienteRel
     * @return TurCliente
     */
    public function addProgramacionesClienteRel(\Empleado\FrontEndBundle\Entity\TurPuesto $programacionesClienteRel)
    {
        $this->programacionesClienteRel[] = $programacionesClienteRel;

        return $this;
    }

    /**
     * Remove programacionesClienteRel
     *
     * @param \Empleado\FrontEndBundle\Entity\TurPuesto $programacionesClienteRel
     */
    public function removeProgramacionesClienteRel(\Empleado\FrontEndBundle\Entity\TurPuesto $programacionesClienteRel)
    {
        $this->programacionesClienteRel->removeElement($programacionesClienteRel);
    }

    /**
     * Get programacionesClienteRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProgramacionesClienteRel()
    {
        return $this->programacionesClienteRel;
    }
}
