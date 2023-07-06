<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('ville')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('dateNaiss', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control'

                ],
                
                'label' => 'Date de naissance'
            ])
            ->add('tel', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Le numéro de téléphone doit être exactement de {{ limit }} caractères.',
                        'max' => 10, 
                         // Vous pouvez également définir une longueur maximale si nécessaire.
                    ])
                    ],
                'label' => 'Numéro de téléphone'

            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Adresse'
            ])
            ->add(
                'password',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Les mots de passe ne correspondent pas.',
                    'options' => ['attr' => ['class' => 'password-field']],
                    'required' => true,
                    'first_options'  => [
                        'label' => 'Mot de passe',
                        'attr' => [
                            'class' => 'form-control'
                        ]
                    ],
                    'second_options' => [
                        'label' => 'Confirmation du mot de passe',
                        'attr' => [
                            'class' => 'form-control'
                        ]
                    ],
                    'constraints' => [
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères.',
                            // 'max' => 4096'  // Vous pouvez également définir une longueur maximale si nécessaire.
                        ])
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
