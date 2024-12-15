<main class="devwebcamp">
 <h2 class="devwebcamp__heading"> <?php echo $titulo; ?></h2>
 <p class="devwebcamp__descripcion">Meet the conference most important in Europe</p>
 <div class="devwebcamp__grid">
    <div <?php aos_animacion();?> class="devwebcamp__imagen">
    <picture>
        <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
        <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
        <img src="src/build/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp" width="200" height="300" loading="lazy">

    </picture>
    </div>
<div <?php aos_animacion();?> class="devwebcamp__contenido">
<p class="devwebcamp__texto">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
</div>
 </div>
</main>