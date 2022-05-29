<?php

namespace GallerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechGuideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('villeguide',ChoiceType::class,array('choices' => array('Tunis' => 'Tunis',
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
        'Tozeur' => 'Tozeur',
        'Bizerte' =>'Bizerte',),
        'label'=>'Ville du guide : ',
            'expanded' => true,
            'multiple' => false))

            ->add('Ajouter',SubmitType::class,array('label'=>'Chercher'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_rech_guide_type';
    }
}
