<?php

namespace GallerieBundle\Form;

use blackknight467\StarRatingBundle\Form\RatingType;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use WebServiceBundle\Entity\Bonplan;




class BonplanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombonplan')
                ->add('adressebonplan')
                 ->add('typebonplan',ChoiceType::class,array('choices' => array(
                     'Restaurant' => 'Restaurant',
                     'Salon de thé' => 'Salon de thé',
                     'Musée' => 'Musée',
                     'Bien être' => 'Bien être',
                     'Site naturelle' => 'Site naturelle',
                     'Cinéma' => 'Cinéma',)))

            ->add('latitude',NumberType::class)
            ->add('longitude',NumberType::class)

            ->add('imgBonplan' ,FileType::class,array('label'=>'Inserer la photo du bon plan'))
            ->add('Ajouter',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class' => 'WebServiceBundle\Entity\Bonplan'

        ));
    }

    public function getBlockPrefix()
    {
        return 'gallerie_bundle_bonplan_type';
    }
}
