<?php

namespace App\Form;

use App\Entity\Employee;
use App\Entity\TrainingProgram;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->add('roles', TextType::class, [
                'label' => "Fonction",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "Apprenant(e)"
                ]
            ])
            // ->add('name', EntityType::class, [
            //     'class' => TrainingProgram::class,
            //     'choice_label' => 'Formation',
            //     'multiple' => true,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
