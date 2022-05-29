<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 24/04/2018
 * Time: 00:12
 */

namespace WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UserBundle\Entity\User;


class StandController extends  Controller
{

    public function allAction()
    {
        $stand = $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Stand')->fidByStandDispoQBn();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($stand);
        return new JsonResponse($formatted);
    }


    public function ReservationAction( $ids,$idEvent,$idu )
    {


        $em = $this->getDoctrine()->getManager();
        $stand=$em->getRepository("WebServiceBundle:Stand")->find($ids);
        $stand->setEventstand($em->getRepository('WebServiceBundle:Event')->find($idEvent));
        $stand->setUser($this->getDoctrine()->getManager()->getRepository('UserBundle:User')->find($idu));

         $stand->setEtat(1);

        $nb= $stand->getEventstand()->getNbrestand();
        $nb=$nb-1;

        $stand->getEventstand()->setNbrestand($nb);
        $em->persist($stand);

        $em->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($stand);
        return new JsonResponse($formatted);
    }

}