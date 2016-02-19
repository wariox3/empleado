<?php

namespace Empleado\FrontEndBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RhuVacacionRepository extends EntityRepository {
    
    public function listaDQL($intCodigoEmpleado = "", $intCodigoVacacion = 0) {        
        $dql   = "SELECT v FROM EmpleadoFrontEndBundle:RhuVacacion v WHERE v.codigoEmpleadoFk = " . $intCodigoEmpleado;
        if($intCodigoVacacion != "" && $intCodigoVacacion != 0) {
            $dql .= " AND v.codigoVacacionPk = " . $intCodigoVacacion;
        }
        $dql .= " ORDER BY v.codigoVacacionPk DESC";
        return $dql;
    } 
    
    
}