<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 10/02/2018
 * Time: 06:32
 */

namespace IndexBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeAController extends Controller
{
    public function homeAdminAction()
    {
        return $this->render(':admin:base_admin.html.twig');
    }

}
