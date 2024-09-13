<?php

class facturadorListaNegra extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador facturador lista negra');
    }

    function render(){
        error_log('facturador lista negra::render -> Cargando vista de facturador lista negra');

        $this->view->render('admin/facturadorListaNegraAdmin');
    }

}
