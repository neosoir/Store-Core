<?php 
    $stats = Utils::statsCart();
?>

<!-- Sidebar. -->
<aside id="lateral">
    <div class="block_aside" id="carrito">
        <h3>Mi Carrio</h3>
        <ul>
            <li><a href="<?= base_url ?>cart/index">Productos (<?= $stats['count'] ?>)</a></li>
            <li><a href="<?= base_url ?>cart/index">Total: $<?= $stats['total'] ?></a></li>
            <li><a href="<?= base_url ?>cart/index">Ver Carrito</a></li>
        </ul>
    </div>
    <div id="login" class="blok_side">
        <h3>Entrar a la Web</h3>
        <?php if ( !isset( $_SESSION['identity'] ) ): ?>
            <form action="<?= base_url ?>user/login" method="post">

                <label for="email">Email</label>
                <input type="email" name="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password">

                <input type="submit" value="Enviar">
            </form>
        <?php else: ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>
        <ul>
            <?php if ( isset( $_SESSION['admin'] ) ): ?>
                <li><a href="<?= base_url ?>category/index">Gestionar Categorias</a></li>
                <li><a href="<?= base_url ?>product/manage">Gestionar Productos</a></li>
                <li><a href="<?= base_url ?>order/manage">Gestionar Pedidos</a></li>
            <?php endif; ?>

            <?php if ( isset( $_SESSION['identity'] ) ): ?>
                <li><a href="<?= base_url ?>order/myorders">Mis Pedidos</a></li>
                <li><a href="<?= base_url ?>user/logout">Cerrar sesion</a></li>
            <?php else: ?>
                <li><a href="<?= base_url ?>user/register">Registrate Aqui</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<!-- Porducts Loop. -->
<div id="central">