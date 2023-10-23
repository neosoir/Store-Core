<?php

require_once 'models/CategoryModel.php';
require_once 'models/ProductModel.php';

class CategoryController {

    public function index() {

        Utils::isAdmin();
        $category   = new CategoryModel;
        $categories = $category->getAll();

        require_once 'views/category/index.php';

    }

    public function look() {

        $id = $_GET['id'];
        if ( isset( $id ) ) {

            // Get Category
            $categoryClass = new CategoryModel;
            $categoryClass->setId($id);
            $categoryClass->getOne();
            $category = $categoryClass->getOne();
            
            // Get Product
            $productClass = new ProductModel;
            $productClass->setCategoryId($id);
            $products = $productClass->getAllByCategory();

        }

        require_once 'views/category/look.php';

    }

    public function create() {
        
        Utils::isAdmin();
        require_once 'views/category/create.php';

    }

    public function save() {

        Utils::isAdmin();

        if ( isset( $_POST ) && isset( $_POST['name'] ) ) {
            
            $category = new CategoryModel;
            $category->setName($_POST['name']);
            $save = $category->save();

        }

        header("Location:" . base_url . "category/index");

    }

}