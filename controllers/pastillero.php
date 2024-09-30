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

        // Obtén los datos del usuario logueado
        $user = $this->getUserSessionData(); 
    
        // Filtra los productos por la categoría 'farmacología' y el id_local del usuario
        $productsModel = new ProductsModel();
        $productos = $productsModel->getAllByCategoryAndLocal(5, $user->getId_local());

        $this->view->render('admin/pastilleroAdmin', [
            'categories' => $categories,
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
