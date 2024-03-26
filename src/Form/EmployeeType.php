<?php

namespace App\Form;

use App\Entity\Borrowing;
use App\Entity\Employee;
use App\Entity\TrainingProgram;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => "Prénom",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "John"
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => "Nom",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "DOE"
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'label' => "Roles",
                'required' => true,
                'multiple' => true, // Permettre la sélection de plusieurs valeurs
                'choices' => [
                    'Directeur' => 'Directeur',
                    'Cadre' => 'Cadre',
                    // Ajoutez d'autres options si nécessaire
                ],
                'attr' => [
                    'class' => 'form-control',
                ], 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
