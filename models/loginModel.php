<?php

require_once 'models/userModel.php';
class loginModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function login($usuario, $contrasenia){
        try{
            $query = $this->prepare('SELECT * FROM empleados WHERE usuario = :usuario');
            $query->execute(['usuario' => $usuario]);

            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC);

                $user = new UserModel();
                $user->from($item);

                if(password_verify($contrasenia, $user->getcontrasenia())){
                    error_log("LoginModel:: Login->success");
                    error_log("===================================================");

                    return $user;
                }else{
                    error_log("LoginModel:: Login-> contrasenia no es igual");
                    error_log("===================================================");

                    return NULL;
                }
            }
        }catch(PDOException $e){
            error_log("models/LoginModel:: login -> ".$e);
            error_log("===================================================");

            return null;
        }
    } 
}