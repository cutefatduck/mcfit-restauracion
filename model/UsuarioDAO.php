<?php 

include_once 'config/database.php';
include_once 'Usuario.php';
include_once 'Administrador.php';

class UsuarioDAO{

    public static function getUserLogin($usuario,$passw){
        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM CLIENTES WHERE usuario=?");
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuarioObj = $result->fetch_object('Usuario');
        if(empty($usuario)){
            header('Location:'.url.'?controller=user&action=login');
            return 2;
        }else{
            

            $clienteid = $usuarioObj->getClienteId();
            $stmt = $conn->prepare("SELECT * FROM CREDENCIALES WHERE cliente_id=?");
            $stmt->bind_param("i",$clienteid);
            $stmt->execute();
            $result = $stmt->get_result();
            $conn->close;

            if($result->num_rows === 0 ){
                header('Location:'.url.'?controller=user&action=login');
                return 2;
            }else{
                $row = $result->fetch_assoc();
                $passwValue = $row['credenciales'];

                if ($passw === $passwValue){
                    session_start();
                    $_SESSION['user'] = $usuarioObj;
                    header('Location:'.url.'?controller=index&action=index');
                    return 3;
                }else{
                    header('Location:'.url.'?controller=user&action=login');
                    return 2;
                }
            }

            return 3;
            
        }

    }

    public static function getAdminLogin($usuario,$passw){
        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM ADMINISTRADORES WHERE usuario=?");
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuarioObj = $result->fetch_object('Administrador');
        if(empty($usuario)){
            header('Location:'.url.'?controller=admin&action=login');
            return 2;
        }else{
        

            $clienteid = $usuarioObj->getClienteId();
            $stmt = $conn->prepare("SELECT * FROM CREDENCIALES WHERE cliente_id=?");
            $stmt->bind_param("i",$clienteid);
            $stmt->execute();
            $result = $stmt->get_result();
            $conn->close;

            if($result->num_rows === 0 ){
                header('Location:'.url.'?controller=admin&action=login');
                return 2;
            }else{
                $row = $result->fetch_assoc();
                $passwValue = $row['credenciales'];

                if ($passw === $passwValue){
                    session_start();
                    $_SESSION['admin'] = $usuarioObj;
                    header('Location:'.url.'?controller=index&action=index');
                    return 3;
                }else{
                    header('Location:'.url.'?controller=admin&action=login');
                    return 2;
                }
            }

            return 3;
            
        }
    }

    public static function setUserRegister($usuario,$passw,$nombre,$apellidos,$email,$direccion,$telefono){

        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM CLIENTES WHERE usuario=?");
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $stmt1 = $conn->prepare("SELECT * FROM CLIENTES WHERE email=?");
        $stmt1->bind_param("s",$email);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $stmt1->close();

        if(!($result->num_rows === 0) && !($result1->num_rows === 0)){
            echo 1;

        }elseif(!($result->num_rows === 0)){
            echo 2;

        }elseif(!($result1->num_rows === 0)){
            echo 3;
            
        }else{

            $stmt = $conn->prepare("INSERT INTO CLIENTES (usuario,nombre,apellidos,email,direccion,telefono) VALUES(?,?,?,?,?,?)");
            $stmt->bind_param("sssssi",$usuario,$nombre,$apellidos,$email,$direccion,$telefono);
            $stmt->execute();
            $cliente_id = $conn->insert_id;

            $admin_id=1;
            $stmt1 = $conn->prepare("INSERT INTO CREDENCIALES (cliente_id,credenciales) VALUES(?,?)");
            $stmt1->bind_param("is",$cliente_id,$passw,);
            $stmt1->execute();
            $stmt1->close();

            $conn->close();

            UsuarioDAO::getUserLogin($usuario,$passw);


        }

    }
}

?>