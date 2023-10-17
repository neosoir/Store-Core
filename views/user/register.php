<h1>Registro</h1>

<form action="index.php?controller=user&action=save" method="POST">

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