<?php
include_once 'model/PedidoDAO.php';
class PedidoController {
    public function trampedido() {
        session_start();
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        if(isset($_SESSION['sel'])){
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
            $propinaArray = $_SESSION['cantidad']['propina'];
            $propinaStr = $propinaArray['propina'];
            $propina = floatval($propinaStr);

            $totalP = $total * ($propina + 1);
            $cookie = [$cliente_id,$jsonString,$time,$totalP,$propina];
            $serializedCookie = serialize($cookie);
            setcookie("pedido", $serializedCookie, time()+3600, "/"); 
            
            
            PedidoDAO::setPedido($cliente_id,$jsonString,$totalP,$propina,$time);

            header('Location:'.url.'?controller=pedido&action=revisionpedido');

        }else{
            header('Location:'.url.'?controller=index');
        }
        

    }

    public function revisionpedido() {
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';

        include_once 'views/panelRevisionPedido.php';
        include_once 'views/footer.php';

    }

    
    
}
?>