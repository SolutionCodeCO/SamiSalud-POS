<?php

class Pastillero extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador pastillero');
    }

    function render(){
        error_log('pastillero::render -> Cargando vista de pastillero');

        $this->view->render('admin/pastilleroAdmin');
    }

}
