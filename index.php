<?php
date_default_timezone_set('America/Bogota');

error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set("error_log", "php-error.log");

error_log("Iniciando App");
error_log("===================================================");

require_once 'clases/error_messages.php';
require_once 'clases/success_messages.php';
require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
require_once 'config/config.php';
require_once 'libs/app.php';

$app= new App();
