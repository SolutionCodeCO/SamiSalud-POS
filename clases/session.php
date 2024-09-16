<?php

class Session{
    private $sessionName = 'user';
    public function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function setCurrentUser($user){
        $_SESSION[$this->sessionName] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION[$this->sessionName];
    }

    public function closeSession(){
        session_start();
        session_unset(); // Limpiar las variables de sesión
        session_destroy(); // Destruir la sesión
    }

    public function existsSession(){
        return isset($_SESSION[$this->sessionName]);
    }
}