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
        // NOTE: showメソッドの引数にProductのEntityを指定することによって以下の記述をしなくても
        //       リクエストパラメータのIDに該当するProductのEntityが取得できる。
        //       ここでは学習のために明示的にIDを指定して取得している。
        $product = $repository->findOneBy(['id' => $id]);
        if ($product === null) {
            throw $this->createNotFoundException('The product does not exist');
        }

        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}
