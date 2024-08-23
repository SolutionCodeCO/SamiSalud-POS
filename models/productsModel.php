<?php

class ProductsModel extends Model implements IModel{
    private $id;
    private $nombre;
    private $id_categoria;
    private $precio;
    private $iva;
    private $stock;
    private $codigo_barras;
    private $fecha_Creacion;
    private $fecha_Actualizacion;
    
    
    // Getters
    public function getId(){ return                                            $this->id; }
    public function getNombre(){ return                                        $this->nombre; }
    public function getId_Categoria(){ return                                  $this->id_categoria; }
    public function getPrecio(){ return                                        $this->precio; }
    public function getIva(){ return                                           $this->iva; }
    public function getStock(){ return                                         $this->stock; }
    public function getCodigo_barras(){ return                                 $this->codigo_barras; }
    public function getfecha_Creacion(){ return                                $this->fecha_Creacion; }
    public function getfecha_Actualizacion(){ return                           $this->fecha_Actualizacion; }
    
    // Setters
    public function setId($id){                                                $this->id = $id; }
    public function setNombre($nombre){                                        $this->nombre = $nombre; }
    public function setid_Categoria($categoria){                               $this->categoria = $categoria; }
    public function setPrecioprecio($precio){                                  $this->precio = $precio; }
    public function setIva($iva){                                              $this->iva = $iva; }
    public function setStock($stock){                                          $this->stock = $stock; }
    public function setCodigo_barras($codigo_barras){                          $this->codigo_barras = $codigo_barras; }
    public function setFecha_Creacion($fecha_Creacion){                        $this->fecha_Creacion = $fecha_Creacion; }
    public function setfecha_Actualizacion($fecha_Actualizacion){              $this->fecha_Actualizacion = $fecha_Actualizacion; }

    public function __construct(){
        parent::__construct();
    }

    public function save(){
        // Asignar la fecha y hora actual
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");
        
        try {
            $query = $this->prepare('INSERT INTO productos (id, nombre, id_categoria, precio, iva, stock, codigo_barras, fecha_Creacion, fecha_Actualizacion) VALUES(:id, :nombre, :id_categoria, :precio, :iva, :stock, :codigo_barras, :fecha_Creacion, :fecha_Actualizacion)');
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
         // Asignar la fecha y hora actual
         $this->fecha_Actualizacion = date("Y-m-d H:i:s");

    }
    public function from($array){

    }

}
