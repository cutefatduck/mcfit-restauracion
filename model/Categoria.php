<?php

class Categoria  {

  private $categoria_id;
  private $nombre;


  public function __construct()
  {

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
}

?>