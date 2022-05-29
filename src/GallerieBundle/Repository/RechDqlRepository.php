<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 22/02/2018
 * Time: 17:08
 */

namespace GallerieBundle\Repository;


use Doctrine\ORM\EntityRepository;


class RechDqlRepository extends EntityRepository
{
public function findGov($gov){

    $query=$this->getEntityManager()->createQuery("select l from UserBundle:Gallerie l where l.LieuGallerie=:gov ")
        ->setParameter('gov',$gov);
    return $query->getResult();
}

    public function findtag($tag){

        $query=$this->getEntityManager()->createQuery("select l from UserBundle:Gallerie l where l.description LIKE :tag")
            ->setParameter('tag','%'.$tag.'%');
        return $query->getResult();
    }


    public function findType($TypeG){

        $query=$this->getEntityManager()->createQuery("select l from UserBundle:Gallerie l where  l.typeGallerie=:TypeG")
            ->setParameter('TypeG',$TypeG);
        return $query->getResult();
    }

    public function findTypeBonPlan($TypeBonplan){

        $query=$this->getEntityManager()->createQuery("select l from WebServiceBundle:Bonplan l where  l.typebonplan=:TypeBonplan")
            ->setParameter('TypeBonplan',$TypeBonplan);
        return $query->getResult();
    }


    public function findrating($avisbonplan){

        $query=$this->getEntityManager()->createQuery("select l from WebServiceBundle:Bonplan l where  l.avisbonplan=:avisbonplan  ")
            ->setParameter('avisbonplan',$avisbonplan);
        return $query->getResult();
    }

 public function findratingasc(){

        $query=$this->getEntityManager()->createQuery("select b from WebServiceBundle:Bonplan b ORDER by b.avisbonplan ASC  ");
        return $query->getResult();
    }

    public function findratingDesc(){

        $query=$this->getEntityManager()->createQuery("select b from WebServiceBundle:Bonplan b ORDER by b.avisbonplan DESC  ");
        return $query->getResult();
    }

    public function findGovGuide($Ville){

        $query=$this->getEntityManager()->createQuery("select l from WebServiceBundle:Guide l where  l.villeguide=:Ville")
            ->setParameter('Ville',$Ville);
        return $query->getResult();
    }
}