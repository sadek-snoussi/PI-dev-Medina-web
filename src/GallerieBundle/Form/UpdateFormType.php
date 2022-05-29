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
use UserBundle\Entity\Guide;



class UpdateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomguide')
                ->add('prenomguide')
                ->add('mailguide' ,EmailType::class )
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
                ->add('Modifier',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_update_form_type';
    }
}
