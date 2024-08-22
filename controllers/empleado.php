<?php

class Empleado extends SessionController {
    
    function __construct(){
        parent::__construct();
        error_log('Empleado::construct -> Inicio del controlador Empleado');
    }

    function render(){
        error_log('Empleado::render -> Cargando vista de indexEmpleado');
        $this->view->render('empleado/indexEmpleado');
    }
}
