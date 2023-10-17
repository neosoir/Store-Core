<?php

class User {

    public function index() {
        echo "User Controller, index action";
    }

    public function register() {
        require_once 'views/user/register.php';
    }

    public function save() {

        if ( isset( $_POST ) ) {
            var_dump($_POST);
        }

    }
}