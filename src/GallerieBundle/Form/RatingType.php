<?php

namespace SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ratingValue', \blackknight467\StarRatingBundle\Form\RatingType::class, ['label' => 'Mon évaluation'])
            ->add('Donnez votre avis',SubmitType::class)

        ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'social_bundle_rating_type';
    }
}
