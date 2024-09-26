<?php

require_once 'controllers/errores.php';

class App {
    public function __construct() {
        // Obtener la URL
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // Si no hay controlador especificado, redirigir a login
        if (empty($url[0])) {
            error_log('libs/app.php :: _Construct -> No hay controlador especificado.');
            error_log("===================================================");
            $archivoControlador = 'controllers/login.php';
            require_once $archivoControlador;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return;
        }

        // Crear la ruta del controlador
        $archivoControlador = 'controllers/' . $url[0] . '.php';

        // Verificar si el controlador existe
        if (file_exists($archivoControlador)) {
            require_once $archivoControlador;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // Si hay un segundo parámetro en la URL
            if (isset($url[1])) {
                $methodName = $url[1]; // Método especificado (show o cualquier otro)

                // Verificar si el método especificado existe en el controlador
                if (method_exists($controller, $methodName)) {
                    // Si hay un tercer parámetro en la URL, se asume que es el código de barras
                    if (isset($url[2])) {
                        $controller->{$methodName}($url[2]); // Llamar al método con el código de barras como parámetro
                    } else {
                        $controller->{$methodName}(); // Llamar al método sin parámetros
                    }
                } else {
                    // Si el método no existe, cargar el error
                    error_log("libs/app.php:: Error: El método {$methodName} no existe en el controlador {$url[0]}");
                    $this->loadError();
                }
            } else {
                // Si no hay método especificado, llamar al método render por defecto
                $controller->render();
            }
        } else {
            // Si el controlador no existe, cargar el error
            error_log("libs/app.php:: Error: El controlador {$url[0]} no existe.");
            $this->loadError();
        }
    }

    // Cargar el controlador de errores
    private function loadError() {
        $archivoController = 'controllers/errores.php';
        require_once $archivoController;
        $controller = new Errores();
        $controller->render();
    }
}
