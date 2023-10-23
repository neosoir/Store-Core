<?php

require_once 'models/ProductModel.php';

class ProductController {

    public function index() {

        $productClass = new ProductModel;
        $products = $productClass->getRadom(6);

        require_once 'views/product/top.php';

    }

    public function look() {

        $id = $_GET['id']; 

        if ( isset( $id ) ) {

            $productClass = new ProductModel;
            $productClass->setId( $id );
            $product = $productClass->getOne();

        }
        require_once 'views/product/look.php';

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
            $image = isset( $_FILES['image'] ) ? $_FILES['image'] : false;

            if ( $name && $description && $price && $stock && $category && $image ) {
                
                $product = new ProductModel();

                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategoryId($category);

                // Image.
                $file       = $_FILES['image'];

                if ( isset( $file ) ) {

                    $filename   = $file['name'];
                    $filetype   = $file['type'];
    
                    if  (
                            ( $filetype == 'image/jpg' )
                            || ( $filetype == 'image/jpeg' )
                            || ( $filetype == 'image/png' )
                            || ( $filetype == 'image/gif' )
                        ) 
                    {
    
                        if ( !is_dir( 'uploads/images' ) )
                            mkdir('uploads/images', 0777, true);
    
                        move_uploaded_file( $file['tmp_name'], 'uploads/images/' . $filename );
                        $product->setImage($filename);
    
                    }

                }

                //
                $id = $_GET['id'];
                if ( $id ) {

                    $product->setId( $id );
                    $save = $product->edit();

                }

                else    
                    $save = $product->save();

                //
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

    public function edit() {

        Utils::isAdmin();
        $id = $_GET['id'];

        if ( isset( $id ) ) {

            $edit = true;
            $product = new ProductModel;
            $product->setId( $id );
            $pro = $product->getOne();
            require_once 'views/product/create.php';

        }
        else
            header('Location:' . base_url . 'product/manage');
        

    }
    
    public function delete() {
        
        Utils::isAdmin();

        $id = $_GET['id'];

        if ( isset( $id ) ) {
            
            $product = new ProductModel;
            $product->setId( $id );
            $delete = $product->delete();

            if ( $delete ) 
                $_SESSION['delete'] = 'complete';

            else
                $_SESSION['delete'] = 'failed';

        }
        else    
            $_SESSION['delete'] = 'failed';

        header('Location:' . base_url . 'product/manage');

    }

}