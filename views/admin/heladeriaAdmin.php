<?php 
    $user = $this->data['user'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Heladería | POS</title>
</head>


<body class="bg-blanco flex  w-full absolute min-h-[100vh]">
     <!-- Incluir la barra lateral derecha-->
   <?php include 'views/partials/sidebar_left.php'; ?>

<!-- Incluir modal-->
<?php include 'views/partials/modal.php'; ?>

    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Heladería</h2>
            <p class="font-medium text-[18px] -mt-2 ">Apartado donde podrás gestionar tu productos.</p>
        </article>

        <main class="px-5 pt-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-azul_oscuro text-[20px] font-semibold">Heladería</h2>

                </div>

                <?php include 'views/partials/buscador_añadir_producto.php'; ?>
            </div>

            <?php include 'views/partials/getProducts_form.php'; ?>
        </main>

    </section>

     <!-- Incluir la barra lateral derecha-->
   <?php include 'views/partials/sidebar_right.php'; ?>

<!-- Incluir modal-->
<?php include 'views/partials/modal.php'; ?>
</body>
<script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>
<script src="public/js/filtrador.js"></script>
<script src="public/js/usuarios.js"></script>


</html>