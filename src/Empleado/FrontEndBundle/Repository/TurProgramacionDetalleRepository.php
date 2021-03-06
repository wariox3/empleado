<?php

namespace Empleado\FrontEndBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TurProgramacionDetalleRepository extends EntityRepository {
    
     /*public function listaDQL($intCodigoEmpleado = "", $intCodigoProcesoDisciplinario = 0) {        
        $dql   = "SELECT pd FROM EmpleadoFrontEndBundle:TurProgramacionDetalle pd WHERE pd.codigoRecursoFk = " . $intCodigoEmpleado;
        /*if($intCodigoProcesoDisciplinario != "" && $intCodigoProcesoDisciplinario != 0) {
            $dql .= " AND d.codigoDisciplinarioPk = " . $intCodigoProcesoDisciplinario;
        }
        $dql .= " ORDER BY pd.codigoProgramacionDetallePk DESC";
        return $dql;
    }*/
    
    public function consultaDetalleDql($codigoRecurso, $intAnio= "", $intMesAnterior = "",$intMes = "" ) {
        $em = $this->getEntityManager();
        $dql   = "SELECT pd FROM EmpleadoFrontEndBundle:TurProgramacionDetalle pd JOIN pd.programacionRel p JOIN pd.recursoRel r "
                . "WHERE pd.codigoProgramacionDetallePk <> 0 ";
        
        if($codigoRecurso != '') {
            $dql = $dql . " AND pd.codigoRecursoFk = " . $codigoRecurso;
        }      
        if($intMes != '') {
            $dql = $dql . " AND pd.anio = ". $intAnio ." AND (pd.mes = " . $intMes. " OR pd.mes = " . $intMesAnterior .")";
        }
        $dql .= " ORDER BY p.codigoClienteFk";
        return $dql;
    }    
}