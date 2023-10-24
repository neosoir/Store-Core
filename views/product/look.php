<?php if ( isset( $product ) ): ?>
    <h1><?= $product->nombre ?></h1>

    <div id="detail-product">

        <div class="image">
            <?php if ( $product->imagen ): ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="producto">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="producto">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $product->descripcion ?></p>
            <p class="price">$<?= $product->precio ?></p>
            <?php Utils::showAddToCartButton( $product->id ) ?>
        </div>
            
    </div>

<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>