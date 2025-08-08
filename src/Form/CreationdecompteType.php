<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class CreationdecompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class,[
                'label' =>'Pseudo',
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('name', TextType::class,[
                'label' =>'Nom',
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('surname', TextType::class,[
                'label' =>'Prenom',
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('mail', TextType::class,[
                'label' =>'Adresse-mail',
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])
            ->add('plainpassword', PasswordType::class,[
                'label' =>'Mot de passe',
                'attr' =>['class' => 'accountext'],
                'required'=> true,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => \App\Entity\User::class,
        ]);
    }
}
