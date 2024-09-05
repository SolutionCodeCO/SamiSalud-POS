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
    
    
    public function __construct(){
        parent::__construct();
        $this->nombre = "";
        $this->id_categoria = "";
        $this->precio = "";
        $this->iva = "";
        $this->stock = "";
        $this->codigo_barras = "";
        $this->fecha_Creacion = "";
        $this->fecha_Actualizacion = "";
    }

    public function save(){
        // Asignar la fecha y hora actual
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");
        
        try {
            $query = $this->prepare('INSERT INTO productos (id, nombre, id_categoria, precio, iva, stock, codigo_barras, fecha_Creacion, fecha_Actualizacion) VALUES(:id, :nombre, :id_categoria, :precio, :iva, :stock, :codigo_barras, :fecha_Creacion, :fecha_Actualizacion)');

            $query ->execute([
                'id' => $this -> id,
                'nombre' => $this -> nombre,
                'id_categoria' => $this -> id_categoria,
                'precio' => $this -> precio,
                'iva' => $this -> iva,
                'stock' => $this -> stock,
                'codigo_barras' => $this -> codigo_barras,
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
            $query = $this->query('SELECT * FROM productos');

            while($producto = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ProductsModel();
                $item->from($producto);

                array_push($items, $item);
            }

            return $items;
            

        } catch (PDOException $e) {
           return false;
        }
    }
    public function get($id){
        try {
            $query = $this->prepare('SELECT * FROM producto where id = :id');

            $query ->execute([
                'id' => $id,
        
            ]);

            $producto = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($producto);

            return $this;

            
        } catch (PDOException $e) {
           return false;
        }
    }
    public function delete($id){
        try {
            $query = $this->prepare('DELETE FROM producto where id = :id');

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
            $query = $this->prepare('UPDATE productos SET nombre=:nombre, id_categoria=:id_categoria, precio=:precio, iva=:iva, stock=:stock, codigo_barras=:codigo_barras, fecha_Actualizacion=:fecha_Actualizacion WHERE id = :id)');

            $query ->execute([
                'id' => $this -> id,
                'nombre' => $this -> nombre,
                'id_categoria' => $this -> id_categoria,
                'precio' => $this -> precio,
                'iva' => $this -> iva,
                'stock' => $this -> stock,
                'codigo_barras' => $this -> codigo_barras,
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
        $this -> id_categoria =  $array['id_categoria'];
        $this -> precio =  $array['precio'];
        $this -> iva =  $array['iva'];
        $this -> stock =  $array['stock'];
        $this -> codigo_barras =  $array['codigo_barras'];
        $this -> fecha_Actualizacion =  $array['fecha_Actualizacion'];
        $this -> fecha_Creacion =  $array['fecha_Creacion'];
    }

    public function getAllByCategory($id_category){
        $items = [];
        try {
            $query = $this->prepare('SELECT * FROM producto where id_category = :id_category');

            $query ->execute([
                'id' => $id_category,
        
            ]);


            while($producto = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ProductsModel();
                $item->from($producto);

                array_push($items, $item);
            }

            return $items;
            
        } catch (PDOException $e) {
           return [];
        }
    }

    public function getAllByCategoryAndLimit($id_category, $n){
        $items = [];
        try {
            $query = $this->prepare('SELECT * FROM producto where id_category = :id_category ORDER BY product.date DESC LIMIT 0, :n');

            $query ->execute([
                'id' => $id_category,
                'n' => $n
        
            ]);


            while($producto = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ProductsModel();
                $item->from($producto);

                array_push($items, $item);
            }

            return $items;
            
        } catch (PDOException $e) {
            return [];
        }
    }
    
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


}
