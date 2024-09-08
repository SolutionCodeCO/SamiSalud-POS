<?php

class Dulceria extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador dulceria');
    }

    function render(){
        error_log('dulceria::render -> Cargando vista de dulceria');

        $this->view->render('admin/dulceriaAdmin');
    }

}
