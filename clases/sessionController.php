<?php
require_once 'clases/sessions.php';
require_once 'models/empleadosModel.php';
class sessionController extends Controller{
    protected $defaultSites; // Declarar la propiedad
    private $userSession;
    private $userName;
    private $userId;
    private $session;
    private $sites;
    private $user;
}