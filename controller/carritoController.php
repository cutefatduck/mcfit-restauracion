<?php
include_once 'model/ProductoDAO.php';
class CarritoController{
    public function compra(){
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelCarrito.php';
        include_once 'views/footer.php';
        session_start();
    }

    public function vaciarcarrito() {
        session_start();
        if(isset($_SESSION['sel'])){
            unset($_SESSION['sel']);
            unset($_SESSION['cantidad']);
            header('Location:'.url.'?controller=carrito&action=compra');
        }else{
            header('Location:'.url.'?controller=carrito&action=compra');
        }
            
    }

    public function addcantidad(){
        session_start();
        $strid = $_POST['add'];
        $id = intval($strid);
        var_dump($id);
        if(isset($_SESSION['cantidad'])){
            $_SESSION['cantidad'][$id] += 1;
            header('Location:'.url.'?controller=carrito&action=compra');
        }else{
            header('Location:'.url.'?controller=carrito&action=compra');
        }
    }
    public function delcantidad(){
        session_start();
        $strid = $_POST['del'];
        $id = intval($strid);
        if(isset($_SESSION['cantidad'])){
            if($_SESSION['cantidad'][$id]<=1){
                $indexDel= -1;
                foreach ($_SESSION['sel'] as $index => $object) {
                    if ($object->getProductoId() === $id) {
                        $indexDel=$index;
                    }
                }
                if ($indexDel !== false) {
                    unset($_SESSION['sel'][$indexDel]);
                
                    // Reset array keys
                    $_SESSION['sel'] = array_values($_SESSION['sel']);
                }
                header('Location:'.url.'?controller=carrito&action=compra');
                
            }else{
                $_SESSION['cantidad'][$id] -= 1;
                header('Location:'.url.'?controller=carrito&action=compra');
            }
        }else{
            header('Location:'.url.'?controller=carrito&action=compra');
        }
    }

}

?>