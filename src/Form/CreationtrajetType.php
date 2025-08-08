<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreationtrajetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_depart',TextType::class, [
            'label'=> false,
            'attr' => ['class' => '']
            ])
            ->add('lieu_depart',TextType::class, [
            'label'=> false,
            'attr' => ['class' => '']
            ])
            ->add('heure_depart',TextType::class, [
            'label'=> false,
            'attr' => ['class' => '']
            ])
            ->add('date_arrivée',TextType::class, [
            'label'=> false,
            'attr' => ['class' => '']
            ])
            ->add('lieu_arrivee',TextType::class, [
            'label'=> false,
            'attr' => ['class' => '']
            ])
            ->add('heure_heure',TextType::class, [
            'label'=> false,
            'attr' => ['class' => '']
            ])
            ->add('prix',TextType::class, [
            'label'=> false,
            
            ])
            ->add('car',EntityType::class, [
            'label'=> false,
            'choices' =>$options [ 'user_cars'],
            'choice_label' => 'model',
            'attr' => ['class' => '']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
