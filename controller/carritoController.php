<?php
include_once 'model/ProductoDAO.php';
class CarritoController{
    public function compra(){
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelCarrito.php';
        include_once 'views/footer.php';
    }
}

?>