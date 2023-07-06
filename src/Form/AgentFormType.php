<?php

namespace App\Form;

use App\Entity\Agents;
use App\Entity\Discipline;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AgentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anneScolaire', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=> 'fw-bold']])
        ->add('matricule', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=> 'fw-bold']])
        ->add('civilite', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=> 'fw-bold']])
        ->add('sexe', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=> 'fw-bold']])
        ->add('nom', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=> 'fw-bold']])
        ->add('prenom', TextType::class, ['attr' => ['class'=> 'form-control']])
        ->add('nomJeuneFille', TextType::class, ['attr' => ['class'=> 'form-control']])
        ->add('volumeHoraie', TextType::class, ['attr' => ['class'=> 'form-control']])
        ->add('email', TextType::class, ['attr' => ['class'=> 'form-control']])
        ->add('premierePriseDeService', DateType::class, ['attr' => ['class'=> 'form-control']])
        ->add('dateEntreStructure', DateType::class, ['attr' => ['class'=> 'form-control']])
        // ->add('partentEmploi', TextType::class, ['attr' => ['class'=> 'form-control']])
        // ->add('parentStructureRatachee', TextType::class, ['attr' => ['class'=> 'form-control']])
        ->add('discipline', EntityType::class, ['class' => Discipline::class, 'attr' => ['class'=> 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agents::class,
        ]);
    }
}
