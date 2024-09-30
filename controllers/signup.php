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
        if ($this->existPOST(['nombre', 'id_local', 'usuario', 'contrasenia'])){
            $nombre = $this->getPost('nombre');
            $id_local = $this->getPost('id_local');
            $usuario = $this->getPost('usuario');
            $contrasenia = $this->getPost('contrasenia');

            if ($nombre == '' || $id_local == '' || $usuario == '' || empty($usuario) || $contrasenia == '' || empty($contrasenia)){
                $this->redirect('/signup', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_EMPLEADOS]);
            }

            $usuarioModel = new userModel();
            $usuarioModel->setNombre($nombre);
            $usuarioModel->setUsuario($usuario);
            $usuarioModel->setContrasenia($contrasenia);
            $usuarioModel->setId_rol('1');
            $usuarioModel->setId_local($id_local);

            if ($usuarioModel->exist($usuario)){
                $this->redirect('/signup', ['error' => ErrorMessages::ERROR_YA_EXISTE_EMPLEADOS]);
            } else if ($usuarioModel->save()){
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_CREAR_EMPLEADOS]);
            } else {
                $this->redirect('/signup', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_EMPLEADOS]);
            }
        } else {
            $this->redirect('/signup', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_EMPLEADOS]);
        } 
    }
}

