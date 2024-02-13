<?php
include_once 'config/database.php';
include_once 'Categoria.php';

class CategoriaDAO{
    public static function getAllCategorias(){
        $conn = database::connect();
        $stmt = $conn->query("SELECT * FROM CATEGORIAS");

        $categorias = [];

        while ($obj = $stmt->fetch_object('Categoria')) {
            $categorias[] = $obj;
        }

        
        return $categorias;
    }
}

?>