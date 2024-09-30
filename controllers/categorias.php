<?php

class Categorias extends SessionController {
    protected $user;
    
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        $this->loadModel('products');  // Cargamos el modelo de productos
        error_log('Categorias::construct -> Inicio del controlador categorias');
    }

    function render(){
        error_log('Categorias::render -> Cargando vista de categorias');
        $user = $this->getUserSessionData(); // Obtén los datos del usuario logueado
    
        // Usamos el modelo cargado para obtener el conteo de productos por categoría filtrado por local
        $categoriesCount = $this->model->countProductsByCategory($user->getId_local());
    
        $this->view->render('admin/categoryAdmin',  [ 
            'user' => $user,
            'categoriesCount' => $categoriesCount
        ]);
    }
}
