<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';


class Dulceria extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('Admin::construct -> Inicio del controlador dulceria');
    }

    function render(){
        error_log('dulceria::render -> Cargando vista de dulceria');
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        
        // Filtra los productos por la categoría 'farmacología'
        $productsModel = new ProductsModel();
        $productos = $productsModel->getAllByCategory(2);

        $user = $this->getUserSessionData(); // Obtén los datos del usuario

        $this->view->render('admin/dulceriaAdmin', [
            'categories' => $categories,
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
