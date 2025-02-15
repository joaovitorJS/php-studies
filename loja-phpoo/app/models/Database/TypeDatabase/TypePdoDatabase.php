<?php

namespace App\Models\Database\TypeDatabase;

use App\Interfaces\IConnectDatabase;
use App\Interfaces\ITypeDatabase;
use App\Models\Database\ConnectDatabase\Connection;
use App\Models\Database\ConnectDatabase\ConnectPdoDatabase;
use PDO;

class TypePdoDatabase implements ITypeDatabase
{
    private PDO $pdo;
    private $objectPdo;

    
    public function __construct()
    {
        $pdo = new Connection(new ConnectPdoDatabase);
        $this->pdo = $pdo->connectDatabase();
    }

    public function prepare(string $sql): ITypeDatabase 
    {
        $this->objectPdo = $this->pdo->prepare($sql);
        return $this;
    }

    public function bindValue(int|string $key, mixed $value): ITypeDatabase 
    {
        $this->objectPdo->bindValue($key, $value);
        return $this;
    }

    public function execute(): ITypeDatabase
    {
        $this->objectPdo->execute();
        return $this;
    }

    public function rowCount(): int 
    {
        return $this->objectPdo->rowCount();
    }

    public function fetch(): mixed 
    {
        return $this->objectPdo->fetch();
    }

    public function fetchAll(): array 
    {
        return $this->objectPdo->fetchAll();
    }
}