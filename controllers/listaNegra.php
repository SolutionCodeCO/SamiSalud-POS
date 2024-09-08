<?php

class listaNegra extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador fiados');
    }

    function render(){
        error_log('fiados::render -> Cargando vista de fiados');

        $this->view->render('admin/listaNegraAdmin');
    }

}
