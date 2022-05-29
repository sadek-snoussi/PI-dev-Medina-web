<?php

namespace GallerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UpdateBonplanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombonplan')
            ->add('adressebonplan')
            ->add('typebonplan',ChoiceType::class,array('choices' => array(
                'Restaurant' => 'Restaurant',
                'Salon de thé' => 'Salon de thé',
                'Musée' => 'Musée',
                'Bien être' => 'Bien être',
                'Site naturelle' => 'Site naturelle',
                'Cinéma' => 'Cinéma',
                'Autres' => 'Autres' ),))

            ->add('latitude',NumberType::class)
            ->add('longitude',NumberType::class)

            ->add('Avisbonplan', ChoiceType::class,array('choices' => array(
                '0' => '0',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',),))
            ->add('Modifier',SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_update_bonplan_type';
    }
}
