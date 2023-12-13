<?php 

include_once 'config/database.php';
include_once 'Usuario.php';

class UsuarioDAO{

    public static function getUserLogin($usuario,$pass){
        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM CLIENTES WHERE usuario=?");
        $stmt->bind_param("i",$usuario);
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

            if($result->num_rows === 0 ){
                header('Location:'.url.'?controller=user&action=login');
                return 2;
            }else{
                $row = $result->fetch_assoc();
                $passValue = $row['credenciales'];

                if ($pass === $passValue){
                    session_start();
                    $_SESSION['user'] = serialize($usuarioObj);
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
}

?>