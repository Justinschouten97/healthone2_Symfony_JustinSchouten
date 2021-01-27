<?php

namespace App\Form;

use App\Entity\Arts;
use App\Entity\Patient;
use App\Entity\Recept;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('patient', EntityType::class, array(
                'class' => Patient::class,
                'choice_label' => 'achternaam'
            ))
            ->add('arts', EntityType::class, array(
                'class' => Arts::class,
                'choice_label' => 'achternaam'
            ))
            ->add('dosis')
            ->add('duur')
            ->add('herhalingen', ChoiceType::class, [
                'choices' => [
                    '1 maand na afronding' => '1',
                    '2 maanden na afronding' => '2',
                    '3 maanden na afronding' => '3',
                    '4 maanden na afronding' => '4',
                    '5 maanden na afronding' => '5',
                    '6 maanden na afronding' => '6',
                    '7 maanden na afronding' => '7',
                    '8 maanden na afronding' => '8',
                    '9 maanden na afronding' => '9',
                    '10 maanden na afronding' => '10',
                    '11 maanden na afronding' => '11',
                    '12 maanden na afronding' => '12',
                ]
            ])
            ->add('afgifteDatum')
            ->add('gebruikenTot')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recept::class
        ]);
    }
}
