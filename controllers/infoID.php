<?php
require_once 'models/categoryModel.php';
require_once 'models/productsModel.php';
class InfoID extends SessionController {

function __construct(){
    parent::__construct();
    error_log('infoID::construct -> Inicio del controlador infoID');
}

// Método que renderiza la vista con las categorías y el usuario
function render($params = null) {
    error_log('infoID::render -> Cargando vista de infoID');

    // Verifica si hay parámetros y si el primer parámetro es un código de barras
    if (isset($params[0])) {
        $codigo_barras = $params[1]; // Asigna el primer parámetro como código de barras
        $this->show($codigo_barras); // Llama al método show para cargar la información del producto
        return; // Termina la ejecución aquí
    }

    $categoryModel = new CategoryModel();
    $categories = $categoryModel->getAll();
    $user = $this->getUserSessionData(); // Obtén los datos del usuario

    $this->view->render('admin/productInfoAdmin', [
        'categories' => $categories, 
        'user' => $user
    ]);
}

// Método para mostrar la información de un producto por su código de barras
function show($codigo_barras){
    error_log('infoID::show -> Cargando información del producto con código de barras: ' . $codigo_barras);


    $productsModel = new ProductsModel();
    $product = $productsModel->getProductByCode($codigo_barras);
    $productInfo = $productsModel->getProductInfoByCode($codigo_barras);

    if ($product && $productInfo) {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        $user = $this->getUserSessionData();

        $this->view->render('admin/productInfoAdmin', [
            'categories' => $categories,
            'user' => $user,
            'product' => $product,
            'productInfo' => $productInfo
        ]);
    } else {
        // Si el producto no se encuentra
        $this->view->render('error/index', [
            'message' => 'Producto no encontrado.'
        ]);
    }
}
}
