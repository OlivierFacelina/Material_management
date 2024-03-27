<?php

namespace App\Form;

use App\Entity\Material;
use App\Entity\MaterialKind;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom du Matériel",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "Ecran HP Compaq LA2006x"
                ]
            ])
            ->add('serialnumber', TextType::class, [
                'label' => "Numéro de série",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "7G3NVF2"
                ]
            ])
            ->add('tagnumber', TextType::class, [
                'label' => "Numéro de l'étiquette",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "AMADVGA001"
                ]
            ])
            ->add('comment', TextType::class, [
                'label' => "Commentaire",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "Ajouter un commentaire..."
                ]
            ])
            ->add('location', TextType::class, [
                'label' => "Location",
                'required' => true,
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => "Cancùn"
                ]
            ])
            ->add('type', EntityType::class, [
                'class' => MaterialKind::class,
                'choice_label' => 'name',
                'label' => 'Type de matériel'
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Material::class,
        ]);
    }
}
