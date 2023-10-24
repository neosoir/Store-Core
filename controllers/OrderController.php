<?php

require_once 'models/OrderModel.php';

class OrderController {

    public function do() {
       
        require_once 'views/order/do.php';

    }

    public function add() {

        if ( isset( $_SESSION['identity'] ) ) {
        
            $province = isset( $_POST['province'] ) ? $_POST['province'] : false;
            $location = isset( $_POST['location'] ) ? $_POST['location'] : false;
            $address = isset( $_POST['address'] ) ? $_POST['address'] : false;

            
            if ( $province && $location && $address ) {
                
                $user_id    =   $_SESSION['identity']->id;
                $stats      =   Utils::statsCart();
                $cost       =   $stats['total'];
                $order      =   new OrdertModel;
  
                $order->setUserId( $user_id );
                $order->setProvince( $province );
                $order->setLocation( $location );
                $order->setAddress( $address );
                $order->setCost( $cost );

                $save = $order->save();

                // Save order line
                $save_line = $order->saveLine();

                ( $save && $save_line) ? $_SESSION['order'] = "complete" : $_SESSION['order'] = "failed";


                header("Location:" . base_url . 'order/confirm');

            }
            else
                $_SESSION['order'] = "failed";

        }
        else 
            header("Location:" . base_url);
        
    }

    public function confirm() {

        $identity = $_SESSION['identity'];

        if ( isset( $identity ) ) {
            
            $orderClass = new OrdertModel;
            $orderClass->setUserId( $identity->id );
            $order = (object)$orderClass->getOneByUser();

            $products = new OrdertModel;
            $products = $products->getProductByOrder( $order->id );

        }

        require_once 'views/order/confirm.php';

    }

    public function myOrders() {

        Utils::isIdentity();
        $user_id    = $_SESSION['identity']->id;
        $orderClass = new OrdertModel;

        $orderClass->setUserId( $user_id );
        $orders = $orderClass->getAllByUser();

        require_once 'views/order/my_orders.php';

    }

    public function details() {

        Utils::isIdentity();

        $id = $_GET['id'];
        if ( isset( $id ) ) {
            
            // Get order
            $orderClass = new OrdertModel;
            $orderClass->setId($id);
            $order = $orderClass->getOne();

            // Get Products.
            $productClass = new OrdertModel;
            $products = $productClass->getProductByOrder($id); 
            
            require_once 'views/order/detail.php';

        }

        else
            header('Location:' . base_url . 'order/my_orders.php');

    }

}