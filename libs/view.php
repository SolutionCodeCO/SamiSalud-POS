<?php 
class View {
    private $data;
    private $messages = [];

    function __construct() {
        // Inicializar mensajes si es necesario
    }

    public function render($nombre, $data = []) {
        $this->data = $data;
        $this->handleMessages();
        require 'views/' . $nombre . '.php';
    }


    private function handleMessages(){
        if(isset($_GET['success'])){
            $this->handleSuccess();
        } 
        
        if(isset($_GET['error'])){
            $this->handleError();
        }
    }

    private function handleError(){
        $hash = $_GET['error'];
        $error = new ErrorMessages();

        if($error->existsKey($hash)){
            $this->data['error'] = $error->get($hash);
        }
    }

    private function handleSuccess(){
        $hash = $_GET['success'];
        $success = new successMessages();

        if($success->existsKey($hash)){
            $this->data['success'] = $success->get($hash);
        }
    }

    public function showMessages() {
       $this->showErrors();
       $this->showSuccess();
    }

    public function showErrors() {
        if(array_key_exists('error', $this->data)){
            echo '<div class="notificacion">
                  <div class="notificacion_body">'
                  .$this->data['error'].
                  '<i style="color:#D04848; font-size:20px;" class="fa-solid fa-circle-xmark"></i>'.
                  '</div>
                  <div class="progreso_notificacion"></div>
                  </div>';
        }
      
    }

    public function showSuccess() {
        if(array_key_exists('success', $this->data)){
            echo '<div class="notificacion">
            <div class="notificacion_body">'
            .$this->data['success'].
            '<i style="color:#81A263; font-size:20px;" class="fa-solid fa-circle-check"></i>'.
            '</div>
            <div class="progreso_notificacion"></div>
            </div>';
        }
    }
}
