<?php
require_once 'models/productsModel.php';
require_once 'models/categoryModel.php';

class Facturador extends SessionController {
  
    protected $user;
    
    function __construct() {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render() {
        $user = $this->getUserSessionData();
        $this->view->render('admin/facturadorAdmin', [
            'user' => $user,
            
        ]);
    }

    function buscador() {
        if (isset($_GET['barcode'])) {
            $barcode = $_GET['barcode'];
            $db = new Database();
            $conn = $db->connect();
            $query = "SELECT codigo_barras, nombre, precio, stock FROM productos WHERE codigo_barras = :barcode";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':barcode', $barcode);
            $stmt->execute();
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($producto) {
                $producto['cantidad'] = 1;
                $producto['precio_total'] = $producto['precio'];
                echo json_encode($producto);
            } else {
                echo json_encode(null);
            }
        }
    }

    function actualizarStock($id, $cantidad) {
        $db = new Database();
        $conn = $db->connect();
        $query = "UPDATE productos SET stock = stock - :cantidad WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Archivo: FacturadorController.php

    public function guardarFacturaFisica() {
        $data = json_decode(file_get_contents("php://input"), true);
        $total = $data['total'];
        $idEmpleado = $data['idEmpleado'];
        $idLocal = $data['idLocal'];
        $idMetodoPago = $data['idMetodoPago'];
    
        // Consulta SQL para insertar en facturasfisicas
        $query = "INSERT INTO facturasfisicas (id_empleado, id_local, fecha, total, id_metodo_pago)
                  VALUES (:id_empleado, :id_local, NOW(), :total, :id_metodo_pago)";
        $stmt = $this->prepare($query);
        $stmt->bindParam(':id_empleado', $idEmpleado);
        $stmt->bindParam(':id_local', $idLocal);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':id_metodo_pago', $idMetodoPago);
        $stmt->execute();
        
        // Retorna el ID de la factura recién creada
        echo json_encode(['idFactura' => $this->lastInsertId()]);
    }

    public function guardarDetalleFactura() {
        $data = json_decode(file_get_contents("php://input"), true);
        $idFacturaFisica = $data['idFacturaFisica'];
        $idProducto = $data['idProducto'];
        $cantidad = $data['cantidad'];
        $precio = $data['precio'];
    
        // Consulta SQL para insertar en detallefacturas
        $query = "INSERT INTO detallefacturas (id_factura_fisica, id_producto, cantidad, precio)
                  VALUES (:id_factura_fisica, :id_producto, :cantidad, :precio)";
        $stmt = $this->prepare($query);
        $stmt->bindParam(':id_factura_fisica', $idFacturaFisica);
        $stmt->bindParam(':id_producto', $idProducto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio', $precio);
        $stmt->execute();
        
        echo json_encode(['status' => 'success']);
    }
    
}
