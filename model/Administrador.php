<?php
include_once 'Usuario.php';
class Administrador extends Usuario{
    private $actions;

    // Define the constructor of the class
    public function __construct() {

    }


    /**
     * Get the value of actions
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Set the value of actions
     */
    public function setActions($actions): self
    {
        $this->actions = $actions;

        return $this;
    }
}

?>