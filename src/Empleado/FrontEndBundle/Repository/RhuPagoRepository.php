<?php

namespace Empleado\FrontEndBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RhuPagoRepository extends EntityRepository {        
    
    public function listaDql($intCodigoEmpleado = "", $intNumero = 0, $intTipo = "") {        
        $em = $this->getEntityManager();
        $dql   = "SELECT p FROM EmpleadoFrontEndBundle:RhuPago p WHERE p.codigoEmpleadoFk = " . $intCodigoEmpleado;
        if($intNumero != "" && $intNumero != 0) {
            $dql .= " AND p.numero = " . $intNumero;
        }
        if($intTipo != "" && $intTipo != 0) {
            $dql .= " AND p.codigoPagoTipoFk =" . $intTipo;
        }        
        $dql .= " ORDER BY p.codigoPagoPk DESC";
        return $dql;
    }  
    
    public function tiempoSuplementarioCartaLaboral($intPeriodo, $codigoContrato) {
        $em = $this->getEntityManager();
        $dql   = "SELECT SUM(p.vrAdicionalValor) as suplementario FROM EmpleadoFrontEndBundle:RhuPago p  "
                . "WHERE p.estadoPagado = 1 "
                . "AND p.codigoContratoFk = " . $codigoContrato . " ";
        //$dql .= " LIMIT " . $intPeriodo . " ";
        /*$query = $entityManager->createQuery($dql)
                       ->setFirstResult(0)
                       ->setMaxResults(10);*/
        
        
        $query = $em->createQuery($dql)
                    ->setFirstResult(0)
                    ->setMaxResults($intPeriodo);
        $arrayResultado = $query->getResult();
        $floSuplementario = $arrayResultado[0]['suplementario'];
        return $floSuplementario;
    }
    
}