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

    public static function getCategoriaByID($id){
        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM PRODUCTOS WHERE producto_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
    }

    public static function delProducto($id){
        $conn = database::connect();
        $stmt = $conn->prepare("DELETE FROM PRODUCTOS WHERE producto_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
    }

    public static function updateProducto($id,$nombre,$precio,$calorias,$proteinas,$imagen){
        $conn = database::connect();
        $stmt = $conn->prepare("UPDATE PRODUCTOS SET nombre = ?, precio = ?, calorias = ?, proteinas = ?, imagen = ? WHERE producto_id = ?");
        $stmt->bind_param("sdidsi",$nombre,$precio,$calorias,$proteinas,$imagen,$id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function insertProducto($nombre,$precio,$calorias,$proteinas,$stock,$imagen,$categoria_id){
        $conn = database::connect();
        $stmt = $conn->prepare("INSERT INTO PRODUCTOS( nombre, precio, calorias, proteinas, stock, imagen, categoria_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdidisi",$nombre,$precio,$calorias,$proteinas,$stock,$imagen,$categoria_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>