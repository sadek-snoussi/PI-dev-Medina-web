<?php
/**
 * Created by PhpStorm.
 * User: amalb
 * Date: 28/02/2018
 * Time: 00:23
 */

namespace PartenaireBundle\Repository;


use Doctrine\ORM\EntityRepository;
class VideoRepository extends EntityRepository
{
    public function findByUserVideosQB($id)
    {
        $query = $this->getEntityManager()->createQuery("select COUNT (p) from UserBundle:Videodiy p WHERE p.iduser=:id")
            ->setParameter('id',$id);
        return $query->getResult();


    }
    public function findByUserVideoStatsQB($id)
    {
        $query = $this->getEntityManager()->createQuery("select p from UserBundle:Videodiy p WHERE p.iduser=:id")
            ->setParameter('id',$id);
        return $query->getResult();


    }

    /****************************oumaymaa*****************************/

    public function findMultDQL($tags){
        $query=$this->getEntityManager()
            ->createQuery("select v from UserBundle:Videodiy v WHERE v.tags LIKE :tags")
            ->setParameter('tags','%'.$tags.'%');
        return $query->getResult();
    }


    public function averageRatingDQL($video_id)
    {
        $query=$this->getEntityManager()
            ->createQuery("select AVG(r.rating) FROM UserBundle:Rating r WHERE r.video =:video_id  ")
            ->setParameter('video_id',$video_id);
        return $query->getSingleScalarResult();

        /*SELECT video_id,AVG(rating) FROM `rating` GROUP BY video_id ORDER BY video_id*/
    }

    public function topRatedDQL()
    {
        $query=$this->getEntityManager()
            ->createQuery("select v FROM UserBundle:Videodiy v WHERE v.valid =:valid ORDER BY v.avgRating DESC")
            ->setParameter('valid',1)
            ->setFirstResult(0)
            ->setMaxResults(4);
        // ->setParameter('avgrating',$avgRating);
        return $query->getArrayResult();

    }
    public function lastSearchDQL($user_id)
    {
        $query=$this->getEntityManager()
            ->createQuery("SELECT t.tag From UserBundle:Tags t WHERE t.user = :user_id Order BY t.id DESC  ")
            ->setParameter('user_id',$user_id)
            ->setFirstResult(0)
            ->setMaxResults(3);
        return $query->getArrayResult();

    }
    public function recommendedVideosDQL($x,$y,$z){


        $query=$this->getEntityManager()
            ->createQuery("SELECT v FROM UserBundle:Videodiy v WHERE ( v.tags LIKE :videotag ) OR ( v.tags LIKE :secondvideotag )  OR ( v.tags LIKE :thirdvideotag ) ")
            ->setParameter('videotag',$x)
            ->setParameter('secondvideotag',$y)
            ->setParameter('thirdvideotag',$z);

        return $query->getResult();

    }

}