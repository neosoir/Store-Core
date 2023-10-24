<?php 
$stats = Utils::statsCart();
?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Total</th>
    </tr>
    <?php foreach ($cart as $key => $value): $product = $value['product'] ?>
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
            <td><?= $value['amount'] ?></td>
            <td>$<?= ( $value['amount'] * $product->precio ) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<div class="total-carrito">
    <h3>Precio Total: $<?= $stats['total'] ?></h3>
    <a href="<?= base_url ?>order/do" class="button button-pedido">Finalizar Compra</a>
</div>