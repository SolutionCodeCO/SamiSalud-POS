<?php

class Session {
    private $sessionName = 'user';

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Modificar para recibir un arreglo de datos del usuario, no solo el correo
    public function setCurrentUser($userData) {
        $_SESSION['user'] = $userData;
    }

    public function getCurrentUser() {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public function closeSession() {
        session_start();
        session_unset(); 
        session_destroy(); 
    }

    public function existsSession() {
        return isset($_SESSION['user']);
    }

    // Método para obtener el id_local desde la sesión
    public function getUserLocal() {
        return $_SESSION[$this->sessionName]['id_local'] ?? null;
    }
}
