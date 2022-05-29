<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 02/05/2018
 * Time: 00:52
 */

namespace WebServiceBundle\Repository;


use Doctrine\ORM\EntityRepository;



class GallerieRepository extends EntityRepository
{

    public function findByTag($tag)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Gallerie p WHERE p.description LIKE :tag'
            )
            ->setParameter('tag', "%".$tag."%")
            ->getResult();
    }

    public function findByType($TypeGal)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Gallerie p WHERE p.typegallerie =:TypeGal'
            )
            ->setParameter('TypeGal',$TypeGal)
            ->getResult();
    }

    public function findByGouv($Gouv)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Gallerie p WHERE p.lieugallerie =:Gouv'
            )
            ->setParameter('Gouv',$Gouv)
            ->getResult();
    }

    public function findByGouvAndType($Gouv,$TypeGal)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Gallerie p WHERE p.lieugallerie =:Gouv AND p.typegallerie =:TypeGal'
            )
            ->setParameter('Gouv',$Gouv)
            ->setParameter('TypeGal',$TypeGal)
            ->getResult();
    }




}