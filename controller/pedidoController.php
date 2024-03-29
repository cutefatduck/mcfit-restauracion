<?php
include_once 'model/PedidoDAO.php';
class PedidoController {
    public function trampedido() {
        session_start();
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        $jsonArray = [];
        foreach ($_SESSION['sel'] as $producto) {
            
            $jsonArray[] = [
                'producto_id' => $producto->getProductoId(),
                'cantidad' => $_SESSION['cantidad'][$producto->getProductoId()]
            ];
        }

        $jsonString = json_encode($jsonArray, JSON_UNESCAPED_UNICODE);
        $cliente_id = $_SESSION['user']->getClienteId();
        $time = date("YmdHi");
        $total= $_SESSION['cantidad']['total'];

        $cookie = [$cliente_id,$jsonString,$time,$total];
        $serializedCookie = serialize($cookie);
        setcookie("pedido", $serializedCookie, time()+3600, "/"); 
        
        PedidoDAO::setPedido($cliente_id,$jsonString,$total,$time);

        header('Location:'.url.'?controller=user&action=userData');

    }

    
}
?>