<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';
class Drogueria extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('drogueria::construct -> Inicio del controlador drogueria');
    }

    function render(){
        error_log('dorgueria::render -> Cargando vista de drogueria');
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        // Filtra los productos por la categoría 'farmacología'
        $productsModel = new ProductsModel();
        $productos = $productsModel->getAllByCategory(3);

        $user = $this->getUserSessionData(); // Obtén los datos del usuario

        $this->view->render('admin/drogueriaAdmin',  [
            'categories' => $categories, 
            'productos' => $productos,
            'user' => $user
        ]);
    }


}
