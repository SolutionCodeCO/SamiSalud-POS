<?php
require_once 'models/qualityControlModel.php';

class LimpiezaDrogueria extends SessionController {
    protected $user;
  
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData(); // Asegurarse de inicializar la sesión del usuario
        error_log('Admin::construct -> Inicio del controlador Limpieza drogueria');
    }

    function render(){
        error_log('Limpieza drogueria::render -> Cargando vista de Limpieza drogueria');
        
        $controlCalidadModel = new QualityControlModel();
        $limpiezaDrogueria = $controlCalidadModel->getAllLimpieza_drogueria();
        
        // Obtén los datos del usuario logueado
        $user = $this->getUserSessionData(); 
      

        $this->view->render('admin/limpiezaDrogueriaAdmin', [
            'user' => $user,
            'limpiezaDrogueria' => $limpiezaDrogueria,
        ]);
    }
    public function newLimpieza(){
        if(!$this->existPOST(['banio', 'inyectologia', 'techos_paredes', 'pisos_dispensacion', 'estantes_vitrinas_cajoneras', 'canecas'])){
            $this->redirect('/limpiezaDrogueria', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_CONTROL_CALIDAD]);

            return;
        }
    
    
        try {
            // Crear 
            $limpiezDrogueria = new QualityControlModel();
            $limpiezDrogueria->setBanio($this->getPOST('banio'));
            $limpiezDrogueria->setInyectologia($this->getPOST('inyectologia'));
            $limpiezDrogueria->setTechos_paredes($this->getPOST('techos_paredes'));
            $limpiezDrogueria->setPisos_dispensacion($this->getPOST('pisos_dispensacion'));
            $limpiezDrogueria->setEstantes_vitrinas_cajoneras($this->getPOST('estantes_vitrinas_cajoneras'));
            $limpiezDrogueria->setCanecas($this->getPOST('canecas'));
            $limpiezDrogueria->setId_local($this->user->getId_local());  // Añadir local según el usuario logueado
            $limpiezDrogueria->setId_usuario($this->user->getId());      // Usuario logueado que registra la factura
        
    
            // Guardar 
            if(!$limpiezDrogueria->saveLimpieza_drogueria()){
                $this->redirect('/limpiezaDrogueria', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_CONTROL_CALIDAD]);
                throw new Exception('Error al registrar la factura.');
            }
    
            // Redirigir con mensaje de éxito
            $this->redirect('/limpiezaDrogueria', ['success' => SuccessMessages::SUCCESS_CREAR_CONTROL_CALIDAD]);
    
        } catch (Exception $e) {
            $this->redirect('/limpiezaDrogueria', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_CONTROL_CALIDAD]);
        }
    }
    
    public function create(){
        $this->user = $this->getUserSessionData(); // A
        $registroFacturasModel = new QualityControlModel();
        $limpiezaDrogueria = $registroFacturasModel->getAllLimpieza_drogueria();
    
        // Log para verificar si se obtuvieron proveedores
        error_log('Registro de facturas encontrados: ' . print_r($limpiezaDrogueria, true));
    
        // Asegurarse de que los proveedores se están pasando correctamente a la vista
        $this->view->render('limpiezaDrogueria/create',[
            'limpiezaDrogueria' => $limpiezaDrogueria,
            'user' => $this->user
        ]);
    }


    public function delete($params){
        if ($params == null) {
            $this->redirect('/limpiezaDrogueria', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ELIMINAR_CONTROL_CALIDAD]); 
            return;
        }
    
        $id = $params;
        error_log("ID recibido en el controlador: " . $id); // Agregar log para verificar qué valor se recibe
    
        $res = $this->model->delete($id);
    
        if($res){
            $this->redirect('/limpiezaDrogueria',  ['success' => SuccessMessages::SUCCESS_ELIMINAR_CONTROL_CALIDAD]); 
        }else{
            $this->redirect('/limpiezaDrogueria', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_CONTROL_CALIDAD]);
        }
    }

}
