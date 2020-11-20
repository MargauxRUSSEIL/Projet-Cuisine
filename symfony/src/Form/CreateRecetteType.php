<?php

namespace App\Form;

use App\Entity\CreateRecette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class CreateRecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('TitreRecette')
            ->add('Presentation')
            ->add('NbPersonnes')
            ->add('Difficulte', RangeType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 5
                ]
                ])
            ->add('ingredients')
            ->add('instruments')
            ->add('recette')
            ->add('TempsCuisson')
            ->add('TempsPreparation')
            ->add('createdAt', DateType::class,
            [
                'years' => range(1980, 2022),
                'format' => 'ddMMMMyyyy'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreateRecette::class,
        ]);
    }
}
