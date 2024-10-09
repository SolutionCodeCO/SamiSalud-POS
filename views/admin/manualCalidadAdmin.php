<?php
$user = $this->data['user'];
$formNames = $this->data['formNames'];
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
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <title>Control de calidad</title>
</head>


<body class="bg-blanco flex  w-full absolute min-h-[100vh]">

    <!-- Incluir la barra lateral izquierda-->
    <?php include 'views/partials/sidebar_left.php'; ?>

    <section id="contenido" class="flex flex-col  bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Control de calidad DIARIO.</h2>
            <p class="font-medium text-[18px] -mt-2 ">En esta seccion podrás llenar cada uno de los formularios.</p>
        </article>

        <?php $this->showMessages(); ?>

        <article class="flex h-full flex-wrap gap-5 pt-14 pb-5 mx-8">

            <!-- Verificar si hay registros -->
            <?php if (!empty($formNames)): ?>
                <?php foreach ($formNames as $registro): ?>
                    <div
                        class="hover:cursor-pointer hover:-translate-y-4 transition-all shadow-lg relative w-[30%] h-[180px] rounded-xl bg-[url('public/img/box.jpg')] bg-cover bg-center ">
                        <a href="<?php echo str_replace(' ', '', strtolower($registro['nombre_formulario'])); ?>">
                            <div class="absolute right-0 z-10 font-bold text-white p-4 text-[45px]">
                                <i class="fa-brands fa-wpforms"></i>
                            </div>
                            <div class="absolute bottom-0 z-10 text-white p-4 text-[25px]">
                                <?php echo $registro['nombre_formulario']; ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No se encontraron registros para mostrar.</p>
            <?php endif; ?>

        </article>
    </section>

    <!-- Incluir la barra lateral derecha-->
    <?php include 'views/partials/sidebar_right.php'; ?>

</body>
<script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>

</html>