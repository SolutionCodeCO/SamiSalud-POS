
<?php

class Login extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->render('login/index');
    }

    function authenticate(){
        if( $this->existPOST(['usuario', 'contrasenia']) ){
            $username = $this->getPost('usuario');
            $password = $this->getPost('contrasenia');

            if($username == '' || empty($username) || $password == '' || empty($password)){
                error_log('Login::authenticate() empty');
                $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_CAMPOS_VACIOS]);
                return;
            }
            
            $user = $this->model->login($username, $password);

            if($user != NULL){
                error_log('Login::authenticate() passed');
                $this->initialize($user);
            }else{
                error_log('Login::authenticate() username and/or password wrong');
                $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_CREDENCIALES_INCORRECTAS]);
                return;
            }
        }else{
            error_log('Login::authenticate() error with params');
            $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_PROCESAR_SOLICITUD]);
        }
    }

    function saludo(){
        
    }
}

?>