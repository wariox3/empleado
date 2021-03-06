<?php

namespace Empleado\FrontEndBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RhuConfiguracionRepository extends EntityRepository {
    
     public function configuracionDatoCodigo($codigoConfiguracion) {
        $em = $this->getEntityManager();
        $arConfiguracion = new \Empleado\FrontEndBundle\Entity\RhuConfiguracion();
        $arConfiguracion = $em->getRepository('EmpleadoFrontEndBundle:RhuConfiguracion')->find($codigoConfiguracion);
        return $arConfiguracion;
    }
}