<?php

class Nevera extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador nevera');
    }

    function render(){
        error_log('nevera::render -> Cargando vista de nevera');

        $this->view->render('admin/neveraAdmin');
    }

}
