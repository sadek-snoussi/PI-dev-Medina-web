<?php
/**
 * Created by PhpStorm.
 * User: amalb
 * Date: 18/02/2018
 * Time: 20:01
 */
namespace WebServiceBundle\Repository;

use Doctrine\ORM\EntityRepository;
use UserBundle\Entity\User;
class UserRepository extends EntityRepository
{


    public function findBypartenariatQB()
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->where("p.partenariat=:partenariat")->setParameter('partenariat', '1');

        return $queryBuilder->getQuery()->getResult();
    }

    public function findAllQB()
    {
        $query = $this->getEntityManager()->createQuery("select p from UserBundle:User p ");

        return $query->getResult();
    }
    public function findUserByloginQB($login)
    {
        $query = $this->getEntityManager()->createQuery("select p from UserBundle:User p  where p.username=:u or p.email=:uu")
            ->setParameter('u',$login)->setParameter('uu',$login);

        return $query->getResult();
    }
    public function findBypartenariatNonValideQB()
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->where("p.partenariat=:partenariat")->setParameter('partenariat', '0');

        return $queryBuilder->getQuery()->getResult();
    }

    public function findPartQB()
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->where("p.typeuser=:type")->setParameter('type', 'professionnel'or'Freelancer');
        return $queryBuilder->getQuery()->getResult();

    }
    public function findclientQB()
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $queryBuilder->where("c.typeuser=:type")->setParameter('type', 'client');
        return $queryBuilder->getQuery()->getResult();

    }
    public function findByRechercheDQL($tag)
    {
        $query = $this->getEntityManager()->createQuery("select p from UserBundle:User p WHERE
 p.nomentreprisepro LIKE :tag OR p.specialitepart LIKE :tag OR p.gradepro LIKE :tag OR p.nomentreprisepro 
 LIKE :tag OR p.typeuser LIKE :tag OR p.username LIKE :tag OR p.email LIKE :tag")
            ->setParameter('tag','%'.$tag.'%');
        return $query->getResult();
    }
    public function findBySpecialiteDQL($spec){

        $query=$this->getEntityManager()->createQuery("select l from UserBundle:User l where l.specialitepart=:spec and l.partenariat=:part")
            ->setParameter('spec',$spec)->setParameter('part',1);
        return $query->getResult();
    }
    public function findByTypeDQL($type)
    {

        $query=$this->getEntityManager()->createQuery("select l from UserBundle:User l where l.typeuser=:type and l.partenariat=:part")
            ->setParameter('type',$type)->setParameter('part','1');
        return $query->getResult();
    }



}