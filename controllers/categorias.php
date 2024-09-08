<?php

class Categorias extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador categorias');
    }

    function render(){
        error_log('categorias::render -> Cargando vista de categorias');

        $this->view->render('admin/categoryAdmin');
    }

}
