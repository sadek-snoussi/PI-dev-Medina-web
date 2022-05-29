<?php

namespace WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use WebServiceBundle\Entity\Commande;
use WebServiceBundle\Entity\Commentaire;
use WebServiceBundle\Entity\Panier;
use WebServiceBundle\Entity\Categorie;
use WebServiceBundle\Entity\Produit;
use WebServiceBundle\Entity\Rating;

class WebServiceController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    //******************************************************************************************************************
    //***************************************************VIDEOS***************************************************************

   /* public function allVideoAction(){
        $videos= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Videodiy')->findAll();

        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($videos);


        return new JsonResponse($formatted);
    }*/

    public function allVideoProAction($idUser){
        $videos= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Videodiy')->findBy(array('idUser'=>$idUser));

        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($videos);


        return new JsonResponse($formatted);
    }
    public function allVideoClientAction(){
        $videos= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Videodiy')->findBy(array('valid' => 1));

        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($videos);


        return new JsonResponse($formatted);
    }


    public function allCommentAction($idVideo){
        $comments= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Commentaire')->findBy(array('idVideo' => $idVideo));
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer->normalize($comments);

        return new JsonResponse($formatted);
    }

    public function deleteVideoAction($idVideo)
    {
        $em=$this->getDoctrine()->getManager();
        $video = $em->getRepository('WebServiceBundle:Videodiy')->find($idVideo);
        $em->remove($video);
        $em->flush();
        return "success";
    }

    public function updateVideoAction($idVideo,$titre,$desc)
    {
        $em=$this->getDoctrine()->getManager();
        $video = $em->getRepository('WebServiceBundle:Videodiy')->find($idVideo);
        $video->setTitre($titre);
        $video->setDescriptionvideo($desc);

        $em->persist($video);
        $em->flush();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($video);
        return new JsonResponse($formatted);
    }

    public function addCommentAction($idVideo,$comment,$idUser)
    {
        $em=$this->getDoctrine()->getManager();
        $receivedUser = $em->getRepository('WebServiceBundle:User')->find($idUser);
        $videoObject = $em->getRepository('WebServiceBundle:Videodiy')->find($idVideo);

        $commentaire = new Commentaire();
        $commentaire->setIdVideo($videoObject);
        $commentaire->setContenucommentaire($comment);
        $commentaire->setIdUser($receivedUser);

        //$em=$this->getDoctrine()->getManager();
        $em->persist($commentaire);
        $em->flush();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($commentaire);
        return new JsonResponse($formatted);
    }


    public function  addRatingAction($idVideo,$rate,$idUser){
        $em=$this->getDoctrine()->getManager();
        $receivedUser = $em->getRepository('WebServiceBundle:User')->find($idUser);
        $videoObject = $em->getRepository('WebServiceBundle:Videodiy')->find($idVideo);

        $newRating= new Rating();
        $retrievedRatingResult=$em->getRepository("WebServiceBundle:Rating")->findOneBy(array('video'=>$videoObject,'user'=>$receivedUser));
        if ( $retrievedRatingResult != null) {


            $retrievedRatingResult->setUser($receivedUser);
            $retrievedRatingResult->setVideo($videoObject);
            $retrievedRatingResult->setRatingValue($rate);
            $em->persist($retrievedRatingResult);
            $em->flush();
            $videoObject->setAvgRating($em->getRepository("WebServiceBundle:Rating")->averageRatingDQL($idVideo));
            $em->persist($videoObject);
            $em->flush();
            $normalizer = new ObjectNormalizer() ;
            $normalizer->setCircularReferenceLimit(3);

            $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

            $normalizers = array($normalizer);
            $serializer = new Serializer($normalizers);
            $formatted = $serializer->normalize($retrievedRatingResult);

            return new JsonResponse($formatted);


        }else{


            $newRating->setRatingValue($rate);
            $newRating->setUser($receivedUser);
            $newRating->setVideo($videoObject);
            $em->persist($newRating);
            $em->flush();
            $videoObject->setAvgRating($em->getRepository("WebServiceBundle:Rating")->averageRatingDQL($idVideo));
            $em->persist($videoObject);
            $em->flush();


            $normalizer = new ObjectNormalizer() ;
            $normalizer->setCircularReferenceLimit(3);

            $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

            $normalizers = array($normalizer);
            $serializer = new Serializer($normalizers);
            $formatted = $serializer->normalize($newRating);

            return new JsonResponse($formatted);
        }



    }


    public function searchAction($tag){
        $em=$this->getDoctrine()->getManager();


        $videos=$em->getRepository("WebServiceBundle:Videodiy")->findMultDQL($tag);

        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer->normalize($videos);

        return new JsonResponse($formatted);
    }

    public function ratingOfUserAction($idVideo,$idUser){
        $retrievedRatingResult= $this->getDoctrine()->getManager()->getRepository("WebServiceBundle:Rating")->findOneBy(array('video'=>$idVideo,'user'=>$idUser));
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer->normalize($retrievedRatingResult);

        return new JsonResponse($formatted);
    }


	//******************************************************************************************************************
    //******************************************************************************************************************
    //******************************************************************************************************************
    //*****************************************************Paniers*************************************************************


    public function supprimerDuPanierAction($idPanier)
    {
        $em=$this->getDoctrine()->getManager();
        $panier = $em->getRepository('WebServiceBundle:Panier')->find($idPanier);
        $em->remove($panier);
        $em->flush();
        return "success";
    }



    public function updateQuantiteAction(Request $request,$idPanier,$Quantite)
    {
        $em=$this->getDoctrine()->getManager();
        $panier = $em->getRepository('WebServiceBundle:Panier')->find($idPanier);
        $panier->setQuantiteproduit($Quantite);
        $em->persist($panier);
        $em->flush();
       /* $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($panier);
        return new JsonResponse($formatted);*/
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($panier);
        return new JsonResponse($formatted);
    }



    public function allPanierAction(){
        $panier = $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Panier')->findBy(array('flag'=>0));
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($panier);
        return new JsonResponse($formatted);
    }


    public function ajouterPaniersAction($idUser,$idProduit)
    {
        $em = $this->getDoctrine()->getManager();
        $panier = new Panier();
        $panier->setUser($em->getRepository('WebServiceBundle:User')->find($idUser));
        $panier->setProduit($em->getRepository('WebServiceBundle:Produit')->find($idProduit));
        $panier->setFlag(0);
        $panier->setQuantiteproduit(1);
        $em->persist($panier);
        $em->flush();
        /*$serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($panier);
        return new JsonResponse($formatted);*/
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($panier);
        return new JsonResponse($formatted);
    }


//**********************************************************Commandes******************************************************************


    public function updateFlagAction($idUser)
    {
        $em=$this->getDoctrine()->getManager();
        $panier = $em->getRepository('WebServiceBundle:Panier')->findBy(array('user' => $idUser,'flag' => 0));
        foreach ($panier as $p){
            $p->setFlag(1);
            $em->flush();
        }

        /*$serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($panier);
        return new JsonResponse($formatted);*/

        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($panier);
        return new JsonResponse($formatted);

    }

    public function updateQuantiteProduitAction($idProduit,$qDispo,$qVendu)
    {
        $em=$this->getDoctrine()->getManager();
        $produit = $em->getRepository('WebServiceBundle:Produit')->find($idProduit);
        $produit->setQtedispoproduit($qDispo);
        $produit->setQtevenduproduit($qVendu);
        $em->flush();
        /*$serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($produit);
        return new JsonResponse($formatted);*/
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($produit);
        return new JsonResponse($formatted);
    }

    public function ajouterCommandeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = new Commande();
        $commande->setUser($em->getRepository('WebServiceBundle:User')->find($request->get('idUser')));
        $commande->setPanier($em->getRepository('WebServiceBundle:Panier')->find($request->get('idPanier')));
        $commande->setNom($request->get('nom'));
        $commande->setPrenom($request->get('prenom'));
        $commande->setTel($request->get('tel'));
        $commande->setEmail($request->get('email'));
        $commande->setAdresse($request->get('addresse'));
        $commande->setCodepostale($request->get('codePostale'));
        $commande->setEtatcommande("en cours");
        $commande->setTotalprixcommande($request->get('totale'));
        $em->persist($commande);
        $em->flush();
        /*$serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($commande);
        return new JsonResponse($formatted);*/
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($commande);
        return new JsonResponse($formatted);

    }











    //******************************************************************************************************************
    //******************************************************************************************************************
    //*****************************************************PRODUITS*****************************************************
    //******************************************************************************************************************


    /* public function allAction(){
         $panier = $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Panier')->findAll();
         $serializer = new Serializer([new ObjectNormalizer()]);
         $formatted = $serializer->normalize($panier);
         return new JsonResponse($formatted);

        //gadour
         /*
         $em = $this->getDoctrine()->getManager();

         $panier = $em->getRepository('WebServiceBundle:Panier')->findAll();

         $encoders = array(new XmlEncoder(), new JsonEncoder());
         $normalizer = new ObjectNormalizer();
         $normalizer->setCircularReferenceLimit(5);
         $normalizer->setCircularReferenceHandler(function ($object) {
             return $object->getId();
         });
         $normalizers = array($normalizer);
         $serializer = new Serializer($normalizers, $encoders);
         $data = $serializer->normalize($panier);
         return new JsonResponse($data);
     }*/



    public function ProductsAction(){
        $prod= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Produit')->AllProds();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($prod);


        return new JsonResponse($formatted);
    }

    public function categoriesAction(){
        $c= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Categorie')->findAll();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($c);


        return new JsonResponse($formatted);
    }

    //******************************************************CRUD********************************************************

    public function deleteAction($idp)
    {
        $em=$this->getDoctrine()->getManager();
        $prod = $em->getRepository('WebServiceBundle:Produit')->find($idp);
        $em->remove($prod);
        $em->flush();
        //$serializer = new Serializer([new ObjectNormalizer()]);
        //$formatted = $serializer->normalize($prod);
        //return new JsonResponse($formatted);
        return "success";
    }

    //----------------------------------------------------------------------------------------------------------------

    public function updateAction($id,$ref,$nom,$cat,$mat)
    {
        $em=$this->getDoctrine()->getManager();

        $c=$em->getRepository('WebServiceBundle:Categorie')->findBy(array('nomcategorie'=>$cat));

        $prod = $em->getRepository('WebServiceBundle:Produit')->find($id);

        $prod->setNomproduit($nom);
        $prod->setReferenceProd($ref);
        $prod->setIdcategorie($c[0]);
        $prod->setMatiereproduit($mat);

        $em->persist($prod);
        $em->flush();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($prod);


        return new JsonResponse($formatted);
    }

    //----------------------------------------------------------------------------------------------------------------

    public function updateStockAction($id,$prix_b,$prix_v,$quantity)
    {
        $em=$this->getDoctrine()->getManager();


        $prod = $em->getRepository('WebServiceBundle:Produit')->find($id);

        $prod->setPrixbaseproduit($prix_b);
        $prod->setPrixventeproduit($prix_v);
        $prod->setQtedispoproduit($quantity);

        $em->persist($prod);
        $em->flush();

        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($prod);


        return new JsonResponse($formatted);
    }

//----------------------------------------------------------------------------------------------------------------

    public function addAction($ref,$nom,$cat,$mat,$p_base,$p_vente,$quantity,$img,$idUser)
    {
        $em=$this->getDoctrine()->getManager();
        $user = $em->getRepository('WebServiceBundle:User')->find($idUser);


        $c=$em->getRepository('WebServiceBundle:Categorie')->findBy(array('nomcategorie'=>$cat));
        $cat=new Categorie();

        //     if( !isset($c[0])){
        //       $cat=
        //    }

        $prod=new Produit();



        $prod->setNomproduit($nom);
        $prod->setReferenceProd($ref);
        $prod->setIdcategorie($c[0]);
        $prod->setMatiereproduit($mat);
        $prod->setPrixbaseproduit($p_base);
        $prod->setPrixventeproduit($p_vente);
        //datePicker


        $fileName = $this->generateUniqueFileName() . '.'.substr($img, strlen($img)-3, strlen($img));;

        $prod->setUrlimgproduit($fileName);
        $prod->setQtedispoproduit($quantity);

        $prod->setDateexpoproduit( new \DateTime('now') );
        $prod->setQtevenduproduit(0);
        $prod->setValiditeProduit(0);
        $prod->setIduser($user);





        copy('C:\\Users\\admin\\.cn1\\'.$img, 'C:\\xampp\\htdocs\\Medina_sof_kha\\web\\uploads\\ImgProduit\\'.$fileName);


        //$em=$this->getDoctrine()->getManager();
        $em->persist($prod);
        $em->flush();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($prod);


        return new JsonResponse($formatted);


    }

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }


    //************************************************Recherches*********************************************************


    public function ProductsRecherchesAction($tag){
        $prods= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Produit')->findByKey($tag);
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($prods);


        return new JsonResponse($formatted);
    }

    public function ProductsParPrixAction($min,$max){
        $prods= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Produit')->ParPrix($min,$max);
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($prods);


        return new JsonResponse($formatted);
    }


    public function ProductsParCategorieAction($cat){

        $em=$this->getDoctrine()->getManager();

        $c=$em->getRepository('WebServiceBundle:Categorie')->findBy(array('nomcategorie'=>$cat));

        $prods= $this->getDoctrine()->getManager()->getRepository('WebServiceBundle:Produit')->findBy(array('idcategorie'=>$c[0]));
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($prods);


        return new JsonResponse($formatted);
    }









    public function AcceuilAction()
    {
        $em=$this->getDoctrine()->getManager();

        $topRatedVideos = $em->getRepository("WebServiceBundle:Videodiy")->topRatedVideoDQL();


        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer->normalize($topRatedVideos);

        return new JsonResponse($formatted);


    }

    public function CommandeAction($totalePrix)
    {
        $em=$this->getDoctrine()->getManager();
        $commande=$em->getRepository('WebServiceBundle:Commande')->findBy(array('totalprixcommande'=>$totalePrix));
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);
        $formatted = $serializer->normalize($commande);

        return new JsonResponse($formatted);
    }










}
