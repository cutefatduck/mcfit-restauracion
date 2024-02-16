<?php
include_once 'config/database.php';
include_once 'Comentario.php';

class ComentarioDAO {
    public static function getAllComentarios() {
        $conn = Database::connect();

        $stmt = $conn->query("SELECT a.comentario_id, a.cliente_id, b.usuario, b.nombre, b.apellidos, a.comentario, a.valoracion FROM COMENTARIOS a LEFT JOIN CLIENTES b ON a.cliente_id = b.cliente_id");

        $comentarios = [];

        while ($row = $stmt->fetch_assoc()) {
            $comentario = [
                'comentario_id' => $row['comentario_id'],
                'cliente_id' => $row['cliente_id'],
                'usuario' => $row['usuario'],
                'nombre' => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'comentario' => $row['comentario'],
                'valoracion' => $row['valoracion']
            ];

            $comentarios[] = $comentario;
        }

        return $comentarios;
    }

    public static function setComentarios($cliente_id,$comentario,$valoracion){
        $conn = database::connect();
        $stmt = $conn->prepare("INSERT INTO COMENTARIOS(cliente_id, comentario, valoracion) VALUES (?, ?, ?)");
        $stmt->bind_param("isi",$cliente_id,$comentario,$valoracion);
        $stmt->execute();
        $stmt->close();
        $conn->close();

    }
}
?>

