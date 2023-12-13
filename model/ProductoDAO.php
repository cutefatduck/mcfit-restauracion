<?php
include_once 'config/database.php';
include_once 'Producto.php';
class ProductoDAO{
    public static function getAllProducts(){
        $conn = database::connect();
        $stmt = $conn->query("SELECT * FROM PRODUCTOS");

        $products = [];

        while ($obj = $stmt->fetch_object('Producto')) {
            $products[] = $obj;
        }
        
        return $products;
    }
    public static function getProductoByID($id){
        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM PRODUCTOS WHERE producto_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();

    
        $conn->close();

        $product = $result->fetch_object('Producto');
        
        return $product;
    
    }
}
?>