<?php

namespace WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WebServiceBundle\Entity\Gallerie;

class GalerieServiceController extends Controller
{
    /**
     * @Route("/all")
     */
    public function allAction()
    {
        $Gallerie = $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Gallerie')->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer -> normalize($Gallerie);
        return new JsonResponse($formatted);
    }


    public function byTagDescrriptionAction($tag)
    {
        $Gal = $this->getDoctrine()->getManager()->getRepository(Gallerie::class)->findByTag($tag);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer -> normalize($Gal);
        return new JsonResponse($formatted);

    }

    public function byTypeAction($Type)
    {
        $Gal = $this->getDoctrine()->getManager()->getRepository(Gallerie::class)->findByType($Type);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer -> normalize($Gal);
        return new JsonResponse($formatted);

    }

    public function byGouvAction($Gouv)
    {
    $Gal = $this->getDoctrine()->getManager()->getRepository(Gallerie::class)->findByGouv($Gouv);
    $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer -> normalize($Gal);
    return new JsonResponse($formatted);

    }

    public function byGouvTypeAction($Gouv,$Type)
    {
        $Gal = $this->getDoctrine()->getManager()->getRepository(Gallerie::class)->findByGouvAndType($Gouv,$Type);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer -> normalize($Gal);
        return new JsonResponse($formatted);

    }
}
