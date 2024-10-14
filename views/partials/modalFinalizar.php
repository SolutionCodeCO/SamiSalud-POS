<!-- Modal de Método de Pago -->
<div id="paymentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="h-[50%] w-11/12 md:w-1/2 p-5 bg-white rounded-md ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
            <div class="flex w-full h-full py-3 justify-between items-center text-3xl font-semibold">
                Confirmación de la facturación
            </div>
            <div onclick="closeModal()" class="flex w-1/12 h-auto justify-center cursor-pointer hover:-translate-y-1 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
        <!-- Modal Content -->
        <div>
            <p class="text-azul font-medium">Ten en cuenta lo que estás facturando; después de darle “Aceptar” los cambios son irreversibles.</p>
        </div>
        <div class="w-full h-12 relative flex rounded-xl mt-2">
            <select id="paymentMethod" class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md">
                <option disabled selected>Selecciona un metodo de pago</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Nequi">Nequi</option>
                <option value="Daviplata">Daviplata</option>
            </select>
        </div>
        
        <div class="w-full h-12 relative flex rounded-xl mt-2">
            <input required class="peer w-full bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md" id="amountPaid" type="number" />
            <label class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150" for="amountPaid">
                Dinero recibido</label>
        </div>
        
        <div class="flex justify-center gap-5 mt-2">
            <button onclick="closeModal()" class="flex items-center bg-white border-2 border-rojo text-rojo gap-1 px-10 py-2 mt-4 cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-white hover:text-rojo duration-300 hover:gap-2 hover:translate-x-3">
                Volver
                <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
            </button>

            <button onclick="calcularCambio()" class="flex items-center bg-azul text-white gap-1 px-10 py-2 mt-4 cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-azul_oscuro hover:text-blanco duration-300 hover:gap-2 hover:translate-x-3">
                Aceptar
                <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
            </button>
        </div>
    </div>
</div>