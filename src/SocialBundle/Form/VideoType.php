<?php

namespace SocialBundle\Form;

use UserBundle\Entity\Videodiy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('descriptionVideo')
            ->add('tags')
            ->add('video', FileType::class)
            ->add('Ajouter',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Videodiy'
        ));

    }

    public function getBlockPrefix()
    {
        return 'social_bundle_video_type';
    }
}
