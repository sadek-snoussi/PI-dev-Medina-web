<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 27/02/2018
 * Time: 23:34
 */

namespace EventBundle\Repository;
use Doctrine\ORM\EntityRepository;


class EventRepository extends EntityRepository
{
    public function findByDAteEventQB()
    {
        $query = $this->getEntityManager()->createQuery(" select  e from UserBundle:Event e ORDER BY e.dateevent DESC ");

        return $query->getResult();
    }


}