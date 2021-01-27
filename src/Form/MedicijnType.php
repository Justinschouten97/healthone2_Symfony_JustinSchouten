<?php


namespace App\Form;


use App\Entity\Medicijn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicijnType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medicijnNaam')
            ->add('medicijnWerking')
            ->add('medicijnBijwerking')
            ->add('verzekerd', ChoiceType::class, [
                'choices' => [
                    'Ja' => '0',
                    'Nee' => '1',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicijn::class
        ]);
    }
}