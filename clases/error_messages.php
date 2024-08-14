<?php

class ErrorMessages {
    const ERROR_REGISGTRO_PROCESAR_SOLICITUD = '001';
    const ERROR_REGISTRO_CAMPOS_VACIOS = '002';
    const ERROR_REGISTRO_USUARIO_EXISTENTE = '003';
    const ERROR_LOGIN_CAMPOS_VACIOS = '0101';
    const ERROR_LOGIN_CREDENCIALES_INCORRECTAS = '0102';
    const ERROR_LOGIN_PROCESAR_SOLICITUD = '0103';
    
    private $errorList = [];

    public function __construct() {
        $this->errorList = [
            self::ERROR_REGISGTRO_PROCESAR_SOLICITUD => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_REGISTRO_CAMPOS_VACIOS => "Ningún campo puede quedar vacío.",
            self::ERROR_REGISTRO_USUARIO_EXISTENTE => "Lo siento, ya existe ese nombre de usuario.",
            self::ERROR_LOGIN_CAMPOS_VACIOS => "Ningún campo puede quedar vacío.",
            self::ERROR_LOGIN_CREDENCIALES_INCORRECTAS => "Credenciales incorrectas.",
            self::ERROR_LOGIN_PROCESAR_SOLICITUD => "Oh, oh. Error al procesar la solicitud.",

        ];
    }

    public function get($hash) {
        return isset($this->errorList[$hash]) ? $this->errorList[$hash] : "Código de error desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->errorList);
    }
}
