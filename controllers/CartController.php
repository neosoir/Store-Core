<?php

require_once 'models/ProductModel.php';

class CartController {

    public function index() {
        
        $cart = $_SESSION['cart'];

        require_once 'views/cart/index.php';


    }

    public function add() {

        if ( isset( $_GET['id'] ) ) 
            $product_id = $_GET['id'];

        else    
            header('Location:' . base_url);

        if ( isset( $_SESSION['cart'] ) ) {

            $counter = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                
                if ( $value['product_id'] == $product_id ) {
                    $_SESSION['cart'][$key]['amount']++;
                    $counter++;
                }

            }
            
        }
        if ( !isset( $counter ) || $counter == 0 ){

            $productClass = new ProductModel;
            $productClass->setId( $product_id );
            $product = $productClass->getOne();

            if ( is_object( $product ) ) {
                
                $_SESSION['cart'][] = [
                    'product_id'    => $product->id,
                    'amount'        => 1,
                    'price'         => $product->precio,
                    'product'       => $product
                ];

            }

        }

        //unset( $_SESSION['cart'] );
        header('Location:' . base_url . 'cart/index');
        

    }

    public function remove() {
        
    }

    public function delete() {

        unset( $_SESSION['cart'] );

    }

}