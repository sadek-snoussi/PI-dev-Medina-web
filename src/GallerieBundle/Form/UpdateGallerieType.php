<?php

namespace GallerieBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\File\File;
use UserBundle\Entity\Gallerie;

class UpdateGallerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('TitreGallerie')
            ->add('Description',TextareaType::class)
            ->add('typeGallerie',ChoiceType::class,array('choices' => array(
                'Textile' => 'Textile',
                'Monument' => 'Monument',
                'Statue' => 'Statue',
                'Personnalité' => 'Personnalite',
                'bibelot' => 'bibelot',
                'Autres creation' => 'Autres_creation',
            )))
            ->add('lieugallerie',ChoiceType::class,array('choices' => array('Tunis' => 'Tunis',
                'Ben Arous' => 'Ben Arous',
                'Ariana' => 'Ariana',
                'Manouba' => 'Manouba',
                'Beja' => 'Beja',
                'Kef' => 'Kef',
                'Jandouba' => 'Jandouba',
                'Sfax' => 'Sfax',
                'Sousse' => 'Sousse',
                'Gabes' => 'Gabes',
                'Nabeul' => 'Nabeul',
                'Monastir' => 'Monastir',
                'Kairaoun' => 'Kairaoun',
                'Gafsa' => 'Gafsa',
                'Kasserine' => 'Kasserine',
                'Kebili' => 'Kebili',
                'Médenine' => 'Médenine',
                'Mahdia' => 'Mahdia',
                'Sidi Bouzid' => 'Sidi Bouzid',
                'Tataouine' => 'Tataouine',
                'Zaghouan' => 'Zaghouan',
                'Tozeur' => 'Tozeur'),))
            ->add('Modifier',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class' => 'UserBundle\Entity\Gallerie'

        ));

    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_update_gallerie_type';
    }
}
