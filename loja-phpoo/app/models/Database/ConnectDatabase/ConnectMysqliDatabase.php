<?php

namespace App\Models\Database\ConnectDatabase;

use App\Interfaces\IConnectDatabase;
use mysqli;

class ConnectMysqliDatabase implements IConnectDatabase
{
    private $mysqli;
    
    public function __construct()
    {
        $this->mysqli = new mysqli("127.0.0.1", "root", "root", "loja_phpoo");
    }

    public function connectDatabase()
    {
        return $this->mysqli;
    }
}