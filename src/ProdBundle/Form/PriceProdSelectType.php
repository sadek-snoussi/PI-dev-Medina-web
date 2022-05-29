<?php

namespace ProdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PriceProdSelectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mini')
            ->add('maxi')
            ->add('s',SubmitType::class,array('label' => ' '));


    }

    public function configureOptions(OptionsResolver $resolver)
    {



    }

    public function getBlockPrefix()
    {
        return 'prod_bundle_price_prod_select_type';
    }
}
