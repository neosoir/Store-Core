<h1>Gestion de Productos</h1>

<a class="button button-small" href="<?= base_url ?>product/create">Crear Producto</a>

<?php if( isset( $_SESSION['product'] ) && $_SESSION['product'] == 'complete' ): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif( isset( $_SESSION['product'] ) && $_SESSION['product'] == 'failed' ): ?>
    <strong class="alert_red">El producto se No ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('product') ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </tr>
    <?php
    ?>
    <?php while( $producto = $productos->fetch_object() ): ?>
        <tr>
            <td><?= $producto->id ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->precio ?></td>
            <td><?= $producto->stock ?></td>
        </tr>
    <?php endwhile; ?>

</table>