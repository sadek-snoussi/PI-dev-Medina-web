<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenomuser',null, array('label' => 'prenom'))
            ->add('nomuser',null, array('label' => 'nom'))
            ->add('datenaissuser', null, array('label' => 'Date de naissance'))
            ->add('teluser', null, array('label' => 'Date de naissance'));


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'user_bundle_profile_type';
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }
}
