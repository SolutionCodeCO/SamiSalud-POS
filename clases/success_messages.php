<?php

class SuccessMessages {
    const SUCCESS_REGISTRO_CREACION_USUARIO = '002';
    const SUCCESS_SESSION_CERRADA = '0111';
    const SUCCESS_REGISTRO_PRODUCTO = 'registroProducto';
    const SUCCESS_ELIMINAR_PRODUCTO = 'eliminarProducto';
    private $successList = [];

    public function __construct() {
        $this->successList = [
            self::SUCCESS_REGISTRO_CREACION_USUARIO => "¡Usuario creado con exito! :).",
            self::SUCCESS_SESSION_CERRADA => "¡Nos vemos luego :).",
            self::SUCCESS_REGISTRO_PRODUCTO => "Producto agregado a la seccion.",
            self::SUCCESS_ELIMINAR_PRODUCTO => "Producto eliminado de la categoría, regresa a tu sección.",
        ];
    }

    public function get($hash) {
        return isset($this->successList[$hash]) ? $this->successList[$hash] : "Código de éxito desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->successList);
    }
}
