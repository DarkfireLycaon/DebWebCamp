<fieldset class="formulario__fieldset">
<legend class="formulario__legend">Event Information</legend>
<div class="formulario__campo">
        <label for="name" class="formulario__label">Event's Name</label>
        <input type="text"
               id="name"
               name="nombre"
               placeholder="Event's Name"
               class="formulario__input"
               value="<?php echo $evento->nombre; ?>">
    </div>
    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Description</label>
        <textarea
               id="descripcion"
               name="descripcion"
               placeholder="Event's Description"
               class="formulario__input"
               rows="8"
               ><?php echo $evento->descripcion; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Category or Type of Event</label>
         <select class="formulario__select" name="categoria_id" id="categoria">
            <option value="">- Select -</option>
            <?php foreach($categorias as $categoria) {?>
            <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?php echo $categoria->id; ?>">
                <?php echo $categoria->nombre; ?>
            </option>
            <?php } ?>
         </select>
    </div>

    <div class="formulario__campo">
        <label for="dia" class="formulario__label">Select the day of the Event</label>
        <div class="formulario__radio">
            <?php foreach($dias as $dia) { ?>
            <div>
                <label for="<?php  echo strtolower(($dia->nombre)); ?>"> <?php echo $dia->nombre; ?> </label>
                <input type="radio"
                id=" <?php echo strtolower($dia->nombre); ?>"
                value="<?php echo $dia->id ?>"
                name="dia" <?php echo ($evento->dia_id === $dia->id) ? 'checked' : ''; ?>
                >
            </div>
            <?php } ?>
        </div>

        <input type="hidden" name="dia_id" value="">

            </div>
            <div id="horas" class="formulario__campo">
              <label class="formulario__label" for=""> Select Time </label>
              <ul class="horas">
             <?php foreach($horas as $hora){ ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"> <?php echo $hora->hora; ?> </li>
            <?php  } ?>
              </ul>
              <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
            </div>
</fieldset>

<fieldset class="formulario__fieldset">
<legend class="formulario__legend">Extra Information</legend>

<div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Speakers</label>
        <input
               type="text"
               id="ponentes"
               placeholder="Search Speaker"
               class="formulario__input">
               <ul id="listado-ponentes" class="listado-ponentes"></ul>
               <input type="hidden" name="ponente_id" value="">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Available Places</label>
        <input
               type="number"
               min= "1"
               id="disponibles"
               name="disponibles"
               placeholder="Ex. 20"
               class="formulario__input"
               value="<?php echo $evento->disponibles; ?>">
    </div>
</fieldset>