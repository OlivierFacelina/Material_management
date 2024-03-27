<?php

namespace App\Form;

use App\Entity\Borrowing;
use App\Entity\Employee;
use App\Entity\Material;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BorrowingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $parisTimeZone = new \DateTimeZone('Europe/Paris');
        $nowInParis = new \DateTime('now', $parisTimeZone);

        $builder
            ->add('material_id', EntityType::class, [
                'class' => Material::class,
                'choice_label' => 'serialnumber',
                'label' => 'Élément emprunté (n° étiquette) : ',
            ])
            ->add('employee', EntityType::class, [
                'class' => Employee::class,
                'choice_label' => 'firstname',
                'label' => 'Employé : ',
            ])
            ->add('borrow_date', null, ['label' => 'Date de début : ', 'view_timezone' => 'Europe/Paris',])
            ->add('expected_return_date', null, ['label' => 'Date de retour prévue : ', 'view_timezone' => 'Europe/Paris',])
            ->add('comment', null, ['label' => 'Commentaire : ']);

        if (isset ($options['edit_mode']) && $options['edit_mode'] === true) {

            $builder
                ->add('borrow_date', DateTimeType::class, [
                    'label' => false,
                    'view_timezone' => 'Europe/Paris',
                    'attr' => ['style' => 'display:none;'],
                ])
                ->add('expected_return_date', DateTimeType::class, [
                    'label' => false,
                    'view_timezone' => 'Europe/Paris',
                    'attr' => ['style' => 'display:none;'],
                ])
                ->add('actual_return_date', DateTimeType::class, [
                    'data' => $nowInParis,
                    'view_timezone' => 'Europe/Paris',
                    'attr' => ['style' => 'display:none;'],
                    'label' => false,
                ])
                ->add('material_id', EntityType::class, [
                    'class' => Material::class,
                    'choice_label' => 'serialnumber',
                    'label' => 'Élément emprunté (n° étiquette) : ',
                    'disabled' => true,
                ])
                ->add('employee', EntityType::class, [
                    'class' => Employee::class,
                    'choice_label' => 'firstname',
                    'label' => 'Employé : ',
                    'disabled' => true,
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Borrowing::class,
            'edit_mode' => false,
        ]);
    }
}