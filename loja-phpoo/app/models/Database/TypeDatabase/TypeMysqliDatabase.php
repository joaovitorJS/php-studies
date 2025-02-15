<?php

namespace App\Models\Database\TypeDatabase;

use App\Interfaces\ITypeDatabase;
use App\Models\Database\ConnectDatabase\Connection;
use App\Models\Database\ConnectDatabase\ConnectMysqliDatabase;
use mysqli;

class TypeMysqliDatabase implements ITypeDatabase
{
    private mysqli $mysqli;
    private $objectMysqli;

    public function __construct()
    {
        $mysqli = new Connection(new ConnectMysqliDatabase);
        $this->mysqli = $mysqli->connectDatabase();
    }

    public function prepare(string $sql): ITypeDatabase
    {
        $this->objectMysqli = $this->mysqli->prepare($sql);
        return $this;
    }

    public function bindValue(int|string $key, mixed $value): ITypeDatabase
    {
        $type = substr(gettype($value),0, 1);
        $this->objectMysqli->bind_param($type, $value);
        return $this;
    }

    public function execute(): ITypeDatabase
    {
        $this->objectMysqli->execute();
        return $this;
    }

    public function rowCount(): int
    {
        return $this->objectMysqli->num_rows();
    }

    public function fetch(): mixed
    {
        return $this->objectMysqli->get_result()->fetch_object();
    }

    public function fetchAll(): array 
    {
        $data = [];
        $result = $this->objectMysqli->get_result();
        
        while($resultFetch = $result->fetch_assoc()) {
            $data[] = $resultFetch;
        }

        return $data;
    }
}