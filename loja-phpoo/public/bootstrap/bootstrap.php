<?php

use App\Controllers\Controller;
use App\Controllers\Method;
use App\Classes\Template;
use App\Classes\Parameters;

$templeate = new Template;
$twig = $templeate->init();
$twig->addFunction($site_url);
$twig->addFunction($categories);
$twig->addFunction($newProduct);
$twig->addFunction($saleProduct);
$twig->addFunction($breadCrumb);

$callController = new Controller;
$calledController = $callController->controller();
$controller = new $calledController();
$controller->setTwig($twig);

$callMethod = new Method;
$method = $callMethod->method($controller);

$parameters = new Parameters;
$parameter = $parameters->getParametersMethod($controller, $method);

$controller->$method($parameter);