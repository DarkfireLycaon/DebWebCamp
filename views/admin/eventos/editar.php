<h2 class="dashboard__heading"> <?php echo $titulo ?></h2>
<div class="dashboard__contenedor-boton">
<a class="dashboard__boton" href="/admin/eventos">
    <i class="fa-solid fa-circle-arrow-left"></i>
    Back
</a>
</div>
<?php include_once __DIR__ . '../../../templates/alertas.php'; ?>

<div class="dashboard__formulario dashboard__contenedor">

<form class="formulario"  method="POST">

<?php include_once __DIR__ . '../formulario.php'; ?>

    <input class="formulario__submit formulario__submit--registrar" type="submit" value="Save Changes">
</form>



</div>