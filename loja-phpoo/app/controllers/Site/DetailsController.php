<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\Site\Product;

class DetailsController extends BaseController
{
    private Product $product;

    public function __construct() {
        $this->product = new Product;
    }

    public function index($params) 
    {
        $productFinded = $this->product->find('slug', $params[0]);
        $data = [
            'title' => 'Detalhes do produto ' . $productFinded->name,
            'product' => $productFinded
        ];

        echo $this->twig->render('site_details.html.twig', $data);
    }
}