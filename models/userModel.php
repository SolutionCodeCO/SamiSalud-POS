<?php

date_default_timezone_set('America/Bogota');


class UserModel extends Model implements IModel{
    private $id;
    private $nombre;
    private $usuario;
    private $contrasenia;
    private $id_rol;
    private $fecha_Creacion;
    private $fecha_Actualizacion;

    public function __construct()
    {
        parent::__construct();
        $this->nombre = "";
        $this->usuario = "";
        $this->contrasenia = "";
        $this->id_rol = "";
        $this->fecha_Creacion = "";
        $this->fecha_Actualizacion = "";
    }

    public function save()
    {
        try {
            // Asignar la fecha y hora actual
            $this->fecha_Creacion = date("Y-m-d H:i:s");
            $this->fecha_Actualizacion = date("Y-m-d H:i:s");

            $query = $this->prepare('INSERT INTO empleados(id, nombre, usuario, contrasenia, id_rol, fecha_Creacion, fecha_Actualizacion) 
                                     VALUES(:id, :nombre, :usuario, :contrasenia, :id_rol, :fecha_Creacion, :fecha_Actualizacion)');

            $query->execute([
                'id' => $this->id,
                'nombre' => $this->nombre,
                'usuario' => $this->usuario,
                'contrasenia' => $this->contrasenia,
                'id_rol'=> $this->id_rol,
                'fecha_Creacion'=> $this->fecha_Creacion,
                'fecha_Actualizacion'=> $this->fecha_Actualizacion
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("models/userModel:: save -> PDOException ". $e);
            return false;
        }
    }

    public function getAll()
    {
        $items = [];

        try {
            $query = $this->prepare("SELECT * FROM empleados");
            $query->execute();

            while($pointer = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($pointer["id"]);
                $item->setNombre($pointer["nombre"]);
                $item->setUsuario($pointer["usuario"]);
                $item->setcontrasenia($pointer["contrasenia"]);
                $item->setId_rol($pointer["id_rol"]);
                $item->setFecha_Creacion($pointer["fecha_Creacion"]);
                $item->setFecha_Actualizacion($pointer["fecha_Actualizacion"]);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/userModel:: getAll -> PDOException ". $e);
            return false;
        }
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM empleados WHERE id = :id");
            $query->execute(['id' => $id]);

            $empleado = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($empleado["id"]);
            $this->setNombre($empleado["nombre"]);
            $this->setUsuario($empleado["usuario"]);
            $this->setcontrasenia($empleado["contrasenia"]);
            $this->setId_rol($empleado["id_rol"]);
            $this->setFecha_Creacion($empleado["fecha_Creacion"]);
            $this->setFecha_Actualizacion($empleado["fecha_Actualizacion"]);

            return $this;

        } catch (PDOException $e) {
            error_log("models/userModel ::getID -> PDOException ". $e);
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE FROM empleados WHERE id = :id");
            $query->execute(['id' => $id]);

            return true;
        } catch (PDOException $e) {
            error_log("models/userModel ::delete -> PDOException ". $e);
            return false;
        }
    }

    public function update()
    {
        try {
            // Asignar la fecha y hora actual
            $this->fecha_Actualizacion = date("Y-m-d H:i:s");

            $query = $this->prepare("UPDATE empleados SET nombre = :nombre, usuario = :usuario, contrasenia = :contrasenia, id_rol = :id_rol, fecha_Actualizacion = :fecha_Actualizacion WHERE id = :id");
            $query->execute([
                'id' => $this->id,
                'nombre'=> $this->nombre,
                'usuario' => $this->usuario,
                'contrasenia' => $this->contrasenia,
                'id_rol' => $this->id_rol,
                'fecha_Actualizacion' => $this->fecha_Actualizacion
            ]);

            return true;

        } catch (PDOException $e) {
            error_log("models/userModel ::update -> PDOException ". $e);
            return false;
        }
    }

    public function from($array)
    {
        $this->id = $array["id"];
        $this->nombre = $array["nombre"];
        $this->usuario = $array["usuario"];
        $this->contrasenia = $array["contrasenia"];
        $this->id_rol = $array["id_rol"];
        $this->fecha_Creacion = $array["fecha_Creacion"];
        $this->fecha_Actualizacion = $array["fecha_Actualizacion"];
    }

    public function exist($usuario){
        try {
            $query = $this->prepare('SELECT usuario FROM empleados WHERE usuario = :usuario');
            $query->execute(['usuario'=> $usuario]);

            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("models/userModel ::exist -> PDOException ". $e);
            return false;
        }
    }

    public function comparePassword($contrasenia, $id) {
        try {
            $usuario = $this->get($id);
            return password_verify($contrasenia, $usuario->getcontrasenia());
        } catch (PDOException $e) {
            error_log("models/userModel ::comparePassword -> PDOException " . $e);
            return false;
        }
    }

    // Función para encriptar la contraseña
    private function getHashedcontrasenia($contrasenia){
        return password_hash($contrasenia, PASSWORD_DEFAULT, ["COST" => 10]);
    }

    // Getters
    public function getId(){ return                               $this->id; }
    public function getNombre(){ return                           $this->nombre; }
    public function getUsuario(){ return                          $this->usuario; }
    public function getcontrasenia(){ return                      $this->contrasenia; }
    public function getFecha_Actualizacion(){ return              $this->fecha_Actualizacion; }
    public function getFecha_Creacion(){ return                   $this->fecha_Creacion; }
    public function getId_rol(){ return                           $this->id_rol; }

    // Setters
    public function setId($id){                                   $this->id = $id; }
    public function setNombre($nombre){                           $this->nombre = $nombre; }
    public function setUsuario($usuario){                         $this->usuario = $usuario; }
    public function setcontrasenia($contrasenia){                 $this->contrasenia = $this->getHashedcontrasenia($contrasenia); }
    public function setId_rol($id_rol){                           $this->id_rol = $id_rol; }
    public function setFecha_Creacion($fecha_Creacion){           $this->fecha_Creacion = $fecha_Creacion; }
    public function setFecha_Actualizacion($fecha_Actualizacion){ $this->fecha_Actualizacion = $fecha_Actualizacion; }
}
