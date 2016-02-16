<?php

namespace Empleado\FrontEndBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
        public function listaDql() {        
        $em = $this->getEntityManager();
        $dql   = "SELECT u FROM EmpleadoFrontEndBundle:User u";
        $dql .= " ORDER BY u.nombre ASC";
        return $dql;
    }                                
}