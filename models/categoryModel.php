<?php

class CategoryModel extends Model implements IModel
{
    private $id;
    private $id_local;
    private $nombre;
    private $fecha_Creacion;
    private $fecha_Actualizacion;



    public function __construct()
    {
        parent::__construct();
        $this->nombre = "";
        $this->fecha_Creacion = "";
        $this->fecha_Actualizacion = "";
    }

    public function save()
    {
        // Asignar la fecha y hora actual
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {
            $query = $this->prepare('INSERT INTO categorias (id, nombre, fecha_Creacion, fecha_Actualizacion) VALUES (:id, :nombre, :fecha_Creacion, :fecha_Actualizacion)');

            $query->execute([
                'id' => $this->id,
                'nombre' => $this->nombre,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion
            ]);

            if ($query->rowCount())
                return true;
            return false;

        } catch (PDOException $e) {
            return false;
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM categorias");

            while ($pointer = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new CategoryModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/categoryModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM categoria WHERE id = :id");
            $query->execute(['id' => $id]);
            $category = $query->fetch(PDO::FETCH_ASSOC);

            $this->from($category);
            return $this;

        } catch (PDOException $e) {
            error_log("models/categoryModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE FROM categorias WHERE id = :id");
            $query->execute(['id' => $id]);

            return true;
        } catch (PDOException $e) {
            error_log("models/categoryModel ::delete -> PDOException " . $e);
            return false;
        }
    }
    public function update()
    {
        try {
            // Asignar la fecha y hora actual
            $this->fecha_Actualizacion = date("Y-m-d H:i:s");

            $query = $this->prepare("UPDATE categoria SET nombre = :nombre, fecha_Actualizacion = :fecha_Actualizacion WHERE id = :id");
            $query->execute([
                'id' => $this->id,
                'nombre' => $this->nombre,
                'fecha_Actualizacion' => $this->fecha_Actualizacion
            ]);

            return true;

        } catch (PDOException $e) {
            error_log("models/categoryModel ::update -> PDOException " . $e);
            return false;
        }
    }
    public function from($array)
    {
        $this->id = $array["id"];
        $this->nombre = $array["nombre"];
        $this->fecha_Creacion = $array["fecha_Creacion"];
        $this->fecha_Actualizacion = $array["fecha_Actualizacion"];
    }

    public function existCategory($nombre)
    {
        try {

            $query = $this->prepare("SELECT nombre from categoria WHERE nombre = :nombre");
            $query->execute([
                'nombre' => $this->nombre,
            ]);

            if ($query->rowCount()) {
                return true;
            } else {

                return false;
            }

        } catch (PDOException $e) {
            error_log("models/categoryModel ::existsCategory -> PDOException " . $e);
            return false;
        }
    }

    public function countProductsByCategory()
    {
        try {
            $query = $this->prepare("
                SELECT c.nombre AS categoria, COUNT(p.id) AS cantidad
                FROM productos p
                INNER JOIN categorias c ON p.id_categoria = c.id
                GROUP BY c.nombre
            ");
            $query->execute();

            // Devolver los resultados como un arreglo asociativo
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('ProductModel::countProductsByCategory -> PDOException ' . $e);
            return false;
        }
    }
    public function getProductInfoById($productId)
    {
    }
    public function getProductById($productId)
    {
    }
    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getfecha_Creacion()
    {
        return $this->fecha_Creacion;
    }
    public function getfecha_Actualizacion()
    {
        return $this->fecha_Actualizacion;
    }
    public function getId_local()
    {
        return $this->id_local;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setFecha_Creacion($fecha_Creacion)
    {
        $this->$fecha_Creacion = $fecha_Creacion;
    }
    public function setfecha_Actualizacion($fecha_Actualizacion)
    {
        $this->fecha_Actualizacion = $fecha_Actualizacion;
    }
    public function setId_local($id_local)
    {
        $this->id_local = $id_local;
    }

}
