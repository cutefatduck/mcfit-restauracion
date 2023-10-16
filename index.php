<?php
include_once 'controller/pedidoController.php';

if(isset($_GET[$controller])){
    //Si no se pasa nada, se mostrara pagina principal de pedidos
}else{
    $nombre_controller = $_GET['controller'].'Controller';

    if (class_exists($nombre_controller)) {
        echo 'Quieres visualizar una acción de '. $nombre_controller;

    }else{
        echo $nombre_controller .' NO EXISTE';
    }
}


?>