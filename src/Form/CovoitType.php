<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CovoitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Départ', 'class' => 'input'],
                'required'=>true,
            ])
            ->add('finish', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Destination', 'class' => 'input'],
                'required'=>true,
            ])
            ->add('passenger', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    '1 passager' => 1,
                    '2 passagers' => 2,
                    '3 passagers' => 3,
                    '4 passagers' => 4,
                ],
                'attr' => ['class' => 'input'],
                'required'=>true,
            ])
            ->add('date', DateType::class, [
                'label' => false,
                'widget' => 'single_text',
                'attr' => ['class' => 'inputdate'],
                'required'=>true,
            ])
            ->add('hour', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Heure de départ', 'class' => 'order2']
            ])
            ->add('price', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Croissant' => 'asc',
                    'Décroissant' => 'desc',
                ]
            ])
            ->add('time', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    '1–2 h' => '1-2',
                    '2–3 h' => '2-3',
                    '3–4 h' => '3-4',
                    '4–5 h' => '4-5',
                    '5–6 h' => '5-6',
                    '6–7 h' => '6-7',
                    '7–8 h' => '7-8',
                    '8–9 h' => '8-9',
                    '9–10 h' => '9-10',
                    '10–11 h' => '10-11',
                    '11–12 h' => '11-12',
                ],
                'attr' => ['class' => 'input']
            ])
            ->add('electric', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ]
            ])
            ->add('note', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    '5' => 5,
                    '4 ou +' => 4,
                    '3 ou +' => 3,
                    '2 ou +' => 2,
                    '1 ou +' => 1,
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}

