<?php

session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function show_error( $number ) {

    $error = new ErrorsController;
    $error->index( $number );

}


if ( isset( $_GET['controller'] ) )
    $nombre_controlador = ucfirst( $_GET['controller'] ) . 'Controller';

else {

    if ( !isset( $_GET['actions'] ) )
        $nombre_controlador = controller_default;

    else {
        
        show_error( '0' );
        exit();

    }

}

if ( class_exists( $nombre_controlador ) ) {
    
    $controlador = new $nombre_controlador();
    
    if ( isset( $_GET['action'] ) && method_exists( $controlador, $_GET['action'] ) ) {
        $action = $_GET['action'];
        $controlador->$action();
    }
    
    else {

        if ( !isset( $_GET['controller'] )  ) {

            $action = action_default;
            $controlador->$action();

        }

        else
            show_error('1');
    
    }

}

else
    show_error( '2' );


require_once 'views/layout/footer.php';

