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

    public function updateName() {
        // Verificar si existe el POST con 'nombre'
        if (!$this->existPOST('nombre')) {
            $this->redirect('/user', []); // Redirigir si no hay POST
            return;
        }
    
        $nombre = $this->getPOST('nombre');
    
        // Verificar si el nombre está vacío
        if (empty($nombre)) {
            $this->redirect('/user', []); // Redirigir si está vacío
            return;
        }
    
        // Obtener los datos del usuario desde la sesión
        $userSession = $this->getUserSessionData(); 
        
        // Asegurarse de que la sesión contiene el usuario
        if ($userSession == null) {
            error_log('user.php::updateName - No se ha inicializado el usuario.');
            $this->redirect('/user', ['error' => 'No se ha encontrado la sesión del usuario']);
            return;
        }
    
        // Establecer el nuevo nombre al usuario
        $userSession->setNombre($nombre);
    
        // Guardar los cambios en la base de datos
        if ($userSession->update()) {
            // Actualizar la sesión con los nuevos datos del usuario
      
            $this->redirect('/user', ['success' => SuccessMessages::SUCCESS_DATOS_USUARIO]);
        } else {
            $this->redirect('/user', ['error' => ErrorMessages::ERROR_ACTUALIZAR_DATOS_USUARIO_PROCESAR_SOLICITUD]); // Si falla la actualización, redirigir con error
        }
    }
    
    public function updateUser(){
        if(!$this->existPOST('usuario')){
            $this->redirect('/user', []); // Si no hay POST con nombre, redirige
            return;
        }
    
        $usuario = $this->getPOST('usuario');
        
        if(empty($usuario)){
            $this->redirect('/user', []); // Si el nombre está vacío, redirige
            return;
        }
    
        // Obtener los datos de usuario desde la sesión
        $user = $this->getUserSessionData(); 
    
        // Actualizar el nombre del usuario
        $user->setUsuario($usuario);
    
        // Guardar los cambios en la base de datos
        if($user->update()){
            // Actualizar la sesión con los nuevos datos del usuario
            $this->getUserSessionData();
            $this->redirect('/user', ['success' => SuccessMessages::SUCCESS_DATOS_USUARIO]);
        } else {
            $this->redirect('/user', []); // Si falla la actualización, redirige
        }
    }

    public function updatePassword(){
        if(!$this->existPOST(['antPassword', 'newPassword'])){
            $this->redirect('user', []); //TODO:
            return;
        }

        $anterior = $this->getPOST(('antPassword'));
        $nueva = $this->getPOST(('newPassword'));

        if(empty($anterior) || empty($nuevo)){
            $this->redirect('user', []); //TODO:
            return;
        }
        if($anterior === $nueva){
            $this->redirect('user',[]); //TODO
            return;
        }
        $newHash = $this->model->comparePassword($anterior, $this->user->getId());
        if($newHash){
            $this->user->setcontrasenia($nueva);

            if($this->user->update()){
                $this->redirect('user',[]); //TODO
                return;
            }else{
                $this->redirect('user',[]); //TODO
                return;
            }
        }else{
            $this->redirect('user',[]); //TODO
            return;
        }
    }

    public function updatePhoto(){
        if(!isset($_FILES['foto'])){
            $this->redirect('user',[]); //TODO
            return;
        }
        $foto = $_FILES['foto'];

        $targetDir = 'public/img/fotosUser/';
        $extension = explode('.', $foto['name']);
        $fileName = $extension[sizeof($extension) - 2];
        $ext = $extension[sizeof($extension) - 1];
        $hash = md5(Date('Ymdgi') . $fileName) . '.' . $ext;
        $targetFile = $targetDir . $hash;
        $uploadOK = false;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)) ;
        $check = getimagesize($foto['tmp_name']);
        if($check != false){
            $uploadOK = true;
        }else{
            $uploadOK = false;
        }

        if($uploadOK = false){
            $this->redirect('user',[]); //TODO
            return;
        }else{
            if(move_uploaded_file($foto['tmp_name'], $targetFile)){
                $this->model->updatePhoto($hash, $this->user->getId());
                $this->redirect('user',[]); //TODO
                return;
            }else{
                $this->redirect('user',[]); //TODO
                return;
            }
        }
    }
}