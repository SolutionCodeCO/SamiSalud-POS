<?php

class Errores extends Controller{
    public function __construct(){
        parent:: __construct();
        error_log("===================================================");
        error_log("controller/errores -> Inicio de errores");
    }

    function render(){
        $this->view->render('error/index');
    }
}