<?php

namespace PartenaireBundle\Form;

use function PHPSTORM_META\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('telbureaupro', null, array('label' => 'numero de l entreprise:'))

            ->add('specialitepart', ChoiceType::class, array('label' => 'Specialité', 'choices' =>
            array(' Patisserie' => 'patisserie', 'epicerie' => 'epicerie')))

            ->add('gradepro', ChoiceType::class, array('label' => 'Grade', 'choices' =>
                array(' platinuim' => 'platinuim', 'Gold' => 'gold','Silver'=>'silver')))


            ->add('urllogopro', FileType::class, array('label' => 'Logo de l entreprise'))
            ->add('demander',SubmitType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'partenaire_bundle_partenaire_type';
    }

}
