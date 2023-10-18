<?php

class ErrorsController {

    public function index( $number ) {
        echo "<h1>La página que buscas no existe xD ($number)</h1>";
    }

}