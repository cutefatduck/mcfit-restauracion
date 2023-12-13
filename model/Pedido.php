<?php

class Pedido  {

  // Define the properties of the class
  private $pedido_id;
  private $cantidad;
  private $productoJSON;

  public function __construct($pedido_id = null, $cantidad = null) {
    $this->pedido_id = $pedido_id;
    $this->cantidad = $cantidad;
}

  
}