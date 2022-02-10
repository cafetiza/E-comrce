<h1>Registrarse</h1>

<!-- si la sesion es completada registro correcto -->
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>

<!-- si la sesion no es completada registro correcto -->
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>

<!-- borrar sesion una vez registrado -->
<?php Utils::deleteSession('register'); ?>

<!-- llenado de datos -->
<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="apellidos">Apeliidos</label>
    <input type="text" name="apellidos" required>
    
    <label for="email">E-mail</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña</label>
    <input type="text" name="password" required>

    <input type="submit" value="Registrarse">
</form>