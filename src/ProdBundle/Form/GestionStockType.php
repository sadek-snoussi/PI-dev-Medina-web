<?php

namespace ProdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestionStockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    $builder
    ->add('prixbaseproduit')
    ->add('prixventeproduit')
    ->add('qtedispoproduit')
    ->setMethod('GET')

     ->add('save',SubmitType::class,array('label' => ' '));


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'prod_bundle_gestion_stock_type';
    }
}
