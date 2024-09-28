<?php $this->showMessages(); ?>

<div class="rounded mt-7 w-full overflow-auto max-h-[500px]">
    <?php if (!empty($this->data['proveedores'])): ?>
        <table class="w-full rounded ">
            <thead class="bg-azul_opacidad rounded w-full">
                <tr class="">
                    <th class="p-2 font-medium">Nombre Completo</th>
                    <th class="p-2 font-medium">Empresa</th>
                    <th class="p-2 font-medium">Email</th>
                    <th class="p-2 font-medium">Telefono</th>
                    <th class="p-2 font-medium">Observaciones</th>
                    <th class="p-2 font-medium">Detalles</th>
                </tr>
            </thead>

            <div class="">
                <tbody class="text-center ">
                    <?php foreach ($this->data['proveedores'] as $proveedor): ?>
                        <tr>
                            <td class="p-2 font-medium"><?php echo $proveedor->getNombre_completo(); ?></td>
                            <td class="p-2 font-medium"><?php echo $proveedor->getEmpresa(); ?>></td>
                            <td class="p-2 font-medium"><span
                                    class="quantity-cell py-1 px-3 rounded-lg"><?php echo $proveedor->getCorreo_email(); ?></span>
                            </td>
                            <td class="p-2 font-medium"><?php echo $proveedor->getTelefono(); ?></td>
                            <td class="p-2 font-medium"><?php echo $proveedor->getObservaciones(); ?></span>
                            </td>
                            <td>
                                <div class="flex gap-4 justify-center items-center">
                                    <a href="<?php echo constant('URL'); ?>/infoID/show/<?php echo $proveedor->getId(); ?>"
                                        class="hover:text-azul text-azul_oscuro">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="<?php echo constant('URL'); ?>/proveedores/delete/<?php echo $proveedor->getId(); ?>" class="hover:text-rojo hover:text-lg text-azul_oscuro"  onclick="return confirm('Estas a punto de eliminar al usuario: <?php echo $proveedor->getNombre_completo(); ?>.');"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

        </table>
    <?php else: ?>
        <div class="flex flex-col items-center gap-2">
            <p class="text-center font-bold text-3xl">No hay proveedores registrados.</p>
            <img src="./public/img/vacio.svg" alt="sin datos" class="w-[560px]">
        </div>

    <?php endif; ?>
</div>
</div>