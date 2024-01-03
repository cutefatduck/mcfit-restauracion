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
}