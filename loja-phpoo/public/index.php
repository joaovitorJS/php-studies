<?php

session_start();

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_METHOD', 'index');

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/functions/functions_twig.php';
require __DIR__ . '/bootstrap/bootstrap.php';
