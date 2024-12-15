<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Personal Information</legend>

    <div class="formulario__campo">
        <label for="name" class="formulario__label">Name</label>
        <input type="text"
               id="name"
               name="nombre"
               placeholder="Speaker's Name"
               class="formulario__input"
               value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="surname" class="formulario__label">Surname</label>
        <input type="text"
               id="surname"
               name="apellido"
               placeholder="Speaker's Surname"
               class="formulario__input"
               value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="city" class="formulario__label">City</label>
        <input type="text"
               id="city"
               name="ciudad"
               placeholder="Speaker's City"
               class="formulario__input"
               value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="country" class="formulario__label">Country</label>
        <input type="text"
               id="country"
               name="pais"
               placeholder="Speaker's Country"
               class="formulario__input"
               value="<?php echo $ponente->pais ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Image</label>
        <input type="file"
               id="imagen"
               name="imagen"
               accept="image/*"
               required>
    </div>
   
    <legend class="formulario__legend">Extra Information</legend>
<div class="formulario__campo">
<label for="tags_input" class="formulario__label">Experienced Areas (Separated by comas)</label>
<input type="text" 
id="tags_input"
  placeholder="Ej. Node.js, Php, Laravel, UX / UI"
  class="formulario__input">
  <div id="tags" class="formulario__listado"> </div>
  <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">

</div>
<?php if(isset($ponente->imagen_actual)) {?>
   <p class="formulario__texto">Current Image:</p>
   <div class="formulario__imagen">
    <picture>
        <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.webp" type="image/webp"> 
        <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" type="image/png"> 

        <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" alt="Imagen Ponente">
    </picture>
   </div>
    <?php } ?>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Extra Information</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
        <i class="fa-brands fa-facebook"></i>
            </div>
                <input type="text"
                class="formulario__input--sociales"
                id="facebook"
                placeholder="Facebook"
                name="redes[facebook]"
                value="<?php echo $redes->facebook ?? ''; ?>">
                        </div>
            </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
        <i class="fa-brands fa-twitter"></i>
            </div>
                <input type="text"
                class="formulario__input--sociales"
                id="twitter"
                placeholder="X"
                name="redes[twitter]"
                value="<?php echo $redes->twitter ?? ''; ?>">
        </div>
        </div>

        <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
        <i class="fa-brands fa-youtube"></i>

            </div>
            <input type="text"
            class="formulario__input--sociales"
            id="youtube"
            placeholder="Youtube"
            name="redes[youtube]"
            value="<?php echo $redes->youtube ?? ''; ?>">
             </div>
            </div>

        <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
        <i class="fa-brands fa-instagram"></i>

            </div>
                <input type="text"
                class="formulario__input--sociales"
                id="instagram"
                placeholder="Instagram"
                name="redes[instagram]"
                value="<?php echo $redes->instagram ?? ''; ?>">
        </div>
        </div>

        <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
        <i class="fa-brands fa-tiktok"></i>

            </div>
            <input type="text"
            class="formulario__input--sociales"
            id="tiktok"
            placeholder="Tiktok"
            name="redes[tiktok]"
            value="<?php echo $redes->tiktok ?? ''; ?>">
        </div>
        </div>

<div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
        <i class="fa-brands fa-github"></i>
            </div>
            <input type="text"
            class="formulario__input--sociales"
            id="github"
            placeholder="Github"
            name="redes[github]"
            value="<?php echo $redes->github ?? ''; ?>">
        </div>
        </div>

   

    </fieldset>