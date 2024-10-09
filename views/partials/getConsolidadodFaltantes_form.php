<?php $this->showMessages(); ?>

<div class="rounded mt-7 w-full overflow-auto max-h-[500px]">
    <?php if (!empty($this->data['consolidado_faltantes'])): ?>
        <table class="w-full rounded ">
            <thead class="bg-azul_opacidad rounded w-full">
                <tr class="">
                    <th class="p-2 text-[13px] font-[15px]">ID</th>
                    <th class="p-2 text-[13px] font-[15px]">Cantidad ingresada</th>
                    <th class="p-2 text-[13px] font-[15px]">Fecha creación</th>
                    
                </tr>
            </thead>

            <div class="">
                <tbody class="text-center ">
                    <?php foreach ($this->data['consolidado_faltantes'] as $consolidado_faltantes): ?>
                        <tr>
                            <td class="p-2 text-[15px] font-medium"><?php echo $consolidado_faltantes->getId(); ?></td>
                            <td class="p-2 text-[15px] font-medium"><?php echo $consolidado_faltantes->getCantidad_ingresada(); ?></td>
                           
                            <td class="p-2 text-[15px] font-medium"><?php echo $consolidado_faltantes->getfecha_Creacion(); ?></span>
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