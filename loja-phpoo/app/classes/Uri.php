<?php

namespace App\Classes;

class Uri 
{
    private string $uri;

    public function __construct() {
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function emptyUri(): bool
    {
        return $this->uri === '/';
    }

    
    public function getUri(): string
    {
        return $this->uri;
    }
}
