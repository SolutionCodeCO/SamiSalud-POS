<?php

require_once 'controllers/errores.php';
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
            $controller -> loadModel('login');
            $controller -> render();

            return;
        }
        $archivoControlador = 'controllers/' . $url[0] . '.php';

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
                            array_push($params, $url[$i + 2]);
                        }
                        $controller ->{$url[1]}($params);
                    }else{
        
                        $controller->{$url[1]}();
                    }
                }else{
                    error_log("===================================================");
                    error_log("libs/app.php:: Error: El método " . $url[1] . " no existe en el controlador " . $url[0]);
                    $this->loadError();
                }
            }else{
                $controller -> render();
            }
        }else{
            error_log("===================================================");
            error_log("libs/app.php:: Error: El archivo " . $url[1] . " no existe en la rama ");
            $this->loadError();

        }
    }

    private function loadError() {
        $archivoController = 'controllers/errores.php';
        require_once $archivoController;
        $controller = new Errores();
        $controller->render();
        return false;
    }
}