<?php

class Admin extends SessionController {
    
    function __construct(){
        parent::__construct();
        error_log('Admin::construct -> Inicio del controlador Admin');
    }

    function render(){
        error_log('Admin::render -> Cargando vista de indexAdmin');
        $this->view->render('admin/indexAdmin');
    }

    public function getData(){
    }

    public function getCategory(){
        
    }
}
