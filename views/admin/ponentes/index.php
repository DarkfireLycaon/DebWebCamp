<h2 class="dashboard__heading"> <?php echo $titulo ?></h2>
<div class="dashboard__contenedor-boton">
<a class="dashboard__boton" href="/admin/ponentes/crear">
    <i class="fa-solid fa-circle-plus"></i>
    Add Speaker
</a>
</div>

<div class="dashboard__contenedor">
<?php if(!empty($ponentes)){ ?>
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Name</th>
                <th scope="col" class="table__th">Location</th>
                <th scope="col" class="table__th"></th>

            </tr>
        </thead>
        <tbody class="table__tbody"></tbody>
        <?php foreach($ponentes as $ponente) {?>
            <tr class="table__tr">
            <td class="table__td">
                <?php echo $ponente->nombre . " " . $ponente->apellido; ?>
            </td>
            <td class="table__td">
                <?php echo $ponente->ciudad . ", " . $ponente->pais; ?>
            </td>
            <td class="table__td--acciones">
                <a class="table__accion table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $ponente->id ?>">
                    <i class="fa-solid fa-user-pen"></i>
                    Edit
                </a>
                <form method="POST" action="/admin/ponentes/eliminar" class="table__formulario">
                <input type="hidden" name="id" value="<?php echo $ponente->id; ?>">
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
        <p class="text-center">There are no speakers yet.</p>
        <?php }?>
</div>
<?php echo $paginacion; ?>