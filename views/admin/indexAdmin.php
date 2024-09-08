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
    <section id="sidebar" class="w-[18%] relative my-5">
        <article id="logo" class="flex flex-col items-center pt-5">
            <h1 class="text-azul text-[32px] font-semibold">Sami Salud</h1>
            <p class="font-medium text-[14px] -mt-2 ">Calle 58C sur #45-03</p>
        </article>

        <main class="flex flex-col justify-between pt-16 h-[87%]">
            <article id="navegacion">
                <ul class="px-5">
                    <a href="/">
                        <li
                            class="text-blanco p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium bg-azul transition-all">
                            <i class="fa-solid fa-house"></i> Inicio
                        </li>
                    </a>

                    <a href="/SamiSalud-POS/categorias">
                        <li
                            class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                            <i class="fa-solid fa-layer-group"></i> Categorías
                        </li>
                    </a>

                   

                    <a href="listaNegra">
                        <li
                            class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                            <i class="fa-solid fa-list-ul"></i> Lista negra
                        </li>
                    </a>

                    <a href="balance.html">
                        <li
                            class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                            <i class="fa-solid fa-chart-pie"></i> Balance
                        </li>
                    </a>

                    <a href="manualCalidad.html">

                    </a>

                    <li
                        class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                        <i class="fa-regular fa-rectangle-list"></i> Manual calidad
                    </li>

                </ul>


            </article>
            <footer class="px-5 pb-8">
                <p class="text-[10px] text-center font-medium"><a href="https://www.solutioncodeco.com" target="_blank"
                        class="text-azul font-bold">SolutionCode</a> | Todos los derechos reservados Sami Salud
                    <span id="año">cargando...</span>
                </p>
            </footer>

        </main>
    </section>

    <section id="contenido"
        class="flex flex-col justify-between bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Buenos días, Camilo</h2>
            <p class="font-medium text-[18px] -mt-2 ">Bienvenido nuevamente, ¿Listo para las ventas?</p>
        </article>


        <article class="flex gap-5 pt-14 pb-5 mx-8">
            
                <div
                    class="hover:cursor-pointer hover:-translate-y-4 transition-all shadow-lg relative w-[33%] h-[180px] rounded-xl bg-[url('public/img/box.jpg')] bg-cover bg-center ">
                    <a href="drogueria">
                    <div class="absolute right-0 z-10 font-bold text-white p-4 text-[45px]">348</div>
                    <div class="absolute bottom-0 z-10 text-white p-4 text-[25px]">Droguería</div>
                </a>
                </div>
                

                <div
                    class="hover:cursor-pointer hover:-translate-y-4 transition-all shadow-lg relative w-[33%] h-[180px] rounded-xl bg-[url('public/img/box.jpg')] bg-cover bg-center ">
                    <a href="heladeria">
                        <div class="absolute right-0 z-10 font-bold text-white p-4 text-[45px]">228</div>
                    <div class="absolute bottom-0 z-10 text-white p-4 text-[25px]">Heladería</div>
                    </a>
                </div>


                <div
                    class="hover:cursor-pointer hover:-translate-y-4 transition-all shadow-lg relative w-[33%] h-[180px] rounded-xl bg-[url('public/img/box.jpg')] bg-cover bg-center ">
                    <a href="listaNegra.html">
                        <a href="">
                        <div class="absolute right-0 z-10 font-bold text-white p-4 text-[45px]">100</div>
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
                <a href="listaNegraFacturador.html">
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

                <a href="venderFacturador.html">
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

    <section id="auxiliar" class=" w-[22%] my-5">
        <article class="my-5 mx-5 py-3 mb-9 flex justify-between items-center">
            <div class="flex items-center gap-2"><img src="public/img/box.jpg" class="rounded-full w-[40px] h-[40px]"
                    alt="">
                <div class="flex flex-col">
                    <span class="font-medium text-[19px]">Camilo X</span>
                    <span class="-mt-2 text-[12px] text-gray-400">Administrador</span>
                </div>
            </div>
            <div class="text-[20px] text-azul"><i class="fa-solid fa-caret-down"></i></div>
        </article>

        <article id="calendario" class="px-5">
            <div class="calendar w-full bg-blanco">
                <div class="header items-center flex justify-between">
                    <span id="month-year" class="font-semibold text-[17px]"></span>

                    <div>
                        <button id="prev-month"
                            class="shadow-lg hover:bg-azul_oscuro_opacidad transition-all p-2 rounded-full h-[40px] w-[40px] text-azul"><i
                                class="fa-solid fa-caret-left"></i></button>
                        <button id="next-month"
                            class="shadow-lg hover:bg-azul_oscuro_opacidad transition-all p-2 rounded-full h-[40px] w-[40px] text-azul"><i
                                class="fa-solid fa-caret-right"></i></button>
                    </div>

                </div>
                <div class="weekdays grid grid-cols-7 text-center text-[12px] mt-3 font-medium">
                    <div>Dom</div>
                    <div>Lun</div>
                    <div>Mar</div>
                    <div>Mie</div>
                    <div>Jue</div>
                    <div>Vie</div>
                    <div>Sab</div>
                </div>
                <div class="days grid grid-cols-7 text-center text-[14px] font-medium" id="days"></div>
            </div>
        </article>

        <article id="novedades" class=" mx-5 my-8 ">
            <h3 class="text-azul_oscuro text-[25px] font-medium">Novedades</h3>

            <div class="flex mt-5 bg-azul_oscuro rounded-lg justify-center gap-4 p-2">
                <div
                    class="bg-rojo text-azul_oscuro text-[20px] flex justify-center items-center p-2 rounded-full h-[35px] w-[40px]">
                    <i class="fa-solid fa-bell"></i></div>
                <div class="text-blanco text-[12px]">
                    <p>Aún no haz llenado el Manual de Calidad.</p>
                </div>
            </div>
        </article>
    </section>
</body>
<script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>


</html>