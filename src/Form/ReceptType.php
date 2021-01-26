<?php

namespace App\Form;

use App\Entity\Arts;
use App\Entity\Patient;
use App\Entity\Recept;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('dosis')
            ->add('herhalingen')
            ->add('afgifteDatum')
            ->add('arts', EntityType::class, array(
                'class' => Arts::class,
                'choice_label' => 'achternaam'
            ))
            ->add('gebruikenTot')
            ->add('duur')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recept::class
        ]);
    }
}
