<?php

namespace GallerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\File\File;





class GuideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomguide')
                ->add('prenomguide')
                ->add('mailguide',EmailType::class)
                ->add('telguide',NumberType::class)
                ->add('villeguide',ChoiceType::class,array('choices' => array('Tunis' => 'Tunis',
                    'Ben Arous' => 'Ben Arous',
                    'Ariana' => 'Ariana',
                    'Manouba' => 'Manouba',
                    'Beja' => 'Beja',
                    'Kef' => 'Kef',
                    'Jandouba' => 'Jandouba',
                    'Sfax' => 'Sfax',
                    'Sousse' => 'Sousse',
                    'Gabes' => 'Gabes',
                    'Nabeul' => 'Nabeul',
                    'Monastir' => 'Monastir',
                    'Kairaoun' => 'Kairaoun',
                    'Gafsa' => 'Gafsa',
                    'Kasserine' => 'Kasserine',
                    'Kebili' => 'Kebili',
                    'Médenine' => 'Médenine',
                    'Mahdia' => 'Mahdia',
                    'Sidi Bouzid' => 'Sidi Bouzid',
                    'Tataouine' => 'Tataouine',
                    'Zaghouan' => 'Zaghouan',
                    'Bizerte' =>'Bizerte',
                    'Tozeur' => 'Tozeur'),))
                ->add('imgGuide' ,FileType::class,array('label'=>'Inserer la photo du guide'))
                ->add('Ajouter',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class' => 'UserBundle\Entity\Guide'

        ));


    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_guide_type';
    }
}
