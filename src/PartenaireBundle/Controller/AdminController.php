<?php
/**
 * Created by PhpStorm.
 * User: amalb
 * Date: 20/02/2018
 * Time: 23:04
 */

namespace PartenaireBundle\Controller;


use Symfony\Component\HttpFoundation\File\UploadedFile;
use UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Swift_Message;
use Symfony\Component\HttpFoundation\Response;
use MailBundle\Entity\Mail;
use MailBundle\Form\MailType;

class AdminController extends Controller
{
    public function deleteProAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("UserBundle:User")->find($id);
        $em->remove($user);
        $em->flush();
        $session = $this->get('session');
        $session->getFlashBag()->add('success', 'Partner deleted succesfully');

        return $this->redirectToRoute('partenaire_list');
    }
    public function deleteclientAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("UserBundle:User")->find($id);
        $em->remove($user);
        $em->flush();
        $session = $this->get('session');
        $session->getFlashBag()->add('success', 'Client deleted succesfully');

        return $this->redirectToRoute('client_list');
    }
    public function listPartAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("UserBundle:User")->findBypartenariatQB();

        return $this->render('PartenaireBundle:Admin:listPartenaire.html.twig', array("users" => $users));

    }
    public function listclientsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("UserBundle:User")->findByclientQB();

        return $this->render('PartenaireBundle:Admin:GestionClients.html.twig', array("users" => $users));

    }
    public function validationlistAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("UserBundle:User")->findBypartenariatNonValideQB();

        return $this->render('PartenaireBundle:Admin:validationPart.html.twig', array('users' => $users));

    }
    public function validationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("UserBundle:User")->find($id);
        $user->setPartenariat(1);
        if($user->getTypeuser()=='pro')
        {
        $roles=$this->roles = array('ROLE_PRO');
        $user->setRoles($roles);
        }
        elseif($user->getTypeuser()=='freelancer')
            {
            $roles=$this->roles = array('ROLE_FREELANCER');
            $user->setRoles($roles);

        }
        $em->flush();
        $users = $em->getRepository("UserBundle:User")->findBypartenariatNonValideQB();
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
            ->setTo($user->getEmail())
            ->setBody($mail->getText());
        $this->get('mailer')->send($message);


        return $this->render('PartenaireBundle:Admin:validationPart.html.twig', array('users' => $users));

    }


    public function novalidationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("UserBundle:User")->find($id);
        $user->setPartenariat(2);
        $em->flush();
        $users = $em->getRepository("UserBundle:User")->findBypartenariatNonValideQB();
        return $this->render('PartenaireBundle:Admin:validationPart.html.twig', array('users' => $users));

    }
    public function envoyerMailAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository("UserBundle:User")->find($id);
        $mail = new Mail();

        $mail->setEmail($user->getEmail());
        $form= $this->createForm(MailType::class, $mail);
        $form->handleRequest($request) ;
        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setAuthMode('login')
            ->setUsername('youthvision.soukmedina@gmail.com')
            ->setPassword('SOUK2018');
        $mailer = \Swift_Mailer::newInstance($transport);
        if ($form->isValid())
        {
            $mail->setNom($user->getNomuser());
            $mail->setPrenom($user->getPrenomuser());
            $mail->setEmail($request->get('mail[email]'));
            $mail->setText($request->get('body'));
            $message = \Swift_Message::newInstance()
                ->setSubject('Grade')
                ->setFrom('youthvision.soukmedina@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody($mail->getText());
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));
        }
        return $this->render('PartenaireBundle:Admin:mail.html.twig', array('form'=>$form->createView(),"user"=>$user));

    }
    public function successAction()
    {
        return new Response("email envoyé avec succès, Merci de vérifier votre boite mail.");
    }

}