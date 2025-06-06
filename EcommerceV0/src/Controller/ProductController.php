<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'product.index')]
    public function index(Request $request, ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        return $this->render('product/index.html.twig',
            [
                'products' => $products,
            ]
        );
    }

    #[Route('/product/{item}-{size}-{id}', name: 'product.show', requirements: ['item' => '[a-zA-Z0-9\- ]+', 'size' => '\w+', 'id' => '\d+'])]
    public function detail(Request $request, string $item, string $size, int $id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);
        if ($product->gettitle() != $item || $product->getSize() != $size) {
            return $this->redirectToRoute('product.show', ['item' => $product->gettitle(), 'size' => $product->getSize(), 'id' => $product->getId()]);
        }

        return $this->render('product/detail.html.twig',
            [
                'product' => $product
            ]
        );
    }
}
