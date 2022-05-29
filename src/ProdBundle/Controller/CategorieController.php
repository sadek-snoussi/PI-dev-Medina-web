<?php

namespace ProdBundle\Controller;

use ProdBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Categorie;
use UserBundle\UserBundle;

class CategorieController extends Controller
{
    public function ListCatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository("UserBundle:Categorie")->findAll();
        return $this->render('@Prod/Admin/listCat.html.twig', array("categories" => $cat));
    }


    public function AjoutCatAction(\Symfony\Component\HttpFoundation\Request $request)
    {

        $session = $this->get('session');


        $cat = new Categorie();
        if ($request->isMethod('POST')) {

            $cat->setNomcategorie($request->get('nomCat'));
            $cat->setTypecategorie($request->get('typeCat'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            $session->getFlashBag()->add('success', 'Catégorie ajouté avec succés.');




            return $this->redirectToRoute('listCategorie');

        }
        return $this->render('@Prod/Admin/ajoutCategorie.html.twig', array());
    }

    public function SuppCatAction($id)
    {
        $session = $this->get('session');


        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository("UserBundle:Categorie")->find($id);
        $em->remove($cat);
        $em->flush();

        $session->getFlashBag()->add('success', 'Catégorie supprimé avec succés.');

        return $this->redirectToRoute('listCategorie');
    }

    public function UpdateCatAction($id,Request $request)
    {

        $session = $this->get('session');


        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository("UserBundle:Categorie")->find($id);

        $Form = $this->createForm(CategorieType::class, $cat);
        $Form->handleRequest($request);


        if ($Form->isValid()) {
            $em->persist($cat);
            $em->flush();

            $session->getFlashBag()->add('success', 'Catégorie edité avec succés.');

            return $this->redirectToRoute('listCategorie');
        }
        return $this->render("@Prod/Admin/upDateCategorie.html.twig", array('form' => $Form->createView()));
    }




}
