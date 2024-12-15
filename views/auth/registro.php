<?php if(!is_auth()){ ?>
<main class="auth">
<h2 class="auth__heading"><?php echo $titulo ?></h2>

<?php require_once __DIR__ .  '/../templates/alertas.php'; ?>

<form action="/registro" class="formulario" method="POST">
<div class="formulario__campo">
<label for="" class="formulario__label">Name</label>
<input type="text"
id="nombre"
name="nombre"
placeholder="Your Name"
class="formulario__input"
value="<?php echo $usuario->nombre?>">
</div>
<div class="formulario__campo">
<label for="" class="formulario__label">Surname</label>
<input type="text"
id="apellido"
name="apellido"
placeholder="Your Surname"
class="formulario__input"
value="<?php echo $usuario->apellido?>">
</div>

<label for="" class="formulario__label">Email</label>
<input type="text"
id="email"
name="email"
placeholder="Your Email"
class="formulario__input"
value="<?php echo $usuario->email?>">

<div class="formulario__campo">
<label for="" class="formulario__label">Password</label>
<input type="password"
id="password"
name="password"
placeholder="Your Password"
class="formulario__input">
</div>

<div class="formulario__campo">
<label for="" class="formulario__label">Confirm your password</label>
<input type="password"
id="password2"
name="password2"
placeholder="Repeat Password"
class="formulario__input">
</div>


<input type="submit" class="formulario__submit" value="Create Account">

</form>
<div class="acciones">
    <a href="/login" class="acciones__enlace">Already have an account? Login </a>
<a href="/olvide" class="acciones__enlace">Have you forgotten your password?</a>
</div>
</main>
<?php } else {
     header('Location: /finalizar-registro');
    } ?>

    