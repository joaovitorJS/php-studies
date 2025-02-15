<?php

namespace App\Classes;

class Redirect
{
    
    public function redirectTo($redirect = null): void
    {
        if($redirect == null) {
            return header('Location:/');
        }

        return header("Location:/$redirect");
    }
}