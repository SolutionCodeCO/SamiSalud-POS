<section id="auxiliar" class=" w-[22%] my-5">
        
        <!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="my-5 mx-5 py-3 mb-9 flex justify-between items-center">
<div class="flex items-center gap-2"><img src="public/img/user.svg" class="rounded-full w-[40px] h-[40px]"
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
                <a href="user" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <i class="fa-solid fa-user-nurse"></i>
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" >Mi perfil</span>
                    </p>
                </a>
                <a href="user" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <i class="fa-solid fa-book-medical"></i>
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" >Descargar manual</span>
                    </p>
                </a>
                <a href="user" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
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