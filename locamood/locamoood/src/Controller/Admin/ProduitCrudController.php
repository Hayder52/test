<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Entity\SousCategorie;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Symfony\Component\HttpFoundation\Request;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextEditorField::new('caracteristique'),
            ImageField::new('image')
                ->setUploadDir('public/assets/images')
                ->setBasePath('/assets/images'),
            AssociationField::new('id_sous_categorie', 'Sous-catégorie existante')->autocomplete(),
            TextField::new('nouvelleSousCategorie', 'Créer une nouvelle sous-catégorie')
                ->setRequired(false),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance->getNouvelleSousCategorie()) {
            $nouvelleSousCategorie = new SousCategorie();
            $nouvelleSousCategorie->setNomSousCategorie($entityInstance->getNouvelleSousCategorie());
            $entityManager->persist($nouvelleSousCategorie);
            $entityManager->flush();
            $entityInstance->setIdSousCategorie($nouvelleSousCategorie);
        }
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance->getNouvelleSousCategorie()) {
            $nouvelleSousCategorie = new SousCategorie();
            $nouvelleSousCategorie->setNomSousCategorie($entityInstance->getNouvelleSousCategorie());
            $entityManager->persist($nouvelleSousCategorie);
            $entityManager->flush();
            $entityInstance->setIdSousCategorie($nouvelleSousCategorie);
        }
        parent::updateEntity($entityManager, $entityInstance);
    }
}