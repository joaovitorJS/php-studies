<?php

namespace App\Repositories\Site;

use App\Models\Site\Category;

class CategoryRepository
{
    private Category $category;

    public function __construct() {
        $this->category = new Category;
    }

    public function getProductsCategories(): array
    {
        $sql = "select categories.slug, categories.name from {$this->category->table} 
            group by categories.id
            order by categories.name
        ";
            
        return $this->category
            ->typeDatabase
            ->prepare($sql)
            ->execute()
            ->fetchAll();
    }
}
