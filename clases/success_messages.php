<?php

class SuccessMessages {

     // PRODUCTS - CREAR
    const SUCCESS_CREAR_PRODUCTO = '1101' ;

     // PRODUCTS - ELIMINAR
    const SUCCESS_ELIMINAR_PRODUCTO = '1202' ;

     // PRODUCTS - ACTUALIZAR
    const SUCCESS_ACTUALIZAR_PRODUCTO = '1300' ;

    // PROVEEDORES - CREAR
    const SUCCESS_CREAR_PROVEEDORES = '2101' ;

     // PROVEEDORES - ELIMINAR
    const SUCCESS_ELIMINAR_PROVEEDORES = '2200' ;

     // PROVEEDORES - ACTUALIZAR
    const SUCCESS_ACTUALIZAR_PROVEEDORES = '2302' ;

    // CONTROL CALIDAD - CREAR
    const SUCCESS_CREAR_CONTROL_CALIDAD = '3101' ;

     // CONTROL CALIDAD - ELIMINAR
    const SUCCESS_ELIMINAR_CONTROL_CALIDAD = '3200' ;

     // CONTROL CALIDAD - ACTUALIZAR
    const SUCCESS_ACTUALIZAR_CONTROL_CALIDAD = '3302' ;
    
    // EMPLEADOS - CREAR
    const SUCCESS_CREAR_EMPLEADOS = '4101' ;

     // EMPLEADOS - ELIMINAR
    const SUCCESS_ELIMINAR_EMPLEADOS = '4200' ;

     // EMPLEADOS - ACTUALIZAR
    const SUCCESS_ACTUALIZAR_EMPLEADOS = '4302' ;

     // EMPLEADOS - LOGIN
     const SUCCESS_LOGIN_EMPLEADOS = '4102' ;
     const SUCCESS_LOGOUT_EMPLEADOS = '4102' ;

      // FACTURAS - CREAR
    const SUCCESS_CREAR_FACTURAS = '5101' ;
    
    
    private $successList = [];

    public function __construct() {
        $this->successList = [
        // PRODUCTOS
          self::SUCCESS_CREAR_PRODUCTO => "¡Producto agregado a su seccion!",
          self::SUCCESS_ELIMINAR_PRODUCTO => "Producto eliminado de la base de datos.",
          self::SUCCESS_ACTUALIZAR_PRODUCTO => "Producto modificado correctamente.",
        // PROVEEDORES
          self::SUCCESS_CREAR_PROVEEDORES => "¡Proveeedor agregado a Sami Salud!",
          self::SUCCESS_ELIMINAR_PROVEEDORES => "Proveedor eliminado de su lista.",
          self::SUCCESS_ACTUALIZAR_PROVEEDORES => "Proveedor actualizado correctamente.",
        // MANUAL CALIDAD
          self::SUCCESS_CREAR_CONTROL_CALIDAD => "¡Manual de calidad registrado correctamente!",
          self::SUCCESS_ELIMINAR_CONTROL_CALIDAD => "Manul de calidad eliminado.",
          self::SUCCESS_ACTUALIZAR_CONTROL_CALIDAD => "Manual de calidad actualizado.",
        // EMPLEADOS
          self::SUCCESS_CREAR_EMPLEADOS => "¡Empleado creado y listo para usarse!",
          self::SUCCESS_ELIMINAR_EMPLEADOS => "Empleado eliminado satisfactoriamente.",
          self::SUCCESS_ACTUALIZAR_EMPLEADOS => "Empleado modificado corectamente.",
        // LOGIN
          self::SUCCESS_LOGIN_EMPLEADOS => "Bienvenido a POS Solution.",
          self::SUCCESS_LOGOUT_EMPLEADOS => "Nos vemos pronto, gracias por usar la app.",
        //FACTURAS
          self::SUCCESS_CREAR_FACTURAS => "Factura creada correctamente.",


           
        ];
    }

    public function get($hash) {
        return isset($this->successList[$hash]) ? $this->successList[$hash] : "Código de éxito desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->successList);
    }
}
