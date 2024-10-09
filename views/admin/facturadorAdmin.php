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
    <title>Vender | Facturador</title>
</head>


<body class="bg-blanco flex  w-full absolute min-h-[100vh]">
    <!-- Incluir la barra lateral izquierda-->
    <?php include 'views/partials/sidebar_left.php'; ?>

    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Vender | Facturar</h2>
            <p class="font-medium text-[18px] -mt-2 ">Apartado donde podrás 'VENDER' tus productos.</p>
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

            <div class="rounded mt-7 w-full overflow-auto max-h-[400px]">
                <table class="w-full rounded ">
                    <thead class="bg-azul_opacidad rounded w-full">
                        <tr class="">
                            <th class="p-2 font-medium">ID</th>
                            <th class="p-2 font-medium">Producto</th>
                            <th class="p-2 font-medium">Cantidad</th>
                            <th class="p-2 font-medium">Fecha Creación</th>
                            <th class="p-2 font-medium">Precio</th>
                            <th class="p-2 font-medium">Opciones</th>
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
                                <td>
                                    <div class="flex gap-4 justify-center items-center">
                                        <a href="#" class="hover:text-rojo hover:text-lg text-azul_oscuro"><i
                                                class="fa-solid fa-trash-can" class="hover:text-rojo"></i></a>

                                    </div>
                                </td>
                            </tr>

                           
                        </tbody>
                </table>
            </div>
            </div>

            <table class="px-5 mt-0 w-full rounded text-center">

            </table>
        </main>

    </section>

    <?php include 'views/partials/sidebar_right.php'; ?>




    <dialog id="myModal" class="h-[35%] w-11/12 md:w-1/2 p-5  bg-white rounded-md ">

        <div class="flex flex-col w-full h-full ">
            <!-- Header -->
            <div class="flex w-full h-auto justify-center items-center">
                <div class="flex w-full h-full py-3 justify-between items-center text-3xl font-semibold">
                    Confirmación de la facturación
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
                <p class="text-azul font-medium">Ten en cuenta lo que estas facturando despues de darle “continuar” los
                    cambios son irreversibles</p>
            </div>
            <!-- End of Modal Content-->

            <div class="">
                <div class="mt-5 flex items-center justify-center">
                    <div class="relative group w-full">
                        <button id="custom-dropdown-button"
                            class="inline-flex justify-between items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                            <span id="selected-option">Método de pago</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="custom-dropdown-menu"
                            class="hidden absolute z-10 w-full mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1">
                            <!-- Search input -->
                            <input id="custom-search-input"
                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                type="text" placeholder="Buscar método de pago" autocomplete="off">
                            <!-- Dropdown content goes here -->
                            <div id="custom-options" role="listbox">
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Efectivo</div>
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Nequi</div>
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Daviplata</div>
                                <div role="option"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Tarjeta (Débito - Crédito)</div>
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
<script src="public/js/metodoPago.js"></script>

</html>
