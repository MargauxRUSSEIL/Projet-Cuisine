<?php

namespace App\Form;

use App\Entity\CreateRecette;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
            ->add('photo', FileType::class, [
                'label' => 'Photo (.png type)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image document',
                    ])
                ],
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'lastname'
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
