<?php

namespace App\Controllers;

use App\Classes\Uri;

class Method
{
    private Uri $uri;

    public function __construct()
    {
        $this->uri = new Uri;
    }

    
    private function getMethod(): ?string
    {
        if(!$this->uri->emptyUri()) {
            $explodeUri = explode('/', $this->uri->getUri());
            return $explodeUri[2] ?? null;
        }    

        return null;
    }

    
    public function method(object $object): string
    {
        if(method_exists($object, $this->getMethod())) {
            return $this->getMethod();
        }

        return DEFAULT_METHOD;
    }
}