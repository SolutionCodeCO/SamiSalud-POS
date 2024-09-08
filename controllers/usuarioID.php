<?php

class UsuarioID extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador usuarioID');
    }

    function render(){
        error_log('usuarioID::render -> Cargando vista de usuarioID');

        $this->view->render('admin/usuarioIDAdmin');
    }

}
