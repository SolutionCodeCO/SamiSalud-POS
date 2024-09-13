<?php

class Facturador extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador facturador');
    }

    function render(){
        error_log('facturador::render -> Cargando vista de facturador');

        $this->view->render('admin/facturadorAdmin');
    }

}
