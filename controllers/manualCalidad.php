<?php
require_once 'models/productsModel.php';
require_once 'models/categoryModel.php';

class ManualCalidad extends SessionController{
    protected $user;
    private $db;
    public function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
    }

    public function render(){
        error_log('manualCalidad::render -> Cargando vista de manual calidad');
        
       


         $user = $this->getUserSessionData(); // Obtén los datos del usuario

        $this->view->render('admin/ManualCalidadAdmin', [
           
            
            'user' => $user
        ]);
    }

    public function newRegistro(){
        if(!$this->existPOST(['nombre_completo', 'empresa', 'correo_email', 'telefono', 'observaciones'])){
            $this->redirect('/proveedores', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_PROVEEDORES]);
            return;
        }
    
    
        try {
            // Crear producto
            $proveedor = new ProveedoresModel();
            $proveedor->setNombre_completo($this->getPOST('nombre_completo'));
            $proveedor->setEmpresa($this->getPOST('empresa'));
            $proveedor->setCorreo_Email($this->getPOST('correo_email'));
            $proveedor->setTelefono($this->getPOST('telefono'));
            $proveedor->setObservaciones($this->getPOST('observaciones'));
        
    
            // Guardar producto en las tablas 'productos' e 'informacionProducto'
            if(!$proveedor->save()){
                throw new Exception('Error al guardar el producto.');
            }
    
            // Redirigir con mensaje de éxito
            $this->redirect('/proveedores', ['success' => SuccessMessages::SUCCESS_CREAR_PROVEEDORES]);
    
        } catch (Exception $e) {
            $this->redirect('/proveedores', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_PROVEEDORES]);
        }
    }
    
    public function create(){
        $proveedoresModel = new ProveedoresModel();
        $proveedores = $proveedoresModel->getAll();
    
        // Log para verificar si se obtuvieron proveedores
        error_log('Proveedores encontrados: ' . print_r($proveedores, true));
    
        // Asegurarse de que los proveedores se están pasando correctamente a la vista
        $this->view->render('proveedores/create',[
            'proveedores' => $proveedores,
            'user' => $this->user
        ]);
    }


    public function delete($params){
        if ($params == null) {
            $this->redirect('/proveedores', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_PROVEEDORES]); 
            return;
        }
    
        $id = $params;
        error_log("ID recibido en el controlador: " . $id); // Agregar log para verificar qué valor se recibe
    
        $res = $this->model->delete($id);
    
        if($res){
            $this->redirect('/proveedores',  ['success' => SuccessMessages::SUCCESS_ELIMINAR_PROVEEDORES]); 
        }else{
            $this->redirect('/proveedores', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_PROVEEDORES]);
        }
    }

    public function updateProveedores()
{
    // Verificar que los datos se envíen a través del método POST
    if ($this->existPOST(['codigo_barras', 'nombre', 'stock', 'precio', 'iva', 'lote', 'fechaVencimiento', 'registroSanitario', 'distribuidor'])) {

        // Recibir los datos del formulario
        $codigo_barras = $this->getPOST('codigo_barras');
        $nombre = $this->getPOST('nombre');
        $stock = $this->getPOST('stock');
        $precio = $this->getPOST('precio');
        $iva = $this->getPOST('iva');
        $lote = $this->getPOST('lote');
        $fechaVencimiento = $this->getPOST('fechaVencimiento');
        $registroSanitario = $this->getPOST('registroSanitario');
        $distribuidor = $this->getPOST('distribuidor');

        // Validar los campos, asegurarse de que no estén vacíos
        if (empty($codigo_barras) || empty($nombre) || empty($stock) || empty($precio) || empty($iva)) {
            $this->redirect('/proveedores', ['error' => errorMessages::ERROR_CAMPOS_VACIOS_PROVEEDORES]);
            return;
        }

        // Actualizar la información en la base de datos
        $productModel = new ProductsModel(); // Asegúrate de que este modelo esté correctamente importado
        $productModel->setCodigo_barras($codigo_barras);
        $productModel->setNombre($nombre);
        $productModel->setStock($stock);
        $productModel->setPrecio($precio);
        $productModel->setIva($iva);
        $productModel->setLote($lote);
        $productModel->setFechaVencimiento($fechaVencimiento);
        $productModel->setRegistroSanitario($registroSanitario);
        $productModel->setDistribuidor($distribuidor);

        if ($productModel->update()) {
            // Si la actualización fue exitosa, redirigir con un mensaje de éxito
            $this->redirect('/infoID/show/'.$codigo_barras , ['success' => SuccessMessages::SUCCESS_ACTUALIZAR_PROVEEDORES]);
        } else {
            // Si falla la actualización, redirigir con un mensaje de error
            $this->redirect('/infoID/show/'.$codigo_barras , ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_ACTUALIZAR_PROVEEDORES]);
        }
    } else {
        // Si no llegan datos vía POST
        $this->redirect('/categorias' , ['error' =>  ErrorMessages::ERROR_CAMPOS_VACIOS_PROVEEDORES]);
    }
}


}