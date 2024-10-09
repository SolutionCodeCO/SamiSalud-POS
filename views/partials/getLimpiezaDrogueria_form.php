<?php $this->showMessages(); ?>

<div class="rounded mt-7 w-full overflow-auto max-h-[500px]">
    <?php if (!empty($this->data['limpiezaDrogueria'])): ?>
        <table class="w-full rounded ">
            <thead class="bg-azul_opacidad rounded w-full">
                <tr class="">
                    <th class="p-2 text-[13px] font-[15px]">ID</th>
                    <th class="p-2 text-[13px] font-[15px]">Baño</th>
                    <th class="p-2 text-[13px] font-[15px]">Inyectologia</th>
                    <th class="p-2 text-[13px] font-[15px]">Techos | Paredes</th>
                    <th class="p-2 text-[13px] font-[15px]">Pisos | dispensación</th>
                    <th class="p-2 text-[13px] font-[15px]">Estantes | Vitrinas | Cajoneras</th>
                    <th class="p-2 text-[13px] font-[15px]">Canecas</th>
                    <th class="p-2 text-[13px] font-[15px]">Fecha creación</th>
                    
                </tr>
            </thead>

            <div class="">
                <tbody class="text-center ">
                    <?php foreach ($this->data['limpiezaDrogueria'] as $limpiezaDrogueria): ?>
                        <tr>
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getId(); ?></td>
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getBanio(); ?></td>
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getInyectologia(); ?></td>
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getTechos_paredes(); ?></td>
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getPisos_dispensacion(); ?></td>
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getEstantes_vitrinas_cajoneras(); ?></td>
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getCanecas(); ?></td>
                           
                            <td class="p-2 text-[15px] font-medium"><?php echo $limpiezaDrogueria->getfecha_Creacion(); ?></span>
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