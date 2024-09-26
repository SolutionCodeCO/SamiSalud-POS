<dialog id="myModal" class="h-[70%] w-11/12 p-5 bg-white rounded-md ">

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
        <p>Llena los campos <span class="text-azul font-bold">CUIDADOSAMENTE</span> para obtener un registro del producto éxitosamente.</p>
    </div>
    <!-- End of Modal Content-->



    <div class="mt-5">
        <form action="<?php echo constant('URL'); ?>/products/newProduct" method="post">
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
                            id="stock" type="number" name="stock" />
                        <label
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                            for="stock">
                            Cantidad en Stock</label>
                    </div>
                </div>

                <div class="w-full h-12 flex gap-2">
                    <div class="w-full h-12 relative flex rounded-xl">
                        <input required=""
                            class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                            id="precio" type="number" name="precio" />
                        <label
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                            for="precio">
                            Precio</label>
                    </div>

                    <div class="w-full h-12 relative flex rounded-xl">
                        <input required=""
                            class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                            id="iva" type="number" name="iva" />
                        <label
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                            for="iva">
                            IVA %</label>
                    </div>

                    

                    <div class="w-full h-12 flex gap-2">

                        <div
                            class="custom-select flex justify-between w-full bg-transparent outline-none px-4 py-3 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                            <select name="id_categoria" class="w-full">
                                <option>Selecciona la categoría </option>
                                <?php foreach ($this->data['categories'] as $category) { ?>
                                    <option value="<?php echo $category->getId(); ?>">
                                        <?php echo $category->getNombre(); ?>
                                    </option>
                                <?php } ?>

                            </select>
                            <div class=" select-arrow">
                            </div>
                        </div>
                    </div>
                </div>

       


    </div>
    <br>
    <div>
        <p>Llena los campos <span class="text-azul font-bold">SI ES NECESARIO</span> para obtener un registro mas detallado.</p>
    </div>
    <!-- End of Modal Content-->



    <div class="mt-5">
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
                        <input
                            class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                            id="lote" type="text" name="lote" />
                        <label
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                            for="lote">
                            Lote</label>
                    </div>

                    <div class="w-full h-12 relative flex rounded-xl">
                        <input required=""
                            class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                            id="fechaVencimiento" type="date" name="fechaVencimiento" />
                        <label
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                            for="vencimiento">
                            Fecha Vencimiento</label>
                    </div>
                </div>

                <div class="w-full h-12 flex gap-2">
                    <div class="w-full h-12 relative flex rounded-xl">
                        <input
                            class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                            id="registroSanitario" type="text" name="registroSanitario" />
                        <label
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                            for="registroSanitario">
                            Registo Sanitario</label>
                    </div>

                    <div class="w-full h-12 relative flex rounded-xl">
                        <input 
                            class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                            id="distribuidor" type="text" name="distribuidor" />
                        <label
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                            for="proveedor">
                            Proveedor</label>
                    </div>

                    
                </div>


                <div class="flex justify-center gap-5 mt-2">

                    <button onclick="document.getElementById('myModal').close();"
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


</dialog>