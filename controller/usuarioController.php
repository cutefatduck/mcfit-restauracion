<?php
include_once 'model/UsuarioDAO.php';
class UserController {
    public function login(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionFull();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelLogin.php';
        include_once 'views/footer.php';   

    }

    public function dologin(){
        session_start();
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];
        UsuarioDAO::getUserLogin($usuario,$pass);
    }

    public function loginadmin(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionFull();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelLoginAdmin.php';
        include_once 'views/footer.php';   

    }

    public function dologinadmin(){
        session_start();
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];
        UsuarioDAO::getAdminLogin($usuario,$pass);
    }

    public function register(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionFull();
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelRegister.php';
        include_once 'views/footer.php';   

    }

    public function doregister(){
        session_start();
        $usuario = $_POST['user'];
        $passw = $_POST['passw'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['tel'];
        UsuarioDAO::setUserRegister($usuario,$passw,$nombre,$apellidos,$email,$direccion,$telefono);
    }


    public function userData(){
        include_once 'config/protected.php';
        ProtectedFunc::sessionEmpty();
        $userObj = $_SESSION['user'];
        $usuario = $userObj->getUsuario();
        $email = $userObj->getEmail();
        $nombre = $userObj->getNombre();
        $apellidos = $userObj->getApellidos();
        $direccion = $userObj->getDireccion();
        $telefono = $userObj->getTelefono();

        #COOKIE ULTIMO PEDIDO
        if (isset($_COOKIE["pedido"])) {
            include_once 'model/Producto.php';
            $serializedPedido = $_COOKIE["pedido"];
            $pedido = unserialize($serializedPedido);

            /*Date Format*/
            $dateObj = DateTime::createFromFormat('YmdHi', $pedido[2]);
            $formattedDate = $dateObj->format('H:i m/d/Y');
            $productosArray = json_decode($pedido[1]);
            /*Precio*/
            $precioTotal = $pedido[3];
            include_once 'model/ProductoDAO.php';
    
            $productshow = [];
            $i = 0;
            foreach ($productosArray as $producto){
                $id = $producto->producto_id;
                $cantidad = $producto->cantidad;
                $productoDef = ProductoDAO::getProductoByID($id);
                $productshow[$i] = [$productoDef,$cantidad];
                $i++;
            }
        }


        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelUsuario.php';
        include_once 'views/footer.php';
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location:".url);
    }

    public function comentario(){
        include_once 'views/meta.php';
        include_once 'views/cabecera.php';
        include_once 'views/panelComentarios.html';
        include_once 'views/footer.php';
    }
}