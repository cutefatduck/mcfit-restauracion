<?php

class Pedido  {

  private $pedido_id;
  private $cliente_id;
  private $productoJSON;
  private $precioTotal;
  private $propina;
  private $fechaPedido;

    public function __construct($pedido_id, $cliente_id, $productoJSON, $precioTotal, $fechaPedido)
    {
        $this->$pedido_id = $pedido_id;
        $this->$cliente_id = $cliente_id;
        $this->$productoJSON = $productoJSON;
        $this->$precioTotal = $precioTotal;
        $this->$fechaPedido = $fechaPedido;
    }

  /**
   * Get the value of pedido_id
   */
  public function getPedidoId()
  {
    return $this->pedido_id;
  }

  /**
   * Set the value of pedido_id
   */
  public function setPedidoId($pedido_id): self
  {
    $this->pedido_id = $pedido_id;

    return $this;
  }

  /**
   * Get the value of cliente_id
   */
  public function getClienteId()
  {
    return $this->cliente_id;
  }

  /**
   * Set the value of cliente_id
   */
  public function setClienteId($cliente_id): self
  {
    $this->cliente_id = $cliente_id;

    return $this;
  }

  /**
   * Get the value of productoJSON
   */
  public function getProductoJSON()
  {
    return $this->productoJSON;
  }

  /**
   * Set the value of productoJSON
   */
  public function setProductoJSON($productoJSON): self
  {
    $this->productoJSON = $productoJSON;

    return $this;
  }

  /**
   * Get the value of precioTotal
   */
  public function getPrecioTotal()
  {
    return $this->precioTotal;
  }

  /**
   * Set the value of precioTotal
   */
  public function setPrecioTotal($precioTotal): self
  {
    $this->precioTotal = $precioTotal;

    return $this;
  }

  /**
   * Get the value of propina
   */
  public function getPropina()
  {
    return $this->propina;
  }

  /**
   * Set the value of propina
   */
  public function setPropina($propina): self
  {
    $this->propina = $propina;

    return $this;
  }

  /**
   * Get the value of fechaPedido
   */
  public function getFechaPedido()
  {
    return $this->fechaPedido;
  }

  /**
   * Set the value of fechaPedido
   */
  public function setFechaPedido($fechaPedido): self
  {
    $this->fechaPedido = $fechaPedido;

    return $this;
  }
    }


