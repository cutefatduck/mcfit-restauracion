<?php
include_once 'config/database.php';
include_once 'Pedido.php';
class PedidoDAO{

    public static function setPedido($cliente_id,$jsonString,$total,$time){
        $conn = database::connect();
        $stmt = $conn->prepare("INSERT INTO PEDIDOS (cliente_id,productos,precio,fecha) VALUES(?,?,?,?)");
        $stmt->bind_param("isds",$cliente_id,$jsonString,$total,$time);
        $stmt->execute();
        echo $stmt->error;
        $stmt->close();
        $conn->close();

        unset($_SESSION['sel']);
        unset($_SESSION['cantidad']);
    }

}