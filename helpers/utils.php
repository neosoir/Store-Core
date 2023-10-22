<?php

class Utils {

    /**
     * Delete Session ($_SESSION)
     *
     * @param string $name
     * @return string
     */
    public static function deleteSession( $name ) {

        if ( isset( $_SESSION[$name] ) ) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;

    }

    public static function isAdmin() {

        if ( !isset( $_SESSION['admin'] ) )
            header("Location:" . base_url);

        else 
            return true;

    }

}