<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';

class Especiales extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador especiales');
    }

    function render(){
        error_log('especiales::render -> Cargando vista de especiales');
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        // Filtra los productos por la categoría 'farmacología'
        $productsModel = new ProductsModel();
        $productos = $productsModel->getAllByCategory(6);

        $user = $this->getUserSessionData(); // Obtén los datos del usuario

        $this->view->render('admin/especialesAdmin', [
            'categories' => $categories,
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
