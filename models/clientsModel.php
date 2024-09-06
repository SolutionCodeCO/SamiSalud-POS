<?php

class ClientsModel extends Model implements IModel{
    private $id;
    private $nombre;
    private $telefono;
    private $direccion;
    private $fecha_Creacion;
    private $fecha_Actualizacion;
    
        
    // Getters
    public function getId(){ return                               $this->id; }
    public function getNombre(){ return                           $this->nombre; }
    public function getTelefono(){ return                           $this->telefono; }
    public function getDireccion(){ return                           $this->direccion; }
    public function getfecha_Creacion(){ return                   $this->fecha_Creacion; }
    public function getfecha_Actualizacion(){ return              $this->fecha_Actualizacion; }
    
    // Setters
    public function setId($id){                                   $this->id = $id; }
    public function setNombre($nombre){                           $this->nombre = $nombre; }
    public function setTelefono($telefono){                           $this->telefono = $telefono; }
    public function setDireccion($direccion){                           $this->direccion = $direccion; }
    public function setFecha_Creacion($fecha_Creacion){           $this->$fecha_Creacion = $fecha_Creacion; }
    public function setfecha_Actualizacion($fecha_Actualizacion){              $this->fecha_Actualizacion = $fecha_Actualizacion; }

    public function __construct(){
        parent::__construct();
    }

    public function save(){
         // Asignar la fecha y hora actual
         $this->fecha_Creacion = date("Y-m-d H:i:s");
         $this->fecha_Actualizacion = date("Y-m-d H:i:s");
         
         try {
             $query = $this->prepare('INSERT INTO clientes (id, nombre,telefono, direccion, fecha_Creacion, fecha_Actualizacion) VALUES(:id, :nombre, :telefono, :direccion, :fecha_Creacion, :fecha_Actualizacion)');
 
             $query ->execute([
                 'id' => $this -> id,
                 'nombre' => $this -> nombre,
                 'telefono' => $this -> telefono,
                 'direccion' => $this ->direccion,
                 'fecha_Creacion'=> $this->fecha_Creacion,
                 'fecha_Actualizacion'=> $this->fecha_Actualizacion
             ]);
 
             if($query->rowCount()) return true;
             return false;
             
 
         } catch (PDOException $e) {
            return false;
         }
    }
    public function getAll(){
        $items = [];

        try {
            $query = $this->query("SELECT * FROM clientes");

            while($pointer = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ClientsModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/clientsModel:: getAll -> PDOException ". $e);
            return NULL;
        }
    }
    public function get($id){
        try {
            $query = $this->prepare('SELECT * FROM clientes where id = :id');

            $query ->execute([
                'id' => $id,
        
            ]);

            $cliente = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($cliente);

            return $this;

            
        } catch (PDOException $e) {
           return false;
        }
    }
    public function delete($id){
        try {
            $query = $this->prepare('DELETE FROM clientes where id = :id');

            $query ->execute([
                'id' => $id,
        
            ]);

            return true;
        } catch (PDOException $e) {
           return false;
        }
    }
    public function update(){
          // Asignar la fecha y hora actual
          $this->fecha_Actualizacion = date("Y-m-d H:i:s");

          try {
             $query = $this->prepare('UPDATE clientes SET nombre=:nombre, telefono=:telefono, direccion=:direccion, fecha_Actualizacion=:fecha_Actualizacion WHERE id = :id)');
 
             $query ->execute([
                 'id' => $this -> id,
                 'nombre' => $this -> nombre,
                 'telefono' => $this -> telefono,
                 'direccion' => $this -> direccion,
                 'fecha_Actualizacion'=> $this->fecha_Actualizacion
             ]);
 
             if($query->rowCount()) return true;
             return false;
             
 
         } catch (PDOException $e) {
            return false;
         }
    }
    public function from($array){
        $this -> id =  $array['id'];
        $this -> nombre =  $array['nombre'];
        $this -> telefono =  $array['telefono'];
        $this -> direccion =  $array['direccion'];
        $this -> fecha_Actualizacion =  $array['fecha_Actualizacion'];
        $this -> fecha_Creacion =  $array['fecha_Creacion'];
    }

}
