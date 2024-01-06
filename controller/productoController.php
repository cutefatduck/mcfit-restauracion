<?php
include_once 'model/ProductoDAO.php';
class ProductoController {
    public function carta() {

        $allProducts = ProductoDAO::getAllProducts();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelProductos.php';
        include_once 'views/footer.php';
    }


    public function sel() {
        //Inicializamos la session
        session_start();
        if (!isset($_SESSION['sel'])){
            $_SESSION['sel'] = array();
            $id = $_POST['id'];
            $product = ProductoDAO::getProductoByID($id);
            array_push($_SESSION['sel'],$product);
        }else{
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $product = ProductoDAO::getProductoByID($id);
                array_push($_SESSION['sel'],$product);
            }
        }

        if(!isset($_SESSION['cantidad'])){
            $strid = $_POST['id'];
            $id = intval($strid);
            $_SESSION['cantidad'] = array();
            $cantidadId = array($id,1);
            $_SESSION['cantidad'][$id]=1;
        }else{
            $strid = $_POST['id'];
            $id = intval($strid);
            $cantidadId = array($id,1);
            $_SESSION['cantidad'][$id]=1;
        }
        header('Location:'.url.'?controller=producto&action=carta');
    }
    
}
?>