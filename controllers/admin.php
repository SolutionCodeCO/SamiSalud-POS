<?php

class Admin extends SessionController {

    private $user;
    
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log('Admin::construct -> Inicio del controlador Admin');
    }

    function render(){
        error_log('Admin::render -> Cargando vista de indexAdmin');
        $user = $_SESSION['user'];
        $this->view->render('admin/indexAdmin', [
            'user' => $user
        ]);
    }

}
