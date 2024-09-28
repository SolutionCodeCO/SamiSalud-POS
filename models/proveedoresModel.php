<?php

class ProveedoresModel extends Model implements IModel
{
    private $id;
    private $nombre_completo;
    private $empresa;
    private $correo_email;
    private $telefono;
    private $observaciones;
    private $fecha_Creacion;
    private $fecha_Actualizacion;

    public function __construct()
    {
        parent::__construct();
        $this->id = "";
        $this->nombre_completo = "";
        $this->empresa = "";
        $this->correo_email = "";
        $this->telefono = "";
        $this->observaciones = "";
        $this->fecha_Creacion = "";
        $this->fecha_Actualizacion = "";
    }

    public function save()
    {
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {
           

            // Insertar en la tabla productos
            $queryProveedor = $this->prepare('INSERT INTO proveedores (nombre_completo, empresa, correo_email, telefono, observaciones, fecha_Creacion, fecha_Actualizacion) 
                                              VALUES(:nombre_completo, :empresa, :correo_email, :telefono, :observaciones, :fecha_Creacion, :fecha_Actualizacion)');

            $queryProveedor->execute([
                'nombre_completo' => $this->nombre_completo,
                'empresa' => $this->empresa,
                'correo_email' => $this->correo_email,
                'telefono' => $this->telefono,
                'observaciones' => $this->observaciones,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion
            ]);


           

            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }

    // Obtener la información básica del producto
    public function getProductById($productId)
    {
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
    public function getProductInfoById($productId)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM informacionProducto WHERE id_producto = :id");
            $query->execute(['id' => $productId]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('ProductsModel::getProductInfoById -> ' . $e->getMessage());
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $query = $this->prepare('DELETE FROM proveedores WHERE id = :id');
            $query->execute([
                'id' => $id,
            ]);

            if ($query->rowCount() > 0) {
                error_log("proveedor con ID $id eliminado correctamente.");
                return true;
            } else {
                error_log("No se eliminó ningún proveedor con ID $id.");
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error al eliminar el proveedor con ID $id: " . $e->getMessage());
            return false;
        }
    }

    public function update()
    {
        // Iniciar la transacción
        $this->db->beginTransaction();

        try {
            // 1. Actualizar los datos del producto en la tabla 'productos'
            $queryProducto = $this->prepare('UPDATE proveedores SET nombre_completo = :nombre_completo, empresa = :empresa, correo_email = :correo_email, telefono = :telefono, observaciones = :observaciones WHERE id = :id');

            $queryProducto->execute([
                'nombre_completo' => $this->getNombre_Completo(),
                'empresa' => $this->getEmpresa(),
                'correo_email' => $this->getCorreo_email(),
                'telefono' => $this->getTelefono(),
                'observaciones' => $this->getObservaciones()
            ]);


            // Si todo fue exitoso, confirmar la transacción
            $this->db->commit();

            return true;

        } catch (PDOException $e) {
            // Si algo falla, hacer rollback de la transacción
            $this->db->rollBack();
            error_log('ProductModel::update -> ' . $e);
            return false;
        }
    }

    public function from($array)
    {
        $this->id = $array['id'];
        $this->nombre_completo = $array['nombre_completo'];
        $this->empresa = $array['empresa'];
        $this->correo_email = $array['correo_email'];
        $this->telefono = $array['telefono'];
        $this->observaciones = $array['observaciones'];
        $this->fecha_Actualizacion = $array['fecha_Actualizacion'];
        $this->fecha_Creacion = $array['fecha_Creacion'];
    }
    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM proveedores WHERE id = :id");
            $query->execute(['id' => $id]);

            $proveedor = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($proveedor["id"]);
            $this->setNombre_completo($proveedor["nombre_completo"]);
            $this->setEmpresa($proveedor["empresa"]);
            $this->setCorreo_Email($proveedor["correo_email"]);
            $this->setTelefono($proveedor["telefono"]);
            $this->setObservaciones($proveedor["observaciones"]);
           
            $this->setFecha_Creacion($proveedor["fecha_Creacion"]);
            $this->setFecha_Actualizacion($proveedor["fecha_Actualizacion"]);

            return $this;

        } catch (PDOException $e) {
            error_log("models/ProveedoresModel ::getID -> PDOException " . $e);
            return false;
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM proveedores");

            while($pointer = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ProveedoresModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/proveedoresModel:: getAll -> PDOException ". $e);
            return NULL;
        }
    }
    public function getAllByCategory($id_categoria)
    {
        $items = [];
        try {
            $query = $this->prepare('SELECT * FROM productos where id_categoria = :id_categoria');

            $query->execute([
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

    public function countProductsByCategory()
    {
    }

    // Obtener información del producto por código de barras
    public function getProductByCode($codigo_barras)
    {

    }

    public function getProductInfoByCode($codigo_barras)
    {

    }




    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getNombre_Completo()
    {
        return $this->nombre_completo;
    }
    public function getEmpresa()
    {
        return $this->empresa;
    }
    public function getCorreo_email()
    {
        return $this->correo_email;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    public function getfecha_Creacion()
    {
        return $this->fecha_Creacion;
    }
    public function getfecha_Actualizacion()
    {
        return $this->fecha_Actualizacion;
    }


    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre_completo($nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;
    }
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
    public function setCorreo_Email($correo_email)
    {
        $this->correo_email = $correo_email;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }
    public function setFecha_Creacion($fecha_Creacion)
    {
        $this->fecha_Creacion = $fecha_Creacion;
    }
    public function setfecha_Actualizacion($fecha_Actualizacion)
    {
        $this->fecha_Actualizacion = $fecha_Actualizacion;
    }
}
