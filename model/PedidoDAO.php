<?php
include_once 'config/database.php';
include_once 'Pedido.php';
class PedidoDAO{

    public static function setPedido($cliente_id,$jsonString,$total,$propina,$time){
        $conn = database::connect();
        $stmt = $conn->prepare("INSERT INTO PEDIDOS (cliente_id,productos,precio,propina,fecha) VALUES(?,?,?,?,?)");
        $stmt->bind_param("isdds",$cliente_id,$jsonString,$total,$propina,$time);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        unset($_SESSION['sel']);
        unset($_SESSION['cantidad']);
    }


}