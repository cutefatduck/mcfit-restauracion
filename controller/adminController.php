<?php 

class AdminController{


    public function userDataAdmin(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelAdmin.php';
        include_once 'views/footer.php';
    }

    public function listProductos(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        include_once 'model/ProductoDAO.php';
        $allProducts = ProductoDAO::getAllProducts();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelProductosAdmin.php';
        include_once 'views/footer.php';
    }

    public function eliminarProducto(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
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
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelProductosConAdmin.php';
        include_once 'views/footer.php';
    }

    public function editarConProducto(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
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
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        $id = intval($_POST['id']);
        $nombre = $_POST['nombre'];
        $precio = floatval($_POST['precio']);
        $calorias = intval($_POST['calorias']);
        $proteinas = floatval($_POST['proteinas']);
        $imagen = "";
        if (!empty($_FILES["imagen"]["name"])) {
            $targetDirectory = "assets/img/productos/";
            $targetFile = $targetDirectory . basename($_FILES["imagen"]["name"]);
    
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {
                $imagen = basename($_FILES["imagen"]["name"]);
            }
        } else {
            $imagen = $_POST['imagenDefault'];
        }

        ProductoDAO::updateProducto($id,$nombre,$precio,$calorias,$proteinas,$imagen);

        header('Location:'.url.'?controller=admin&action=listProductos');

        
    }

    public function productonuevo(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();

        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelProductoNew.php';
        include_once 'views/footer.php';

    }

    public function productonuevoInsert(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        $nombre = $_POST['nombre'];
        $precio = floatval($_POST['precio']);
        $calorias = intval($_POST['calorias']);
        $proteinas = floatval($_POST['proteinas']);
        $stock = intval($_POST['stock']);
        $imagen = "";
        $categoria_id = intval($_POST['categoria_id']);

        
        $targetDirectory = "assets/img/productos/";
        $targetFile = $targetDirectory . basename($_FILES["imagen"]["name"]);
    
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {
                $imagen = basename($_FILES["imagen"]["name"]);
                
        }

        ProductoDAO::insertProducto($nombre,$precio,$calorias,$proteinas,$stock,$imagen,$categoria_id);
        header('Location:'.url.'?controller=admin&action=listProductos');
    }
    
    
}




?>