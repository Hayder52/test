<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use App\Repository\SousCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
     /**
     * @Route("/", name="api_categories")
     */
    public function getCategories(
        CategorieRepository $categorieRepository,
        SousCategorieRepository $sousCategorieRepository,
        ProduitRepository $produitRepository
    ): Response {
        $categories = $categorieRepository->findAll();
        $sousCategories = $sousCategorieRepository->findAll();
        $produits = $produitRepository->findAll();
        
        return $this->render('catalogue.html.twig', [
            'categories' => $categories,
            'sousCategories' => $sousCategories,
            'produits' => $produits
        ]);
    }
}
