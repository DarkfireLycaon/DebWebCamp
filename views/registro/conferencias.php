
<h2 class="pagina__heading"><?php echo $titulo; ?></h2>
<p class="pagina__descripcion">Choos Up to 5 events to assist in person</p>

<div class="eventos-registro">
    <main class="eventos-registro__listado">
        <h3 class="eventos-registro__heading--conferencias">&lt;Conferences /></h3>
        <p class="eventos-registro__fecha">Friday 20 of October</p>

        <div class="eventos-registro__grid">
            <?php foreach($eventos['conferencias_v'] as $evento ) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>

        <p class="eventos-registro__fecha">Saturday 21 of October</p>
        <div class="eventos-registro__grid">
            <?php foreach($eventos['conferencias_s'] as $evento ) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>

        <h3 class="eventos-registro__heading--workshops">&lt;Workshops /></h3>
        <p class="eventos-registro__fecha">Friday 27 of October</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach($eventos['workshops_v'] as $evento ) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>

        <p class="eventos-registro__fecha">Saturday 28 of October</p>
        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach($eventos['workshops_s'] as $evento ) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>

    </main>

    <aside class="registro">
        <h2 class="registro__heading">Your Record</h2>

        <div id="registro-resumen" class="registro__resumen"></div>
        <div class="registro__regalo">
            <label class="registro__label" for="regalo">Select one gift</label>
            <select  id="regalo" class="registro__select">
                <option value="">-- Select your gift --</option>

                <?php foreach($regalos as $regalo) {?>
                    <option value="<?php echo $regalo->id; ?>"><?php echo $regalo->nombre; ?></option>
                 <?php }   ?>
            </select>
        </div>
  
        <form  id="registro" class="formulario">
            <div class="formulario__campo">
                <input type="submit" class="formulario__submit formulario__submit--full" value="Submit">
            </div>
        </form>
</div>
</aside>
    </div>
