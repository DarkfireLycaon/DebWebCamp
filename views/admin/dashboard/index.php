<h2 class="dashboard__heading"><?php echo $titulo ?></h2>


<div class="bloques">
<div class="bloques__grid">
<div class="bloque">
<h3 class="bloque__heading">Last Records</h3>
<?php foreach($registros as $registro) { ?>
<div class="bloque__contenido">
<p class="bloque__texto"> <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?> </p>
</div>
    <?php }?>
</div>
<div class="bloque">
<h3 class="bloque__heading">Earnings</h3>
<p class="bloque__texto--cantidad"> <?php echo $ingresos ?></p>
</div>
<div class="bloque">
<h3 class="bloque__heading">Events with less places availables</h3>
<?php foreach ($menos_disponibles as $evento){ ?>
    <p class="bloque__texto"> <?php echo $evento->nombre . " " . $evento->disponibles . ' Available'; ?> </p>
    <?php }?>
</div>
<div class="bloque">
<h3 class="bloque__heading">Events with more places availables</h3>
<?php foreach ($mas_disponibles as $evento){ ?>
    <p class="bloque__texto"> <?php echo $evento->nombre . " " . $evento->disponibles . ' Available'; ?> </p>
    <?php }?>
</div>
</div>
</div>