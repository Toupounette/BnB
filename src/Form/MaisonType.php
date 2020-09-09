<?php

namespace App\Form;

use App\Entity\Maisons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class MaisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class,[
                'required' => true,
                'label' => 'Titre de l\'annonce',
                'attr' =>[
                    'placeholder' => 'ex.: Jolie maison de campagne'
                ]
            ])

            ->add('description', TextType::class, [
                'required' => true,
                'attr' =>[
                    'placeholder' => 'ex.: Jolie maison de campagne en bord de rivière'
                ]
            ])

            ->add('chambres', IntegerType::class, [
                'required' => true,
                'attr' =>[
                    'placeholder' => 'ex.: 9'
                ]
            ])

            ->add('prix', MoneyType::class,[
                'required' => true,
                'attr' =>[
                    'placeholder' => '150.99'
                ]
            ])

            ->add('note', ChoiceType::class,[
                'required' => true,
                'choices' => [
                    'Mauvais' => 1,
                    'Passable' => 2,
                    'Moyen' => 3,
                    'Bien' => 4,
                    'Très Bien' => 5
                ]
            ])

            ->add('superficie', IntegerType::class,[
                'required' => true,
                'attr' =>[
                    'placeholder' => 'ex.: 250m²'
                ]
            ])

            ->add('img1', TextType::class,[
                'required' => true,
                'attr' =>[
                    'placeholder' => 'ex.: maison1-1.png'
                ]
            ])

            ->add('img2', TextType::class, [
                'attr' =>[
                    'placeholder' => 'ex.: maison1-2.png'
                ]
            ])

            ->add('img3', TextType::class,[
                'required' => true,
                'attr' =>[
                    'placeholder' => 'ex.: maison1-3.png'
                ]
            ])

            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Maisons::class,
        ]);
    }
}
