<?php

namespace WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WebServiceBundle\Entity\Bonplan;
use WebServiceBundle\Entity\RatingBonplan;
use WebServiceBundle\WebServiceBundle;

class BonplanServiceController extends Controller
{
    /**
     * @Route("/BonplanWebService")
     */
    public function allAction()
    {
        $bonplan = $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Bonplan')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer -> normalize($bonplan);

        return new JsonResponse($formatted);

    }

    public function allRatingDescAction()
    {
        $bonplan = $this->getDoctrine()->getManager()->getRepository(Bonplan::class)->findAllOrderedByRateDesc();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer -> normalize($bonplan);

        return new JsonResponse($formatted);

    }

    public function allRatingAscAction()
    {
        $bonplan = $this->getDoctrine()->getManager()->getRepository(Bonplan::class)->findAllOrderedByRateAsc();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer -> normalize($bonplan);

        return new JsonResponse($formatted);

    }

    public function byTagAscAction($tag)
    {
        $bonplan = $this->getDoctrine()->getManager()->getRepository(Bonplan::class)->findByTag($tag);
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer -> normalize($bonplan);

        return new JsonResponse($formatted);

    }

    public function byTypeAction($receivedType)
    {
        //

        $Type = "" ;
        switch ( $receivedType )
        {
            case 1 :
                $Type = "Salon de thé" ;
                break ;
            case 2 :
                $Type = "Bien être" ;
                break ;
            case 3 :
                $Type = "Site naturelle" ;
                break ;
            case 4 :
                $Type = "Cinéma" ;
                break ;
            case 5 :
                $Type = "Restaurant" ;
                break ;
        }


        $bonplan = $this->getDoctrine()->getManager()->getRepository(Bonplan::class)->findByType($Type);
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer -> normalize($bonplan);

        return new JsonResponse($formatted);

    }

    public function ajout_NoteAction( $id_user, $id_bonplan, $rating)
    {
        $Rating= new RatingBonplan();
        $em = $this->getDoctrine()->getManager();


        $Rating->setRatingValue($rating);
        $Rating->setIdUser($em->getRepository("WebServiceBundle:User")->find($id_user));
        $Rating->setIdBonplan($em->getRepository("WebServiceBundle:Bonplan")->find($id_bonplan));

        $em->persist($Rating);
        $em->flush();

        $Ratings = $em->getRepository(RatingBonplan::class)->findBy(array("idBonplan"=>$id_bonplan));

        $som = 0;

        foreach ($Ratings as $rat){
            $som =$som + $rat->getRatingValue();
        }

        $avg = $som / count($Ratings);

        $Bonplan = $em->getRepository(Bonplan::class)->find($id_bonplan);
        $Bonplan->setAvgrating($avg);
        $em->flush();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer -> normalize($Rating);

        return new JsonResponse($formatted);
    }

    

}
