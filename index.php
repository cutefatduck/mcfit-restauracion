<?php
include_once "config/parameters.php";
include_once "controller/productoController.php";
include_once "controller/indexController.php";
include_once "controller/usuarioController.php";
include_once "controller/carritoController.php";

if (basename($_SERVER['PHP_SELF']) !== 'index.php') {
    header("Location:".url.'?controller=index&action=index');
    exit();
}

// Lista de controladores disponibles
$controllers = [
    'producto' => 'productoController',
    'index' => 'indexController',
    'user' => 'userController',
    'carrito' => 'carritoController'
];

// Verifica si se proporciona un controlador válido, de lo contrario redirige al controlador por defecto
$nombre_controller = isset($_GET['controller']) && array_key_exists($_GET['controller'], $controllers) ? $_GET['controller'] : 'index';
$controller_class = $controllers[$nombre_controller];

// Verifica si la clase del controlador existe
if (class_exists($controller_class)) {
    $controller = new $controller_class();

    // Verifica si se proporciona una acción válida, de lo contrario usa una acción por defecto
    $action = isset($_GET['action']) && method_exists($controller, $_GET['action']) ? $_GET['action'] : 'index';

    // Llama a la acción del controlador
    $controller->$action();
} else {
    header("Location:".url.'?controller=index');
}
?>