<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 01/05/2018
 * Time: 15:51
 */

namespace WebServiceBundle\Repository;

use Doctrine\ORM\EntityRepository;


class BonplanRepository  extends EntityRepository
{
    public function findAllOrderedByRateDesc()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Bonplan p ORDER BY p.avgrating DESC '
            )
            ->getResult();
    }

    public function findAllOrderedByRateAsc()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Bonplan p ORDER BY p.avgrating ASC '
            )
            ->getResult();
    }

    public function findByTag($tag)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Bonplan p WHERE p.nombonplan LIKE :tag'
            )
            ->setParameter('tag', "%".$tag."%")
            ->getResult();
    }

    public function findByType($Type)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM WebServiceBundle:Bonplan p WHERE p.typebonplan =:Type'
            )
            ->setParameter('Type',$Type)
            ->getResult();
    }

    public function findTypeBonPlan($TypeBonplan){

        $query=$this->getEntityManager()->createQuery("select p from WebServiceBundle:Bonplan p where  p.typebonplan=:TypeBonplan")
            ->setParameter('TypeBonplan',$TypeBonplan);
        return $query->getResult();
    }

    public function averageRatingDQL($bonplan)
    {
        $query=$this->getEntityManager()
            ->createQuery("select AVG(r.ratingValue) FROM WebServiceBundle:RatingBonplan r WHERE r.idBonplan =:id_bpl  ")
            ->setParameter('id_bpl',$bonplan);
        return $query->getSingleScalarResult();

        /*SELECT video_id,AVG(rating) FROM `rating` GROUP BY video_id ORDER BY video_id*/
    }

}