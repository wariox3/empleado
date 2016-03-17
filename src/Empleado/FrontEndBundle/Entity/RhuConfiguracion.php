<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rhu_configuracion")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\RhuConfiguracionRepository")
 */
class RhuConfiguracion
{
     /**
     * @ORM\Id
     * @ORM\Column(name="codigo_configuracion_pk", type="integer")
     */
    private $codigoConfiguracionPk;
    
    /**
     * @ORM\Column(name="codigo_entidad_riesgo_fk", type="integer")
     */    
    private $codigoEntidadRiesgoFk;
    
    /**
     * @ORM\Column(name="vr_salario", type="float")
     */    
    private $vrSalario;  
    
    /**
     * @ORM\Column(name="codigo_auxilio_transporte", type="integer")
     */    
    private $codigoAuxilioTransporte;
    
    /**
     * @ORM\Column(name="vr_auxilio_transporte", type="float")
     */    
    private $vrAuxilioTransporte;
    
    /**
     * @ORM\Column(name="codigo_credito", type="integer")
     */    
    private $codigoCredito;
    
    /**
     * @ORM\Column(name="codigo_seguro", type="integer")
     */    
    private $codigoSeguro;
    
    /**
     * @ORM\Column(name="codigo_tiempo_suplementario", type="integer")
     */    
    private $codigoTiempoSuplementario;
    
    /**
     * @ORM\Column(name="codigo_hora_diurna_trabajada", type="integer")
     */    
    private $codigoHoraDiurnaTrabajada;      
    
    /**
     * @ORM\Column(name="porcentaje_pension_extra", type="float")
     */    
    private $porcentajePensionExtra;
    
    /**
     * @ORM\Column(name="codigo_incapacidad", type="integer")
     */    
    private $codigoIncapacidad;
    
    /**
     * @ORM\Column(name="anio_actual", type="integer")
     */    
    private $anioActual; 
    
    /**
     * @ORM\Column(name="porcentaje_iva", type="float")
     */    
    private $porcentajeIva;
    
    /**
     * @ORM\Column(name="codigo_retencion_fuente", type="integer")
     */    
    private $codigoRetencionFuente;
    
    

    /**
     * Set codigoConfiguracionPk
     *
     * @param integer $codigoConfiguracionPk
     * @return RhuConfiguracion
     */
    public function setCodigoConfiguracionPk($codigoConfiguracionPk)
    {
        $this->codigoConfiguracionPk = $codigoConfiguracionPk;

        return $this;
    }

    /**
     * Get codigoConfiguracionPk
     *
     * @return integer 
     */
    public function getCodigoConfiguracionPk()
    {
        return $this->codigoConfiguracionPk;
    }

    /**
     * Set codigoEntidadRiesgoFk
     *
     * @param integer $codigoEntidadRiesgoFk
     * @return RhuConfiguracion
     */
    public function setCodigoEntidadRiesgoFk($codigoEntidadRiesgoFk)
    {
        $this->codigoEntidadRiesgoFk = $codigoEntidadRiesgoFk;

        return $this;
    }

    /**
     * Get codigoEntidadRiesgoFk
     *
     * @return integer 
     */
    public function getCodigoEntidadRiesgoFk()
    {
        return $this->codigoEntidadRiesgoFk;
    }

    /**
     * Set vrSalario
     *
     * @param float $vrSalario
     * @return RhuConfiguracion
     */
    public function setVrSalario($vrSalario)
    {
        $this->vrSalario = $vrSalario;

        return $this;
    }

    /**
     * Get vrSalario
     *
     * @return float 
     */
    public function getVrSalario()
    {
        return $this->vrSalario;
    }

    /**
     * Set codigoAuxilioTransporte
     *
     * @param integer $codigoAuxilioTransporte
     * @return RhuConfiguracion
     */
    public function setCodigoAuxilioTransporte($codigoAuxilioTransporte)
    {
        $this->codigoAuxilioTransporte = $codigoAuxilioTransporte;

        return $this;
    }

    /**
     * Get codigoAuxilioTransporte
     *
     * @return integer 
     */
    public function getCodigoAuxilioTransporte()
    {
        return $this->codigoAuxilioTransporte;
    }

    /**
     * Set vrAuxilioTransporte
     *
     * @param float $vrAuxilioTransporte
     * @return RhuConfiguracion
     */
    public function setVrAuxilioTransporte($vrAuxilioTransporte)
    {
        $this->vrAuxilioTransporte = $vrAuxilioTransporte;

        return $this;
    }

    /**
     * Get vrAuxilioTransporte
     *
     * @return float 
     */
    public function getVrAuxilioTransporte()
    {
        return $this->vrAuxilioTransporte;
    }

    /**
     * Set codigoCredito
     *
     * @param integer $codigoCredito
     * @return RhuConfiguracion
     */
    public function setCodigoCredito($codigoCredito)
    {
        $this->codigoCredito = $codigoCredito;

        return $this;
    }

    /**
     * Get codigoCredito
     *
     * @return integer 
     */
    public function getCodigoCredito()
    {
        return $this->codigoCredito;
    }

    /**
     * Set codigoSeguro
     *
     * @param integer $codigoSeguro
     * @return RhuConfiguracion
     */
    public function setCodigoSeguro($codigoSeguro)
    {
        $this->codigoSeguro = $codigoSeguro;

        return $this;
    }

    /**
     * Get codigoSeguro
     *
     * @return integer 
     */
    public function getCodigoSeguro()
    {
        return $this->codigoSeguro;
    }

    /**
     * Set codigoTiempoSuplementario
     *
     * @param integer $codigoTiempoSuplementario
     * @return RhuConfiguracion
     */
    public function setCodigoTiempoSuplementario($codigoTiempoSuplementario)
    {
        $this->codigoTiempoSuplementario = $codigoTiempoSuplementario;

        return $this;
    }

    /**
     * Get codigoTiempoSuplementario
     *
     * @return integer 
     */
    public function getCodigoTiempoSuplementario()
    {
        return $this->codigoTiempoSuplementario;
    }

    /**
     * Set codigoHoraDiurnaTrabajada
     *
     * @param integer $codigoHoraDiurnaTrabajada
     * @return RhuConfiguracion
     */
    public function setCodigoHoraDiurnaTrabajada($codigoHoraDiurnaTrabajada)
    {
        $this->codigoHoraDiurnaTrabajada = $codigoHoraDiurnaTrabajada;

        return $this;
    }

    /**
     * Get codigoHoraDiurnaTrabajada
     *
     * @return integer 
     */
    public function getCodigoHoraDiurnaTrabajada()
    {
        return $this->codigoHoraDiurnaTrabajada;
    }

    /**
     * Set porcentajePensionExtra
     *
     * @param float $porcentajePensionExtra
     * @return RhuConfiguracion
     */
    public function setPorcentajePensionExtra($porcentajePensionExtra)
    {
        $this->porcentajePensionExtra = $porcentajePensionExtra;

        return $this;
    }

    /**
     * Get porcentajePensionExtra
     *
     * @return float 
     */
    public function getPorcentajePensionExtra()
    {
        return $this->porcentajePensionExtra;
    }

    /**
     * Set codigoIncapacidad
     *
     * @param integer $codigoIncapacidad
     * @return RhuConfiguracion
     */
    public function setCodigoIncapacidad($codigoIncapacidad)
    {
        $this->codigoIncapacidad = $codigoIncapacidad;

        return $this;
    }

    /**
     * Get codigoIncapacidad
     *
     * @return integer 
     */
    public function getCodigoIncapacidad()
    {
        return $this->codigoIncapacidad;
    }

    /**
     * Set anioActual
     *
     * @param integer $anioActual
     * @return RhuConfiguracion
     */
    public function setAnioActual($anioActual)
    {
        $this->anioActual = $anioActual;

        return $this;
    }

    /**
     * Get anioActual
     *
     * @return integer 
     */
    public function getAnioActual()
    {
        return $this->anioActual;
    }

    /**
     * Set porcentajeIva
     *
     * @param float $porcentajeIva
     * @return RhuConfiguracion
     */
    public function setPorcentajeIva($porcentajeIva)
    {
        $this->porcentajeIva = $porcentajeIva;

        return $this;
    }

    /**
     * Get porcentajeIva
     *
     * @return float 
     */
    public function getPorcentajeIva()
    {
        return $this->porcentajeIva;
    }

    /**
     * Set codigoRetencionFuente
     *
     * @param integer $codigoRetencionFuente
     * @return RhuConfiguracion
     */
    public function setCodigoRetencionFuente($codigoRetencionFuente)
    {
        $this->codigoRetencionFuente = $codigoRetencionFuente;

        return $this;
    }

    /**
     * Get codigoRetencionFuente
     *
     * @return integer 
     */
    public function getCodigoRetencionFuente()
    {
        return $this->codigoRetencionFuente;
    }
}
