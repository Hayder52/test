<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\SousCategorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('caracteristique', TextType::class)
            ->add('image', FileType::class, [
                'required' => false,
            ])
            ->add('id_sous_categorie', EntityType::class, [
                'class' => SousCategorie::class,
                'choice_label' => 'nom_sous_categorie',
                'placeholder' => 'Sélectionner une sous-catégorie existante',
                'required' => false,
            ])
            ->add('nouvelleSousCategorie', TextType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Créer une nouvelle sous-catégorie',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}