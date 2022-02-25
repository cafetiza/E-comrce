<?php

class Carrito
{
    private $id;
    private $usuario_id;
    /* private $imagen; */
    private $producto_id;
    private $coste;
    private $unidades;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getUsuario_id()
    {
        return $this->usuario_id;
    }

    function getProducto_id()
    {
        return $this->producto_id;
    }

    function getCoste()
    {
        return $this->coste;
    }

    function getUnidades()
    {
        return $this->unidades;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    function setProducto_id($producto_id)
    {
        $this->producto_id = $producto_id;
    }

    function setCoste($coste)
    {
        $this->coste = $coste;
    }

    function setUnidades($unidades)
    {
        $this->unidades = $unidades;
    }

    public function save(){
		$sql = "INSERT INTO carrito VALUES(NULL,'{$this->getUsuario_id()}','{$this->getProducto_id()}','{$this->getCoste()}',{$this->getUnidades()});";
		$carrito = $this->db->query($sql);

        return $carrito;
	}

    public function deleteAllByUsuario($id){
        $sql = "DELETE FROM carrito WHERE usuario_id={$id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

    public function deleteOneByProduct($producto_id){
        $sql = "DELETE FROM carrito WHERE producto_id={$producto_id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
    
    public function getOne($producto_id)
    {
        $sql = "SELECT * FROM carrito "
			."WHERE producto_id = {$producto_id}";
			
            $carrito = $this->db->query($sql);
		
		return $carrito;
    }

    public function getAllByUser($id)
    {
        $sql = "SELECT * FROM carrito "
            ."INNER JOIN productos ON carrito.producto_id = productos.id "
			."WHERE  carrito.usuario_id = {$id}";
			
            $carritoByUser = $this->db->query($sql);
		
		return $carritoByUser;
    }

    public function update($unidades,$producto_id){
        $sql = "UPDATE carrito SET unidades={$unidades} WHERE producto_id={$producto_id};";
		$carrito = $this->db->query($sql);
		
		return $carrito;
    }

}
