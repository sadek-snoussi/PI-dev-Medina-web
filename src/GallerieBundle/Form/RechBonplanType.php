<?php

namespace GallerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechBonplanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('typebonplan',ChoiceType::class,array('choices' => array(
        'Restaurant' => 'Restaurant',
        'Salon de thé' => 'Salon de thé',
        'Musée' => 'Musée',
        'Bien être' => 'Bien être',
        'Site naturelle' => 'Site naturelle',
        'Cinéma' => 'Cinéma',
        'Autres' => 'Autres' ),
            'expanded' => true,
            'multiple' => false))

            ->add('Chercher',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_rech_bonplan_type';
    }
}
