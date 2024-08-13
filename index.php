<?php
date_default_timezone_set('America/Bogota');

error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set("error_log", "php-error.log");
error_log("===================================================");
error_log("Iniciando app");
error_log("===================================================");

require_once 'libs/app.php';

$app= new App();