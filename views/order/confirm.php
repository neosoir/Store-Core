<?php if ( isset( $_SESSION['order'] ) && $_SESSION['order'] == 'complete' ): ?>
    <h1>Tu Pedido se ha Confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realices la trasferencia bancaria con el coste del pedido, sera procesado y enviado.
    </p>
<?php elseif ( isset( $_SESSION['order'] ) && $_SESSION['order'] == 'complete' ): ?>
    <h1>Tu Pedido no ha Podido Procesare</h1>
<?php endif; ?>