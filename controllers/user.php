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

    public function updateName(){
        if(!$this->existPOST('nombre')){
            $this->redirect('/user', []); // Si no hay POST con nombre, redirige
            return;
        }
    
        $nombre = $this->getPOST('nombre');
        
        if(empty($nombre)){
            $this->redirect('/user', []); // Si el nombre está vacío, redirige
            return;
        }
    
        // Obtener los datos de usuario desde la sesión
        $user = $this->getUserSessionData(); 
    
        // Actualizar el nombre del usuario
        $user->setNombre($nombre);
    
        // Guardar los cambios en la base de datos
        if($user->update()){
            // Actualizar la sesión con los nuevos datos del usuario
            $this->getUserSessionData();
            $this->redirect('/user', []);
        } else {
            $this->redirect('/user', []); // Si falla la actualización, redirige
        }
    }
    public function updateUser(){
        if(!$this->existPOST('usuario')){
            $this->redirect('user',[]); //TODO:
            return;
        }

        $name = $this->getPOST('usuario');

        if(empty($usuario) || $usuario == ''){
            $this->redirect('user', []); //TODO:
            return;
        }

        $this->user->setUsuario($usuario);
        if($this->user->update()){
            $this->redirect('user',[]);
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