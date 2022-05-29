<?php
/**
 * Created by PhpStorm.
 * User: amalb
 * Date: 12/02/2018
 * Time: 18:41
 */

namespace PartenaireBundle\Controller;


use PartenaireBundle\Form\PartenaireType;
use PartenaireBundle\Form\RechercheType;
use PartenaireBundle\Form\RecherecheSpecType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProController extends Controller
{


    public function AjoutProAction(Request $request,$userid)
    {
        $em=$this->getDoctrine()->getManager();
        //$userid=$request->get('iduser');
        $user=$em->getRepository("UserBundle:User")->find($userid);

        $Form=$this->createForm(PartenaireType::class,$user);
        $Form->handleRequest($request);
        if ($Form->isValid()&&$Form->isSubmitted()) {
            // $file stores the uploaded PDF file

            /**
             * @var UploadedFile $file
             */

            $file = $user->getUrllogopro();
            $fileName = $this->generateUniqueFileName().'.'.$file
                    ->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('logo_directory'),
                $fileName
            );

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $user->setUrllogopro($fileName);

            // ... persist the $product variable or any other work


            $em = $this->getDoctrine()->getManager();
            $user->setTypeuser('pro');

            $user->setPartenariat(0);
            $em->persist($user);
            $em->flush();

        }


        return $this->render('PartenaireBundle:Partenaire:Ajoutpro.html.twig', array('form'=>$Form->createView()));

    }

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
   /* public function AjoutProAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        if ($request->isMethod('POST'))
        {

            $user->setNomuser($request->get('nom'));
            $user->setPrenomuser($request->get('prenom'));
            $user->setNomentreprisepro($request->get('nomE'));
            $user->setTelbureaupro($request->get('nom'));
            $user->setGradepro($request->get('grade'));
            $user->setPassword($request->get('password'));
            $user->setSpecialitepart($request->get('specialite'));
            $user->setEmail($request->get('email'));
           /* $roles = $token->getRoles();
            // Tranform this list in array
            $rolesTab = array_map(function($role){
                return $role->getRole();
            }, $roles);
            $user->setTypeuser('Professionnel');
            $user->setUrllogopro($request->get('logo'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('PartenaireBundle:Partenaire:Ajoutpro.html.twig', array());

    }*/

    public function modifierProfileProAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $iduser=$this->getUser();
        $user = $em->getRepository("UserBundle:User")->find($iduser);
        if ($request->isMethod('post')) {

            $user->setNomuser($request->get('nom'));
            $user->setPrenomuser($request->get('prenom'));
            $user->setNomentreprisepro($request->get('nomE'));
            $user->setTelbureaupro($request->get('numero'));
            $user->setGradepro($request->get('grade'));
            $user->setEmail($request->get('email'));

            $user->setSpecialitepart($request->get('specialite'));


            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('Page_part');

        }
        return $this->render('PartenaireBundle:Partenaire:ProfilePro.html.twig',array("user" => $user));



    }


    public function listPartContactAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("UserBundle:User")->findBypartenariatQB();

        $em = $this->getDoctrine()->getManager();
        $user=new User();

        $form1 = $this->createForm(RecherecheSpecType::class, $user);
        $form1->handleRequest($request);

        $form2 = $this->createForm(RechercheType::class, $user);
        $form2->handleRequest($request);

        if ($form1->isValid())
        {

            $users = $em->getRepository('UserBundle:User')->findBySpecialiteDQL($user->getSpecialitepart());

        }
        else if ($form2->isValid()) {

            $users = $em->getRepository("UserBundle:User")->findByTypeDQL($user->getTypeuser());
        }

        return $this->render('PartenaireBundle:Partenaire:listPartenaire.html.twig', array("users" => $users, 'form1'=>$form1->createView(),
            'form2'=>$form2->createView()));

    }

    public function RechercheAction(Request $request)
    {
        $user=new User();
        $form1 = $this->createForm(RecherecheSpecType::class, $user);
        $form1->handleRequest($request);

        $form2 = $this->createForm(RechercheType::class, $user);
        $form2->handleRequest($request);

        $tag=$request->get('tag');

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("UserBundle:User")->findByRechercheDQL($tag);
        return $this->render('@Partenaire/Partenaire/listPartenaire.html.twig',array('users'=>$users,'form1'=>$form1->createView(),
            'form2'=>$form2->createView()));
    }






}