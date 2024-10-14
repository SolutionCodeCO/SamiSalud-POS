<?php
$user = $this->data['user'];

if (!$user) {
    echo "Debes iniciar sesión primero";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.jsdelivr.net/npm/jsprintmanager@2.0.13/jsprintmanager.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Vender | Facturador</title>
</head>

<body class="bg-blanco flex w-full absolute min-h-[100vh]">
    <!-- Incluir la barra lateral izquierda-->
    <?php include 'views/partials/sidebar_left.php'; ?>

    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Vender | Facturar</h2>
            <p class="font-medium text-[18px] -mt-2">Apartado donde podrás VENDER tus productos.</p>
        </article>

        <main class="px-5 pt-10">
            <div class="flex justify-between items-center">
                <div class="mt-5 flex items-center justify-center">
                    <div class="w-full h-12 gap-2">
                        <div class="w-full h-10 relative flex rounded-md">
                            <input autocomplete="off"
                                class="peer w-full bg-azul_oscuro outline-none px-4 text-base rounded-xl text-white focus:shadow-md"
                                id="barcodeInput" type="text" name="barcode" oninput="buscarProducto()" required />
                            <label
                                class="absolute top-1/2 translate-y-[-50%] bg-azul_oscuro left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-white peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-white text-white peer-focus:rounded-[5px] duration-150"
                                for="id">
                                Cod. Barras</label>
                        </div>
                    </div>
                </div>

                <div id="totalContainer">
                    Total: $<span id="total" class="text-xl font-medium">0</span>
                </div>


                <button onclick="openPaymentModal()"
                    class="flex items-center bg-azul text-white gap-1 px-8 py-2 cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-azul_oscuro hover:text-blanco duration-300 hover:gap-2 hover:translate-x-3">
                    Finalizar
                    <svg class="w-4 h-4" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                            stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                </button>
            </div>


            </div>

            <div class="rounded mt-7 w-full overflow-auto max-h-[400px]">
                <table class="w-full rounded">
                    <thead class="bg-azul_opacidad rounded w-full">
                        <tr>
                            <th class="p-2 font-medium">Cod. Barras</th>
                            <th class="p-2 font-medium">Producto</th>
                            <th class="p-2 font-medium">Cantidad</th>
                            <th class="p-2 font-medium">Precio</th>
                            <th class="p-2 font-medium">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="productTableBody">
                        <!-- Productos añadidos se colocarán aquí -->
                    </tbody>
                </table>
            </div>
        </main>
    </section>

    <?php include 'views/partials/sidebar_right.php'; ?>
    <?php include 'views/partials/modalFinalizar.php'; ?>

    <script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
    <script src="public/js/facturador.js"></script>
    <script src="public/js/guardar.js"></script>

    <script>
        // Aquí se asume que tienes una forma de obtener el nombre del usuario y el local
    const user = {
        nombre: '<?php echo $user->getNombre(); ?>',  // Cambia esto por la variable real
        id_local: '<?php echo $user->getId_local(); ?>'      // Cambia esto por la variable real
    };
    </script>
</body>

</html>