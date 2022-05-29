<?php

namespace ProdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateProdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomproduit')
            ->add('referenceProd')

            ->add('idcategorie',EntityType::class,array(
                'class'=>'UserBundle\Entity\Categorie',
                'choice_label'=>'nomcategorie',
                'multiple'=>false,
            ))
            ->add('matiereproduit')
            ->add('prixbaseproduit')
            ->add('prixventeproduit')
            ->add('dateexpirationproduit')
            ->add('qtedispoproduit')
            ->add('urlimgproduit',FileType::class)
            ->add('Ajouter',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'prod_bundle_update_prod_type';
    }
}
