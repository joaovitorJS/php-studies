<?php

use App\Classes\BreadCrumb;
use App\Repositories\Site\CategoryRepository;
use App\Repositories\Site\ProductRepository;
use Twig\TwigFunction;

$site_url = new TwigFunction("site_url", function () {
    return 'http://' . $_SERVER['SERVER_NAME'] . ':8000'; 
});

// Listar as categorias no left menu
$categories = new TwigFunction("categories", function () {
    $categoryRepository = new CategoryRepository;
    return $categoryRepository->getProductsCategories(); 
});


// Listar as novidades no right menu
$newProduct = new TwigFunction("newProduct", function () {
    $productRepository = new ProductRepository;
    return $productRepository->getLastProductAdd(); 
});

// Listar produto em promoção
$saleProduct = new TwigFunction("saleProduct", function () {
    $productRepository = new ProductRepository;
    return $productRepository->getProductsSale(1); 
});


$breadCrumb = new TwigFunction("breadCrumb", function () {
    $breadCrumb = new BreadCrumb;
    return $breadCrumb->createBreadCrumb();
}); 


