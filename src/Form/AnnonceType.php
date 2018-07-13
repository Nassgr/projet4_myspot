<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', ChoiceType::class, array(
                'placeholder' => 'Choisissez une catégorie',
                'choices' => array(
                        'Voitures' => 'Voiture',
                        'Vêtements' => 'Vetements',
                        'Téléphonie' => 'Telephone',
                        'Informatique' => 'Informatique',
                        'Console & Jeux vidéos' => 'Console',)
            ))
            ->add('type', ChoiceType::class, array(
                'placeholder' => 'Choisissez une catégorie',
                'choices' => array(
                    'Particulier' => 'Particulier',
                    'Professionnel' => 'Pro',
                ),
            ))
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('price', IntegerType::class)
            ->add('city', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
