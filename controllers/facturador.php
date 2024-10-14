<?php
require_once 'models/productsModel.php';
require_once 'models/categoryModel.php';
require_once 'models/facturasModel.php';

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
            $query = "SELECT id, codigo_barras, nombre, precio, stock FROM productos WHERE codigo_barras = :barcode";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':barcode', $barcode);
            $stmt->execute();
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($producto) {
                $producto['cantidad'] = 1; // Asignar cantidad por defecto
                $producto['precio_total'] = $producto['precio']; // Calcular precio total
                echo json_encode($producto);
            } else {
                echo json_encode(null);
            }
        }
    }

    public function newFactura() {
        // Obtener los datos JSON del cuerpo de la solicitud
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Verificar si todos los campos necesarios están presentes
        if (!isset($data['productos'], $data['total'], $data['amountPaid'], $data['cambio'], $data['paymentMethod'])) {
            $this->jsonResponse(['success' => false, 'error' => 'Campos vacíos.']);
            return;
        }
    
        try {
            // 1. Recoger los datos del JSON
            $productos = $data['productos'];
            $total = $data['total'];
            $amountPaid = $data['amountPaid'];
            $cambio = $data['cambio'];
            $paymentMethod = $data['paymentMethod'];
    
            // 2. Crear una instancia del modelo FacturasModel
            $factura = new FacturasModel();
    
            // 3. Establecer los datos en el modelo
            $factura->setProductos($productos);
            $factura->setTotal($total);
            $factura->setCambio($cambio);
            $factura->setMetodoPago($paymentMethod);
            $factura->setMontoPagado($amountPaid);
            $factura->setFecha(date("Y-m-d H:i:s"));
            $factura->setId_usuario($this->user->getId());
            $factura->setId_local($this->user->getId_local());
    
            // 4. Guardar la factura
            $facturaId = $factura->saveFacturaFisica();
            if ($facturaId) {
                // 5. Guardar detalles y actualizar el stock
                foreach ($productos as $producto) {
                    $productoId = $producto['codigo_barras']; // Asume que esto es el ID correcto
                    $cantidad = $producto['cantidad'];
                    $precioTotal = $producto['precio_total']; // Asegúrate de que esto sea el precio total
    
                    // Descontar el stock
                    $factura->actualizarStock($productoId, $cantidad); // Asegúrate de que 'actualizarStock' reciba el ID correcto
    
                    // Guardar detalle de la factura
                    $factura->guardarDetalleFactura($facturaId, $productoId, $cantidad, $precioTotal);
                }
    
                $this->jsonResponse(['success' => true, 'message' => 'Factura guardada exitosamente.', 'facturaId' => $facturaId]);
            } else {
                $this->jsonResponse(['success' => false, 'error' => 'Error al guardar la factura.']);
            }
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            $this->jsonResponse(['success' => false, 'error' => 'Error al guardar la factura.']);
        }
    }
    
    

    private function jsonResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit; // Asegúrate de terminar el script después de enviar la respuesta
    }
}
