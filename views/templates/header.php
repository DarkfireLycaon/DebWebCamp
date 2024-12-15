<header class="header">
<div class="header__contenedor">
<nav class="header__navegacion">
    <?php if(is_Auth()) { ?>
        <a href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>" class="header__enlace">Manage</a>
 <form method="POST" action="/logout" class="header__form">
 <input type="submit" value="Logout" class="header__submit">
 </form>
        <?php } else { ?>
<a href="/registro" class="header__enlace">Register</a>
<a href="/login" class="header__enlace">Login</a>
<?php } ?>
</nav>
<div class="header__contenido">
<a href="/"> <h1 class="header__logo">&#60;DevWebCamp/></h1></a>
<p class="header__texto">October 14-15 - 2023</p>
<p class="header__texto header__texto--modalidad">Online - In-Person</p>
<a href="/registro" class="header__boton">Buy Ticket</a>

</div>

</div>
</header>
<div class="barra">
<div class="barra__contenido">
    <a href="/">
        <h2 class="barra__logo" >
        &#60;DevWebCamp/>
        </h2>
   
    </a>
    <nav class="navegacion">
        <a href="/devwebcamp" class="navegacion__enlace <?php echo pagina_actual('/devwebcamp') ? 'navegacion__enlace--actual' : ''; ?>">Events</a>
        <a href="/paquetes" class="navegacion__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Packages</a>
        <a href="/workshop-conferencias" class="navegacion__enlace <?php echo pagina_actual('/workshop-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Workshops/Conferences</a>
        <a href="/registro" class="navegacion__enlace <?php echo pagina_actual('/registro') ? 'navegacion__enlace--actual' : ''; ?>">Buy Ticket</a>
    </nav>
</div>
</div>