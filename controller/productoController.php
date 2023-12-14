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
        echo $_SESSION['sel'];
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
        header('Location:'.url.'?controller=producto&action=carta');
    }
    
}
?>