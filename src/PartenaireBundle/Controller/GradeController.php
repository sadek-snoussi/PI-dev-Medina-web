<?php
/**
 * Created by PhpStorm.
 * User: amalb
 * Date: 20/02/2018
 * Time: 18:37
 */

namespace PartenaireBundle\Controller;
use MailBundle\Entity\Mail;
use PartenaireBundle\Form\statType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\statistiques;
use UserBundle\Entity\User;

class GradeController extends Controller
{
    public function gradeAction($id,Request $request )
    {
        $user=new User();
        $em = $this->getDoctrine()->getManager();


            $produits=$em->getRepository('UserBundle:Produit')->findByUserProduitsQB($id);
            $user=$em->getRepository('UserBundle:User')->find($id);

            $videos=$em->getRepository('UserBundle:Videodiy')->findByUserVideoStatsQB($id);

        $janvier=0;$fevrier=0;$mars=0;$avril=0;$mai=0;$juin=0;$juillet=0;$aout=0;$septembre=0;$octobre=0;$novembre=0;$decembre=0;
        $janvierVendu=0;$fevrierVendu=0;$marsVendu=0;$avrilVendu=0;$maiVendu=0;$juinVendu=0;$juilletVendu=0;$aoutVendu=0;
        $septembreVendu=0;$octobreVendu=0;$novembreVendu=0;$decembreVendu=0;
        $janvierV=0;$fevrierV=0;$marsV=0;$avrilV=0;$maiV=0;$juinV=0;$juilletV=0;$aoutV=0;$septembreV=0;$octobreV=0;$novembreV=0;$decembreV=0;

         foreach ($produits as $x)
         {
              $mois=$x->getDateexpoproduit()->format('m');
              if($mois=="01")
              {
                  $janvier=$janvier+$x->getQtedispoproduit();
                  $janvierVendu=$janvierVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="02")
              {
                  $fevrier=$fevrier+$x->getQtedispoproduit();
                  $fevrierVendu=$fevrierVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="03")
              {
                  $mars=$mars+$x->getQtedispoproduit();
                  $marsVendu=$marsVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="04")
              {
                  $avril=$avril+$x->getQtedispoproduit();
                  $avrilVendu=$avrilVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="05")
              {
                  $mai=$mai+$x->getQtedispoproduit();
                  $maiVendu=$maiVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="06")
              {
                  $juin=$juin+$x->getQtedispoproduit();
                  $juinVendu=$juinVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="07")
              {
                  $juillet=$juillet+$x->getQtedispoproduit();
                  $juilletVendu=$juilletVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="08")
              {
                  $aout=$aout+$x->getQtedispoproduit();
                  $aoutVendu=$aoutVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="09")
              {
                  $septembre=$septembre+$x->getQtedispoproduit();
                  $septembreVendu=$septembreVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="10")
              {
                  $octobre=$octobre+$x->getQtedispoproduit();
                  $octobreVendu=$octobreVendu+$x->getQtevenduproduit();
              }
              elseif ($mois=="11")
              {
                  $novembre=$novembre+$x->getQtedispoproduit();
                  $novembreVendu=$novembreVendu+$x->getQtevenduproduit();
              }
              else
              {
                  $decembre=$decembre+$x->getQtedispoproduit();
                  $decembreVendu=$decembreVendu+$x->getQtevenduproduit();
              }

         }

         foreach ($videos as $v)
         {
             $mois=$v->getDateexpovideo()->format('m');
             if($mois=="01")
             {
                 $janvierV=$janvierV+1;

             }
             elseif ($mois=="02")
             {
                 $fevrierV=$fevrierV+1;

             }
             elseif ($mois=="03")
             {
                 $marsV=$marsV+1;

             }
             elseif ($mois=="04")
             {
                 $avrilV=$avrilV+1;

             }
             elseif ($mois=="05")
             {
                 $maiV=$maiV+1;

             }
             elseif ($mois=="06")
             {
                 $juinV=$juinV+1;

             }
             elseif ($mois=="07")
             {
                 $juilletV=$juilletV+1;

             }
             elseif ($mois=="08")
             {
                 $aoutV=$aoutV+1;

             }
             elseif ($mois=="09")
             {
                 $septembreV=$septembreV+1;

             }
             elseif ($mois=="10")
             {
                 $octobreV=$octobreV+1;

             }
             elseif ($mois=="11")
             {
                 $novembreV=$novembreV+1;

             }
             else
             {
                 $decembreV=$decembreV+1;

             }


         }



        $user=$em->getRepository('UserBundle:User')->find($id);
        $produits=$em->getRepository('UserBundle:Produit')->findByUserProduitsQB($id);

        $totalp=0;
        foreach ($produits as $x)
        {
            $totalp=$totalp+$x->getQtevenduproduit();

        }
        $totalv=$em->getRepository('UserBundle:Videodiy')->findByUserVideosQB($id);
        $statProduitsPlat=$em->getRepository('UserBundle:statistiques')->find(3);
        $statVideosPlat=$em->getRepository('UserBundle:statistiques')->find(3);
        $statProduitsGold=$em->getRepository('UserBundle:statistiques')->find(2);
        $statVideosGold=$em->getRepository('UserBundle:statistiques')->find(2);

        $statProduitsSil=$em->getRepository('UserBundle:statistiques')->find(1);
        $statVideosSil=$em->getRepository('UserBundle:statistiques')->find(1);

        $rep="";
        $messagePlat="";
        $messageGold="";
        if($totalp>$statProduitsPlat->getNbproduitsVendu() and $totalv>$statVideosPlat->getNbvideoPost())
        {
           $messagePlat='Ce Partenaire a vendu plus que'.$statProduitsPlat->getNbproduitsVendu().'et a postulé plus que'.$statVideosPlat->getNbvideoPost().'Veuillez lui attribuer le
           grade "PLATINUIM"?';
            $rep="platinium";

        }


        elseif($user->getGradepro()=="silver")
        {

            if($totalp>=$statProduitsGold->getNbproduitsVendu() and $totalv>=$statVideosGold->getNbvideoPost()  )
            {
                $messageGold='Ce Partenaire a vendu plus que  '.$statProduitsGold->getNbproduitsVendu().'  
                  et a postulé plus que    '.$statVideosGold->getNbvideoPost.'    Veuillez lui attribuer le
           grade "GOLD"?';

                $rep="gold";


            }

        }


        return $this->render('PartenaireBundle:Partenaire:grade.html.twig', array("produits" => $produits,"videos" => $videos,
            "user"=>$user,'janvier'=>$janvier,'fevrier'=>$fevrier,'mars'=>$mars,'avril'=>$avril,
            'mai'=>$mai,'juin'=>$juin,'juillet'=>$juillet,'aout'=>$aout,
            'septembre'=>$septembre,'octobre'=>$octobre,'novembre'=>$novembre,'decembre'=>$decembre,'janvierV'=>$janvierV,'fevrierV'=>$fevrierV,'marsV'=>$marsV,'avrilV'=>$avrilV,
            'maiV'=>$mai,'juinV'=>$juin,'juilletV'=>$juilletV,'aoutV'=>$aoutV,
            'septembreV'=>$septembreV,'octobreV'=>$octobreV,'novembreV'=>$novembreV,'decembreV'=>$decembreV,
            'janvierVendu'=>$janvierVendu,'fevrierVendu'=>$fevrierVendu,'marsVendu'=>$marsVendu,'avrilVendu'=>$avrilVendu,
            'maiVendu'=>$maiVendu,'juinVendu'=>$juinVendu,'juilletVendu'=>$juilletVendu,'aoutVendu'=>$aoutVendu,
            'septembreVendu'=>$septembreVendu,'octobreVendu'=>$octobreVendu,'novembreVendu'=>$novembreVendu,'decembreVendu'=>$decembreVendu,'messagePlat'=>$messagePlat,'messageGold'=>$messageGold,'rep'=>$rep,'user'=>$user));
    }

    public function afficherGradeAction(Request $request)
    {

       $grade= new statistiques();
        $em=$this->getDoctrine()->getManager();
       $id=0;

        if($request->getMethod()=="POST")
        {
            $nomgrade=$request->get('grade');


        if($nomgrade=="silver")
        {$id=1;}
       else if($nomgrade=="gold")
       {$id=2;}
        else
        {$id=3;}
        $grade=$em->getRepository('UserBundle:statistiques')->find($id);
            return $this->render('PartenaireBundle:Admin:MAJ_grade2.html.twig', array('grade'=>$grade));

        }


       if($request->getMethod()=="GET")
       {

           if ($request->get('video')!=null &&$request->get('produit')!=null)
           {
           $video=$request->get('video');
           $produit=$request->get('produit');
           $gradeid=$request->get('id');
           $grade= new statistiques();
           $em=$this->getDoctrine()->getManager();
           $grade=$em->getRepository('UserBundle:statistiques')->find($gradeid);
           $grade->setNbproduitsVendu($produit);
           $grade->setNbvideoPost($video);
           $em->persist($grade);
           $em->flush();
               $session = $this->get('session');
               $session->getFlashBag()->add('success', 'Grade modifiée avec succees ');

               return $this->render('PartenaireBundle:Admin:MAJ_grade2.html.twig', array('grade'=>$grade));

           }
       }

        return $this->render('PartenaireBundle:Admin:MAJ_grade2.html.twig', array('grade'=>$grade));


    }

   public function modifierGradeAction(Request $request,$id)
    {
        $grade= new statistiques();
        $em=$this->getDoctrine()->getManager();
        $grade=$em->getRepository('UserBundle:statistiques')->find($id);
        $Form=$this->createForm(statType::class,$grade);
        $Form->handleRequest($request);
        if ($Form->isValid()&&$Form->isSubmitted()) {

            $em->persist($grade);
            $em->flush();

            return $this->render('PartenaireBundle:Admin:MAJ_grade2.html.twig', array('grade'=>$grade));

        }
           /* if ($request->isMethod('post'))
        {
            $grade->setNbproduitsVendu($request->get('produit'));
            $grade->setNbvideoPost($request->get('video'));
            $em->persist($grade);
            $em->flush();

            //return $this->redirectToRoute('Aff_grade2');
        }*/
        $users=$em->getRepository('UserBundle:User')->findBypartenariatNonValideQB();

        return $this->render('PartenaireBundle:Admin:MAJ_grade2.html.twig',array('$grade'=>$grade));

    }


    public function attribuerGradeAction(Request $request,$id,$plat,$gold)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('UserBundle:User')->find($id);
        $statProduitsPlat = $em->getRepository('UserBundle:statistiques')->find(3);
        $statVideosPlat = $em->getRepository('UserBundle:statistiques')->find(3);
        $statProduitsGold = $em->getRepository('UserBundle:statistiques')->find(2);
        $statVideosGold = $em->getRepository('UserBundle:statistiques')->find(2);
        $statProduitsSil=$em->getRepository('UserBundle:statistiques')->find(1);
        $statVideosSil=$em->getRepository('UserBundle:statistiques')->find(1);

        if ($plat == 1)
        {
            $mail = new Mail();
            $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                ->setAuthMode('login')
                ->setUsername('youthvision.soukmedina@gmail.com')
                ->setPassword('SOUK2018');
            $mailer = \Swift_Mailer::newInstance($transport);
            $mail->setEmail($user->getEmail());
            $mail->setNom($user->getNomuser());
            $mail->setPrenom($user->getPrenomuser());
            $mail->setText('Bonjour M/Mme Vous  avez vendu plus que' . $statProduitsPlat->getNbproduitsVendu() .
                ' produits et posté plus que ' . $statVideosPlat->getNbvideoPost() . ' , Notre offre est la présente: 
               Vous pouvez migrer vers la grade "Platinuim" gratuitement Merci Pour votre Fidelité ');
            $message = \Swift_Message::newInstance()
                ->setSubject('Grade')
                ->setFrom('youthvision.soukmedina@gmail.com')
                ->setTo($user->getEmail())
                ->setBody($mail->getText());
            $this->get('mailer')->send($message);
        }
        elseif ($gold==1)
        {
            $mail=new Mail();
            $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                ->setAuthMode('login')
                ->setUsername('youthvision.soukmedina@gmail.com')
                ->setPassword('SOUK2018');
            $mailer = \Swift_Mailer::newInstance($transport);
            $mail->setEmail($user->getEmail());
            $mail->setNom($user->getNomuser());
            $mail->setPrenom($user->getPrenomuser());
            $mail->setText('Bonjour M/Mme Vous  avez vendu plus que'.$statProduitsSil->getNbproduitsVendu().
                ' produits et posté plus que '.$statVideosSil->getNbvideoPost().' , Notre offre est la présente: 
               Vous pouvez migrer vers la grade "Gold" gratuitement Merci Pour votre Fidelité ');
            $message = \Swift_Message::newInstance()
                ->setSubject('Grade')
                ->setFrom('youthvision.soukmedina@gmail.com')
                ->setTo($user->getEmail())
                ->setBody($mail->getText());
            $this->get('mailer')->send($message);
        }
        $users=$em->getRepository('UserBundle:User')->findBypartenariatQB();
        return $this->render('PartenaireBundle:Admin:listPartenaire.html.twig',array('users'=>$users));
    }



}