<?php

require_once 'models/ProductModel.php';

class CartController {

    public function index() {

        $cart = [];
        
        if ( isset( $_SESSION['cart'] ) && count( $_SESSION['cart'] ) >= 1 )
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

        $index = $_GET['index'];



        reset($_SESSION['cart']);
        if ( $index  ) {

            if ( $index == '0' ) 
                array_shift($_SESSION['cart']);

            else
                unset( $_SESSION['cart'][$index] ) ;


        }

        header("Location:" . base_url . 'cart/index');

        
    }

    public function delete() {

        unset( $_SESSION['cart'] );
        header("Location:" . base_url . 'cart/index');

    }

}