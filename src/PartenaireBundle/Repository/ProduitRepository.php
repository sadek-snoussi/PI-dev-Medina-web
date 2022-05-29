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





}