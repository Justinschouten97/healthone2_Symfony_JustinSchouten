<?php


namespace App\Form;


use App\Entity\Arts;
use App\Entity\Patient;
use App\Entity\Recept;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('tussenvoegsel')
            ->add('achternaam')
            ->add('zkNummer')
            ->add('arts', EntityType::class, array(
                'class' => Arts::class,
                'choice_label' => 'achternaam'
            ))
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
            'data_class' => Patient::class
        ]);
    }
}