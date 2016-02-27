<?php

namespace Empleado\FrontEndBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_pais")
 * @ORM\Entity(repositoryClass="Empleado\FrontEndBundle\Repository\GenPaisRepository")
 */
class GenPais
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pais_pk", type="integer")
     */
    private $codigoPaisPk;

    /**
     * @ORM\Column(name="pais", type="string", length=50)
     * @Assert\NotNull()(message="Debe escribir un pais")
     */
    private $pais;
    
    /**
     * @ORM\Column(name="gentilicio", type="string", length=50)
     * @Assert\NotNull()(message="Debe escribir un gentilicio")
     */
    private $gentilicio;
    
    /**
     * @ORM\OneToMany(targetEntity="GenDepartamento", mappedBy="paisRel")
     */
    protected $departamentoRel;
    
    
}
