<?php

namespace PartenaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RecherecheSpecType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('specialitepart',ChoiceType::class,array('label' => 'Specialité','choices' => array(
            'Epicerie' =>'Epicerie',
            'Patisserie' => 'Patisserie',
            'Bijouterie' => 'Bijouterie'),
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
        return 'partenaire_bundle_rechereche_spec_type';
    }
}
