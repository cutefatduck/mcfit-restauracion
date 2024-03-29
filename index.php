<?php
include_once "config/parameters.php";
include_once "controller/productoController.php";
include_once "controller/indexController.php";
include_once "controller/usuarioController.php";
include_once "controller/carritoController.php";
include_once "controller/pedidoController.php";
include_once "controller/adminController.php";

if (!ISSET ($_GET['controller'])){
    //si no se pasa nada, se mostrara pagina principal de la web:
    header("Location:".url.'?controller=index');

}else{

   $nombre_controller=$_GET['controller'].'Controller';

   if (class_exists($nombre_controller)){

        //Miramos si nos pasa una accion, en caso contrario, mostramos acción por defecto

        $controller = new $nombre_controller();

        if (ISSET($_GET['action']) && method_exists($controller,$_GET['action'])){

            $action = $_GET['action'];
        }else{

            $action = action_default;
        }

        $controller->$action();

    }else{

        header("Location:".url.'?controller=index');
    }
}
?>