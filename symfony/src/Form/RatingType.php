<?php

namespace App\Form;

use App\Entity\Rating;
use App\Entity\User;
use App\Entity\CreateRecette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RatingType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('note', ChoiceType::class, [
        'choices' => [
          '0' => '0.0',
          '1' => '1.0',
          '2' => '2.0',
          '3' => '3.0',
          '4' => '4.0',
          '5' => '5.0'
        ]
      ])
      ->add('commentaire')
      ->add('user', EntityType::class, [
        'class' => User::class,
        'choice_label' => 'username'
      ])
      ->add('recette', EntityType::class, [
        'class' => CreateRecette::class,
        'choice_label' => 'TitreRecette'
      ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Rating::class,
    ]);
  }
}
