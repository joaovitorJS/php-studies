<?php

namespace App\Models\Database\ConnectDatabase;

use App\Interfaces\IConnectDatabase;
use PDO;

class ConnectPdoDatabase implements IConnectDatabase
{
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=loja_phpoo", "root", "root");
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function connectDatabase()
    {
        return $this->pdo;        
    }
}