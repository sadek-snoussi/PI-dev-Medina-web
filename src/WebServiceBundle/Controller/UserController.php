<?php

namespace WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\DateTime;
use UserBundle\Entity\User;

class UserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
    public function allAction()
    {
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findAll();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($user);


        return new JsonResponse($formatted);
    }
    public function FindPartAction()
    {
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findBypartenariatQB();
        $normalizer = new ObjectNormalizer() ;
        $normalizer->setCircularReferenceLimit(3);

        $normalizer->setIgnoredAttributes(array("Rate", "rateBonplan","rating"));

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers);

        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);
    }

    public function FindByIdAction($id)
    {
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->find($id);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);
    }

    public function updateProfileAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->find(array('id'=> $request->get('id')));

        $user->setNomuser($request->get('nomUser'));
        $user->setPrenomuser($request->get('prenomUser'));
        $user->setUsername($request->get("username"));
        $user->setEmail($request->get('email'));
        $user->setTeluser($request->get('telUser'));
        $user->setAdresse($request->get("adresse"));
        $date= new \DateTime($request->get("dateNaissUser"));
        $user->setDatenaissuser($date);
        $em->persist($user);
        $em->flush();
        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $normalizers = array($normalizer);
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        $json=json_decode($jsonContent);
        return new JsonResponse($json);


    }

    public function updateProfileProAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->find(array('id'=> $request->get('id')));

        $user->setNomuser($request->get('nomUser'));
        $user->setPrenomuser($request->get('prenomUser'));
        $user->setEmail($request->get('email'));
        $user->setTelbureaupro($request->get('telBureauPro'));
        $user->setAdresse($request->get("adresse"));
        $user->setSpecialitepart($request->get("specialitePart"));

        $em->persist($user);
        $em->flush();
        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $normalizers = array($normalizer);
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        $json=json_decode($jsonContent);
        return new JsonResponse($json);


    }
    public function updateProfileFreeAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->find(array('id'=> $request->get('id')));

        $user->setNomuser($request->get('nomUser'));
        $user->setPrenomuser($request->get('prenomUser'));

        $user->setEmail($request->get('email'));
        $user->setTelbureaupro($request->get('telBureauPro'));


        $em->persist($user);
        $em->flush();
        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $normalizers = array($normalizer);
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        $json=json_decode($jsonContent);
        return new JsonResponse($json);


    }
    public function FindByUsernameAction(Request $request)
    {
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findOneBy(array('username'=> $request->get('username')));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);
    }
    public function addAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $user=new User();

        $user->setNomuser($request->get('nomUser'));
        $user->setPrenomuser($request->get('prenomUser'));
        $user->setUsername($request->get("username"));
        $user->setUsernameCanonical($request->get("username_canonical"));
        $user->setEmail($request->get('email'));
        $user->setEmailCanonical($request->get("email_canonical"));
       // $user->setPassword($request->get('password'));
        $user->setTeluser($request->get('telUser'));
        $user->setAdresse($request->get("adresse"));
        $user->setEnabled($request->get("enabled"));
        $user->setRoles(array("ROLE_CLIENT"));
        $date= new \DateTime($request->get("dateNaissUser"));
        $user->setDatenaissuser($date);
        $options = [
            'cost' => 12,
        ];
        $p= password_hash($request->get("password"), PASSWORD_BCRYPT, $options);
        $user->setPassword($p);

        $em->persist($user);
        $em->flush();
        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $normalizers = array($normalizer);
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        $json=json_decode($jsonContent);
        return new JsonResponse($json);



    }

    public function authentificationAction(Request $request)
    {
        $valid = false;
        $em = $this->getDoctrine()->getManager();
        $json="";
        //$hash = password_hash(, PASSWORD_BCRYPT);
        $user = $em->getRepository('UserBundle:User')->findOneBy(array('username'=> $request->get('login')));
        //$user = $em->getRepository('WebServiceBundle:User')->findUserByloginQB( $request->get('login'));


            if (password_verify($request->get('password'),$user->getPassword() )){

                //  var_dump($hash);

                $valid = true;
                $encoders = array(new JsonEncoder());
                $normalizer = new ObjectNormalizer();

                $normalizer->setCircularReferenceLimit(2);

                $normalizer->setIgnoredAttributes(array("Rate","rateBonplan","rating"));

                $normalizer->setCircularReferenceHandler(function ($object) {
                    return $object->getId();
                });
                $normalizers = array($normalizer);
                $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);


                $jsonContent = $serializer->serialize($user, 'json');
                $json = json_decode($jsonContent);
                //   $json= JsonResponse($json);
            }
            else{
                $json="";
            }


        return new JsonResponse($json);
      /*var_dump($user);
      return new Response("56s4df5s");*/

    }

    public function demanderPartProAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->find(array('id'=> $request->get('id')));

        $user->setNomentreprisepro($request->get('nomEntreprisePro'));
        $user->setTelbureaupro($request->get('telBureauPro'));
        $user->setSpecialitepart($request->get('specialitePart'));
        $user->setGradePro($request->get('gradePro'));
        $user->setAdresse($request->get('adresse'));
        $user->setUrllogopro($request->get('urlLogoPro'));
        $user->setTypeuser($request->get('typeUser'));

        $em->persist($user);
        $em->flush();
        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $normalizers = array($normalizer);
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        $json=json_decode($jsonContent);
        return new JsonResponse($json);


    }
    public function demanderPartFreeAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->find(array('id'=> $request->get('id')));

        $user->setTelbureaupro($request->get('telBureauPro'));

        $user->setSpecialitepart($request->get('specialitePart'));

        $user->setUrllogopro($request->get('urlLogoPro'));

        $user->setTypeuser($request->get('typeUser'));

        $em->persist($user);
        $em->flush();
        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $normalizers = array($normalizer);
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        $json=json_decode($jsonContent);
        return new JsonResponse($json);


    }
    public function listProduitsAction(Request $request,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $produits=$em->getRepository('UserBundle:Produit')->findByUserProduitsQB($id);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($produits);
        return new JsonResponse($formatted);

    }
    public function listVideosAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $videos=$em->getRepository('UserBundle:Videodiy')->findByUserVideoStatsQB($id);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($videos);
        return new JsonResponse($formatted);
    }
}
