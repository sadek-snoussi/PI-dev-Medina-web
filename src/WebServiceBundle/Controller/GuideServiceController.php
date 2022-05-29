<?php

namespace WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WebServiceBundle\Entity\Guide;

class GuideServiceController extends Controller
{
    /**
     * @Route("/all")
     */
    public function allAction()
    {
        $Guide = $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Guide')->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer -> normalize($Guide);
        return new JsonResponse($formatted);
    }

    public function byGouvGuideAction($Gouv)
    {
        $Gal = $this->getDoctrine()->getManager()->getRepository(Guide::class)->findByGouv($Gouv);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer -> normalize($Gal);
        return new JsonResponse($formatted);

    }

}
