<?php

class Categorias extends SessionController {
    private $user;
    
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        $this->loadModel('products');  // Cargamos el modelo de productos
        error_log('Categorias::construct -> Inicio del controlador categorias');
    }

    function render(){
        error_log('Categorias::render -> Cargando vista de categorias');
        $user = $this->getUserSessionData(); // Obtén los datos del usuarioP
        
        // Usamos el modelo cargado para obtener el conteo de productos por categoría
        $categoriesCount = $this->model->countProductsByCategory();

        $this->view->render('admin/categoryAdmin',  [ 
            'user' => $user,
            'categoriesCount' => $categoriesCount
        ]);
    }
}
