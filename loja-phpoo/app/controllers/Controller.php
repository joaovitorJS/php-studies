<?php

namespace App\Controllers;

use App\Classes\Uri;

class Controller
{
    private const NAMESPACE_CONTROLLER = '\\App\\Controllers\\';
    private const FOLDERS_CONTROLLER = ['Site', 'Admin'];
    private const ERROR_CONTROLLER = '\\App\\Controllers\\Errors\\ErrorController';

    private Uri $uri;

    public function __construct() {
        $this->uri = new Uri;
    }

    
    private function getController(): string
    {
        if(!$this->uri->emptyUri()) {
            $explodeUri = array_filter(explode('/', $this->uri->getUri()));
            
            return ucfirst($explodeUri[1]).'Controller';
        }        

        return ucfirst(DEFAULT_CONTROLLER).'Controller';
    }

    
    public function controller(): string
    {
        $controller = $this->getController();

        foreach(self::FOLDERS_CONTROLLER as $forderController) {
            if (class_exists(self::NAMESPACE_CONTROLLER.$forderController.'\\'.$controller)) {
                return self::NAMESPACE_CONTROLLER.$forderController.'\\'.$controller;
            }
        }

        return self::ERROR_CONTROLLER;
    }
}