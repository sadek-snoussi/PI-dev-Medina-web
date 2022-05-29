<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 19/02/2018
 * Time: 11:57
 */

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Stand;


class StandController extends  Controller
{
    public function ajouterStandAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $stand = new Stand();
        if ($request->isMethod('POST')) {

            $stand->setSuperficiestand($request->get('superficie'));

            $stand->setEmplacementstand($request->get('emplacement'));
            $stand->setCouleur($request->get('couleur'));
            $stand->setPrix($request->get('prix'));
            $stand->setEtat(0);

            $em = $this->getDoctrine()->getManager();


            $em->persist($stand);
            $em->flush();
            return $this->redirectToRoute('stand_affiche');


        }



        return $this->render('EventBundle:EvenementAdmin:ajoutStand.html.twig',array());
    }

    public function affStandAction()
    {
        $em = $this->getDoctrine()->getManager();
        $stands = $em->getRepository("UserBundle:Stand")->findAll();


        return $this->render('EventBundle:EvenementAdmin:afficheStand.html.twig', array("stands" => $stands));

    }

    public function deleteStandAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $stand = $em->getRepository("UserBundle:Stand")->find($id);
        $em->remove($stand);
        $em->flush();
        return $this->redirectToRoute('stand_affiche');
    }

    public function modifierStandAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $stand = $em->getRepository("UserBundle:Stand")->find($id);
        //$this->render('EspritParcBundle:Model:modifier.html.twig',array("model"=>$model));


        if ($request->isMethod('Post')) {

            $stand->setEmplacementstand($request->get('emplacement'));
            $stand->setPrix($request->get('prix'));


            $em = $this->getDoctrine()->getManager();
            $em->persist($stand);
            $em->flush();
            return $this->redirectToRoute('stand_affiche');
        }
        return $this->render('EventBundle:EvenementAdmin:modifierStand.html.twig', array("stand" => $stand));
    }



    public function ReservationStandAction()
    {
        $em = $this->getDoctrine()->getManager();


        $standclient = $em->getRepository("UserBundle:Stand")->findByStandDispoQB();



        return $this->render('EventBundle:Stand:ReservationStand.html.twig', array("standclient" => $standclient));

    }



    public function afficheStandEventAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository("UserBundle:Event")->findAll();
        $evenement = $this->get('knp_paginator')->paginate(
            $events,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            1/*nbre d'éléments par page*/
        );


        return $this->render('EventBundle:Stand:affStandClient.html.twig',array("events" => $evenement));


    }




    public function ReservationAction(Request $request,$ids,$ide,$idu)
    {

        $em = $this->getDoctrine()->getManager();

        $user=$request->get('utilisateur');

        $stand=$em->getRepository("UserBundle:Stand")->find($ids);
        $event=$em->getRepository("UserBundle:Event")->find($ide);
        $user=$em->getRepository("UserBundle:User")->find($idu);


        $stand->setEtat(1);
        $stand->setUser($user);
       $stand->setEventstand($event);
        $nb=$event->getNbrestand();
        $nb=$nb-1;

        $event->setNbrestand($nb);

        $em->persist($stand);
        $em->persist($event);
        $em->flush();




        return $this->render('EventBundle:Stand:ReservationReussi.html.twig',array('stand'=>$stand,"event"=>$event,'$user'=>$user));
    }

    public function ReservationReuusiteAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $idstand=$request->get('stand');
        $iduser=$request->get('utilisateur');


        $stand=$em->getRepository("UserBundle:Stand")->find($idstand);
        $user=$em->getRepository("UserBundle:User")->find($iduser);





        return $this->render('EventBundle:Stand:ReservationReussi.html.twig',array('stand',$stand,'user',$user));




    }

    public function pdfStandAction($ids,$ide)

    {
        $em = $this->getDoctrine()->getManager();
        $stand=$em->getRepository('UserBundle:Stand')->find($ids);
        $event=$em->getRepository('UserBundle:Event')->find($ide);
        $snappy=$this->get('knp_snappy.pdf');



        $html = $this->renderView('EventBundle:EvenementClient:test2.html.twig',array('stand'=>$stand,'event'=>$event));
        $filename = 'file';

        return new Response(
            $snappy->getOutputFromHtml($html),200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );


    }







}