<?php

namespace GallerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RechGallerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('lieugallerie',ChoiceType::class,array('choices' => array(
            'Tunis' =>'Tunis',
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
        'Tozeur' => 'Tozeur'),
            'label'=>"Gouvernorat : ",
            'expanded' => true,
            'multiple' => false
            ))

            ->add('rechercher',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_rech_gallerie_type';
    }
}
