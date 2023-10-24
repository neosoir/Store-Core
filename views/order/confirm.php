<?php if ( isset( $_SESSION['order'] ) && $_SESSION['order'] == 'complete' ): ?>
    <h1>Tu Pedido se ha Confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realices la trasferencia bancaria a la cuenta 546542137987654654 con el coste del pedido, sera procesado y enviado.
    </p>
    <br>
    <?php Utils::getOrderTable( $order, $products ) ?>
<?php elseif ( isset( $_SESSION['order'] ) && $_SESSION['order'] == 'complete' ): ?>
    <h1>Tu Pedido no ha Podido Procesare</h1>
<?php endif; ?>