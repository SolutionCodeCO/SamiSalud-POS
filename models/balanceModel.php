<?php

class BalanceModel extends Model implements IModel{
    private $id;
    private $total_mercancia;
    private $total_fiados;
    private $total_vendido_dia;
    private $fecha;
    private $fecha_Creacion;
    private $fecha_Actualizacion;
    
    
    public function __construct(){
        parent::__construct();
        $this->total_mercancia = "";
        $this->total_fiados = "";
        $this->total_vendido_dia = "";
        $this->fecha = "";
        $this->fecha_Creacion = "";
        $this->fecha_Actualizacion = "";
    }

    public function save(){
         // Asignar la fecha y hora actual
         $this->fecha_Creacion = date("Y-m-d H:i:s");
         $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {
            $query = $this->prepare('INSERT INTO balance (id, total_mercancia, total_fiados, total_vendido_dia, fecha, fecha_Creacion, fecha_Actualizacion) VALUES (:id, :total_mercancia, :total_fiados, :total_vendido_dia, :fecha, :fecha_Creacion, :fecha_Actualizacion )');

            $query->execute([
                'id' => $this->id,
                'total_mercancia' => $this->total_mercancia,
                'total_fiado' => $this->total_fiados,
                'total_vendido_dia' => $this->total_vendido_dia,
                'fecha'=> $this->fecha,
                'fecha_Creacion'=> $this->fecha_Creacion,
                'fecha_Actualizacion'=> $this->fecha_Actualizacion
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("models/balanceModel:: save -> PDOException ". $e);
            return false;
        }
    }
    public function getAll(){
        $items = [];

        try {
            $query = $this->query('SELECT * FROM balance');

            while($data = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new balanceModel();
                $item->from($data);

                array_push($items, $item);
            }

            return $items;
            

        } catch (PDOException $e) {
           return false;
        }
    }
    public function get($id){
        try {
            $query = $this->prepare('SELECT * FROM balance where id = :id');

            $query ->execute([
                'id' => $id,
        
            ]);

            $data = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($data);

            return $this;

            
        } catch (PDOException $e) {
           return false;
        }
    }
    public function delete($id){
        try {
            $query = $this->prepare('DELETE FROM balance where id = :id');

            $query ->execute([
                'id' => $id,
        
            ]);

            return true;
        } catch (PDOException $e) {
           return false;
        }
    }
    public function update(){
        try {
            // Asignar la fecha y hora actual
            $this->fecha_Actualizacion = date("Y-m-d H:i:s");

            $query = $this->prepare("UPDATE balance SET total_mercancia = :total_mercancia, total_fiados = :total_fiados, total_vendido_dia = :total_vendido_dia, fecha = :fecha ,fecha_Actualizacion = :fecha_Actualizacion WHERE id = :id");
            
            $query->execute([
                'id' => $this->id,
                'total_mercancia'=> $this->total_mercancia,
                'total_fiados'=> $this->total_fiados,
                'total_vendido_dia'=> $this->total_vendido_dia,
                'fecha_Actualizacion' => $this->fecha_Actualizacion
            ]);

            return true;

        } catch (PDOException $e) {
            error_log("models/categoryModel ::update -> PDOException ". $e);
            return false;
        }
    }
    public function from($array){
        $this -> id =  $array['id'];
        $this -> total_mercancia =  $array['total_mercancia'];
        $this -> total_fiados =  $array['total_fiados'];
        $this -> total_vendido_dia =  $array['total_venta_dia'];
        $this -> fecha =  $array['fecha'];
        $this -> fecha_Actualizacion =  $array['fecha_Actualizacion'];
        $this -> fecha_Creacion =  $array['fecha_Creacion'];
    }

    public function getProductInfoById($productId){}
    public function getProductById($productId) {}

    // Getters
    public function getId(){ return                                 $this->id; }
    public function getTotal_mercancia(){ return                    $this->total_mercancia; }
    public function getTotal_fiados(){ return                       $this->total_fiados; }
    public function getTotal_vendido_dia(){ return                  $this->total_vendido_dia; }
    public function getFecha(){ return                              $this->fecha; }
    public function getFecha_Creacion(){ return                     $this->fecha_Creacion; }
    public function getFecha_Actualizacion(){ return                $this->fecha_Actualizacion; }
    
    // Setters
    public function setId($id){                                     $this->id = $id; }
    public function setTotal_mercancion($total_mercancia){          $this->nombre = $total_mercancia; }
    public function setTotal_fiados($total_fiados){                 $this->nombre = $total_fiados; }
    public function setTotal_vendido_dia($total_vendido_dia){       $this->nombre = $total_vendido_dia; }
    public function setFecha($fecha){                               $this->nombre = $fecha; }
    public function setFecha_Creacion($fecha_Creacion){             $this->$fecha_Creacion = $fecha_Creacion; }
    public function setFecha_Actualizacion($fecha_Actualizacion){   $this->fecha_Actualizacion = $fecha_Actualizacion; }


}
