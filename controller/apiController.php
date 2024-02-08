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
            $usuario = UsuarioDAO::getClienteByID($usuarioId);
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
        $contenidoQr .= "Precio Total ".$precioTotal;
        
        echo json_encode($contenidoQr, JSON_UNESCAPED_UNICODE);
        return;
    }

    public function subirComentario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            if (isset($data['contenido']) && isset($data['usuario'])) {
                $nuevo_comentario = new Comentario($data['contenido'], $data['usuario']);

                if (ComentarioDAO::insertarComentario($nuevo_comentario)) {
                    echo json_encode(array('mensaje' => 'Comentario insertado correctamente'));
                    return;
                } else {
                    echo json_encode(array('error' => 'Error al insertar el comentario'));
                    return;
                }
            } else {
                echo json_encode(array('error' => 'Datos de comentario incompletos'));
                return;
            }
        } else {
            echo json_encode(array('error' => 'Solicitud no permitida'));
            return;
        }
    }
}
?>