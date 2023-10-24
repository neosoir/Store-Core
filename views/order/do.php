
<?php if ( isset( $_SESSION['identity'] ) ): ?>
    <h1>Finalizar Compra</h1>
    <p>
        <a href="<?= base_url ?>cart/index">Ver los productos y el precio del pedido</a>
    </p>
    <br>
    <h3>Direccion para el envio</h3>
    <form action="<?= base_url ?>order/add" method="POST">

    <label for="province">Provincia</label>
    <input type="text" name="province" required>

    <label for="location">Ciudad</label>
    <input type="text" name="location" required>

    <label for="address">Direccion</label>
    <input type="text" name="address" required>

    <input type="submit" value="Confirmar Pedido">
    
    </form>
<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para poder realizar tu pedido</p>
<?php endif; ?>
