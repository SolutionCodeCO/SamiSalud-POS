<?php

class FacturasModel extends Model
{
    private $productos;
    private $total;
    private $fecha;
    private $id_cliente;
    private $id_usuario;
    private $id_local;
    private $montoPagado;
    private $cambio;
    private $metodoPago;
    private $precio;

    public function __construct() {
        parent::__construct();
        $this->productos = [];
        $this->total = 0;
        $this->fecha = "";
        $this->id_cliente = "";
        $this->id_usuario = "";
        $this->id_local = "";
        $this->montoPagado = 0;
        $this->cambio = 0;
        $this->metodoPago = "";
        $this->precio = 0;
    }

    public function saveFacturaFisica() {
        try {
            // Guardar en tabla facturas físicas
            $queryFactura = $this->prepare('
                INSERT INTO facturasfisicas (total, fecha, id_local, id_empleado, monto_pagado, cambio, metodo_pago) 
                VALUES (:total, :fecha, :id_local, :id_empleado, :monto_pagado, :cambio, :metodo_pago)'
            );
    
            $queryFactura->execute([
                'total' => $this->total,
                'fecha' => $this->fecha,
                'id_local' => $this->id_local,
                'id_empleado' => $this->id_usuario,
                'monto_pagado' => $this->montoPagado,
                'cambio' => $this->cambio,
                'metodo_pago' => $this->metodoPago,
            ]);
    
            // Devuelve el ID de la factura recién creada
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error al guardar factura: " . $e->getMessage());
            return false;
        }
    }

    public function guardarDetalleFactura($facturaId, $codigo_barras, $cantidad, $precio_total) {
        $db = new Database();
        $conn = $db->connect();
    
        // Primero, obtén el ID del producto a partir del código de barras
        $query = "SELECT id FROM productos WHERE codigo_barras = :codigo_barras";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':codigo_barras', $codigo_barras);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$producto) {
            error_log("Producto con código de barras $codigo_barras no encontrado.");
            return false; // O maneja el error como consideres necesario
        }
    
        $id_producto = $producto['id'];
    
        // Ahora, inserta en detallefacturas usando el ID del producto
        $query = "INSERT INTO detallefacturas (id_factura_fisica, id_producto, cantidad, precio) VALUES (:facturaId, :id_producto, :cantidad, :precio)";
        $stmt = $conn->prepare($query);
    
        // Vincular parámetros
        $stmt->bindParam(':facturaId', $facturaId);
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio', $precio_total);
    
        if (!$stmt->execute()) {
            error_log('Error al guardar detalle de factura: ' . implode(", ", $stmt->errorInfo())); // Log del error
            return false;
        }
        return true;
    }
    
    // Método para actualizar stock
    public function actualizarStock($id_producto, $cantidad) {
        $db = new Database();
        $conn = $db->connect();
        $query = "UPDATE productos SET stock = stock - :cantidad WHERE codigo_barras = :codigo_barras";
        $stmt = $conn->prepare($query);
        
        // Vincular parámetros
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':codigo_barras', $id_producto);
        
        if (!$stmt->execute()) {
            error_log('Error al actualizar stock: ' . implode(", ", $stmt->errorInfo())); // Log del error
        }
    }

    

    // Métodos setters para asignar valores a las propiedades
    public function setProductos($productos) {
        $this->productos = $productos;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setId_local($id_local) {
        $this->id_local = $id_local;
    }

    public function setMontoPagado($montoPagado) {
        $this->montoPagado = $montoPagado;
    }

    public function setCambio($cambio) {
        $this->cambio = $cambio;
    }

    public function setMetodoPago($metodoPago) {
        $this->metodoPago = $metodoPago;
    }
}
