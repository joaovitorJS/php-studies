<?php

namespace App\Controllers\Errors;

use App\Controllers\BaseController;

class ErrorController extends BaseController
{
    public function index(): void
    {
        dump('error');
    }
}