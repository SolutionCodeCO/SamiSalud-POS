<?php

class Login extends Controller{
    public function __construct(){
        parent:: __construct();
        error_log("controllers/login.php -> Inicio de login");
        error_log("===================================================");
    }

    function render(){
        $this->view->render('login/index');
    }
}