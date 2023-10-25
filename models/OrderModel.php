<?php

class OrdertModel {

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;


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
     * Get the value of usuario_id
     */
    public function getUserId()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     */
    public function setUserId($usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of provincia
     */
    public function getProvince()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     */
    public function setProvince($provincia): self
    {
        $this->provincia = $this->db->real_escape_string( $provincia );

        return $this;
    }

    /**
     * Get the value of localidad
     */
    public function getLocation()
    {
        return $this->localidad;
    }

    /**
     * Set the value of localidad
     */
    public function setLocation($localidad): self
    {
        $this->localidad = $this->db->real_escape_string( $localidad );

        return $this;
    }

    /**
     * Get the value of direccion
     */
    public function getAddress()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     */
    public function setAddress($direccion): self
    {
        $this->direccion = $this->db->real_escape_string( $direccion );

        return $this;
    }

    /**
     * Get the value of coste
     */
    public function getCost()
    {
        return $this->coste;
    }

    /**
     * Set the value of coste
     */
    public function setCost($coste): self
    {
        $this->coste = $coste;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getState()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setState($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getDate()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setDate($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */
    public function getHour()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     */
    public function setHour($hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get all products from database
     *
     * @return void
     */
    public function getAll() {

        return $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");

    }

    /**
     * Get all products from database
     *
     * @return void
     */
    public function getOne() {

        return $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}")->fetch_object();

    }

    /**
     * Get all products from database
     *
     * @return void
     */
    public function getOneByUser() {

        $sql = "SELECT id, coste FROM pedidos";
        $sql .= " WHERE usuario_id = {$this->getUserId()} ORDER BY id DESC LIMIT 1";

        return $this->db->query( $sql )->fetch_object();

    }

    /**
     * Get all products from database
     *
     * @return void
     */
    public function getAllByUser() {

        $sql = "SELECT * FROM pedidos";
        $sql .= " WHERE usuario_id = {$this->getUserId()} ORDER BY id DESC";

        return $this->db->query( $sql );

    }


    public function getProductByOrder( $id ): object {

        $sql = "SELECT pr.*, lp.unidades FROM productos pr";
        $sql .= " INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id";
        $sql .= " WHERE pedido_id = {$id}";



        /* var_dump($sql);
        die; */

        return $this->db->query( $sql );

    }

    public function save() {
        
        $sql    = "INSERT INTO pedidos VALUES( NULL, {$this->getUserId()}, '{$this->getProvince()}', '{$this->getLocation()}', '{$this->getAddress()}', {$this->getCost()}, 'confirm', curdate(), curtime())";
        $save   = $this->db->query( $sql );
        $result = false;

        if ( $save )
            $result = true;

        return $result;

    }

    public function saveLine() {

        $cart = $_SESSION['cart'];
        $endCart = end( $cart );
        $order_id   = $this->db->query( "SELECT LAST_INSERT_ID() as 'order_id'" )->fetch_object()->order_id;


        $sql = "INSERT INTO lineas_pedidos VALUES";

        foreach ($cart as $key => $item) {
           
            $product = $item['product'];

            if ( $item !== $endCart ) 
                $sql .= "( NULL, {$order_id}, {$product->id}, {$item['amount']} ),";
            
            else
                $sql .= "( NULL, {$order_id}, {$product->id}, {$item['amount']} )";

        }

        $save   = $this->db->query( $sql );

        $result = false;

         if ( $save )
            $result = true;

        return $result;

    }


    public function updateOne() {

        $sql    = "UPDATE pedidos SET estado = '{$this->getState()}' ";
        $sql    .= " WHERE id = {$this->getId()}";

        $save   = $this->db->query( $sql );
        $result = false;

        if ( $save )
            $result = true;

        return $result;

    }


}