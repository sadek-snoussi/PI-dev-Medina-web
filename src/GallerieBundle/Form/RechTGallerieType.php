<?php

namespace GallerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RechTGallerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('typeGallerie',ChoiceType::class,array('choices' => array(
        'Textile' => 'Textile',
        'Monument' => 'Monument',
        'Statue' => 'Statue',
        'Personnalité' => 'Personnalite',
        'bibelot' => 'bibelot',
        'Autres creation' => 'Autres_creation'),
            'label'=>"Type Gallerie : ",
            'expanded' => true,
            'multiple' => false))

            ->add('rechercher',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_rech_tgallerie_type';
    }
}
