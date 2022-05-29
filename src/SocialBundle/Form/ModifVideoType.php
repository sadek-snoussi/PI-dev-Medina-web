<?php

namespace SocialBundle\Form;

use UserBundle\Entity\Videodiy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifVideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('descriptionVideo')
            ->add('tags')
            ->add('Modifier',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {


    }

    public function getBlockPrefix()
    {

    }
}