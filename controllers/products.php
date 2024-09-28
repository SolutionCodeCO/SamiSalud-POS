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

    public function updateProduct()
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
            $this->redirect('products', ['error' => errorMessages::ERROR_REGISTRO_PRODUCTO_CAMPOS_VACIOS]);
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
            $this->redirect('/infoID/show/'.$codigo_barras , ['success' => SuccessMessages::SUCCESS_ACTUALIZACION_PRODUCTO]);
        } else {
            // Si falla la actualización, redirigir con un mensaje de error
            $this->redirect('/infoID/show/'.$codigo_barras , ['error' => ErrorMessages::ERROR_REGISTRO_PRODUCTO_PROCESAR_SOLICITUD]);
        }
    } else {
        // Si no llegan datos vía POST
        $this->redirect('/categorias' , ['error' =>  ErrorMessages::ERROR_REGISTRO_PRODUCTO_PROCESAR_SOLICITUD]);
    }
}


}