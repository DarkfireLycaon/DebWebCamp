<h2 class="dashboard__heading"> <?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
<a class="dashboard__boton" href="/admin/eventos/crear">
    <i class="fa-solid fa-circle-plus"></i>
    Add New Event
</a>
</div>

<div class="dashboard__contenedor">
<?php if(!empty($eventos)){ ?>
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Event's Name</th>
                <th scope="col" class="table__th">Category</th>
                <th scope="col" class="table__th">Day and Date</th>
                <th scope="col" class="table__th">Speaker</th>
                <th scope="col" class="table__th"></th>



            </tr>
        </thead>
        <tbody class="table__tbody"></tbody>
        <?php foreach($eventos as $evento) {?>
            <tr class="table__tr">
            <td class="table__td">
                <?php echo $evento->nombre  ?>
            </td>
            <td class="table__td">
                <?php echo $evento->categoria->nombre  ?>
            </td>
            <td class="table__td">
                <?php echo $evento->dia->nombre . ", " . $evento->hora->hora ?>
            </td>
            <td class="table__td">
                <?php echo $evento->ponente->nombre . " " . $evento->ponente->apellido ?>
            </td>
            <td class="table__td--acciones">
                <a class="table__accion table__accion--editar" href="/admin/eventos/editar?id=<?php echo $evento->id ?>">
                    <i class="fa-solid fa-pencil"></i>
                    Edit
                </a>
                <form method="POST" action="/admin/eventos/eliminar" class="table__formulario">
                <input type="hidden" name="id" value="<?php echo $evento->id; ?>">
                <button class="table__accion table__accion--eliminar" type="submit">
                    <i class="fa-solid fa-circle-xmark"></i>
                    Delete
                </button>
                </form>
            </td>
            </tr>
            
            <?php }?>
    </table>
    <?php } else { ?>
        <p class="text-center">There are no events yet.</p>
        <?php }?>
</div>
<?php echo $paginacion; ?>