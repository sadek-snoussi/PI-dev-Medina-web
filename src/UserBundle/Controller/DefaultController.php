<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use UserBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
       return $this->render('UserBundle:User:Client.html.twig');
    }


   public function PartenaireAction()
    {

        return $this->render('UserBundle:User:Pro.html.twig');
    }

    public function redirecttAction()
    {
        return $this->render('UserBundle::layout.html.twig');
    }

  
    public function adminAction()
    {
        return $this->render('@Index/Index/home_Administrator.html.twig');
    }

    public function RedirectionLogoutAction()
    {
        return new RedirectResponse($this->get('router')->generate('fos_user_security_login'));
    }

    public function getUserNameAction(){
        $username= $this->get('security.token_storage')->getToken()->getUsername();
        return $this->render('UserBundle:User:Client.html.twig',array('username'=>$username));
    }


}
