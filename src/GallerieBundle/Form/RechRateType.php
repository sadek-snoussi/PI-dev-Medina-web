<?php

namespace GallerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechRateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('AvgRating',ChoiceType::class,array('choices' => array(
            '1 Étoile' => '1',
            '2 Étoiles' => '2',
            '3 Étoiles' => '3',
            '4 Étoiles' => '4',
            '5 Étoiles' => '5',
            ),
            'expanded' => true,
            'multiple' => false
        ))


            ->add('Chercher',SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_rech_rate_type';
    }
}
