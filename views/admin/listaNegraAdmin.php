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
    <title>Fiados | POS</title>
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
                    <a href="admin">
                        <li
                            class="text-azul p-2 bg-blanco rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium bg-azul transition-all hover:bg-azul hover:text-blanco">
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
                            class="text-blanco bg-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
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

    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Lista negra</h2>
            <p class="font-medium text-[18px] -mt-2 ">Apartado donde podrás gestionar tus "FIADOS".</p>
        </article>

        <main class="px-5 pt-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-azul_oscuro text-[20px] font-semibold">Clientes</h2>

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

            <div class="rounded mt-7 w-full flex gap-3 justify-between flex-wrap">

                <div class="w-60 h-80 bg-azul_oscuro p-3 flex flex-col gap-1 rounded-br-3xl ">
                    <div
                        class="duration-500 contrast-50 h-48 bg-gradient-to-bl from-black via-orange-900 to-indigo-600 ">
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col justify-between">
                            <div class="">
                                <span class="text-xl text-gray-50 font-bold">Carlos Medina</span>
                            </div>

                            <div class="flex justify-between">
                                <p class="text-xs text-gray-400">ID: 2</p>
                                <span class="font-semibold text-[12px] text-rojo">$204.500</span>
                            </div>
                        </div>
                        <a href="usuarioID" class="hover:bg-sky-700 text-gray-50 bg-azul text-center py-2 rounded-br-xl">
                        <button>Observar</button>
                        </a>
                    </div>
                </div>
            </div>
            </div>

            <table class="px-5 mt-0 w-full rounded text-center">

            </table>
        </main>

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
                    <i class="fa-solid fa-bell"></i>
                </div>
                <div class="text-blanco text-[12px]">
                    <p>Aún no haz llenado el Manual de Calidad.</p>
                </div>
            </div>
        </article>
    </section>



    <dialog id="myModal" class="h-[54%] w-11/12 md:w-1/2 p-5  bg-white rounded-md ">

        <div class="flex flex-col w-full h-full ">
            <!-- Header -->
            <div class="flex w-full h-auto justify-center items-center">
                <div class="flex w-full h-full py-3 justify-between items-center text-3xl font-semibold">
                    OH, un nuevo fichado
                </div>
                <div onclick="document.getElementById('myModal').close();"
                    class="flex w-1/12 h-auto justify-center cursor-pointer hover:-translate-y-1 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <!--Header End-->
            </div>
            <!-- Modal Content-->
            <div>
                <p>Llena los campos <span class="text-azul font-bold">CUIDADOSAMENTE</span> para obtener un registro del
                    fármaco éxitosamente.</p>
            </div>
            <!-- End of Modal Content-->

            <div class="mt-5">
                <form action="#">
                    <div class="w-full h-full gap-2 flex flex-col">
                        <div class="w-full h-12 flex gap-2">
                            <div class="w-full h-12 relative flex rounded-xl">
                                <input required=""
                                    class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                    id="id" type="number" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="id">
                                    Nombres</label>
                            </div>

                        </div>

                        <div class="w-full h-12 flex gap-2">

                            <div class="w-full h-12 relative flex rounded-xl">
                                <input required=""
                                    class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                    id="comentario" type="text" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="comentario">
                                    Observacion</label>
                            </div>
                        </div>




                </form>


            </div>

            <div class="flex justify-center gap-5 mt-2">

                <button onclick="document.getElementById('myModal').close();"
                    class="flex items-center bg-blanco border-2 border-rojo text-rojo gap-1 px-10 py-2  mt-4  cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-blanco hover:text-rojo duration-300 hover:gap-2 hover:translate-x-3">
                    Volver
                    <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                            stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                </button>



                <button
                    class="flex items-center bg-azul text-white gap-1 px-10 py-2  mt-4  cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-azul_oscuro hover:text-blanco duration-300 hover:gap-2 hover:translate-x-3">
                    Crear
                    <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                            stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                </button>





            </div>

        </div>


    </dialog>
</body>
<script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>
<script src="public/js/usuarios.js"></script>


</html>