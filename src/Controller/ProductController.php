<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'product_index')]
    public function index(ProductRepository $repository): Response
    {
        $products = $repository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/product/{id<\d+>}', name: 'product_show')]
    public function show($id, ProductRepository $repository): Response
    {
        $product = $repository->findOneBy(['id' => $id]);

        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}
