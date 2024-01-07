<?php 

class AdminController{


    public function userDataAdmin(){
        
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelAdmin.php';
        include_once 'views/footer.php';
    }

    public function listProductos(){
        include_once 'model/ProductoDAO.php';
        $allProducts = ProductoDAO::getAllProducts();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelProductosAdmin.php';
        include_once 'views/footer.php';
    }

    public function eliminarProducto(){
        if(isset($_POST['id'])){
            if(isset($_POST['con']) && $_POST['con']==="1"){
                $id=intval($_POST['id']);
                ProductoDAO::delProducto($id);
                header('Location:'.url.'?controller=admin&action=listProductos');
            }else{
                header('Location:'.url.'?controller=admin&action=listProductos');
            }
        }else{
            header('Location:'.url.'?controller=admin&action=listProductos');
        }
        
        
    }

    public function eliminarConProducto(){
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelProductosConAdmin.php';
        include_once 'views/footer.php';
    }

    public function editarConProducto(){
        $nombre = "";
        $precio = "";
        $calorias = "";
        $proteinas = "";
        $imagen = "";

        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $producto = ProductoDAO::getProductoByID($id);
            $nombre = $producto->getNombre();
            $precio = $producto->getPrecio();
            $calorias = $producto->getCalorias();
            $proteinas = $producto->getProteinas();
            $imagen = $producto->getImagen();
        }
        
        
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelProductoEdit.php';
        include_once 'views/footer.php';
    }

    public function productodoupdate(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $calorias = $_POST['calorias'];
        $proteinas = $_POST['proteinas'];
        $imagen = "";
        if(!$_POST['imagen']){
            $imagen = $_POST['imagenDefault'];
        }else{
            $imagen = $_POST['imagen'];
        }
        
        ProductoDAO::updateProducto($id,$nombre,$precio,$calorias,$proteinas,$imagen);
    }
    
}




?>