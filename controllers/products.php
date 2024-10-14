<?php
require_once 'models/productsModel.php';
require_once 'models/categoryModel.php';

class Products extends SessionController {
    protected $user;

    public function __construct() {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    public function render() {
        $this->view->render('admin/drogueriaAdmin.php', [
            'user' => $this->user
        ]);
    }

    public function newProduct() {
        if (!$this->existPOST(['nombre', 'id_categoria', 'precio', 'precio_neto', 'icui' , 'iva', 'stock', 'codigo_barras', 'fechaVencimiento'])) {
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_PRODUCTO]);
            return;
        }
    
        try {
            $product = new ProductsModel();
            $product->setNombre($this->getPOST('nombre'));
            $product->setId_Categoria($this->getPOST('id_categoria'));
            $product->setPrecio_Neto((float)$this->getPOST('precio_neto'));
            $product->setPrecio((float)$this->getPOST('precio'));
            $product->setIva($this->getPOST('iva'));
            $product->setIcui($this->getPOST('icui'));
            $product->setStock($this->getPOST('stock'));
            $product->setCodigo_barras($this->getPOST('codigo_barras'));
            $product->setLote($this->getPOST('lote') ?? null);  // Opcional
            $product->setFechaVencimiento($this->getPOST('fechaVencimiento'));
            $product->setDistribuidor($this->getPOST('distribuidor') ?? null);  // Opcional
            $product->setRegistroSanitario($this->getPOST('registroSanitario') ?? null);  // Opcional
            $product->setId_local($this->user->getId_local());  // Añadir local según el usuario logueado
    
            if (!$product->save()) {
                throw new Exception('Error al guardar el producto.');
            }
    
            $this->redirect('/categorias', ['success' => SuccessMessages::SUCCESS_CREAR_PRODUCTO]);
    
        } catch (Exception $e) {
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_PRODUCTO]);
        }
    }

    public function create() {
        $category = new CategoryModel();
        $this->view->render('products/create', [
            'products' => $category->getAll(),
            'user' => $this->user
        ]);
    }

    public function delete($params) {
        if ($params == null) {
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_SIN_ID_ELIMINAR_PRODUCTO]); 
            return;
        }

        $id = $params;
        error_log("ID recibido en el controlador: " . $id);

        $res = $this->model->delete($id);

        if ($res) {
            $this->redirect('/categorias', ['success' => SuccessMessages::SUCCESS_ELIMINAR_PRODUCTO]); 
        } else {
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_PRODUCTO]);
        }
    }

    public function updateProduct() {
        if ($this->existPOST(['codigo_barras', 'nombre', 'stock', 'precio_neto', 'precio', 'icui', 'iva', 'lote', 'fechaVencimiento', 'registroSanitario', 'distribuidor'])) {

            $codigo_barras = $this->getPOST('codigo_barras');
            $nombre = $this->getPOST('nombre');
            $stock = $this->getPOST('stock');
            $precio_neto = $this->getPOST('precio_neto');
            $precio = $this->getPOST('precio');
            $iva = $this->getPOST('iva');
            $icui = $this->getPOST('icui');
            $lote = $this->getPOST('lote');
            $fechaVencimiento = $this->getPOST('fechaVencimiento');
            $registroSanitario = $this->getPOST('registroSanitario');
            $distribuidor = $this->getPOST('distribuidor');

            if (empty($codigo_barras) || empty($nombre) || empty($stock) || empty($precio_neto) || empty($iva)) {
                $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_PRODUCTO]);
                return;
            }

            $productModel = new ProductsModel();
            $productModel->setCodigo_barras($codigo_barras);
            $productModel->setNombre($nombre);
            $productModel->setStock($stock);
            $productModel->setPrecio_Neto ($precio_neto);
            $productModel->setPrecio ($precio);
            $productModel->setIva($iva);
            $productModel->setIcui($icui);
            $productModel->setLote($lote);
            $productModel->setFechaVencimiento($fechaVencimiento);
            $productModel->setRegistroSanitario($registroSanitario);
            $productModel->setDistribuidor($distribuidor);
            $productModel->setId_local($this->user->getId_local());  // Añadir local según el usuario logueado

            if ($productModel->update()) {
                $this->redirect('/infoID/show/'.$codigo_barras , ['success' => SuccessMessages::SUCCESS_ACTUALIZAR_PRODUCTO]);
            } else {
                $this->redirect('/infoID/show/'.$codigo_barras , ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_PRODUCTO]);
            }
        } else {
            $this->redirect('/categorias' , ['error' => ErrorMessages::ERROR_PROCESAR_SOLICITUD_CREAR_PRODUCTO]);
        }
    }

    function actualizarStock($id, $cantidad) {
        try {
            $db = new Database();
            $conn = $db->connect();
            $query = "UPDATE productos SET stock = stock - :cantidad WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error actualizando el stock: " . $e->getMessage());
        }
    }
}
