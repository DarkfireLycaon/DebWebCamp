<?php 
include_once __DIR__ . '/conferencias.php'; ?>


<section class="resumen">
<div class="resumen__grid">
<div <?php aos_animacion();?> class="resumen__bloque">
<p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total ?></p>
<p class="resumen__texto">Speakers</p>
</div>

<div <?php aos_animacion();?> class="resumen__bloque">
<p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total ?></p>
<p class="resumen__texto">Conferencias</p>
</div>

<div <?php aos_animacion();?> class="resumen__bloque">
<p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total ?></p>
<p class="resumen__texto">Workshops</p>
</div>

<div <?php aos_animacion();?> class="resumen__bloque">
<p class="resumen__texto resumen__texto--numero">500</p>
<p class="resumen__texto">Assistants</p>
</div>

</div>
</section>

<section class="speakers">
<h2 class="speakers__heading">Speakers</h2>
<p class="speakers__descripcion">Meet our experts in DevWebCamp</p>

<div class="speakers__grid">
<?php foreach($ponentes as $ponente) { ?>
    <div <?php aos_animacion();?> class="speaker">
<picture>
        <source srcset="img/speakers/<?php echo $ponente->imagen; ?>.webp" type="image/webp"> 
        <source srcset="img/speakers/<?php echo $ponente->imagen; ?>.png" type="image/png"> 
        <img class="speaker__imagen" src="img/speakers/<?php echo $evento->ponente->imagen; ?>.png" alt="Speaker Image" loading="lazy" width="200" height="300">
    </picture>
    
    <div class="speaker__informacion">
    <h4 class="speaker__nombre">
        <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
    </h4>
    <p class="speaker__ubicacion">
     <?php echo $ponente->ciudad . ', ' . $ponente->pais; ?>
    </p>

   <nav class="speaker-sociales">
        <?php $redes = json_decode($ponente->redes)  ?>
        <?php if(!empty($redes->facebook)) { ?>
        <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
        <span class="speaker__ocultar"></span>
    </a> 
    <?php }?>
    <?php if(!empty($redes->twitter)) { ?>
    <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
        <span class="speaker__ocultar"></span>
    </a> 
    <?php }?>
    <?php if(!empty($redes->youtube)) { ?>
    <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
        <span class="speaker__ocultar"></span>
    </a> 
    <?php }?>
    <?php if(!empty($redes->instagram)) { ?>
    <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
        <span class="speaker__ocultar"></span>
    </a> 
    <?php }?>
    <?php if(!empty($redes->tiktok)) { ?>
    <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
        <span class="speaker__ocultar"></span>
    </a> 
    <?php }?>
    <?php if(!empty($redes->github)) { ?>
    <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
        <span class="speaker__ocultar"></span>
    </a>
    <?php }?>
    </nav>

    <ul class="speaker__listado-skills">
 <?php $tags = explode(',', $ponente->tags);
 foreach($tags as $tag){ ?>
 <li class="speaker__skill"><?php echo $tag?></li>
 <?php } ?>
    </ul>
 </div>
 </div>
    <?php }?>
    </div>
</section>
<div id="mapa" class="mapa">

</div>
<section class="boletos">
    <h2 class="boletos__heading">Tickets</h2>
    <p class="boletos__descripcion">Prices for DevWebCamp</p>

    <div  class="boletos__grid">
<div  class="boleto boleto--presencial">
  <h4 class="boleto__logo">&#60;DevWebCamp/></h4>
  <p class="boleto__plan">In Person</p>
  <p class="boleto__precio">$199</p>
</div>
<div  class="boleto boleto--virtual">
  <h4 class="boleto__logo">&#60;DevWebCamp/></h4>
  <p class="boleto__plan">On Line</p>
  <p class="boleto__precio">$49</p>
</div>
<div  class="boleto boleto--gratis">
  <h4 class="boleto__logo">&#60;DevWebCamp/></h4>
  <p class="boleto__plan">On Line</p>
  <p class="boleto__precio">Free - $0</p>
</div>
    </div>
    <div class="boleto__enlace-contenedor">
        <a href="/paquetes" class="boleto__enlace">See Packages</a>
    </div>
</section>