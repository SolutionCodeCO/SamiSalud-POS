<dialog id="myModalRegistroFacturas" class="h-[45%] w-11/12 p-5 bg-white rounded-md ">

    <div class="flex flex-col w-full h-full ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
            <div class="flex w-full h-[100%] py-3 justify-between items-center text-3xl font-semibold">
                Genial, estas cumpliendo diariamente.
            </div>
            <div onclick="document.getElementById('myModalRegistroFacturas').close();"
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
                formulario éxitosamente.</p>
        </div>
        <!-- End of Modal Content-->



        <div class="mt-5">
            <form action="<?php echo constant('URL'); ?>/limpiezaDrogueria/newLimpieza" method="post">
                <div class="w-full h-full gap-2 flex flex-col">
                    <div class="w-full h-12 flex gap-2">

                        <div
                            class="custom-select flex justify-between w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                            <select name="banio" class="w-full">
                                <option>Limpieza del Baño </option>
                                <option value="Hecho">Hecho</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            <div class=" select-arrow">
                            </div>
                        </div>

                        <div
                            class="custom-select flex justify-between w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                            <select name="inyectologia" class="w-full">
                                <option>Limpieza del inyectologia </option>
                                <option value="Hecho">Hecho</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            <div class=" select-arrow">
                            </div>
                        </div>

                        <div
                            class="custom-select flex justify-between w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                            <select name="techos_paredes" class="w-full">
                                <option>Limpieza del techos y paredes </option>
                                <option value="Hecho">Hecho</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            <div class=" select-arrow">
                            </div>
                        </div>
                    </div>

                    <div class="w-full h-12 flex gap-2">
                    <div
                            class="custom-select flex justify-between w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                            <select name="pisos_dispensacion" class="w-full">
                                <option>Limpieza del pisos y dispensacion </option>
                                <option value="Hecho">Hecho</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            <div class=" select-arrow">
                            </div>
                        </div>

                        <div
                            class="custom-select flex justify-between w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                            <select name="estantes_vitrinas_cajoneras" class="w-full">
                                <option>Limpieza del estantes, vitrinas y cajoneras </option>
                                <option value="Hecho">Hecho</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            <div class=" select-arrow">
                            </div>
                        </div>
                        <div
                            class="custom-select flex justify-between w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                            <select name="canecas" class="w-full">
                                <option>Limpieza de canecas</option>
                                <option value="Hecho">Hecho</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            <div class=" select-arrow">
                            </div>
                        </div>


                    </div>


                    <div class="mt-1">
                        <div class="w-full h-full gap-2 flex flex-col">




                            <div class="flex justify-center gap-5 mt-2">

                                <button onclick="document.getElementById('myModalRegistroFacturas').close();"
                                    class="flex items-center bg-white border-2 border-rojo text-rojo gap-1 px-10 py-2  mt-4  cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-white hover:text-rojo duration-300 hover:gap-2 hover:translate-x-3">
                                    Volver
                                    <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                                            stroke-linejoin="round" stroke-linecap="round"></path>
                                    </svg>
                                </button>



                                <button type="submit"
                                    class="flex items-center bg-azul text-white gap-1 px-10 py-2  mt-4  cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-azul_oscuro hover:text-blanco duration-300 hover:gap-2 hover:translate-x-3">
                                    Crear
                                    <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                                            stroke-linejoin="round" stroke-linecap="round"></path>
                                    </svg>
                                </button>





                            </div>

            </form>


        </div>

    </div>








    </div>


</dialog>