<?php 
$stats = Utils::statsCart();
?>
<?php if ( isset( $_SESSION['cart'] ) && count( $_SESSION['cart'] ) >= 1 ): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Total</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($cart as $index => $value): $product = $value['product'] ?>
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
                <td>
                    <?= $value['amount'] ?>
                    <div class="updown-unidades">
                        <a class="button" href="<?= base_url ?>cart/up&index=<?= $index ?>">+</a>
                        <a class="button" href="<?= base_url ?>cart/down&index=<?= $index ?>">-</a>
                    </div>
                </td>
                <td>$<?= ( $value['amount'] * $product->precio ) ?></td>
                <td>
                    <a href="<?= base_url ?>cart/remove&index=<?= $index ?>" class="button button-carrito button-red">x</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div class="delete-carrito">
        <a href="<?= base_url ?>cart/delete" class="button button-delete button-red">Vaciar Carrito</a>
    </div>
    <div class="total-carrito">
        <h3>Precio Total: $<?= $stats['total'] ?></h3>
        <a href="<?= base_url ?>order/do" class="button button-pedido">Finalizar Compra</a>
    </div>
<?php else: ?>
    <p>El Carrito esta Vacio</p>
<?php endif; ?>