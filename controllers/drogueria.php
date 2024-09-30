<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';
class Drogueria extends SessionController {

  
    function __construct(){
        parent::__construct();
       
        error_log('drogueria::construct -> Inicio del controlador drogueria');
    }

    function render(){
        error_log('drogueria::render -> Cargando vista de drogueria');
    
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
    
        // Obtén los datos del usuario logueado
        $user = $this->getUserSessionData(); 
    
        // Filtra los productos por la categoría 'farmacología' y el id_local del usuario
        $productsModel = new ProductsModel();
        $productos = $productsModel->getAllByCategoryAndLocal(3, $user->getId_local());
    
        $this->view->render('admin/drogueriaAdmin',  [
            'categories' => $categories, 
            'productos' => $productos,
            'user' => $user
        ]);
    }

}
