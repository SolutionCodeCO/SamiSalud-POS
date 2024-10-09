<?php
require_once 'models/qualityControlModel.php';

class ConsolidadoFaltantes extends SessionController {
    protected $user;
  
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData(); // Asegurarse de inicializar la sesión del usuario
        error_log('Admin::construct -> Inicio del controlador consolidado faltantes');
    }

    function render(){
        error_log('consolidado faltantes::render -> Cargando vista de consolidado faltantes');
        
        $controlCalidadModel = new QualityControlModel();
        $consolidado_faltantes = $controlCalidadModel->getAllConsolidado_faltantes();
        
        // Obtén los datos del usuario logueado
        $user = $this->getUserSessionData(); 
      

        $this->view->render('admin/consolidadoFaltantesAdmin', [
            'user' => $user,
            'consolidado_faltantes' => $consolidado_faltantes,
        ]);
    }
    public function newConsolidado(){
        if(!$this->existPOST(['cantidad_ingresada'])){
            $this->redirect('/consolidadoFaltantes', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_CONTROL_CALIDAD]);

            return;
        }
    
    
        try {
            // Crear 
            $consolidadoFaltantes = new QualityControlModel();
            $consolidadoFaltantes->setCantidad_ingresada($this->getPOST('cantidad_ingresada'));
           
            $consolidadoFaltantes->setId_local($this->user->getId_local());  // Añadir local según el usuario logueado
            $consolidadoFaltantes->setId_usuario($this->user->getId());      // Usuario logueado que registra la factura
        
    
            // Guardar 
            if(!$consolidadoFaltantes->saveConsolidado_faltantes()){
                throw new Exception('Error al registrar la factura.');
            }
    
            // Redirigir con mensaje de éxito
            $this->redirect('/consolidadoFaltantes', ['success' => SuccessMessages::SUCCESS_CREAR_CONTROL_CALIDAD]);
    
        } catch (Exception $e) {
            $this->redirect('/consolidadoFaltantes', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_CONTROL_CALIDAD]);
        }
    }
    
    public function create(){
        $this->user = $this->getUserSessionData(); // A
        $registroFacturasModel = new QualityControlModel();
        $registroFacturas = $registroFacturasModel->getAll();
    
        // Log para verificar si se obtuvieron proveedores
        error_log('Registro de facturas encontrados: ' . print_r($registroFacturas, true));
    
        // Asegurarse de que los proveedores se están pasando correctamente a la vista
        $this->view->render('registrofacturas/create',[
            'registroFacturas' => $registroFacturas,
            'user' => $this->user
        ]);
    }


    public function delete($params){
        if ($params == null) {
            $this->redirect('/registrofacturas', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ELIMINAR_CONTROL_CALIDAD]); 
            return;
        }
    
        $id = $params;
        error_log("ID recibido en el controlador: " . $id); // Agregar log para verificar qué valor se recibe
    
        $res = $this->model->delete($id);
    
        if($res){
            $this->redirect('/registrofacturas',  ['success' => SuccessMessages::SUCCESS_ELIMINAR_CONTROL_CALIDAD]); 
        }else{
            $this->redirect('/registrofacturas', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_CONTROL_CALIDAD]);
        }
    }

}
