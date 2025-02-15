<?php

namespace App\Models;

use App\Interfaces\ITypeDatabase;
use App\Models\Database\TypeDatabase\TypeDatabase;
use App\Models\Database\TypeDatabase\TypePdoDatabase;

class Model 
{   
    public $table = null;

    public ITypeDatabase $typeDatabase;

    public function __construct()
    {
        $database = new TypeDatabase(new TypePdoDatabase);
        $this->typeDatabase = $database->getDatabase();
    }

    public function findAll() 
    {
        $sql = "select * from {$this->table}";
        
        return $this->typeDatabase
            ->prepare($sql)
            ->execute()
            ->fetchAll();
    }

    public function find($field, $value, $fetch = null) 
    {
        $sql = "select * from {$this->table} where $field = ?";
        $this->typeDatabase
            ->prepare($sql)
            ->bindValue(1, $value)
            ->execute();
        
        return $fetch == null ? $this->typeDatabase->fetch() : $this->typeDatabase->fetchAll();
    }

}