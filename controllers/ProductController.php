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

}