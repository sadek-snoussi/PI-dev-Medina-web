<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 22/04/2018
 * Time: 22:45
 */

namespace WebServiceBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WebServiceBundle\Entity\UserEvent;
use UserBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class EventController extends Controller
{
    public function allAction()
    {
        $event = $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Event')->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($event);
        return new JsonResponse($formatted);
    }






    public function inscriptionAction(Request $request,$iduser,$idevent)
    {
        $em=$this->getDoctrine()->getManager();
        $inscri = new UserEvent();
        $inscri->setUser($this->getDoctrine()->getManager()->getRepository('WebServiceBundle:User')->find($iduser));
        //$inscri->setEvent($this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Event')->findBy('ide'));
        $inscri->setEvent($em->getRepository('WebServiceBundle:Event')->find($idevent));

        $inscri->setNom($request->get("nom"));
        $inscri->setPrenom($request->get("prenom"));
        $inscri->setAdressemail($request->get("adressemail"));

        $nb=$inscri->getEvent()->getNbreplace();
        $nb=$nb-1;
        $inscri->getEvent()->setNbreplace($nb);


        $inscri->setDateinscri(new \DateTime("now"));

        // $DateInscrit= date("d/m/y");
        //$user->setDate($request->get("$DateInscrit"));
        $em=$this->getDoctrine()->getManager();
        //$event = $em->getRepository("UserBundle:Event")->find($ide);
        // $inscri->setEvent($event);

        $em->persist($inscri);
        $em->flush();
        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        //   $normalizer->setCircularReferenceLimit(2);
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $normalizers = array($normalizer);
        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($inscri, 'json');
        $json=json_decode($jsonContent);
        return new JsonResponse($json);






    }





}