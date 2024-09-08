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
    <title>Patillero | POS</title>
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
                            class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                            <i class="fa-solid fa-house"></i> Inicio
                        </li>
                    </a>

                    <a href="categorias">
                        <li 
                            class="text-blanco p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium bg-azul transition-all">
                            <i class="fa-solid fa-layer-group"></i> Categorías
                        </li>
                    </a>

                   

                    <a href="listaNegra.html">
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
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Patillero</h2>
            <p class="font-medium text-[18px] -mt-2 ">Apartado donde podrás gestionar tu productos.</p>
        </article>

        <main class="px-5 pt-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-azul_oscuro text-[20px] font-semibold">Patillero</h2>

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

            <div class="rounded mt-7 w-full overflow-auto max-h-[400px]">
                <table class="w-full rounded ">
                    <thead class="bg-azul_opacidad rounded w-full">
                        <tr class="">
                            <th class="p-2 font-medium">ID</th>
                            <th class="p-2 font-medium">Producto</th>
                            <th class="p-2 font-medium">Cantidad (Stock)</th>
                            <th class="p-2 font-medium">IVA</th>
                            <th class="p-2 font-medium">Precio Final</th>
                            <th class="p-2 font-medium">Opciones</th>
                        </tr>
                    </thead>

                    <div class="">
                        <tbody class="text-center ">

                            <tr>
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Ibuprofeno</td>
                                <td class="p-2 font-medium "><span class="quantity-cell py-1 px-3 rounded-lg">50
                                        tabletas</span></td>
                                <td class="p-2 font-medium">2%</td>
                                <td class="p-2 font-medium">$4.080 <span class="text-[8px]">C/U</span></td>
                                <td>
                                    <div class="flex gap-4 justify-center items-center">
                                        <a href="#" class="hover:text-azul hover:text-lg text-azul_oscuro"><i
                                                class="fa-solid fa-pen-to-square" class="hover:text-rojo"></i></a>
                                        <a href="#" class="hover:text-rojo hover:text-lg text-azul_oscuro"><i
                                                class="fa-solid fa-trash-can" class="hover:text-rojo"></i></a>

                                    </div>
                                </td>
                            </tr>


                            <tr class="">
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Acetaminofen</td>
                                <td class="p-2 font-medium "><span class="quantity-cell py-1 px-3 rounded-lg">30
                                        tabletas</span></td>
                                <td class="p-2 font-medium">2%</td>
                                <td class="p-2 font-medium">$4.080 <span class="text-[8px]">C/U</span></td>
                                <td>
                                    <div class="flex gap-4 justify-center items-center">
                                        <a href="#" class="hover:text-azul hover:text-lg text-azul_oscuro"><i
                                                class="fa-solid fa-pen-to-square" class="hover:text-rojo"></i></a>
                                        <a href="#" class="hover:text-rojo hover:text-lg text-azul_oscuro"><i
                                                class="fa-solid fa-trash-can" class="hover:text-rojo"></i></a>

                                    </div>
                                </td>
                            </tr>

                            <tr class="">
                                <td class="p-2 font-medium">1234567890123</td>
                                <td class="p-2 font-medium">Amoxicilina</td>
                                <td class="p-2 font-medium "><span class="quantity-cell py-1 px-3 rounded-lg">5
                                        tabletas</span></td>
                                <td class="p-2 font-medium">2%</td>
                                <td class="p-2 font-medium">$4.080 <span class="text-[8px]">C/U</span></td>
                                <td>
                                    <div class="flex gap-4 justify-center items-center">
                                        <a href="#" class="hover:text-azul hover:text-lg text-azul_oscuro"><i
                                                class="fa-solid fa-pen-to-square" class="hover:text-rojo"></i></a>
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



    <dialog id="myModal" class="h-[40%] w-11/12 p-5 bg-white rounded-md ">

        <div class="flex flex-col w-full h-full ">
            <!-- Header -->
            <div class="flex w-full h-auto justify-center items-center">
                <div class="flex w-full h-full py-3 justify-between items-center text-3xl font-semibold">
                    Genial, Llenemos la estantería
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
                                    id="id" type="number" name="codigo_barras" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="id">
                                    Código de barras</label>
                            </div>

                            <div class="w-full h-12 relative flex rounded-xl">
                                <input required=""
                                    class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                    id="farmaco" type="text" name="nombre" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="farmaco">
                                    Nombre Producto</label>
                            </div>

                            <div class="w-full h-12 relative flex rounded-xl">
                                <input required=""
                                    class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                    id="stock" type="text" name="stok" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="stock">
                                    Cantidad en Stok</label>
                            </div>
                        </div>

                        <div class="w-full h-12 flex gap-2">
                            <div class="w-full h-12 relative flex rounded-xl">
                                <input required=""
                                    class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                    id="precio" type="text" name="precio" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="precio">
                                    Precio</label>
                            </div>

                            <div class="w-full h-12 relative flex rounded-xl">
                                <input required=""
                                    class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                    id="iva" type="text" name="iva" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="iva">
                                    IVA %</label>
                            </div>

                            <div class="w-full h-12 relative flex rounded-xl">
                                <input required="" disabled
                                    class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                    id="address" type="text" />
                                <label
                                    class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                    for="address">
                                    Precio Final</label>
                            </div>

                            <div class="w-full h-12 flex gap-2">

                                <div
                                    class="custom-select w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                                    <select class="">
                                        <option>Selecciona la categoría </option>
                                        <option name="id_categoria" for="1" ">Nevera</option>
                                        <option name=" id_categoria" for="2" ">Dulcería</option>
                                        <option name=" id_categoria" for="3" ">Farmacología</option>
                                        <option name=" id_categoria" for="4" ">Heladería</option>
                                        <option name=" id_categoria" for="5" ">Bebidas</option>
                                        <option name=" id_categoria" for="6" ">Especiales</option>
                                    </select>
                                    <div class=" select-arrow">
                                </div>
                            </div>
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