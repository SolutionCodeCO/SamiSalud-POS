<?php

class ProductInfoModel{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Método para obtener la información del producto desde la tabla principal
    public function getProductById($productId)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM productos WHERE id = :id");
            $query->execute(['id' => $productId]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('ProductModel::getProductById -> ' . $e->getMessage());
            return false;
        }
    }

    // Método para obtener la información adicional del producto desde la tabla `informacionProducto`
    public function getProductInfoById($productId)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM informacionProducto WHERE id_producto = :id");
            $query->execute(['id' => $productId]);
            return $query->fetch(PDO::FETCH_ASSOC);  // Trae una fila de la información adicional
        } catch (PDOException $e) {
            error_log('ProductModel::getProductInfoById -> ' . $e->getMessage());
            return false;
        }
    }
}