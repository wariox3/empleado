<?php

namespace Empleado\FrontEndBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RhuIncapacidadRepository extends EntityRepository {
    
    public function listaDql($intCodigoEmpleado = "", $intCodigoIncapacidad = "") {        
        $em = $this->getEntityManager();
        $dql   = "SELECT i FROM EmpleadoFrontEndBundle:RhuIncapacidad i WHERE i.codigoEmpleadoFk = " . $intCodigoEmpleado;
        if($intCodigoIncapacidad != "" && $intCodigoIncapacidad != 0) {
            $dql .= " AND i.codigoIncapacidadPk = " . $intCodigoIncapacidad;
        }       
        $dql .= " ORDER BY i.codigoIncapacidadPk DESC";
        return $dql;
    } 
}