<?php

class SuccessMessages {
    const SUCCESS_REGISTRO_CREACION_USUARIO = '002';
    const SUCCESS_SESSION_CERRADA = '0111';
    
    private $successList = [];

    public function __construct() {
        $this->successList = [
            self::SUCCESS_REGISTRO_CREACION_USUARIO => "¡Usuario creado con exito! :).",
            self::SUCCESS_SESSION_CERRADA => "¡Nos vemos luego :)."
        ];
    }

    public function get($hash) {
        return isset($this->successList[$hash]) ? $this->successList[$hash] : "Código de éxito desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->successList);
    }
}
