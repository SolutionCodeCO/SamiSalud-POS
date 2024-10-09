<?php $this->showMessages(); ?>

<div class="rounded mt-7 w-full overflow-auto max-h-[500px]">
    <?php if (!empty($this->data['registroFacturas'])): ?>
        <table class="w-full rounded ">
            <thead class="bg-azul_opacidad rounded w-full">
                <tr class="">
                    <th class="p-2 text-[13px] font-[15px]">Numero de factura</th>
                    <th class="p-2 text-[13px] font-[15px]">Proveedor</th>
                    <th class="p-2 text-[13px] font-[15px]">Total de productos</th>
                    <th class="p-2 text-[13px] font-[15px]">Total de faltantes</th>
                    <th class="p-2 text-[13px] font-[15px]">Total de devoluciones</th>
                    <th class="p-2 text-[13px] font-[15px]">Fecha creación</th>
                    
                </tr>
            </thead>

            <div class="">
                <tbody class="text-center ">
                    <?php foreach ($this->data['registroFacturas'] as $registroFacturas): ?>
                        <tr>
                            <td class="p-2 text-[14px] font-medium"><?php echo $registroFacturas->getNumero_factura(); ?></td>
                            <td class="p-2 text-[14px] font-medium"><?php echo $registroFacturas->getProveedor(); ?></td>
                            <td class="p-2 text-[14px] font-medium"><span
                                    class=" py-1 text-[14px] px-3 rounded-lg"><?php echo $registroFacturas->getTotal_productos(); ?></span>
                            </td>
                            <td class="p-2 text-[14px] font-medium"><?php echo $registroFacturas->getTotal_faltantes(); ?></td>
                            <td class="p-2 text-[14px] font-medium"><?php echo $registroFacturas->getTotal_devoluciones(); ?></span>
                            </td>
                            <td class="p-2 text-[14px] font-medium"><?php echo $registroFacturas->getfecha_Creacion(); ?></span>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>

        </table>
    <?php else: ?>
        <div class="flex flex-col items-center gap-2">
            <p class="text-center font-bold text-3xl">No hay ningun registro diario.</p>
            <img src="./public/img/form.svg" alt="sin datos" class="mt-[60px] w-[560px]">
        </div>

    <?php endif; ?>
</div>
</div>