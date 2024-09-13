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
    <title>Lista negra | Facturador</title>
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

    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Lista negra | Facturar</h2>
            <p class="font-medium text-[18px] -mt-2 ">Apartado donde podrás 'FIAR' tu productos.</p>
        </article>

        <main class="px-5 pt-10">
            <div class="flex justify-between items-center">
                <div>
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

                </div>
                <div>
                    <button onclick="document.getElementById('myModal').showModal()" id="btn"
                        class="flex items-center bg-azul text-white gap-1 px-8 py-2  cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-azul_oscuro hover:text-blanco duration-300 hover:gap-2 hover:translate-x-3">
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

            <div class="rounded mt-7 w-full overflow-auto max-h-[600px]">
                <table class="w-full rounded ">
                    <thead class="bg-azul_opacidad rounded w-full">
                        <tr class="">
                            <th class="p-2 font-medium">ID</th>
                            <th class="p-2 font-medium">Producto</th>
                            <th class="p-2 font-medium">Cantidad</th>
                            <th class="p-2 font-medium">Fecha Creación</th>
                            <th class="p-2 font-medium">Precio</th>
                        </tr>
                    </thead>

                    <div class="">
                        <tbody class="text-center ">
                            <tr class="">
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium">2 tabletas</td>
                                <td class="p-2 font-medium">16 Jul 2024</td>
                                <td class="p-2 font-medium">$4.000</td>
                            </tr>
                            <!-- Repite las filas según sea necesario -->
                        </tbody>
                </table>
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



    <dialog id="myModal" class="h-[41%] w-11/12 md:w-1/2 p-5  bg-white rounded-md ">

        <div class="flex flex-col w-full h-full ">
            <!-- Header -->
            <div class="flex w-full h-auto justify-center items-center">
                <div class="flex w-full h-full py-3 justify-between items-center text-3xl font-semibold">
                    ¡Espera Camilo!
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
                <p>Antes de continuar, debes elegir <span class="text-azul font-bold">CUIDADOSAMENTE</span> al usuario
                    que le deseas enviar estos registros.</p>
            </div>
            <!-- End of Modal Content-->

            <div>
                <div class="mt-5 w-full flex items-center justify-center">
                    <div class="relative group w-full">
                        <button id="custom-dropdown-button-2"
                            class="inline-flex justify-between items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                            <span id="selected-option-2">Usuarios en lista negra</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="custom-dropdown-menu-2"
                            class="hidden absolute z-10 w-full mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1">
                            <!-- Search input -->
                            <input id="custom-search-input-2"
                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                type="text" placeholder="Buscar usuario" autocomplete="off">
                            <!-- Dropdown content goes here -->
                            <div id="custom-options-2" role="listbox">
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Uppercase</div>
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Lowercase</div>
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Camel Case</div>
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Kebab Case</div>
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Snake Case</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

<div class="flex justify-star gap-5 mt-2">
            
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
                    Facturar
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