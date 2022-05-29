<?php

namespace EventBundle\Form;

use function PHPSTORM_META\type;
use function Sodium\add;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheEvent extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lieux',ChoiceType::class,array(            'choices'=> array(
                'Tunis' => 'Tunis',
                'Ariana'=>'Ariana',
                'Ben Arous'=>'Ben Arous',
                'Manouba'=>'Manouba',
                'Nabeul' => 'Nabeul',
                'Bizerte'=>'Bizerte',
                'Sousse'=>'Sousse',
                'Sfax'=>'Sfax',
                'Monastir'=>'Monastir',
                'Mahdia'=>'Mahdia',
                'Gabés'=>'Gabés',
                'Zaghouane'=>'Zaghouane',
                'Jendouba'=>'Jendouba',
                'Beja'=>'Beja',
                'Le kef'=>'Le kef',
                'Siliana'=>'Siliana',
                'Kairouan'=>'Kairouan',
                'Sidi Bouzid'=>'Sidi Bouzid',
                'Gafsa'=>'Gafsa',
                'Kasserine'=>'Kasserine',
                'Tozeur'=>'Tozeur',
                'Médenine'=>'Médenine',
                'Kébili'=>'Kébili',
                'Tataouine'=>'Tataouine'

            )))
        ->add('Recherche',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'event_bundle_recherche_event';
    }
}
