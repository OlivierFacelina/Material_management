<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
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
            ->add('birthdate', DateType::class, [
                'label' => "Date de naissance",
                'widget' => 'choice',
                'input'  => 'datetime_immutable',
                'format' => 'dd-MM-yyyy', 
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "YYYY-MM-DD"
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
