<?php
/**
 * Created by PhpStorm.
 * User: Sofienne
 * Date: 27/02/2018
 * Time: 16:50
 */

namespace ShoppingBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CommandeRepository extends EntityRepository
{
    public function findMax(){
        $query=$this->getEntityManager()
            ->createQuery("select MAX (m) from UserBundle:Commande m");
        return $query->getResult();
    }
}