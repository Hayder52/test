<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\SousCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/detail/{id}", name="product_detail")
     */
    public function detail(int $id, SousCategorieRepository $sousCategorieRepository): Response
    {
        $sousCategorie = $sousCategorieRepository->find($id);

        if (!$sousCategorie) {
            throw $this->createNotFoundException('La sous-catégorie n\'existe pas');
        }

        return $this->render('detail.html.twig', [
            'sousCategorie' => $sousCategorie,
        ]);
    }
}
