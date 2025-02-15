<?php

namespace App\Classes;

class Parameters
{ 
    private string $uri;
    private $parameters;
    
    public function __construct()
    {
        $uri = new Uri;
        $this->uri = $uri->getUri();
    }

    
    private function explodeParameters(): void
    {
        $explodeUri = explode("/", $this->uri);
        $this->parameters = array_filter($explodeUri);
    }

    
    public function getParametersMethod(object $object, string $method)
    {
        if(method_exists($object, $method)) {
            $this->explodeParameters();

            if ($method == 'index') {
                unset($this->parameters[1]);
                return isset($this->parameters[2]) ? array_values($this->parameters) : null;
            }

            unset($this->parameters[1], $this->parameters[2]);

            return isset($this->parameters[3]) ? array_values($this->parameters) : null;
        }

        return null;
    }
}