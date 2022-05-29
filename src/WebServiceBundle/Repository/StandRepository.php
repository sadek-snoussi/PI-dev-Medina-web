<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 24/04/2018
 * Time: 00:14
 */

namespace WebServiceBundle\Repository;


use Doctrine\ORM\EntityRepository;

class StandRepository  extends  EntityRepository
{
    public function fidByStandDispoQBn()
    {
        $queryBuilder = $this->createQueryBuilder('s');
        $queryBuilder->where("s.etat=:etat")->setParameter('etat', '0');


        $resultat=$queryBuilder->getQuery()->getResult();
        return $resultat;

    }

}