<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Rollerworks\Component\PasswordStrength\Validator\Constraints\PasswordStrength;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'attr' =>[
                    'placeholder' => 'Email'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Veuillez acceptez nos Conditions Générales d\'Utilisation.',
                    ]),
                ],
                'label' => 'Acceptez les conditions générales d\'utilisation.'
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrez un mot de passe.',
                    ]),
                    //new Length([
                     //   'min' => 8,
                      //  'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                       // 'max' => 4096,
                   // ]),

                   new PasswordStrength([

                       //longueur mini
                       'minLength' => 8,
                       'tooShortMessage' => 'Le mot de passe doit contenir au moins 8 caractères.',
                       // force mini
                        'minStrength' => 4,
                        'message' => 'Le mot de passe doit contenir au mois une lettre minuscule, une lettre majuscule,
                        un chiffre et un caractère spécial.'
                   ])

                ],
                'attr' => [
                    'placeholder' => 'mot de passe'
                ],
                'label' => 'Mot de passe'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
