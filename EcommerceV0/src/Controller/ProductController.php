<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'product.index')]
    public function index(Request $request): Response
    {
        return $this->render('product/index.html.twig');
    }

    #[Route('/product/{item}-{size}-{id}', name: 'product.show', requirements: ['item' => '[a-z0-9-]+', 'size' => '\w+', 'id' => '\d+'])]
    public function detail(Request $request, String $item, String $size, int $id): Response
    {

        return $this->render('product/detail.html.twig',
            [
                'item' => $item,
                'size' => $size,
                'id' => $id,
            ]
        );
    }
}
