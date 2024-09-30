<?php
require_once 'models/userModel.php';
class User extends SessionController {
    function __construct() {
        parent::__construct();
        // Cualquier lógica adicional aquí
    }

    function render() {
        $user = $this->getUserSessionData(); // Obtén los datos del usuario
        $this->view->render('user/index', ['user' => $user]); // Pasa los datos de usuario a la vista
    }
    public function updateUser() {
        if ($this->existPOST(['id', 'usuario', 'nombre'])) {
    
            // Recibir los datos del formulario
            $id = $this->getPOST('id');
            $usuario = $this->getPOST('usuario');
            $nombre = $this->getPOST('nombre');
            $nuevaContrasenia = $this->getPOST('nueva_contrasenia');
            $confirmarContrasenia = $this->getPOST('confirmar_contrasenia');
    
            // Validar los campos
            if (empty($id) || empty($usuario) || empty($nombre)) {
                $this->redirect('/user', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_EMPLEADOS]);
                return;
            }
    
            // Instanciar el modelo
            $userModel = new UserModel();
            $userModel->setId($id);
            $userModel->setUsuario($usuario);
            $userModel->setNombre($nombre);
    
            // Verificar si el usuario ha ingresado una nueva contraseña
            if (!empty($nuevaContrasenia)) {
                if ($nuevaContrasenia !== $confirmarContrasenia) {
                    // Redirigir con error si las contraseñas no coinciden
                    $this->redirect('/user', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_EMPLEADOS]);
                    return;
                }
                // Hashear la nueva contraseña antes de guardarla
                $userModel->setContrasenia(password_hash($nuevaContrasenia, PASSWORD_BCRYPT));
            } else {
                // Si no se ingresó una nueva contraseña, obtener la contraseña actual del usuario desde la base de datos
                $existingUser = $userModel->getId();
                if ($existingUser) {
                    // Mantener la contraseña actual sin cambios
                    $userModel->setContrasenia($existingUser->getContrasenia());
                } else {
                    $this->redirect('/user', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_EMPLEADOS]);
                    return;
                }
            }
    
            // Actualizar los datos
            if ($userModel->update()) {
                $this->redirect('/user', ['success' => SuccessMessages::SUCCESS_ACTUALIZAR_EMPLEADOS]);
            } else {
                $this->redirect('/user', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_EMPLEADOS]);
            }
        } else {
            $this->redirect('/user', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_EMPLEADOS]);
        }
    }
    
}