<?php if ( isset( $_SESSION['order'] ) && $_SESSION['order'] == 'complete' ): ?>
    <h1>Tu Pedido se ha Confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realices la trasferencia bancaria a la cuenta 546542137987654654 con el coste del pedido, sera procesado y enviado.
    </p>
    <br>
    <?php if ( isset( $order ) ): ?>
    
        <pre>
            <h3>Datos del Pedido</h3>
            Número de Pedido: <?= $order->id ?>
            Total a Pagar: $<?= $order->coste ?>
            Productos:
        </pre>
        <br>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Total</th>
            </tr>
            <?php while( $product = $products->fetch_object() ): ?>
                <tr>
                    <td>
                        <?php if ( $product->imagen ): ?>
                            <img class="img_carrito" src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="producto">
                        <?php else: ?>
                                <img class="img_carrito" src="<?= base_url ?>assets/img/camiseta.png" alt="producto">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url ?>product/look&id=<?= $product->id ?>"><?= $product->nombre ?></a>
                    </td>
                    <td><?= $product->precio ?></td>
                    <td><?= $product->unidades ?></td>
                    <td>$<?= ( $product->unidades * $product->precio ) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

    <?php endif; ?>
<?php elseif ( isset( $_SESSION['order'] ) && $_SESSION['order'] == 'complete' ): ?>
    <h1>Tu Pedido no ha Podido Procesare</h1>
<?php endif; ?>