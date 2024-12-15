<main class="auth">
<h2 class="auth__heading"><?php echo $titulo ?></h2>
<?php require_once __DIR__ . '/../templates/alertas.php' ?>

<form action="/olvide" method="POST">
<div class="formulario__campo">
<label for="" class="formulario__label">Email</label>
<input type="text"
id="email"
name="email"
placeholder="Your Email"
class="formulario__input">
</div>
<input type="submit" class="formulario__submit" value="Recover password">

</form>
<div class="acciones">
    <a href="/registro" class="acciones__enlace">You don't have an account yet? </a>
<a href="/login" class="acciones__enlace">Already have an account? Login</a>
</div>
</main>