<?php if ( isset( $manage ) ): ?>
    <h1>Gestionar Predidos</h1>
<?php else: ?>
    <h1>Mis Pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <th>No. Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while ($order = $orders->fetch_object() ): ?>
        <tr>
            <td><a href="<?= base_url ?>order/details&id=<?= $order->id ?>"><?= $order->id ?></a></td>
            <td><?= $order->coste ?></td>
            <td><?= $order->fecha ?></td>
            <td><?= Utils::showStatus( $order->estado ) ?></td>
        </tr>
    <?php endwhile; ?>
</table>