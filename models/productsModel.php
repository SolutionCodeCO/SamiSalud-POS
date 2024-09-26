<?php

class ProductsModel extends Model implements IModel{
    private $id;
    private $nombre;
    private $id_categoria;
    private $precio;
    private $iva;
    private $stock;
    private $codigo_barras;
    private $lote;
    private $fechaVencimiento;
    private $distribuidor;
    private $registroSanitario;
    private $fecha_Creacion;
    private $fecha_Actualizacion;

    public function __construct(){
        parent::__construct();
        $this->id = "";
        $this->nombre = "";
        $this->id_categoria = "";
        $this->precio = "";
        $this->iva = "";
        $this->stock = "";
        $this->codigo_barras = "";
        $this->lote = "";
        $this->fechaVencimiento = "";
        $this->distribuidor = "";
        $this->registroSanitario = "";
        $this->fecha_Creacion = "";
        $this->fecha_Actualizacion = "";
    }

    public function save(){
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {
            // Iniciar la transacción
            $this->db->beginTransaction();

            // Insertar en la tabla productos
            $queryProducto = $this->prepare('INSERT INTO productos (nombre, id_categoria, precio, iva, stock, codigo_barras, fecha_Creacion, fecha_Actualizacion) 
                                              VALUES(:nombre, :id_categoria, :precio, :iva, :stock, :codigo_barras, :fecha_Creacion, :fecha_Actualizacion)');

            $queryProducto->execute([
                'nombre' => $this->nombre,
                'id_categoria' => $this->id_categoria,
                'precio' => $this->precio,
                'iva' => $this->iva,
                'stock' => $this->stock,
                'codigo_barras' => $this->codigo_barras,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion
            ]);

            // Insertar en la tabla informacionProducto
            $queryInfoProducto = $this->prepare('INSERT INTO informacionProducto (codigo_barras, lote, fechaVencimiento, distribuidor, registroSanitario, fecha_Creacion) 
                                                 VALUES(:codigo_barras, :lote, :fechaVencimiento, :distribuidor, :registroSanitario, :fecha_Creacion)');

            $queryInfoProducto->execute([
                'codigo_barras' => $this->codigo_barras,
                'lote' => $this->lote,
                'fechaVencimiento' => $this->fechaVencimiento,
                'distribuidor' => $this->distribuidor,
                'registroSanitario' => $this->registroSanitario,
                'fecha_Creacion' => $this->fecha_Creacion
            ]);

            // Confirmar la transacción
            $this->db->commit();

            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }

      // Obtener la información básica del producto
      public function getProductById($productId) {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM productos WHERE id = :id");
            $query->execute(['id' => $productId]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('ProductsModel::getProductById -> ' . $e->getMessage());
            return false;
        }
    }

    // Obtener la información adicional del producto
    public function getProductInfoById($productId) {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM informacionProducto WHERE id_producto = :id");
            $query->execute(['id' => $productId]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('ProductsModel::getProductInfoById -> ' . $e->getMessage());
            return false;
        }
    }
    public function delete($id) {
        try {
            $query = $this->prepare('DELETE FROM productos WHERE id = :id');
            $query->execute([
                'id' => $id,
            ]);
    
            if ($query->rowCount() > 0) {
                error_log("Producto con ID $id eliminado correctamente.");
                return true;
            } else {
                error_log("No se eliminó ningún producto con ID $id.");
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error al eliminar el producto con ID $id: " . $e->getMessage());
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
    public function get($id){
        try {
            $query = $this->prepare("SELECT * FROM productos WHERE id = :id");
            $query->execute(['id' => $id]);

            $producto = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($producto["id"]);
            $this->setNombre($producto["nombre"]);
            $this->setId_Categoria($producto["id_categoria"]);
            $this->setPrecio($producto["precio"]);
            $this->setIva($producto["iva"]);
            $this->setStock($producto["stock"]);
            $this->setCodigo_barras($producto["stock"]);
            $this->setFecha_Creacion($producto["fecha_Creacion"]);
            $this->setFecha_Actualizacion($producto["fecha_Actualizacion"]);

            return $this;

        } catch (PDOException $e) {
            error_log("models/userModel ::getID -> PDOException ". $e);
            return false;
        }
    }
    public function getAll() {}

    public function getAllByCategory($id_categoria){
        $items = [];
        try {
            $query = $this->prepare('SELECT * FROM productos where id_categoria = :id_categoria');

            $query ->execute([
                'id_categoria' => $id_categoria,
        
            ]);


            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = [
                    'id' => $row['id'],
                    'codigo_barras' => $row['codigo_barras'],
                    'nombre' => $row['nombre'],
                    'stock' => $row['stock'],
                    'iva' => $row['iva'],
                    'precio' => $row['precio']
                ];
                array_push($items, $item);
            }

            return $items;

            
        } catch (PDOException $e) {
           return [];
        }
    }

    public function countProductsByCategory() {
        try {
            $query = $this->prepare('
                SELECT c.nombre AS categoria, COUNT(p.id) AS total 
                FROM categorias c
                LEFT JOIN productos p ON p.id_categoria = c.id
                GROUP BY c.id
            ');
    
            $query->execute();
    
            return $query->fetchAll(PDO::FETCH_ASSOC); // Retorna los resultados como un array asociativo
        } catch (PDOException $e) {
            return [];
        }
    }

    // Obtener información del producto por código de barras
    public function getProductByCode($codigo_barras) {
        // Reemplaza esta consulta con la correcta según tu estructura de base de datos
        $stmt = $this->prepare("SELECT * FROM productos WHERE codigo_barras = :codigo_barras");
        $stmt->bindParam(':codigo_barras', $codigo_barras);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Debería retornar un arreglo asociativo o false si no se encuentra
    }

    public function getProductInfoByCode($codigo_barras) {
        // Similar a la anterior, asegúrate de que esta consulta también esté correcta
        $stmt = $this->prepare("SELECT * FROM informacionProducto WHERE codigo_barras = :codigo_barras");
        $stmt->bindParam(':codigo_barras', $codigo_barras);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Debería retornar un arreglo asociativo o false si no se encuentra
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
    public function getLote() { return $this->lote; }
    public function getFechaVencimiento() { return $this->fechaVencimiento; }
    public function getDistribuidor() { return $this->distribuidor; }
    public function getRegistroSanitario() { return $this->registroSanitario; }
    
    // Setters
    public function setId($id){                                                $this->id = $id; }
    public function setNombre($nombre){                                        $this->nombre = $nombre; }
    public function setId_Categoria($id_categoria){                            $this->id_categoria = $id_categoria; }
    public function setPrecio($precio){                                        $this->precio = $precio; }
    public function setIva($iva){                                              $this->iva = $iva; }
    public function setStock($stock){                                          $this->stock = $stock; }
    public function setCodigo_barras($codigo_barras){                          $this->codigo_barras = $codigo_barras; }
    public function setFecha_Creacion($fecha_Creacion){                        $this->fecha_Creacion = $fecha_Creacion; }
    public function setfecha_Actualizacion($fecha_Actualizacion){              $this->fecha_Actualizacion = $fecha_Actualizacion; }
    public function setLote($lote) { $this->lote = $lote; }
    public function setFechaVencimiento($fechaVencimiento) { $this->fechaVencimiento = $fechaVencimiento; }
    public function setDistribuidor($distribuidor) { $this->distribuidor = $distribuidor; }
    public function setRegistroSanitario($registroSanitario) { $this->registroSanitario = $registroSanitario; }
}
