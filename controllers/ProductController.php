<?php

require_once 'models/ProductModel.php';

class ProductController {

    public function index() {

        require_once 'views/product/top.php';

    }

    public function manage() {

        Utils::isAdmin();

        $producto = new ProductModel;
        $productos = $producto->getAll();

        require_once 'views/product/manage.php';

    }

    public function create() {

        Utils::isAdmin();
        require_once 'views/product/create.php';

    }

    public function save() {

        Utils::isAdmin();

        if ( isset( $_POST ) ) {

            $name = isset( $_POST['name'] ) ? $_POST['name'] : false;
            $description = isset( $_POST['description'] ) ? $_POST['description'] : false;
            $price = isset( $_POST['price'] ) ? $_POST['price'] : false;
            $stock = isset( $_POST['stock'] ) ? $_POST['stock'] : false;
            $category = isset( $_POST['category'] ) ? $_POST['category'] : false;
            //$image = isset( $_POST['image'] ) ? $_POST['image'] : false;

            if ( $name && $description && $price && $stock && $category ) {
                
                $product = new ProductModel();

                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategoryId($category);

                $save = $product->save();

                if ( $save )
                    $_SESSION['product'] = 'complete';

                else    
                    $_SESSION['product'] = 'failed';

            }
            else
                $_SESSION['product'] = 'failed';

        }
        else
            $_SESSION['product'] = 'failed';

        header('Location:' . base_url . 'product/manage');

    }

}