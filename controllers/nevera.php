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

       // Obtén los datos del usuario logueado
       $user = $this->getUserSessionData(); 
    
       // Filtra los productos por la categoría 'farmacología' y el id_local del usuario
       $productsModel = new ProductsModel();
       $productos = $productsModel->getAllByCategoryAndLocal(1, $user->getId_local());

        $this->view->render('admin/neveraAdmin', [
            'categories' => $categories,
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
