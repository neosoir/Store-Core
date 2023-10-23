<h1>Gestion de Productos</h1>

<a class="button button-small" href="<?= base_url ?>product/create">Crear Producto</a>

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