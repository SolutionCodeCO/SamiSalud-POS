
<?php $this->showMessages(); ?>
            <div class="rounded mt-7 w-full overflow-auto max-h-[500px]">
                <?php if (!empty($this->data['productos'])): ?>
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
                            <?php foreach ($this->data['productos'] as $producto): ?>
                                <tr>
                                    <td class="p-2 font-medium"><?php echo $producto['codigo_barras']; ?></td>
                                    <td class="p-2 font-medium"><?php echo $producto['nombre']; ?></td>
                                    <td class="p-2 font-medium"><span
                                            class="quantity-cell py-1 px-3 rounded-lg"><?php echo $producto['stock']; ?> Unidades</span>
                                    </td>
                                    <td class="p-2 font-medium"><?php echo $producto['iva']; ?>%</td>
                                    <td class="p-2 font-medium">$<?php echo $producto['precio']; ?> <span
                                            class="text-[8px]">C/U</span></td>
                                    <td>
                                        <div class="flex gap-4 justify-center items-center">
                                            <a href="" class="hover:text-azul hover:text-lg text-azul_oscuro"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="<?php echo constant('URL'); ?>/products/delete/<?php echo $producto['id']; ?>" class="hover:text-rojo hover:text-lg text-azul_oscuro"><i
                                                    class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        
                    </table>
                    <?php else: ?>
                    <div class="flex flex-col items-center gap-2">
                        <p class="text-center font-bold text-3xl">No hay productos en la categoría seleccionada.</p>
                    <img src="./public/img/vacio.svg" alt="sin datos" class="w-[560px]">
                    </div>
                    
                    <?php endif; ?>
            </div>
            </div>