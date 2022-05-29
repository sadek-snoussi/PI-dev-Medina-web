<?php

namespace ShoppingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $user = $this->getUser();
        $topRatedVideos = $em->getRepository("UserBundle:Videodiy")->topRatedDQL();

        $latestSearches = $em->getRepository("UserBundle:Tags")->lastSearchDQL($user);

        if ( !isset($latestSearches[0])) //Jamais fait de recherche
        {
            $x = "" ;
        }else // Il y a des mots clés utilisés auparavant
        {
            if  ($latestSearches[0]["tag"] == "") // Si ce mot clé etait une chaine vide
            {
                $x = $latestSearches[0]["tag"] ; // l'utiliser tel quel
            }
            else // Si le mot clé est un vrai mot
            {
                $x = '%'.$latestSearches[0]["tag"].'%' ; // chercher une video avec mot-clé ressemblant
            }
        }

        if ( !isset($latestSearches[1]))
        {
            $y = "" ;
        }else
        {
            if  ($latestSearches[1]["tag"] == "")
            {
                $y = $latestSearches[1]["tag"] ;
            }
            else
            {
                $y = '%'.$latestSearches[1]["tag"].'%' ;
            }
        }



        if ( !isset($latestSearches[2]))
        {
            $z = "" ;
        }else
        {
            if  ($latestSearches[2]["tag"] == "")
            {
                $z = $latestSearches[2]["tag"] ;
            }
            else
            {
                $z = '%'.$latestSearches[2]["tag"].'%' ;
            }
        }


        $recommendationResults =$em->getRepository("UserBundle:Videodiy")->recommendedVideosDQL($x,$y,$z);

        return $this->render("IndexBundle:Index:acceuil.html.twig", array('videos'=>$topRatedVideos,
            'recommendationResults'=>$recommendationResults,
            'lasts'=>$latestSearches

        ));
    }


}
