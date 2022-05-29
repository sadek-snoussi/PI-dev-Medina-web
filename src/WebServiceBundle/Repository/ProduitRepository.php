<?php
/**
 * Created by PhpStorm.
 * User: amalb
 * Date: 20/02/2018
 * Time: 19:32
 */

namespace PartenaireBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ProduitRepository extends EntityRepository
{
    public function findByUserProduitsQB($id)
    {
        $query = $this->getEntityManager()->createQuery("select p from UserBundle:Produit p WHERE p.user=:id")
            ->setParameter('id',$id);
        return $query->getResult();


    }



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