<?php

namespace Empleado\FrontEndBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RhuCartaTipoRepository extends EntityRepository { 
    
    public function listaDql() {        
        $dql   = "SELECT ct FROM BrasaRecursoHumanoBundle:RhuCartaTipo ct WHERE ct.codigoCartaTipoPk <> 0";        
        $dql .= " ORDER BY ct.codigoCartaTipoPk";
        return $dql;
    }       
}