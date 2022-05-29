<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 26/02/2018
 * Time: 22:43
 */

namespace EventBundle\Repository;

use Doctrine\ORM\EntityRepository;
class StandRepository extends EntityRepository
{
    public function findByStandDispoQB()
    {
        $queryBuilder = $this->createQueryBuilder('s');
        $queryBuilder->where("s.etat=:etat")->setParameter('etat', '0');


            $resultat=$queryBuilder->getQuery()->getResult();
        return $resultat;

    }




}