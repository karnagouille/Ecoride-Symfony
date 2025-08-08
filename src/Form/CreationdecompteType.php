<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreationdecompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class,[
                'label' =>false,
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('name', TextType::class,[
                'label' =>false,
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('surname', TextType::class,[
                'label' =>false,
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('mail', TextType::class,[
                'label' =>false,
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'attr' => ['class' => 'accountext'],
                'required' => true,
                'constraints' => [
                new NotBlank([
            'message' => 'Vous devez saisir un mot de passe',
                ]),
            ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => \App\Entity\User::class,
        ]);
    }
}
