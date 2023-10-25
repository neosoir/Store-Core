<h1>Detalles del Pedido</h1>

<?php if ( isset( $order ) ) : ?>

    <?php if ( isset( $_SESSION['admin'] ) ): ?>
        <h3>Cambiar Estado de Pedido</h3>
        <form action="<?= base_url ?>/order/state" method="POST">
            <input type="hidden" value="<?= $order->id ?>" name="order_id">
            <select name="state">
                <option value="confirm" <?= $order->estado == "confirm" ? 'selected' : '' ?>>Pendiente</option>
                <option value="preparation" <?= $order->estado == "preparation" ? 'selected' : '' ?>>En Preparacion</option>
                <option value="ready" <?= $order->estado == "ready" ? 'selected' : '' ?>>Preparado para Enviar</option>
                <option value="sended" <?= $order->estado == "sended" ? 'selected' : '' ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar Estado">
        </form>
    <?php endif; ?>

    <h3>Datos del Envio</h3><br>
    Provincia: <?= $order->privincia ?><br>
    Ciudad: <?= $order->localidad ?><br>
    Direccion: <?= $order->direccion ?><br><br>

    <?php Utils::getOrderTable( $order, $products ) ?>

<?php endif; ?>