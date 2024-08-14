<?php

class Controller{
    protected $view;
    protected $model;

    public function __construct(){
        $this->view = new View();
    }

    public function loadModel($model){
        $url = 'models/' . $model . 'Model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }

    public function existPOST($params){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                error_log("===================================================");
                error_log("libs/controller.php:: existPOST -> No existe el parametro ".$param);
                return false;
            }
        }
        return true;
    }

    public function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                error_log("===================================================");
                error_log("libs/controller.php:: existGET -> No existe el parametro ".$param);
                return false;
            }
        }
        return true;
    }

    public function getGET($name){
        return $_GET[$name];
    }

    public function getPOST($name){
        return $_POST[$name];
    }

    public function redirect($route, $mensajes){
        $data = [];
        $params = '';

        foreach($mensajes as $key => $mensaje){
            array_push($data, $key . '=' . $mensaje);
        };

        $params = join('&', $data);

        if($params != ''){
            $params = '?'.$params;
        }

        header('Location: ' . constant('URL') . $route . $params);
    }
}
