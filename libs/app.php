<?php

class App{
    public function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] : 0;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if(empty($url[0])){
            error_log('libs/app.php :: _Construct -> No hay controlador especificado.');
            error_log("===================================================");
            $archivoControlador = 'controllers/login.php';
            require_once $archivoControlador;
            $controller = new Login();
            $controller = loadModel('login');
            $controller = render();

            return false;
        }
        $archivoControlador = 'controller/' . $url[0] . 'php';

        if(file_exists($archivoControlador)){
            require_once $archivoControlador;
            $controller = new $url[0];
            $controller -> loadModel($url[0]);

            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        $nParams = count($url) - 2;
                        $params = [];
                        
                        for ($i=0; $i < $nParams ; $i++) { 
                            array_push($params, $url[$i] + 2);
                        }
                        $controller ->{$url[1]}($params);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{

                }
            }else{
                $controller -> render();
            }
        }else{

        }
    }
}