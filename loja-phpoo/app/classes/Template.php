<?php

namespace App\Classes;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class Template
{
    
    public function loader(): FilesystemLoader
    {
        return new FilesystemLoader(["app/views/site", "app/views/admin"]);
    }

    public function init(): Environment
    {
        return new Environment($this->loader(), [
            'debug' => true,
            // 'cache' => ''
            'auto_reload' => true,
        ]);
    }
}