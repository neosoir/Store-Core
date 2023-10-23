<?php

class ProductModel {

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $imagen;
    private $db;

    /**
     * Product Model Construct
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */
    public function getCategoryId()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     */
    public function setCategoryId($categoria_id): self
    {
        $this->categoria_id = $this->db->real_escape_string( $categoria_id );

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getName()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setName($nombre): self
    {
        $this->nombre = $this->db->real_escape_string( $nombre );

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescription()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescription($descripcion): self
    {
        $this->descripcion = $this->db->real_escape_string( $descripcion );

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrice()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrice($precio): self
    {
        $this->precio = $this->db->real_escape_string( $precio );

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock($stock): self
    {
        $this->stock = $this->db->real_escape_string( $stock );

        return $this;
    }

    /**
     * Get the value of oferta
     */
    public function getOffer()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     */
    public function setOffer($oferta): self
    {
        $this->oferta = $this->db->real_escape_string( $oferta );

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImage()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImage($imagen): self
    {
        $this->imagen = $this->db->real_escape_string( $imagen );

        return $this;
    }

    /**
     * Get all products from database
     *
     * @return void
     */
    public function getAll() {

        return $this->db->query("SELECT * FROM productos ORDER BY id DESC");

    }

    /**
     * Get all products from category
     *
     * @return void
     */
    public function getAllByCategory() {

        $sql  = "SELECT p.*, c.nombre as 'categoria_nombre' FROM productos p";
        $sql .= " INNER JOIN categorias c ON c.id = p.categoria_id";
        $sql .= " WHERE p.categoria_id = {$this->getCategoryId()}";
        $sql .= " ORDER BY id DESC";

        return $this->db->query( $sql );

    }

    public function getRadom( $limit ) {

        return $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");

    }

    /**
     * Get all products from database
     *
     * @return void
     */
    public function getOne() {

        return $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}")->fetch_object();

    }

    public function save() {
        
        $sql    = "INSERT INTO productos VALUES( NULL, {$this->getCategoryId()}, '{$this->getName()}', '{$this->getDescription()}', '{$this->getPrice()}', '{$this->getStock()}', NULL, curdate(), '{$this->getImage()}')";
        $save   = $this->db->query( $sql );
        $result = false;

        if ( $save )
            $result = true;

        return $result;

    }

    public function edit() {

        $sql    = "UPDATE productos SET categoria_id = {$this->getCategoryId()}, nombre = '{$this->getName()}', descripcion = '{$this->getDescription()}', precio = '{$this->getPrice()}', stock = '{$this->getStock()}'";
        
        if ( $this->getImage()  !== null )
            $sql    .= ", imagen = '{$this->getImage()}'";

        $sql    .= " WHERE id = {$this->id}";
        $save   = $this->db->query( $sql );
        $result = false;

        if ( $save )
            $result = true;

        return $result;

    }

    public function delete() {

        $sql        = "DELETE FROM productos WHERE id={$this->id}";
        $delete     = $this->db->query( $sql );
        $result     = false;

        if ( $delete )
            $result = true;

        return $result;

    }

}