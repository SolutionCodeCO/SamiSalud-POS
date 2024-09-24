<?php
require_once 'models/productsModel.php';
require_once 'models/categoryModel.php';

class Products extends SessionController{
    private $user;
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
        if(!$this->existPOST(['nombre','id_categoria','precio','iva','stock','codigo_barras'])){
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_REGISTRO_PRODUCTO_PROCESAR_SOLICITUD]); //TODO : error
            return;
        }

        if($this->user == NULL){
            $this->redirect('/categorias',['error' => ErrorMessages::ERROR_REGISTRO_CAMPOS_VACIOS]); //TODO : error
            return;
        }

        $product = new ProductsModel();
        $product->setNombre($this->getPOST('nombre'));
        $product->setId_Categoria($this->getPOST('id_categoria'));
        $product->setPrecio((float)$this->getPOST('precio'));
        $product->setIva($this->getPOST('iva'));
        $product->setStock($this->getPOST('stock'));
        $product->setCodigo_barras($this->getPOST('codigo_barras'));

        if($product === $product){
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_REGISTRO_PRODUCTO_EXISTE]); //TODO : success
        }
        $product->save();
        $this->redirect('/categorias', ['success' => SuccessMessages::SUCCESS_REGISTRO_PRODUCTO]); //TODO : success
    }

    public function create(){
        $category = new CategoryModel();
        $this->view->render('products/create',[
            'products'=>$category->getAll(),
            'user'=>$this-user
        ]);
    }

    public function getCategoriesId(){
        $joinModel = new JoinProductsCategoriesModel();
        $categories = $joinModel->getAll($this->user->getId());

        $res = [];

        foreach($categories as $cat){
            array_push($res, $cat->getId_Categoria());
        }
        $res = array_values(array_unique($res));

        return $res;
    }

    private function getDateList(){
        $mes= [];
        $res =[];
        $joinModel = new JoinProductsCategoriesModel();

        $productos = $joinModel->getAll($this->user->getId());

        foreach($productos as $producto){
            array_push($mes, substr($producto->getfecha_Creacion(), 0, 7));
        }   
        $mes = array_values(array_unique($mes));
        return $res;
    }

    public function getCategoryList(){
        $res =[];
        $joinModel = new JoinProductsCategoriesModel();

        $productos = $joinModel->getAll($this->user->getId());

        foreach($productos as $producto){
            array_push($res, $producto->getAllByCategory());
        }   
        $res = array_values(array_unique($res));

        return $res;
    }

    public function getHistoryJSON(){
        header('Content-Type: application/json');
        $res = [];
        $joinModel = new JoinProductsCategoriesModel();
        $productos = $joinModel->getAll($this->user->getId());

        foreach($productos as $producto){
            array_push($res, $producto->toArray());
        }

        echo json_encode($res);

    }

    public function getProductsJSON(){
        header('Content-Type: application/json');
        $res = [];
        $categoryIDs = $this->getCategoriesId();
        $categoryName = $this->getCategoryList();

        array_unshift($categoryName, 'mes');
        
        $mes = $this->getDateList();

        for ($i=0; $i < count($mes); $i++) {
            $item = array($mes[$i]); 
            for($j=0; $j < count($categoryIDs) ; $j++){
                $total = $this->getTotalByMonthAndCategory($mes[$i],$categoryIDs[$j]);
                array_push($item, $total);
            }
            array_push($res,$item);
        }
        array_unshift($res, $categoryName);

        echo json_encode($res);
    }

    private function getTotalByMonthAndCategory($fecha_Creacion, $categoria){
        $idUser = $this->user->getId();
        // $productos = new ProductsModel();

        $total = $this->model->getTotalByMonthAndCategory($fecha_Creacion, $categoria, $idUser);

        if($total == null){
            $total = 0;
        }
        return $total;
    }

    public function delete($params){
        if ($params == null) {
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_ELIMINAR_PRODUCTO_SIN_ID]); // Redirigir con error si no hay parámetros
            return;
        }
        $id = $params[0];
        $res = $this->model->delete($id);

        if($res){
            $this->redirect('/categorias',  ['success' => SuccessMessages::SUCCESS_ELIMINAR_PRODUCTO]); //TODO: success
        }else{
            $this->redirect('/categorias', ['error' => ErrorMessages::ERROR_ELIMINAR_PRODUCTO_PROCESAR_SOLICITUD]); //TODO: error

        }
        $this->redirect('/categorias', ['success' => SuccessMessages::SUCCESS_ELIMINAR_PRODUCTO]); // Redirigir a la vista de categorías

    }

}