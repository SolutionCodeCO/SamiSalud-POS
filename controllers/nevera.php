<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';

class Nevera extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador nevera');
    }

    function render(){
        error_log('nevera::render -> Cargando vista de nevera');
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        // Filtra los productos por la categoría 'farmacología'
        $productsModel = new ProductsModel();
        $productos = $productsModel->getAllByCategory(1);

        $user = $this->getUserSessionData(); // Obtén los datos del usuario

        $this->view->render('admin/neveraAdmin', [
            'categories' => $categories,
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
