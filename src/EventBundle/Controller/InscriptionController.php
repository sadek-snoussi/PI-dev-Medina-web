<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 22/02/2018
 * Time: 13:57
 */

namespace EventBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\UserEvent;
use UserBundle\Entity\Event;
use UserBundle\Entity\User;
use EventBundle\Controller\EventController;
class InscriptionController extends  Controller

{


    public function inscriptionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();


        $inscri = new Userevent();


        if ($request->isMethod('POST')) {

            $ide = $request->get('ide');
            $utilisateur = $request->get('utilisateur');


            $user = $em->getRepository("UserBundle:User")->find($utilisateur);
            $event = $em->getRepository("UserBundle:Event")->find($ide);



                $inscri->setEvent($event);

                $inscri->setUser($user);

                $inscri->setDateinscri(new \DateTime("now"));

                $nb = $event->getNbrePlace();
                $nb = $nb - 1;

                $inscri->getEvent()->setNbrePlace($nb);

                $inscri->setNom($request->get('nom'));

                $inscri->setPrenom($request->get('prenom'));
                $inscri->setAdressemail($request->get('Adressmail'));


                $em = $this->getDoctrine()->getManager();


                $em->persist($inscri);
                $em->flush();
                $idi = $inscri->getIdinscri();

                return $this->render('EventBundle:EvenementClient:InscriReussite.html.twig', array("user" => $user, "event" => $event, "inscri" => $inscri));
            }


        return $this->render('EventBundle:EvenementClient:inscription.html.twig');
    }


    public function inscrireussiteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
       $idevent=$request->get('event');
       $user=$request->get('utilisateur');
       $idi=$request->get('inscri');


       $eventuser=$em->getRepository("UserBundle:UserEvent")->find($idevent,$user);
       $inscription=$em->getRepository("UserBundle:UserEvent")->find($idi);




        return $this->render('EventBundle:EvenementClient:InscriReussite.html.twig',array('eventuser'=>$eventuser,'inscription'=>$inscription));


    }

  public function pdfAction($ide,$idi)

    {
        $em = $this->getDoctrine()->getManager();
        $event=$em->getRepository('UserBundle:Event')->find($ide);
        $inscri=$em->getRepository('UserBundle:UserEvent')->find($idi);
        $snappy=$this->get('knp_snappy.pdf');



        $html = $this->renderView('EventBundle:EvenementClient:test.html.twig',array('event'=>$event,'inscri'=>$inscri));
     $filename = 'file';

        return new Response(
            $snappy->getOutputFromHtml($html),200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );


    }

    public function ListInscriptionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $inscriptions = $em->getRepository("UserBundle:UserEvent")->findAll();

        $Listinscri = $this->get('knp_paginator')->paginate(
            $inscriptions,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            10/*nbre d'éléments par page*/
        );

        return $this->render('EventBundle:EvenementAdmin:ListeInscriAdmin.html.twig', array("inscriptions" => $Listinscri));

    }

}
