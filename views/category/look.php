<?php if ( isset( $category ) ): ?>
    <h1><?= $category->nombre ?></h1>
    <?php if ( $products->num_rows == 0 ): ?>
        <p>No hay Productos para Mostrar</p>
    <?php else: ?>
        <?php Utils::showProductsLopp( $products ) ?>
    <?php endif; ?>
<?php else: ?>
    <h1>No Existe la Categoria</h1>
<?php endif; ?>