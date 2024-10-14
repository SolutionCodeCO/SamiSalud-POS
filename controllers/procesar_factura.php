<?php
require_once 'config/Database.php';
require_once 'models/FacturasModel.php';
require_once 'models/ProductosModel.php';

$db = new Database();
$facturasModel = new FacturasModel();
$productosModel = new ProductsModel();

$data = json_decode(file_get_contents('php://input'), true);

// Verifica si todos los datos necesarios están presentes
if (isset($data['total'], $data['amountPaid'], $data['cambio'], $data['paymentMethod'], $data['productos'])) {
    $total = $data['total'];
    $amountPaid = $data['amountPaid'];
    $cambio = $data['cambio'];
    $paymentMethod = $data['paymentMethod'];
    $productos = $data['productos']; // Suponiendo que es un array de productos

    // Inicia una transacción
    $conn = $db->connect();
    $conn->beginTransaction();

    try {
        // Guarda la factura física
        $facturasModel->setTotal($total);
        $facturasModel->setMontoPagado($amountPaid);
        $facturasModel->setCambio($cambio);
        $facturasModel->setMetodoPago($paymentMethod);
        $facturasModel->setFecha(date("Y-m-d H:i:s")); // Establecer la fecha actual
        $facturaId = $facturasModel->saveFacturaFisica(); // Asegúrate de que devuelva el ID de la factura guardada

        // Guarda los detalles de cada producto en la factura
        foreach ($productos as $producto) {
            $productoId = $producto['id'];
            $cantidad = $producto['cantidad'];
            $precioTotal = $producto['precio'];

            // Actualiza el stock del producto
            $productosModel->actualizarStock($productoId, $cantidad);

            // Guarda el detalle de la factura
            $facturasModel->guardarDetalleFactura($facturaId, $productoId, $cantidad, $precioTotal);
        }

        // Confirma la transacción
        $conn->commit();

        // Generar un PDF de la factura o redirigir a una página de impresión
        echo json_encode(["success" => true, "facturaId" => $facturaId]); // Retorna el ID de la factura guardada

    } catch (Exception $e) {
        // Revertir en caso de error
        $conn->rollBack();
        error_log("Error en procesar_factura.php: " . $e->getMessage());
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos.']);
}
