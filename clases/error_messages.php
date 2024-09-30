<?php

class ErrorMessages {

    // PRODUCTS - CREAR
    const ERROR_PROCESAR_SOLICITUD_CREAR_PRODUCTO = '1101' ;
    const ERROR_CAMPOS_VACIOS_PRODUCTO = '1102' ;
    const ERROR_YA_EXISTE_PRODUCTO = '1103' ;

     // PRODUCTS - ELIMINAR
    const ERROR_PROCESAR_SOLICITUD_ELIMINAR_PRODUCTO = '1200' ;
    const ERROR_SIN_ID_ELIMINAR_PRODUCTO = '1202' ;

     // PRODUCTS - ACTUALIZAR
    const ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_PRODUCTO = '1300' ;
    const ERROR_SIN_ID_ACTUALIZAR_PRODUCTO = '1302' ;


    // PROVEEDORES - CREAR
    const ERROR_PROCESAR_SOLICITUD_CREAR_PROVEEDORES = '2101' ;
    const ERROR_CAMPOS_VACIOS_PROVEEDORES = '2102' ;
    const ERROR_YA_EXISTE_PROVEEDORES = '2103' ;

     // PROVEEDORES - ELIMINAR
    const ERROR_PROCESAR_SOLICITUD_ELIMINAR_PROVEEDORES = '2200' ;
    const ERROR_SIN_ID_ELIMINAR_PROVEEDORES = '2202' ;

     // PROVEEDORES - ACTUALIZAR
    const ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_PROVEEDORES = '2300' ;
    const ERROR_SIN_ID_ACTUALIZAR_PROVEEDORES = '2302' ;

    // CONTROL CALIDAD - CREAR
    const ERROR_PROCESAR_SOLICITUD_CREAR_CONTROL_CALIDAD = '3101' ;
    const ERROR_CAMPOS_VACIOS_CONTROL_CALIDAD = '3102' ;
    const ERROR_YA_EXISTE_CONTROL_CALIDAD = '3103' ;

     // CONTROL CALIDAD - ELIMINAR
    const ERROR_PROCESAR_SOLICITUD_ELIMINAR_CONTROL_CALIDAD = '3200' ;
    const ERROR_SIN_ID_ELIMINAR_CONTROL_CALIDAD = '3202' ;

     // CONTROL CALIDAD - ACTUALIZAR
    const ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_CONTROL_CALIDAD = '3300' ;
    const ERROR_SIN_ID_ACTUALIZAR_CONTROL_CALIDAD = '3302' ;
    
    // EMPLEADOS - CREAR
    const ERROR_PROCESAR_SOLICITUD_CREAR_EMPLEADOS = '4101' ;
    const ERROR_CAMPOS_VACIOS_EMPLEADOS = '4102' ;
    const ERROR_YA_EXISTE_EMPLEADOS = '4103' ;

     // EMPLEADOS - ELIMINAR
    const ERROR_PROCESAR_SOLICITUD_ELIMINAR_EMPLEADOS = '4200' ;
    const ERROR_SIN_ID_ELIMINAR_EMPLEADOS = '4202' ;

     // EMPLEADOS - ACTUALIZAR
    const ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_EMPLEADOS = '4300' ;
    const ERROR_SIN_ID_ACTUALIZAR_EMPLEADOS = '4302' ;

     // EMPLEADOS - LOGIN
     const ERROR_CAMPOS_VACIOS_LOGIN_EMPLEADOS = '4102' ;
     const ERROR_CREDENCIALES_INCORRECTAS_LOGIN_EMPLEADOS = '4404' ;
    
    
   
    
    private $errorList = [];

    public function __construct() {
        $this->errorList = [
            // PRODUCTOS
            self::ERROR_PROCESAR_SOLICITUD_CREAR_PRODUCTO => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_CAMPOS_VACIOS_PRODUCTO => "No puedes registrar con campos vacíos.",
            self::ERROR_YA_EXISTE_PRODUCTO => "El producto ya existe en la base de datos.",
            self::ERROR_PROCESAR_SOLICITUD_ELIMINAR_PRODUCTO => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ELIMINAR_PRODUCTO => "No puedes eliminar un producto sin ID.",
            self::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_PRODUCTO => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ACTUALIZAR_PRODUCTO => "No puedes actualizar un producto sin ID.",
            // PROVEEDORES
            self::ERROR_PROCESAR_SOLICITUD_CREAR_PROVEEDORES => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_CAMPOS_VACIOS_PROVEEDORES => "No puedes registrar con campos vacíos.",
            self::ERROR_YA_EXISTE_PROVEEDORES => "El proveedor ya existe en la base de datos.",
            self::ERROR_PROCESAR_SOLICITUD_ELIMINAR_PROVEEDORES => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ELIMINAR_PROVEEDORES => "No puedes eliminar un proveedor sin ID.",
            self::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_PROVEEDORES => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ACTUALIZAR_PROVEEDORES => "No puedes actualizar un proveedor sin ID.",
            // MANUAL 
            self::ERROR_PROCESAR_SOLICITUD_CREAR_CONTROL_CALIDAD => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_CAMPOS_VACIOS_CONTROL_CALIDAD => "No puedes registrar con campos vacíos.",
            self::ERROR_YA_EXISTE_CONTROL_CALIDAD => "Ya registraste el manual de calidad de hoy.",
            self::ERROR_PROCESAR_SOLICITUD_ELIMINAR_CONTROL_CALIDAD => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ELIMINAR_CONTROL_CALIDAD => "No puedes eliminar un manual de calidad sin ID.",
            self::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_CONTROL_CALIDAD => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ACTUALIZAR_CONTROL_CALIDAD => "No puedes el manual de calidad un producto sin ID.",
            // EMPLEADOS
            self::ERROR_PROCESAR_SOLICITUD_CREAR_EMPLEADOS => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_CAMPOS_VACIOS_EMPLEADOS => "No puedes registrar con campos vacíos.",
            self::ERROR_YA_EXISTE_EMPLEADOS => "El usuario ya existe en la base de datos.",
            self::ERROR_PROCESAR_SOLICITUD_ELIMINAR_EMPLEADOS => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ELIMINAR_EMPLEADOS => "No puedes eliminar un empleado sin ID.",
            self::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_EMPLEADOS => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIN_ID_ACTUALIZAR_EMPLEADOS => "No puedes actualizar un empleado sin ID."
        ];
    }

    public function get($hash) {
        return isset($this->errorList[$hash]) ? $this->errorList[$hash] : "Código de error desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->errorList);
    }
}
