<?php

namespace ShoppingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Commande;
use ShoppingBundle\Entity\Mail;

use Symfony\Component\HttpFoundation\Response;

class CommandeController extends Controller
{
    public function indexAction()
    {
        //return $this->render('', array('name' => $name));



    }

    public function pdfAction(Request $request,$idc)
    {
        $em = $this->getDoctrine()->getManager();
        $commande=$em->getRepository('UserBundle:Commande')->find($idc);
        $paniers=$em->getRepository("UserBundle:Panier")->findBy(array('flag'=>2));
        $snappy = $this->get('knp_snappy.pdf');
        $html= $this->render('ShoppingBundle::commandeImprime.hmtl.twig',array('paniers'=>$paniers,'commande'=>$commande));
        $paniers2=$em->getRepository('UserBundle:Panier')->findBy(array('flag'=>2));

        foreach ($paniers2 as $p){

                    $p->setFlag(1);
        }
        $em->flush();
        $filename = 'Commande';
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );

    }

    public function pdfMobileAction(Request $request,$idc)
    {
        $em = $this->getDoctrine()->getManager();
        $commande=$em->getRepository('UserBundle:Commande')->find($idc);
        $paniers=$em->getRepository("UserBundle:Panier")->findBy(array('flag'=>2));
        $snappy = $this->get('knp_snappy.pdf');
        $html= $this->render('ShoppingBundle::PdfMobile.html.twig',array('paniers'=>$paniers,'commande'=>$commande));
        $paniers2=$em->getRepository('UserBundle:Panier')->findBy(array('flag'=>2));

        foreach ($paniers2 as $p){

            $p->setFlag(1);
        }
        $em->flush();
        $filename = 'Commande';
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );
    }

    public function AfficherCommandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $paniers=$em->getRepository("UserBundle:Panier")->findBy(array('flag'=>0));
        return $this->render('ShoppingBundle::commande.html.twig',array('paniers'=>$paniers));
    }

    public function AjouterCommandeAction(Request $request,$iduser,$idpn)
    {
        $em=$this->getDoctrine()->getManager();
        $commande=new Commande();
        if($request->isMethod('POST')){
            $user=$em->getRepository('UserBundle:User')->find($iduser);
            $panier2=$em->getRepository('UserBundle:Panier')->find($idpn);
            $commande->setUser($user);
            $commande->setNom($request->get('nom'));
            $commande->setPrenom($request->get('prenom'));
            $commande->setEmail($request->get('email'));
            $commande->setPays($request->get('pays'));
            $commande->setGouvernorat($request->get('gouvernorat'));
            $commande->setVille($request->get('ville'));
            $commande->setAdresse($request->get('adresse'));
            $commande->setCodepostale($request->get('codePostale'));
            $commande->setTel($request->get('phone'));
            $commande->setTotalprixcommande($request->get('prixTotat'));
            $commande->setDatecommande($request->get('date'));
            $commande->setPanier($panier2);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            $dm=$this->getDoctrine()->getManager();
            $panier=$dm->getRepository('UserBundle:Panier')->findBy(array('user'=>$iduser));
            foreach ($panier as $p)
            {
                if ($p->getFlag() ==0){
                    $p->setFlag(2);
                }

            }
            $dm->flush();
            //$cmd=$em->getRepository('UserBundle:Commande')->findMax();
            $idc=$commande->getIdcommande();
            return $this->redirectToRoute('Commande_Succes',
                array("idc"=>$idc));
        }
        return $this->render('@Shopping/ApresCommande.html.twig');
    }

    public function CommandeSuccesAction(Request $request)
    {
        $idc=$request->get('idc');
        return $this->render('ShoppingBundle::ApresCommande.html.twig',array('idc'=>$idc));
    }



    public function MesCommandeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paniers=$em->getRepository("UserBundle:Panier")->findBy(array('flag'=>1));
        $commandes=$em->getRepository('UserBundle:Commande')->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $commandes, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );


        return $this->render('ShoppingBundle::MesCommandes.html.twig',array("paniers"=>$paniers,"commandes"=>$pagination));
    }



    public function EnvoyerAction($idu)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("UserBundle:User")->find($idu);
        $mail=new Mail();
        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setAuthMode('login')
            ->setUsername('youthvision.soukmedina@gmail.com')
            ->setPassword('SOUK2018');
        $mailer = \Swift_Mailer::newInstance($transport);
        $mail->setEmail($user->getEmail());
        $mail->setNom($user->getNomuser());
        $mail->setPrenom($user->getPrenomuser());
        $mail->setText('Bonjour M/Mme votre demande de partenariat a été validée ,Soyez le bienvenue');
        $message = \Swift_Message::newInstance()
            ->setSubject('Grade')
            ->setFrom('youthvision.soukmedina@gmail.com')
            ->setTo($mail->getEmail())
            ->setBody($mail->getText());
        $this->get('mailer')->send($message);

        return $this->render('ShoppingBundle::ApresCommande.html.twig');
    }


}
