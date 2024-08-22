<?php

class Login extends sessionController{
    public function __construct(){
        parent:: __construct();
        error_log("controllers/login.php -> Inicio de login");
        error_log("===================================================");
    }

    function render(){
        $this->view->render('login/index');
    }

    public function authenticate(){
        if($this->existPOST(['usuario', 'contrasenia'])){
            $usuario = $this->getPost('usuario');
            $contrasenia = $this->getPost('contrasenia');

            if($usuario == '' || empty($usuario || $contrasenia == '' || empty($contrasenia) )){
                $this->redirect('', ['error', ErrorMessages::ERROR_LOGIN_CAMPOS_VACIOS]);
            }

            $user = $this->model->login($usuario, $contrasenia);

            if($user != NULL){
                $this->initialize($user);
            }else{
                $this->redirect('', ['error', ErrorMessages::ERROR_LOGIN_CREDENCIALES_INCORRECTAS]);
            }
        }else{
            $this->redirect('', ['error', ErrorMessages::ERROR_LOGIN_PROCESAR_SOLICITUD]);

        }
    }
}