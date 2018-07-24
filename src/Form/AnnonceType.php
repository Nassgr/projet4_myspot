<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', ChoiceType::class, array(
                'label' => 'Catégorie',
                'placeholder' => 'Choisissez une catégorie',
                'choices' => array(
                        'Costume 2 pièces' => 'Costume 2 pièces',
                        'Costume 3 pièces' => 'Costume 3 pièces',
                        'Veste' => 'Veste',
                        'Pantalon' => 'Pantalon',
                        'Gilet' => 'Gilet',
                        'Cravate' => 'Cravate',
                        'Boutons Manchettes' => 'Boutons Manchettes',
                        'Montre' => 'Montre',
                        'Chaussure' => 'Chaussure',)
            ))
            ->add('type', ChoiceType::class, array(
                'label' => 'Vous êtes un :',
                'placeholder' => 'Choisissez une catégorie',
                'choices' => array(
                    'Particulier' => 'Particulier',
                    'Professionnel' => 'Pro',
                ),
            ))
            ->add('title', TextType::class, array(
                'label' => 'Titre',
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'Description',
            ))
            ->add('price', IntegerType::class, array(
                'label' => 'Prix',
            ))
            ->add('city', TextType::class, array(
                'label' => 'Ville',
            ))
            ->add('imageFile', VichImageType::class, array(
                'label' => 'Photo de votre produit',
                'required' =>false,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
