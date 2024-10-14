async function guardarFacturaFisica(total, idEmpleado, idLocal, idMetodoPago) {
    try {
        const response = await fetch('facturador/guardarFacturaFisica', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                total,
                idEmpleado,
                idLocal,
                idMetodoPago
            })
        });
        const data = await response.json();
        return data.idFactura; // Retorna el ID de la factura insertada
    } catch (error) {
        console.error('Error al guardar la factura física:', error);
    }
}

async function guardarDetallesFactura(idFactura, productos) {
    for (const producto of productos) {
        try {
            await fetch('facturador/guardarDetalleFactura', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    idFacturaFisica: idFactura,
                    idProducto: producto.id,
                    cantidad: producto.cantidad,
                    precio: producto.precio
                })
            });
        } catch (error) {
            console.error('Error al guardar el detalle de la factura:', error);
        }
    }
}

async function procesarVenta(total, productos, idEmpleado, idLocal, idMetodoPago) {
    const idFactura = await guardarFacturaFisica(total, idEmpleado, idLocal, idMetodoPago);
    if (idFactura) {
        await guardarDetallesFactura(idFactura, productos);
        alert('Factura guardada con éxito.');
    } else {
        alert('Error al procesar la venta.');
    }
}