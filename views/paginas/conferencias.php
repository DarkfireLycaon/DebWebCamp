<main class="agenda">
<h2 class="agenda__heading">Workshop & Conferences</h2>
<p class="agenda__descripcion">Conferences and workshops guided by experts of web development</p>
<div class="eventos">
<h3 class="eventos__heading">&lt;Conferences/></h3>
<p class="eventos__fecha">Friday 20 of October</p>

<div class="eventos__listado slider swiper">
    <div class="swiper-wrapper">
<?php foreach($eventos['conferencias_v'] as $evento ){ ?>
<?php include __DIR__ . '../../templates/evento.php'; ?>
<?php } ?> 
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>
<p class="eventos__fecha">Saturday 21 of October</p>
<div class="eventos__listado slider swiper">
    <div class="swiper-wrapper">
<?php foreach($eventos['conferencias_s'] as $evento ){ ?>
<?php include __DIR__ . '../../templates/evento.php'; ?>
<?php } ?> 
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>
</div>

<div class="eventos eventos--workshops">
<h3 class="eventos__heading">&lt;Workshop/></h3>
<p class="eventos__fecha">Friday 20 of October</p>

<div class="eventos__listado slider swiper">
    <div class="swiper-wrapper">
<?php foreach($eventos['workshops_v'] as $evento ){ ?>
<?php include __DIR__ . '../../templates/evento.php'; ?>
<?php } ?> 
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>

<p class="eventos__fecha">Saturday 21 of October</p>
<div class="eventos__listado slider swiper">
    <div class="swiper-wrapper">
<?php foreach($eventos['workshops_s'] as $evento ){ ?>
<?php include __DIR__ . '../../templates/evento.php'; ?>
<?php } ?> 
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>
</div>

</main>