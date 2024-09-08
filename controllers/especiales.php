<?php

class Especiales extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador especiales');
    }

    function render(){
        error_log('especiales::render -> Cargando vista de especiales');

        $this->view->render('admin/especialesAdmin');
    }

}
