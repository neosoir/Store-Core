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

    public static function isIdentity() {

        if ( !isset( $_SESSION['identity'] ) )
            header("Location:" . base_url);

        else 
            return true;

    }

    public static function showCategories() {

        require_once 'models/CategoryModel.php';
        $categories = new CategoryModel;
        return $categories->getAll();

    }

    public static function showAddToCartButton( $productId ) {
        ?>
        <a href="<?= base_url ?>cart/add&id=<?= $productId ?>" class="button">Comprar</a>
        <?php
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
                <?php self::showAddToCartButton( $product->id ) ?>
            </div>
        <?php endwhile; ?>
        <?php
        
    }

    public static function statsCart() {

        $stats = [
            'count' => 0,
            'total' => 0,
        ];

        if ( isset( $_SESSION['cart'] ) ) {

            // Count

            foreach ($_SESSION['cart'] as $key => $product) {
                $stats['total'] += ( $product['price'] * $product['amount'] );
                $stats['count'] += $product['amount'];
            }
        }


        return $stats;

    }

    public static function getOrderTable( $order, $products ) {

        ?>
        <?php if ( isset( $order ) ): ?>
            
            <h3>Datos del Pedido</h3><br>
            Estado: <?= self::showStatus( $order->estado ) ?><br>
            Número de Pedido: <?= $order->id ?><br>
            Total a Pagar: $<?= $order->coste ?><br>
            Productos:<br><br>
            
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

        <?php

    }

    public static function showStatus( $status ) {

        switch ($status) {

            case 'confirm':
                $value = 'Pendiente';
                break;

            case 'preparation':
                $value = 'En Preparacion';
                break;
            
            case 'ready':
                $value = 'Preparado';
                break;

            case 'sended':
                $value = 'Enviado';
                break;
            
            default:
                $value = 'Pendiente';
                break;

        }

        return $value;

    }

}