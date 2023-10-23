<h1>Gestionar categorias</h1>

<a class="button button-small" href="<?= base_url ?>category/create">Crear Categoria</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php
    ?>
    <?php while( $category = $categories->fetch_object() ): ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= $category->nombre ?></td>
        </tr>
    <?php endwhile; ?>

</table>