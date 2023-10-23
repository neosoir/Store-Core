<?php

class CategoryModel {

    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId() {
        return $this->id;
    }

    function getName() {

        return $this->nombre;

    }

    function setId( $id ) {

        $this->id = $id;

    }
    
    function setName( $nombre ) {

        $this->nombre = $this->db->real_escape_string( $nombre );

    }

    public function getAll() {
    
        return $this->db->query( "SELECT * FROM categorias ORDER BY id  DESC" );

    }

    public function getOne() {
    
        return $this->db->query( "SELECT * FROM categorias WHERE id={$this->getId()}" )->fetch_object();

    }

    public function save() {

        $sql    = "INSERT INTO categorias VALUES(NULL, '{$this->getName()}')";
        $save   = $this->db->query( $sql );
        $result = false;

        if ( $save )
            $result = true;

        return $result;

    }

}
