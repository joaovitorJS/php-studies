<?php

namespace App\Classes;

class BreadCrumb 
{
    private string $uri;

    public function __construct() {
        $uri = new Uri;
        $this->uri = $uri->getUri();
    }

    public function createBreadCrumb()
    {
        // Breadcrumb para busca
        if (substr_count($this->uri, '?') > 0) {
            $explodeIgual = explode('=', $this->uri);

            $html = "<span style='color: #000;'> Você está buscando: </span>";
            $html .= "<span style='font-style: italic; color: blue'>";
            $html .= "<a href='/' style='text-decoration: none;; color: blue'>Início</a>/" . str_replace('+', '-', $explodeIgual[1]);
            $html .= "</span>";   
            return $html;
        }

        // Breadcrumb para página inicial
        if ($this->uri == "/") {
            $html = "<span style='color: #000;'> Navegação: </span>";
            $html .= "<span style='font-style: italic;'>";
            $html .= "<a href='/' style='text-decoration: none; color: blue'>Início</a>";
            $html .= "</span>";   
            return $html;
        }

        // Breadcrumb para outras páginas internas do site 
        $html = "<span style='color: #000;'> Navegação: </span>";
        $html .= "<span style='font-style: italic; color: blue'>";
        $html .= "<a href='/' style='text-decoration: none; color: blue'>Início</a>/" . ltrim($this->uri, '/');
        $html .= "</span>";   
        return $html;
    }
}