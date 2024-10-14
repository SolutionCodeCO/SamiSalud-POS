<?php 
$user = isset($this->data['user']) ? $this->data['user'] : null;
$product = isset($this->data['product']) ? $this->data['product'] : null;
$productInfo = isset($this->data['productInfo']) ? $this->data['productInfo'] : null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Informacion del producto</title>
</head>


<body class="bg-blanco flex  w-full absolute min-h-[100vh]">
    <!-- Incluir la barra lateral izquierda-->
    <section id="sidebar" class="w-[18%] relative my-5">
        <article id="logo" class="flex flex-col items-center pt-5">
            <h1 class="text-azul text-[32px] font-semibold">Sami Salud</h1>
            <p class="font-medium text-[14px] -mt-2 ">Calle 58C sur #45-03</p>
        </article>

        <main class="flex flex-col justify-between pt-16 h-[87%]">
            <article id="navegacion">
                <ul class="px-5">
                    <a href="../../admin">
                        <li
                            class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                            <i class="fa-solid fa-house"></i> Inicio
                        </li>
                    </a>

                    <a href="../../categorias">
                        <li 
                        class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                            <i class="fa-solid fa-layer-group"></i> Categorías
                        </li>
                    </a>

                   

                    <a href="listaNegra.html">
                        <li
                            class="text-azul p-2 rounded mt-1 flex justify-star items-center gap-2 cursor-pointer font-medium hover:text-blanco hover:bg-azul transition-all">
                            <i class="fa-solid fa-list-ul"></i> Historial $
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
                    <span id="año">2024 :)</span>
                </p>
            </footer>

        </main>
    </section>

    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Producto elegido</h2>
            <p class="font-medium text-[18px] -mt-2 ">Apartado donde podrás Observar la informacion completa de tu productos.</p>
        </article>

        <main class="px-5 pt-10">
        <div class="mb-20 md:mb-0">

                
            </div>
            <main class="px-5">
            <div class="flex justify-between items-center">
                <div>
                <a href="../../categorias"><button class="text-rojo text-[20px] font-semibold"><i class="fa-solid fa-arrow-left-long"></i> Volver atras</button></a>

                </div>

                <div class="flex items-center justify-center gap-5">
				<?php $this->showMessages(); ?>

                    <div class="group relative inline-block cursor-pointer"
                        onclick="document.getElementById('myModalAbastecer').showModal()" id="btn">
                        <button class=" focus:outline-none">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="20" width="20" viewBox="0 0 512 512">
                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                        </button>
                        <span
                            class="absolute -top-12 left-1/2 transform -translate-x-1/2 z-20 px-4 py-2 text-sm font-bold text-white bg-gray-900 rounded-lg shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Editar</span>
                    </div>



                </div>
            </div>
        </main>
            <div class="flex justify-between items-center">
                
                <div>
                    <h2 class="text-azul_oscuro px-5 text-[20px] font-semibold">Informacion detallada:</h2>

                </div>

                
            </div>
            <div class="flex flex-col mt-5">
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Nombre:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $product ? $product['nombre'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Precio Neto:</h3> 
                    <p class="text-[14px] font-medium"> $<?php echo $product ? $product['precio_neto'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">IVA:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $product ? $product['iva'] : 'No disponible'; ?>%</p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Ganancia:</h3> 
                    <p class="text-[14px] font-medium">$<?php echo $product ? $product['icui'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Precio Final:</h3> 
                    <p class="text-[14px] font-medium">$<?php echo $product ? $product['precio'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class=" text-azul text-[16px] font-semibold">cantidad en Stock:</h3> 
                    <p class="quantity-cell p-1 rounded-[14px] text-[14px] font-medium"> <?php echo $product ? $product['stock'] : 'No disponible'; ?> unidades</p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Codigo de barras:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $product ? $product['codigo_barras'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Lote:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $productInfo ? $productInfo['lote'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Fecha de vencimiento:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $productInfo ? $productInfo['fechaVencimiento'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Distribuidor:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $productInfo ? $productInfo['distribuidor'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Registro sanitario:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $productInfo ? $productInfo['registroSanitario'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Fecha de creación:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $product ? $product['fecha_Creacion'] : 'No disponible'; ?></p>
                </div>
                <div class="flex justify-between py-2 px-5">
                    <h3 class="text-azul text-[16px] font-semibold">Fecha de actualización:</h3> 
                    <p class="text-[14px] font-medium"> <?php echo $product ? $product['fecha_Actualizacion'] : 'No disponible'; ?></p>
                </div>

               
                
            </div>
        </main>

    </section>

    <!-- Incluir la barra lateral derecha-->
    <section id="auxiliar" class=" w-[22%] my-5">
        
        <!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="my-5 mx-5 py-3 mb-9 flex justify-between items-center">
<div class="flex items-center gap-2"><img src="../../public/img/box.jpg" class="rounded-full w-[40px] h-[40px]"
            alt="">
            <div class="flex flex-col">
                <span class="font-medium text-[19px]"> <?php echo ($user->getNombre() != '')? $user->getNombre() : $user->getUsuario();?></span>
                    <span class="-mt-2 text-[12px] text-gray-400"> <?php echo ($user->getId_rol() == '2')? 'Administrador' : 'Empleado' ?></span>
                </div>
            </div>
    <div x-data="{ dropdownOpen: false }" class="relative">
        <button @click="dropdownOpen = !dropdownOpen" class="text-[20px] text-azul"><i class="fa-solid fa-caret-down"></i></button>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
            <div class="p-4">
                <a href="../../user" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <i class="fa-solid fa-user-nurse"></i>
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" >Mi perfil</span>
                    </p>
                </a>
                <a href="../../user" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <i class="fa-solid fa-book-medical"></i>
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" >Descargar manual</span>
                    </p>
                </a>
                <a href="../../user" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <i class="fa-solid fa-circle-info"></i>
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" >Terminos & condiciones</span>
                    </p>
                </a>
                <a href="user" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <i class="fa-solid fa-envelope-open-text"></i>
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" >Contactar a SolutionCode</span>
                    </p>
                </a>
                
                
                
            </div>
            <a href="<?php echo constant('URL'); ?>/login/logout" class="flex justify-between items-center p-4 bg-gray-800 text-white text-center font-bold py-2">Cerrar sesión <i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>
</div>
        
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

    <!-- Incluir modal-->
   <?php include 'views/partials/modalAbasteser.php'; ?>


   
</body>
<script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
<script src="../../public/js/main.js"></script>
<script src="../../public/js/usuarios.js"></script>


</html>