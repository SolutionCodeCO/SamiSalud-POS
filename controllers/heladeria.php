<?php

class Heladeria extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador heladeria');
    }

    function render(){
        error_log('heladeria::render -> Cargando vista de heladeria');

        $this->view->render('admin/heladeriaAdmin');
    }

}
