<?php

class ErrorMessages {
    const ERROR_REGISGTRO_PROCESAR_SOLICITUD = '001';
    const ERROR_REGISTRO_CAMPOS_VACIOS = '002';
    const ERROR_REGISTRO_USUARIO_EXISTENTE = '003';
    const ERROR_LOGIN_CAMPOS_VACIOS = '0101';
    const ERROR_LOGIN_CREDENCIALES_INCORRECTAS = '0102';
    const ERROR_LOGIN_PROCESAR_SOLICITUD = '0103';
    const ERROR_REGISTRO_PRODUCTO_PROCESAR_SOLICITUD = '0201';
    const ERROR_REGISTRO_PRODUCTO_CAMPOS_VACIOS = '0202';
    const ERROR_REGISTRO_PRODUCTO_EXISTE = '203';
    const ERROR_ELIMINAR_PRODUCTO_SIN_ID = '204';
    const ERROR_ELIMINAR_PRODUCTO_PROCESAR_SOLICITUD = '205';
    const ERROR_ACTUALIZAR_DATOS_USUARIO = '301';
    const ERROR_ACTUALIZAR_DATOS_USUARIO_PROCESAR_SOLICITUD = '302';
    
    private $errorList = [];

    public function __construct() {
        $this->errorList = [
            self::ERROR_REGISGTRO_PROCESAR_SOLICITUD => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_REGISTRO_CAMPOS_VACIOS => "Ningún campo puede quedar vacío.",
            self::ERROR_REGISTRO_USUARIO_EXISTENTE => "Lo siento, ya existe ese nombre de usuario.",
            self::ERROR_LOGIN_CAMPOS_VACIOS => "Ningún campo puede quedar vacío.",
            self::ERROR_LOGIN_CREDENCIALES_INCORRECTAS => "Credenciales incorrectas.",
            self::ERROR_LOGIN_PROCESAR_SOLICITUD => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_REGISTRO_PRODUCTO_PROCESAR_SOLICITUD => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_REGISTRO_PRODUCTO_CAMPOS_VACIOS => "Ningún campo puede quedar vacío..",
            self::ERROR_REGISTRO_PRODUCTO_EXISTE => "Oh, oh. El producto ya existe",
            self::ERROR_ELIMINAR_PRODUCTO_SIN_ID => 'Oh, oh. No hay parametros a eliminar.',
            self::ERROR_ELIMINAR_PRODUCTO_PROCESAR_SOLICITUD => 'Oh, oh. Error al eliminar el producto.',
            self::ERROR_ACTUALIZAR_DATOS_USUARIO => 'Oh, oh. Error al actualizar el nombre.',
            self::ERROR_ACTUALIZAR_DATOS_USUARIO_PROCESAR_SOLICITUD => 'Oh, oh. No se puede cambiar el nombre.'

        ];
    }

    public function get($hash) {
        return isset($this->errorList[$hash]) ? $this->errorList[$hash] : "Código de error desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->errorList);
    }
}
