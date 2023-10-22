<?php

require_once 'models/CategoryModel.php';

class CategoryController {

    public function index() {

        Utils::isAdmin();
        $category   = new CategoryModel;
        $categories = $category->getAll();

        require_once 'views/category/index.php';

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