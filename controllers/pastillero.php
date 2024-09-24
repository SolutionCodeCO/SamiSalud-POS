<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';

class Pastillero extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador pastillero');
    }

    function render(){
        error_log('pastillero::render -> Cargando vista de pastillero');
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

         // Filtra los productos por la categoría 'farmacología'
         $productsModel = new ProductsModel();
         $productos = $productsModel->getAllByCategory(5);

         $user = $this->getUserSessionData(); // Obtén los datos del usuario

        $this->view->render('admin/pastilleroAdmin', [
            'categories' => $categories,
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
