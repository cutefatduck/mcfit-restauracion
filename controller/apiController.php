<?php
include 'model/ComentarioDAO.php';


class apiController{
    public function mostrarComentario(){
        $comentario = ComentarioDAO::getAllComentarios();
        echo json_encode($comentario, JSON_UNESCAPED_UNICODE);
        return;
    }


    public function recuperarPedido(){

        #COOKIE ULTIMO PEDIDO
        if (isset($_COOKIE["pedido"])) {
            include_once 'model/UsuarioDAO.php';
            include_once 'model/ProductoDAO.php';
            $serializedPedido = $_COOKIE["pedido"];
            $pedido = unserialize($serializedPedido);

            /*Date Format*/
            $productosArray = json_decode($pedido[1]);
            /*Precio*/
            $precioTotal = $pedido[3];
            /*Propina*/
            $propina = $pedido[4];

            $productshow = [];
            $i = 0;
            foreach ($productosArray as $producto){
                $id = $producto->producto_id;
                $cantidad = $producto->cantidad;
                $productoDef = ProductoDAO::getProductoByID($id);
                $productshow[$i] = [$productoDef,$cantidad];
                $i++;
            }

            $usuarioId = $pedido[0];
            $usuario = UsuarioDAO::getClienteNameByID($usuarioId);
        }

        $contenidoQr = "";
        for ($i=0; $i < count($productshow); $i++) { 
            if($i==0){
                $contenidoQr .= "Cliente: ".$usuario."\n";
                $contenidoQr .= "-----------\n";
            }
            $nombreProducto = $productshow[$i][0]->getNombre();
            $precioProducto = $productshow[$i][0]->getPrecio();
            $imgProducto = $productshow[$i][0]->getImagen();
            $cantidad = $productshow[$i][1];
            
            
            $contenidoQr .= "Producto: ".$nombreProducto . "\n";
            $contenidoQr .= "Precio: ".$precioProducto . "\n";
            $contenidoQr .= "Imagen: ".$imgProducto . "\n";
            $contenidoQr .= "Cantidad: ".$cantidad . "\n";
            $contenidoQr .= "-----------\n";

            
        }
        $contenidoQr .= "Propina ".$propina ."\n";
        $contenidoQr .= "Precio Total ".$precioTotal;
        
        echo json_encode($contenidoQr, JSON_UNESCAPED_UNICODE);
        return;
    }

    public function subirComentario() {
        $propina = json_decode(file_get_contents('php://input'), true);
        $usuario = $propina['usuario'];
        $contenido = $propina['contenido'];
        $rating = $propina['rating'];

        ComentarioDAO::setComentarios ($usuario, $contenido, $rating);
    }   

    public function recibirPropina(){
        session_start();
        $propina = json_decode(file_get_contents('php://input'), true);
        $_SESSION['cantidad']['propina'] = $propina;

    }

    public function recogerUserId(){
        session_start();
        if(isset($_SESSION['user'])){
            $usuario = $_SESSION['user']->getClienteId();
            echo json_encode($usuario, JSON_UNESCAPED_UNICODE);
            return;
        }
        return;
    }

    public function getPuntos(){
        session_start();
        if(isset($_SESSION['user'])){
            $usuarioId = $_SESSION['user']->getClienteId();
            $usuario = UsuarioDAO::getClienteByID($usuarioId);
            echo json_encode($usuario->getPuntos(), JSON_UNESCAPED_UNICODE);
            return;
        }
        return;
    }
}
?>