<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Form\SousCategorieType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class CategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', 'Nom de la catégorie'),
            CollectionField::new('sousCategories', 'Sous-catégories')
                ->setEntryType(SousCategorieType::class)
                ->allowAdd()
                ->allowDelete()
                ->renderExpanded() 
        ];
    }
    
}
