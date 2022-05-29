<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 03/05/2018
 * Time: 01:55
 */

namespace WebServiceBundle\Repository;


use Doctrine\ORM\EntityRepository;


class GuideRepository extends EntityRepository
{
    public function findByGouv($Gouv)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Guide p WHERE p.villeguide =:Gouv'
            )
            ->setParameter('Gouv',$Gouv)
            ->getResult();
    }

}