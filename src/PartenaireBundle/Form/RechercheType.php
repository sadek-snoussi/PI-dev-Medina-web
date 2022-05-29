<?php

namespace PartenaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('typeuser',ChoiceType::class,array('label' => 'Type de Partenariat','choices' => array(
            'Freelancer' =>'Freelancer',
            'Professionnel' => 'Professionnel'),
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
        return 'partenaire_bundle_recherche_type';
    }
}
