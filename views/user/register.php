<h1>Registro</h1>

<?php if ( isset( $_SESSION['register'] ) && ( $_SESSION['register'] == 'complete' ) ): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif ( isset( $_SESSION['register'] ) && ( $_SESSION['register'] == 'failed' ) ): ?>
    <strong class="alert_red">Registro fallido</strong>
<?php endif;?>

<?php Utils::deleteSession('register') ?>

<form action="<?= base_url ?>user/save" method="POST">

    <label for="name">Nombre</label>
    <input type="text" name="name" require>

    <label for="lastname">Apellidos</label>
    <input type="text" name="lastname" require>

    <label for="email">Email</label>
    <input type="email" name="email" require>

    <label for="password">Contraseña</label>
    <input type="password" name="password" require>

    <input type="submit" value="Registrar">

</form>