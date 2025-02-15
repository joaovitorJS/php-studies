<?php 

namespace App\Models\Database\ConnectDatabase;

use App\Interfaces\IConnectDatabase;

class Connection
{
    public function __construct(private IConnectDatabase $iconnectDatabase) {}
    
    public function connectDatabase()
    {
        return $this->iconnectDatabase->connectDatabase();
    }
}