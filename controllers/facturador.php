<?php

class Facturador extends SessionController {

  
    protected $user;
    
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log('Admin::construct -> Inicio del controlador facturador');
    }

    function render(){
        error_log('facturador::render -> Cargando vista de facturador');
        $user = $this->getUserSessionData(); // Obtén los datos del usuario
        $this->view->render('admin/facturadorAdmin', ['user' => $user]); // Pasa los datos de usuario a la vista
    }

}
