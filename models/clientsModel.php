<?php

class ClientsModel extends Model implements IModel{
    private $id;
    private $nombre;
    private $fecha_Creacion;
    private $fecha_Actualizacion;
    
    
    // Getters
    public function getId(){ return                               $this->id; }
    public function getNombre(){ return                           $this->nombre; }
    public function getfecha_Creacion(){ return                   $this->fecha_Creacion; }
    public function getfecha_Actualizacion(){ return              $this->fecha_Actualizacion; }
    
    // Setters
    public function setId($id){                                   $this->id = $id; }
    public function setNombre($nombre){                           $this->nombre = $nombre; }
    public function setFecha_Creacion($fecha_Creacion){           $this->$fecha_Creacion = $fecha_Creacion; }
    public function setfecha_Actualizacion($fecha_Actualizacion){              $this->fecha_Actualizacion = $fecha_Actualizacion; }

    public function __construct(){
        parent::__construct();
    }

    public function save(){
        try {
            $query = $this->prepare('INSERT INTO categorias (id, nombre, fecha_Creacion, fecha_Actualizacion)');
        } catch (PDOException $e) {
        } catch (PDOException $e) {
           return false;
        }
    }
    public function getAll(){

    }
    public function get($id){

    }
    public function delete($id){

    }
    public function update(){

    }
    public function from($array){

    }

}
