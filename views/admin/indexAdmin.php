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
    <title>Home</title>
</head>


<body class="bg-blanco flex  w-full absolute min-h-[100vh]">
    <!-- Incluir la barra lateral izquierda-->
    <?php include 'views/partials/sidebar_left.php'; ?>

    <section id="contenido"
        class="flex flex-col justify-between bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Buenos días,
                <?php echo ($user->getNombre() != '') ? $user->getNombre() : $user->getUsuario(); ?> </h2>
            <p class="font-medium text-[18px] -mt-2 ">Bienvenido nuevamente, ¿Listo para las ventas?</p>
        </article>


        <article class="flex gap-5 pt-14 pb-5 mx-8">

            <div
                class="hover:cursor-pointer hover:-translate-y-4 transition-all shadow-lg relative w-[33%] h-[180px] rounded-xl bg-[url('public/img/box.jpg')] bg-cover bg-center ">
                <a href="drogueria">
                    <div class="absolute right-0 z-10 font-bold text-white p-4 text-[15px]">Acceder</div>
                    <div class="absolute bottom-0 z-10 text-white p-4 text-[25px]">Droguería</div>
                </a>
            </div>


            <div
                class="hover:cursor-pointer hover:-translate-y-4 transition-all shadow-lg relative w-[33%] h-[180px] rounded-xl bg-[url('public/img/box.jpg')] bg-cover bg-center ">
                <a href="heladeria">
                    <div class="absolute right-0 z-10 font-bold text-white p-4 text-[15px]">Acceder</div>
                    <div class="absolute bottom-0 z-10 text-white p-4 text-[25px]">Heladería</div>
                </a>
            </div>


            <div
                class="hover:cursor-pointer hover:-translate-y-4 transition-all shadow-lg relative w-[33%] h-[180px] rounded-xl bg-[url('public/img/box.jpg')] bg-cover bg-center ">
               
                    <a href="pastillero">
                        <div class="absolute right-0 z-10 font-bold text-white p-4 text-[15px]">Acceder</div>
                        <div class="absolute bottom-0 z-10 text-white p-4 text-[25px]">Pastillero</div>
                    </a>

            </div>

        </article>

        <article
            class="my-10 p-5 bg-cover bg-[url('public/img/degradado.jpg')] h-[40%] rounded-xl mx-8 flex flex-col items-start justify-center">
            <h3 class="text-white text-[35px] font-medium" id="fecha">Cargando...</h3>
            <p class="text-white text-[18px] font-light">Empecemos a vender mas que ayer, presiona el botón adecuado y
                a ¡FACTURAR!</p>

            <div class="flex justify-star gap-5">


                <a href="facturador">
                    <button
                        class="mt-3 flex justify-center gap-2 items-center mx-auto shadow-xl text-lg text-gray-50 bg-[#0A0D2D] backdrop-blur-md lg:font-semibold isolation-auto border-gray-50 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-[#FFFFFF] hover:text-black before:-z-10 before:aspect-square before:hover:scale-200 before:hover:duration-500 relative z-10 px-4 py-2 overflow-hidden border-2 rounded-lg group"
                        type="submit">
                        Empezar a vender
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 19"
                            class="w-8 h-8 justify-end bg-gray-50 group-hover:rotate-90 group-hover:bg-gray-50 text-gray-50 ease-linear duration-300 rounded-full border border-gray-700 group-hover:border-gray-700 p-2 rotate-45">
                            <path class="fill-gray-800 group-hover:fill-gray-800"
                                d="M7 18C7 18.5523 7.44772 19 8 19C8.55228 19 9 18.5523 9 18H7ZM8.70711 0.292893C8.31658 -0.0976311 7.68342 -0.0976311 7.29289 0.292893L0.928932 6.65685C0.538408 7.04738 0.538408 7.68054 0.928932 8.07107C1.31946 8.46159 1.95262 8.46159 2.34315 8.07107L8 2.41421L13.6569 8.07107C14.0474 8.46159 14.6805 8.46159 15.0711 8.07107C15.4616 7.68054 15.4616 7.04738 15.0711 6.65685L8.70711 0.292893ZM9 18L9 1H7L7 18H9Z">
                            </path>
                        </svg>
                    </button>

                </a>




            </div>
        </article>

    </section>

    <!-- Incluir la barra lateral derecha-->
    <?php include 'views/partials/sidebar_right.php'; ?>

</body>
<script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>


</html>