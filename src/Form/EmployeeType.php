<?php

namespace App\Form;

use App\Entity\Borrowing;
use App\Entity\Employee;
use App\Entity\TrainingProgram;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => "Nom d'utilisateur",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "Nom d'utilisateur"
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => "Mot de passe",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "Mot de passe"
                ]
            ])
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
                'label' => "Rôles",
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'Directeur' => 'ROLE_DIRECTOR',
                    'Cadre' => 'ROLE_MANAGER',
                    'Utilisateur' => 'ROLE_USER',
                ],
                'attr' => [
                    'class' => 'form-check-input',
                ], 
                'choice_attr' => [
                    'Directeur' => ['class' => 'role-label'],
                    'Cadre' => ['class' => 'role-label'],
                    'Utilisateur' => ['class' => 'role-label'],
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
