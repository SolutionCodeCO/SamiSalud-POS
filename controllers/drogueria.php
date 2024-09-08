<?php

class Drogueria extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('drogueria::construct -> Inicio del controlador drogueria');
    }

    function render(){
        error_log('dorgueria::render -> Cargando vista de drogueria');

        $this->view->render('admin/drogueriaAdmin');
    }

}
