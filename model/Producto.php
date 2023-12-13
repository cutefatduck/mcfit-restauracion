<?php

class Producto  {

  // Define the properties of the class
  private $producto_id;
  private $nombre;
  private $precio;
  private $stock;
  private $imagen;
  private $calorias;
  private $proteinas;
  private $categoria_id;


  // Define the constructor of the class
  public function __construct() {
  }
  

  /**
   * Get the value of producto_id
   */
  public function getProductoId()
  {
    return $this->producto_id;
  }

  /**
   * Set the value of producto_id
   */
  public function setProductoId($producto_id): self
  {
    $this->producto_id = $producto_id;

    return $this;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   */
  public function setNombre($nombre): self
  {
    $this->nombre = $nombre;

    return $this;
  }

  /**
   * Get the value of precio
   */
  public function getPrecio()
  {
    return $this->precio;
  }

  /**
   * Set the value of precio
   */
  public function setPrecio($precio): self
  {
    $this->precio = $precio;

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
    $this->stock = $stock;

    return $this;
  }

  /**
   * Get the value of imagen
   */
  public function getImagen()
  {
    return $this->imagen;
  }

  /**
   * Set the value of imagen
   */
  public function setImagen($imagen): self
  {
    $this->imagen = $imagen;

    return $this;
  }

  /**
   * Get the value of calorias
   */
  public function getCalorias()
  {
    return $this->calorias;
  }

  /**
   * Set the value of calorias
   */
  public function setCalorias($calorias): self
  {
    $this->calorias = $calorias;

    return $this;
  }

  /**
   * Get the value of proteinas
   */
  public function getProteinas()
  {
    return $this->proteinas;
  }

  /**
   * Set the value of proteinas
   */
  public function setProteinas($proteinas): self
  {
    $this->proteinas = $proteinas;

    return $this;
  }

  /**
   * Get the value of categoria_id
   */
  public function getCategoriaId()
  {
    return $this->categoria_id;
  }

  /**
   * Set the value of categoria_id
   */
  public function setCategoriaId($categoria_id): self
  {
    $this->categoria_id = $categoria_id;

    return $this;
  }
}