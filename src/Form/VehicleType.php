<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price', NumberType::class, [
                'required' => true,
                'label' => 'Prix du véhicule'
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Ordinaire' => 1,
                    'Luxe' => 2
                ],
                'label' => 'Type de véhicule'    
            ])
            ->add('userFees', NumberType::class, [
                'attr' => [
                    'readonly' => true,
                    'step' => 0.01,
                ],
                'mapped' => false,
                'empty_data' => 0,
                'label' => 'Frais de base'
            ])
            ->add('specialFees', NumberType::class, [
                'attr' => [
                    'readonly' => true,
                    'step' => 0.01,
                ],
                'mapped' => false,
                'label' => 'Frais spéciaux'
            ])
            ->add('associationFees', NumberType::class, [
                'attr' => [
                    'readonly' => true,
                    'step' => 0.01,
                ],
                'mapped' => false,
                'label' => 'Frais d\'association'
            ])
            ->add('storageCosts', NumberType::class, [
                'attr' => [
                    'readonly' => true,
                    'step' => 0.01,
                ],
                'mapped' => false,
                'label' => 'Frais d\'entreposage'
            ])
            ->add('totalPrice', NumberType::class, [
                'attr' => [
                    'readonly' => true,
                    'step' => 0.01,
                ],
                'mapped' => false,
                'label' => 'Prix total'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Calculer le prix total'
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
