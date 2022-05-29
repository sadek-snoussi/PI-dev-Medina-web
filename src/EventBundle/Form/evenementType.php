<?php

namespace EventBundle\Form;

use function PHPSTORM_META\type;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;


class evenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nomevent')
            ->add('descriptionevent',TextareaType::class)
            ->add('dateevent' )
            ->add('objectifevent')
            ->add('lieux')
            ->add('nbrePlace')
            ->add('nbrestand')

            ->add('urlafficheevent', FileType::class, array('label' => 'Image'))

            ->add('Ajouter',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Event'));
    }

    public function getBlockPrefix()
    {
        return 'event_bundleevenement_type';
    }
}
