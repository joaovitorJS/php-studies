<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Repositories\Site\ProductRepository;

class HomeController extends BaseController
{
    public function index($parameters)
    {
        // Listar pelo destaque
        $productRepository = new ProductRepository;
        $productsFeatured = $productRepository->getProductsOrderByFeature(6);

        // Listar pela promoção
        $productsSale = $productRepository->getProductsSale(6);
        
        $data = [
            'title' => 'Loja Virtual | Curso PHPOO',
            'products' => $productsFeatured,
            'productsSale' => $productsSale
        ];

        echo $this->twig->render('site_home.html.twig', $data);
    }
}