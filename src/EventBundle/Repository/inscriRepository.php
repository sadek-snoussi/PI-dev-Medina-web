<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 24/02/2018
 * Time: 23:38
 */
namespace  EventBundle\Repository;
use Doctrine\ORM\EntityRepository;

class inscriRepository extends EntityRepository
{

    public function  findInscriptionDQL ()
{
    $em=$this->getEntityManager();
    $query=$em ->createQuery('SELECT MAX (u.idinscri) FROM UserBundle:UserEvent u');
       return  $query->getSingleResult();

}




}