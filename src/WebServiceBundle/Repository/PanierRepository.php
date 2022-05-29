<?php
/**
 * Created by PhpStorm.
 * User: Sofienne
 * Date: 21/04/2018
 * Time: 21:53
 */
namespace WebServiceBundle\Repository;
use Doctrine\ORM\EntityRepository;

class PanierRepository extends EntityRepository
{
    public  function findPanier(){
        //$dql = "Select u, p From \WebServiceBundle\Entity\User u Join r.experiences e";

       // $entityManager->createQuery($dql)->execute();
    }
	
	
	
	
    public function findMultDQL($tags){
        $query=$this->getEntityManager()
            ->createQuery("select v from WebServiceBundle:Videodiy v WHERE v.tags LIKE :tags")
            ->setParameter('tags','%'.$tags.'%');
        return $query->getResult();
    }

    public function averageRatingDQL($video_id)
    {
        $query=$this->getEntityManager()
            ->createQuery("select AVG(r.ratingValue) FROM WebServiceBundle:Rating r WHERE r.video =:video_id  ")
            ->setParameter('video_id',$video_id);
        return $query->getSingleScalarResult();

    }


    public function topRatedVideoDQL()
    {
        $query=$this->getEntityManager()
            ->createQuery("select v FROM WebServiceBundle:Videodiy v WHERE v.valid =:valid ORDER BY v.avgRating DESC")
            ->setParameter('valid',1)
            ->setFirstResult(0)
            ->setMaxResults(4);
        // ->setParameter('avgrating',$avgRating);
        return $query->getArrayResult();

    }


//***********************************************PRODUITS************************************************************


    public function AllProds(){

        $query=$this->getEntityManager()
            ->createQuery("
                select p,cat,u from WebServiceBundle:Produit p  JOIN  p.idcategorie cat JOIN p.iduser u");

        return $query->getResult();
    }





    public function findByKey($tag){

        $query=$this->getEntityManager()
            ->createQuery("
            select p from WebServiceBundle:Produit p WHERE p.nomproduit LIKE :tag  ")
            ->setParameter('tag','%'.$tag.'%');

        return $query->getResult();
    }



    public function ParPrix($mini,$maxi){

        $query=$this->getEntityManager()
            ->createQuery("
                select p from WebServiceBundle:Produit p 
                WHERE p.prixventeproduit > :mini  AND 
                p.prixventeproduit < :maxi
                ")
            ->setParameter('mini',$mini)
            ->setParameter('maxi',$maxi);

        return $query->getResult();
    }
}