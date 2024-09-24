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
    <title>Dulcería | POS</title>
</head>


<body class="bg-blanco flex  w-full absolute min-h-[100vh]">
     <!-- Incluir la barra lateral derecha-->
   <?php include 'views/partials/sidebar_left.php'; ?>


    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Dulcería</h2>
            <p class="font-medium text-[18px] -mt-2 ">Apartado donde podrás gestionar tu productos.</p>
        </article>

        <main class="px-5 pt-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-azul_oscuro text-[20px] font-semibold">Dulcería</h2>

                </div>

                <div class="flex items-center justify-center gap-5">
                    <div class="relative">
                        <input placeholder="Buscar..."
                            class="input shadow-sm focus:border-2 border-gray-300 px-4 py-2 rounded-lg w-[50px] transition-all focus:w-[340px] outline-none"
                            name="search" type="search" />
                        <svg class="size-6 absolute top-2 right-3 text-gray-500" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                    </div>

                    <div class="group relative inline-block cursor-pointer"
                        onclick="document.getElementById('myModal').showModal()" id="btn>
                        <button class=" focus:outline-none">
                        <svg class="bi bi-instagram transform transition-transform duration-300 hover:scale-125 hover:text-blue-500"
                            fill="currentColor" height="30" width="30" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg>
                        </button>
                        <span
                            class="absolute -top-12 left-1/2 transform -translate-x-1/2 z-20 px-4 py-2 text-sm font-bold text-white bg-gray-900 rounded-lg shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Añadir</span>
                    </div>



                </div>
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
<script src="public/js/usuarios.js"></script>


</html>