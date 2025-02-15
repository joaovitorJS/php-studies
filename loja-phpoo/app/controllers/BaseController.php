<?php

namespace App\Controllers;

use Twig\Environment;

class BaseController 
{
    protected Environment $twig;

    public function setTwig(Environment $twig): void 
    {
        $this->twig = $twig;
    }   
}