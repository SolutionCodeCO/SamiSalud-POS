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
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Buenos días, <?php echo ($user->getNombre() != '')? $user->getNombre() : $user->getUsuario(); ?> </h2>
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
                    <a href="listaNegra.html">
                        <a href="">
                        <div class="absolute right-0 z-10 font-bold text-white p-4 text-[15px]">Acceder</div>
                    <div class="absolute bottom-0 z-10 text-white p-4 text-[25px]">Fiados</div>
                    </a>
                
                </div>

        </article>

        <article
            class="my-10 p-5 bg-cover bg-[url('public/img/degradado.jpg')] h-[40%] rounded-xl mx-8 flex flex-col items-start justify-center">
            <h3 class="text-white text-[35px] font-medium" id="fecha">Cargando...</h3>
            <p class="text-white text-[18px] font-light">Empecemos a vender mas que ayer, presiona el botón adecuado y
                a ¡FACTURAR!</p>

            <div class="flex justify-star gap-5">
                <a href="facturadorListaNegra">
                    <button
                        class="flex items-center bg-azul_oscuro text-white gap-1 px-10 py-3  mt-4  cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-blanco hover:text-azul_oscuro duration-300 hover:gap-2 hover:translate-x-3">
                        Lista negra
                        <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                                stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                    </button>
                </a>

                <a href="facturador">
                    <button
                        class="flex items-center bg-azul_oscuro text-white gap-1 px-10 py-3  mt-4  cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-blanco hover:text-azul_oscuro duration-300 hover:gap-2 hover:translate-x-3">
                        Vender
                        <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                                stroke-linejoin="round" stroke-linecap="round"></path>
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