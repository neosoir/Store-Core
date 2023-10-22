<?php

require_once 'models/UserModel.php';

class UserController {

    public function index() {
        echo "User Controller, index action";
    }

    public function register() {
        require_once 'views/user/register.php';
    }

    public function save() {

        if ( isset( $_POST ) ) {

            //extract( $_POST, EXTR_OVERWRITE );

            $name = isset( $_POST['name'] ) ? $_POST['name'] : false;
            $lastname= isset( $_POST['lastname'] ) ? $_POST['lastname'] : false;
            $email = isset( $_POST['email'] ) ? $_POST['email'] : false;
            $password = isset( $_POST['password'] ) ? $_POST['password'] : false;

            if ( $name && $lastname && $email && $password ) {

                $user = new UserModel;
                $user->setName( $name );
                $user->setLastName( $lastname );
                $user->setEmail( $email );
                $user->setPassword( $password );
                $save = $user->save();

                if ( $save )
                    $_SESSION['register'] = 'complete';

                else 
                    $_SESSION['register'] = 'failed';

            }
            else 
                $_SESSION['register'] = 'failed';

        }
        else 
            $_SESSION['register'] = 'failed';

        header("Location:" . base_url . 'user/register');

    }

    public function login() 
    {

        if ( isset( $_POST ) ) {
            
            // Identificar al usuario.

            // Consultar a la base de datos.
            $user = new UserModel;
            $user->setEmail( $_POST['email'] );
            $user->setPassword( $_POST['password'] );
            $identity = $user->login();

            if ( $identity && is_object( $identity ) ) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            }
            else {
                $_SESSION['error_login'] = 'Identificacion faliida';
            }
            // Crear una session

        }

        header("Location:" . base_url);
        
    }

    public function logout() {

        if ( isset( $_SESSION['identity'] ) ) {

            $_SESSION['identity'] = null;
            unset($_SESSION['identity']);

        }

        if ( isset( $_SESSION['admin'] ) ) {

            $_SESSION['admin'] = null;
            unset($_SESSION['admin']);
            
        }

        header("Location:" . base_url);

    }

}