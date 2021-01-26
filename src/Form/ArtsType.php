<?php

namespace App\Form;

use App\Entity\Arts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('tussenvoegsel')
            ->add('achternaam')
            ->add('soortArts', ChoiceType::class, [
                'choices' => [
                    'KNO' => 'KNO',
                    'Kinderarts' => 'Kinderarts',
                    'Oncoloog' => 'Oncoloog',
                ]
            ])
            ->add('straat')
            ->add('huisNr')
            ->add('postcode')
            ->add('plaats')
            ->add('email')
            ->add('telefoonNummer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Arts::class
        ]);
    }
}
