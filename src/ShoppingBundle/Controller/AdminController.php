<?php

namespace ShoppingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function ValiderAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $commandes=$em->getRepository('UserBundle:Commande')->findBy(array('etatCommande'=>'En cours de validation'));

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $commandes, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );


        return $this->render('@Shopping/Admin.html.twig',array('commandes'=>$pagination));

    }

    public function ValiderEtatAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $commandes=$em->getRepository('UserBundle:Commande')->find($id);
        $commandes->setEtatCommande('Validée');
        $em->persist($commandes);
        $em->flush();
        return $this->redirectToRoute('Valider_Commande');
    }

    public function NeValiderPasEtatAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $commandes=$em->getRepository('UserBundle:Commande')->find($id);
        $commandes->setEtatCommande('Non valide');
        $em->persist($commandes);
        $em->flush();
        return $this->redirectToRoute('Valider_Commande');
    }
}
