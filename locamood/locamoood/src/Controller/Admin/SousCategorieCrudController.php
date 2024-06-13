<?php

namespace App\Controller\Admin;

use App\Entity\SousCategorie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class SousCategorieCrudController extends AbstractCrudController
{
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public static function getEntityFqcn(): string
    {
        return SousCategorie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom_sous_categorie'),
            ImageField::new('image')
                ->setUploadDir('public/assets/images')
                ->setBasePath('/assets/images')
                ->setRequired(false), 
            AssociationField::new('id_categorie', 'Catégorie'),
        ];
    }

    // public function configureCrud(Crud $crud): Crud
    // {
    //     return $crud
    //         ->setEntityLabelInSingular('Sous-Catégorie')s
    //         ->setEntityLabelInPlural('Sous-Catégories')
    //         ->setSearchFields(['nom_sous_categorie', 'id_categorie.nom']);
    // }

    // public function configureActions(Actions $actions): Actions
    // {
    //     return $actions
    //         ->add(Crud::PAGE_INDEX, Action::DETAIL);
    // }

    // public static function getSubscribedEvents()
    // {
    //     return [
    //         BeforeEntityPersistedEvent::class => 'uploadImage',
    //         BeforeEntityUpdatedEvent::class => 'uploadImage',
    //     ];
    // }

    // public function uploadImage($event)
    // {
    //     $entity = $event->getEntityInstance();
    
    //     if (!$entity instanceof SousCategorie) {
    //         return;
    //     }
    
    //     /** @var UploadedFile $file */
    //     $file = $entity->getFile();
    //     if ($file) {
    //         $filename = uniqid().'.'.$file->guessExtension();
    
    //         try {
    //             $file->move($this->kernel->getProjectDir().'/public/assets/images', $filename);
    //             $entity->setImage($file); 
    //         } catch (FileException $e) {
    //         }
    //     }
    // }
}
