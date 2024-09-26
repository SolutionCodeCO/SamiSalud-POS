<?php
require_once 'models/productsModel.php';
require_once 'models/categoryModel.php';

class Products extends SessionController{
    protected $user;
    private $db;
    public function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
    }

    public function render(){
        $this->view->render('admin/drogueriaAdmin.php', [
            'user' => $this->user
        ]);
    }

    public function newProduct(){
        if(!$this->existPOST(['nombre', 'id_categoria', 'precio', 'iva', 'stock', 'codigo_barras', 'lote', 'fechaVencimiento', 'distribuidor', 'registroSanitario'])){
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_REGISTRO_PRODUCTO_PROCESAR_SOLICITUD]);
            return;
        }
    
        // Validación de usuario
        if($this->user == NULL){
            $this->redirect('/categorias',['error' => ErrorMessages::ERROR_REGISTRO_CAMPOS_VACIOS]);
            return;
        }
    
        try {
            // Crear producto
            $product = new ProductsModel();
            $product->setNombre($this->getPOST('nombre'));
            $product->setId_Categoria($this->getPOST('id_categoria'));
            $product->setPrecio((float)$this->getPOST('precio'));
            $product->setIva($this->getPOST('iva'));
            $product->setStock($this->getPOST('stock'));
            $product->setCodigo_barras($this->getPOST('codigo_barras'));
            $product->setLote($this->getPOST('lote'));
            $product->setFechaVencimiento($this->getPOST('fechaVencimiento'));
            $product->setDistribuidor($this->getPOST('distribuidor'));
            $product->setRegistroSanitario($this->getPOST('registroSanitario'));
    
            // Guardar producto en las tablas 'productos' e 'informacionProducto'
            if(!$product->save()){
                throw new Exception('Error al guardar el producto.');
            }
    
            // Redirigir con mensaje de éxito
            $this->redirect('/categorias', ['success' => SuccessMessages::SUCCESS_REGISTRO_PRODUCTO]);
    
        } catch (Exception $e) {
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_REGISTRO_PRODUCTO_PROCESAR_SOLICITUD]);
        }
    }
    
    public function create(){
        $category = new CategoryModel();
        $this->view->render('products/create',[
            'products'=>$category->getAll(),
            'user'=>$this-user
        ]);
    }


    public function delete($params){
        if ($params == null) {
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_ELIMINAR_PRODUCTO_SIN_ID]); 
            return;
        }
    
        $id = $params;
        error_log("ID recibido en el controlador: " . $id); // Agregar log para verificar qué valor se recibe
    
        $res = $this->model->delete($id);
    
        if($res){
            $this->redirect('/categorias',  ['success' => SuccessMessages::SUCCESS_ELIMINAR_PRODUCTO]); 
        }else{
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_ELIMINAR_PRODUCTO_PROCESAR_SOLICITUD]);
        }
    }

}