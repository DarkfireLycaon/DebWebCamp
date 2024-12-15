<main class="auth">
<h2 class="auth__heading"><?php echo $titulo ?></h2>
<p class="auth__texto">Write your new Password</p>
<?php require_once __DIR__ . '/../templates/alertas.php'; ?>

<?php if($token_valido){?>
<form class="formulario" method="POST">
<div class="formulario__campo">
<label for="" class="formulario__label">New Password</label>
<input type="password"
id="password"
name="password"
placeholder="Your New Password"
class="formulario__input">
</div>
<input type="submit" class="formulario__submit" value="Save password">

</form>
<?php }?>
<div class="acciones">
    <a href="/registro" class="acciones__enlace">You don't have an account yet? </a>
<a href="/login" class="acciones__enlace">Already have an account? Login</a>
</div>
</main>