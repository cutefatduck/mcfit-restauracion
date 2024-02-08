<?php

class Comentario {

    protected $comentario_id;
    protected $cliente_id;
    protected $usuario;
    protected $nombre;
    protected $apellido;
    protected $comentario;
    protected $valoracion;


    public function __construct($comentario_id, $cliente_id, $usuario, $nombre, $apellido, $comentario, $valoracion)
    {
        $this->$comentario_id = $comentario_id;
        $this->$cliente_id = $cliente_id;
        $this->$usuario = $usuario;
        $this->$nombre = $nombre;
        $this->$apellido = $apellido;
        $this->$comentario = $comentario;
        $this->$valoracion = $valoracion;
    }

    


    /**
     * Get the value of comentario_id
     */
    public function getComentarioId()
    {
        return $this->comentario_id;
    }

    /**
     * Set the value of comentario_id
     */
    public function setComentarioId($comentario_id): self
    {
        $this->comentario_id = $comentario_id;

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
     * Get the value of comentario
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set the value of comentario
     */
    public function setComentario($comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get the value of valoracion
     */
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * Set the value of valoracion
     */
    public function setValoracion($valoracion): self
    {
        $this->valoracion = $valoracion;

        return $this;
    }
}
    
?>