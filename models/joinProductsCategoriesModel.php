<?php

class JoinProductsCategoriesModel extends Model{

    private $id;
    private $nombre;
    private $id_categoria;
    private $precio;
    private $iva;
    private $stock;
    private $codigo_barras;
    private $fecha_Creacion;
    private $fecha_Actualizacion;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll($userid){
        $items = [];
        try{
            $query = $this->prepare('SELECT producto.id as producto_id, nombre, id_categoria, precio, iva, stock, codigo_barras FROM productos INNER JOIN categorias WHERE productos.id_categoria = categorias.id ORDER BY date');
            $query->execute(["userid" => $userid]);


            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new JoinProductsCategoriesModel();
                $item->from($p);
                array_push($items, $item);
            }

            return $items;

        }catch(PDOException $e){
            echo $e;
        }
    }


    public function from($array){
        $this->id               = $array['id'];
        $this->nombre           = $array['nombre'];
        $this->id_categoria     = $array['id_categoria'];
        $this->precio           = $array['precio'];
        $this->iva              = $array['iva'];
        $this->stock            = $array['stock'];
        $this->codigo_barras    = $array['codigo_barras'];
        $this->fecha_Creacion   = $array['fecha_Creacion'];
        $this->fecha_Actualizacion = $array['fecha_Actualizacion'];
    }

    public function toArray(){
        $array = [];
        $array['id'] = $this->id;
        $array['nombre'] = $this->nombre;
        $array['id_categoria'] = $this->id_categoria;
        $array['precio'] = $this->precio;
        $array['iva'] = $this->iva;
        $array['stock'] = $this->stock;
        $array['codigo_barras'] = $this->codigo_barras;
        $array['fecha_Creacion'] = $this->fecha_Creacion;
        $array['fecha_Actualizacion'] = $this->fecha_Actualizacion;

        return $array;
    }
    public function getProductInfoById($productId){}
    public function getProductById($productId) {}

    public function getId(){return $this->id;}
    public function getNombre(){return $this->nombre;}
    public function getId_Categoria(){return $this->id_categoria;}
    public function getPrecio(){return $this->precio;}
    public function getIva(){return $this->iva;}
    public function getStock(){return $this->stock;}
    public function getNameCodigo_barras(){return $this->codigo_barras;}
    public function getFecha_Creacion(){return $this->fecha_Creacion;}
    public function getFecha_Actualizacion(){return $this->fecha_Actualizacion;}
}
