<?php

namespace App\Repositories\Site;

use App\Models\Site\Product;

class ProductRepository 
{
    private Product $product;
    
    public function __construct()
    {
        $this->product = new Product;
    }

    // Listar em destaque
    public function getProductsOrderByFeature($limit) 
    {
        $sql = "select * from {$this->product->table} order by feature=1 desc limit $limit";
        return $this->product
            ->typeDatabase
            ->prepare($sql)
            ->execute()
            ->fetchAll();
    }

    // Listar o último produto adicionado
    public function getLastProductAdd()
    {
        $sql = "select products.photo, products.slug, products.name, products.value, products.sale_value, products.sale from {$this->product->table} order by id desc";
        return $this->product
            ->typeDatabase
            ->prepare($sql)
            ->execute()
            ->fetch();
    }

    // Listar em promoção
    public function getProductsSale($limit)
    {
        $sql = "select * from {$this->product->table} where sale=1 order by RAND() limit $limit";
        return $this->product
            ->typeDatabase
            ->prepare($sql)
            ->execute()
            ->fetchAll();
    }
}