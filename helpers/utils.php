<?php

class Utils {

    /**
     * Delete Session ($_SESSION)
     *
     * @param string $name
     * @return string
     */
    public static function deleteSession( $name ) {

        if ( isset( $_SESSION[$name] ) ) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;

    }

    public static function isAdmin() {

        if ( !isset( $_SESSION['admin'] ) )
            header("Location:" . base_url);

        else 
            return true;

    }

    public static function showCategories() {

        require_once 'models/CategoryModel.php';
        $categories = new CategoryModel;
        return $categories->getAll();

    }

    public static function showProductsLopp( $products ) {

        ?>
        <?php while( $product = $products->fetch_object() ): ?>
            <div class="product">
                <a href="<?= base_url ?>product/look&id=<?= $product->id ?>">
                    <?php if ( $product->imagen ): ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="producto">
                    <?php else: ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" alt="producto">
                    <?php endif; ?>
                    <h2><?= $product->nombre ?></h2>
                </a>
                <p><?= $product->precio ?></p>
                <a href="" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
        <?php
        
    }

}