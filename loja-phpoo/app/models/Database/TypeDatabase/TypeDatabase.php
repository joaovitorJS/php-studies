<?php

namespace App\Models\Database\TypeDatabase;

use App\Interfaces\ITypeDatabase;

class TypeDatabase
{
    public function __construct(private ITypeDatabase $iTypeDatabase) {}

    public function getDatabase(): ITypeDatabase
    {
        return $this->iTypeDatabase;        
    }
}