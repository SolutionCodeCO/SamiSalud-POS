<?php

class Admin extends SessionController {

    protected $user;
    
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log('Admin::construct -> Inicio del controlador Admin');
    }

    function render(){
        error_log('Admin::render -> Cargando vista de indexAdmin');
        $user = $this->getUserSessionData(); // Obtén los datos del usuario
        $this->view->render('admin/indexAdmin', ['user' => $user]); // Pasa los datos de usuario a la vista
    }

}
