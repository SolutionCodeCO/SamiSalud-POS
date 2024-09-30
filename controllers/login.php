<?php

require_once 'models/userModel.php';

class Login extends SessionController {

    function __construct() {
        parent::__construct();
    }

    function render() {
        $this->view->render('login/index');
    }

    function authenticate() {
        if ($this->existPOST(['usuario', 'contrasenia'])) {
            $username = $this->getPost('usuario');
            $password = $this->getPost('contrasenia');

            if (empty($username) || empty($password)) {
                error_log('Login::authenticate() empty');
                $this->redirect('', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_LOGIN_EMPLEADOS]);
                return;
            }

            $user = $this->model->login($username, $password);

            if ($user != NULL) {
                error_log('Login::authenticate() passed');
                $this->initialize($user);
            } else {
                error_log('Login::authenticate() username and/or password wrong');
                $this->redirect('', ['error' => ErrorMessages::ERROR_CREDENCIALES_INCORRECTAS_LOGIN_EMPLEADOS]);
                return;
            }
        } else {
            error_log('Login::authenticate() error with params');
            $this->redirect('', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_EMPLEADOS]);
        }
    }

    public function logout() {
        if ($this->session) {
            $this->session->closeSession();
        } else {
            error_log("Session not initialized");
        }

        $this->redirect('', ['success' => SuccessMessages::SUCCESS_LOGOUT_EMPLEADOS]);
    }
}
