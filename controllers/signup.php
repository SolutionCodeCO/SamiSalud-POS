<?php
require_once 'models/userModel.php';
class Signup extends SessionController {
    protected $defaultSites; // Declara la propiedad aquí
    public function __construct(){
        parent::__construct();
        error_log("Signup::construct -> Inicio de registro");
        error_log("===================================================");
    }   

    public function render(){
        $this->view->render("login/signup", []);
    }

    public function newUser(){
        if ($this->existPOST(['nombre', 'usuario', 'contrasenia'])){
            $nombre = $this->getPost('nombre');
            $usuario = $this->getPost('usuario');
            $contrasenia = $this->getPost('contrasenia');

            if ($nombre == '' || $usuario == '' || empty($usuario) || $contrasenia == '' || empty($contrasenia)){
                $this->redirect('/signup', ['error' => ErrorMessages::ERROR_REGISTRO_CAMPOS_VACIOS]);
            }

            $usuarioModel = new userModel();
            $usuarioModel->setNombre($nombre);
            $usuarioModel->setUsuario($usuario);
            $usuarioModel->setContrasenia($contrasenia);
            $usuarioModel->setId_rol('1');

            if ($usuarioModel->exist($usuario)){
                $this->redirect('/signup', ['error' => ErrorMessages::ERROR_REGISTRO_USUARIO_EXISTENTE]);
            } else if ($usuarioModel->save()){
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_REGISTRO_CREACION_USUARIO]);
            } else {
                $this->redirect('/signup', ['error' => ErrorMessages::ERROR_REGISGTRO_PROCESAR_SOLICITUD]);
            }
        } else {
            $this->redirect('/signup', ['error' => ErrorMessages::ERROR_REGISGTRO_PROCESAR_SOLICITUD]);
        } 
    }
}
