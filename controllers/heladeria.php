<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';

class Heladeria extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador heladeria');
    }

    function render(){
        error_log('heladeria::render -> Cargando vista de heladeria');
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

         // Filtra los productos por la categoría 'heladeria'
         $productsModel = new ProductsModel();
         $productos = $productsModel->getAllByCategory(4);

         $user = $this->getUserSessionData(); // Obtén los datos del usuario

        $this->view->render('admin/heladeriaAdmin', [
            'categories' => $categories,
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
