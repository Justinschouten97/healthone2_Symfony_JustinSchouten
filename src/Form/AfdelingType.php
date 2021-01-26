<?php

namespace App\Form;

use App\Entity\Afdeling;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfdelingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('locatie', ChoiceType::class, [
                'choices' => [
                    'Delft' => 'Delft',
                    'Den Haag' => 'Den Haag',
                    'Naaldwijk' => 'Naaldwijk',
                    'Leidschendam' => 'Leidschendam',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Afdeling::class,
        ]);
    }
}
