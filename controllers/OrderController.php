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
            $orderClass-> setUserId( $identity->id );
            $order = $orderClass->getOnByUser();

            $products = new OrdertModel;
            $products = $products->getProductByOrder( $order->id );

        }

        require_once 'views/order/confirm.php';

    }

}