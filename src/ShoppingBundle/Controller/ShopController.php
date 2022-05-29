<?php

namespace ShoppingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Commande;
use UserBundle\Entity\Panier;
use UserBundle\Entity\Produit;

class ShopController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function affAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository("UserBundle:Produit")->findAll();

        return $this->render('ShoppingBundle::AfficherProduit.html.twig', array("produits" => $produits));

    }

    public function deleteAction($id)
    {
        $em =$this->getDoctrine()->getManager();

        $panier = $em->getRepository("UserBundle:Panier")->find($id);

        $x=$panier->getProduit();
        $produit = $em->getRepository('UserBundle:Produit')->find($x);
        $y=$produit->getQtedispoproduit();
        $y=$y+$panier->getQuantiteproduit();
        $produit->setQtedispoproduit($y);
        $z=$produit->getQtevenduproduit();
        $z=$z-$panier->getQuantiteproduit();
        $produit->setQtevenduproduit($z);
        $em->remove($panier);
        $em->flush();
        return $this->redirectToRoute('Afficher_Panier');
    }

    public function AjoutCardAction(Request $request,$idp,$idu)
    {
        $produitInPanier=$this->ProduitInPanierAction($idp,$idu);
        if($produitInPanier == false){

            $em =$this->getDoctrine()->getManager();
            $pn = new Panier();
            $produit=$em->getRepository('UserBundle:Produit')->find($idp);
            $user=$em->getRepository('UserBundle:User')->find($idu);
            $pn->setUser($user);
            $pn->setProduit($produit);
            $x=$pn->getProduit($produit)->getQtedispoproduit();
            $x=$x-1;
            $pn->getProduit($produit)->setQtedispoproduit($x);
            $y=$pn->getProduit($produit)->getQtevenduproduit();
            $y=$y+1;
            $pn->getProduit($produit)->setQtevenduproduit($y);
            $em->persist($pn);
            $em->flush();


            $produits = $em->getRepository("UserBundle:Produit")->findAll();

            return $this->redirectToRoute('selectAllClient',array("produits" => $produits));

        }else{

            $em = $this->getDoctrine()->getManager();
            $panier=$em->getRepository('UserBundle:Panier')->findBy(array('flag'=>0,'user'=>$idu,'produit'=>$idp));
            foreach ($panier as $p){
                $quantiteProduit=$p->getQuantiteproduit();
                $quantiteProduit=$quantiteProduit+1;
                $p->setQuantiteproduit($quantiteProduit);
                $produit=$em->getRepository('UserBundle:Produit')->find($p->getProduit());
                $x=$produit->getQtedispoproduit();
                $x=$x-1;
                $y=$produit->getQtevenduproduit();
                $y=$y+1;
                $produit->setQtedispoproduit($x);
                $produit->setQtevenduproduit($y);
                $em->persist($p);
                $em->persist($produit);
                $em->flush();
            }

            $produits = $em->getRepository("UserBundle:Produit")->findAll();

            return $this->redirectToRoute('selectAllClient',array("produits" => $produits));

        }


        //return $this->render('ShoppingBundle::AfficherProduit.html.twig', array("produits" => $produits));

    }


    public function CalculTotalProduitAction()
    {



    }

    public function AfficherPanierAction()
    {
        $em = $this->getDoctrine()->getManager();
        $paniers=$em->getRepository("UserBundle:Panier")->findBy(array('flag'=>0));
        return $this->render('@Shopping/ShoppingCart.twig',array("paniers" => $paniers));
    }


    public function PlusQuantiteAction($idpn)
    {
        $em = $this->getDoctrine()->getManager();
        $panier=$em->getRepository('UserBundle:Panier')->find($idpn);
        $quantite=$panier->getQuantiteproduit();
        $quantite=$quantite+1;
        $panier->setQuantiteproduit($quantite);

        $produit=$em->getRepository('UserBundle:Produit')->find($panier->getProduit());
        $x=$produit->getQtedispoproduit();
        $x=$x-1;
        $y=$produit->getQtevenduproduit();
        $y=$y+1;
        $produit->setQtedispoproduit($x);
        $produit->setQtevenduproduit($y);
        $em->persist($produit);
        $em->persist($panier);

        $em->flush();
        return $this->redirectToRoute('Afficher_Panier');
    }

    public function ProduitInPanierAction($idpr,$idu)
    {
        $em = $this->getDoctrine()->getManager();
        $panier=$em->getRepository('UserBundle:Panier')->findBy(array('flag'=>0,'user'=>$idu,'produit'=>$idpr));
        if($panier == null){
            return false;
        }else{
            return true;
        }

    }

    public function MoinsQuantiteAction($idpn)
    {
        $em = $this->getDoctrine()->getManager();
        $panier=$em->getRepository('UserBundle:Panier')->find($idpn);
        $quantite=$panier->getQuantiteproduit();
        $quantite=$quantite-1;
        $panier->setQuantiteproduit($quantite);

        $produit=$em->getRepository('UserBundle:Produit')->find($panier->getProduit());
        $x=$produit->getQtedispoproduit();
        $x=$x+1;
        $y=$produit->getQtevenduproduit();
        $y=$y-1;
        $produit->setQtedispoproduit($x);
        $produit->setQtevenduproduit($y);
        $em->persist($produit);
        $em->persist($panier);
        $em->flush();
        return $this->redirectToRoute('Afficher_Panier');
    }
}
