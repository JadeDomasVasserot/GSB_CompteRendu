<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';
require_once("../include/fct.inc.php");
require_once ("../include/class.pdogsb.inc.php");
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
