<h2 class="dasgboard__heading"><?php echo $titulo ?> </h2>

<div class="dashboard__contenedor">
<?php if(!empty($registros)){ ?>
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Name</th>
                <th scope="col" class="table__th">Email</th>
                <th scope="col" class="table__th">Package</th>
                <th scope="col" class="table__th"></th>

            </tr>
        </thead>
        <tbody class="table__tbody"></tbody>
        <?php foreach($registros as $registro) {?>
            <tr class="table__tr">
            <td class="table__td">
                <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>
            </td>
            <td class="table__td">
                <?php echo $registro->usuario->email; ?>
            </td>
            <td class="table__td">
                <?php echo $registro->paquete->nombre; ?>
            </td>
       
            </tr>
            
            <?php }?>
    </table>
    <?php } else { ?>
        <p class="text-center">There are no records yet.</p>
        <?php }?>
</div>
<?php echo $paginacion; ?>