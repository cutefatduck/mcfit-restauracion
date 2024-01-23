<?php
include_once 'config/database.php';
include_once 'Comentario.php';

class ComentarioDAO {
    public static function getAllComentarios() {
        $conn = Database::connect(); // Asumiendo que la clase se llama Database y no database

        $stmt = $conn->query("SELECT * FROM COMENTARIOS");

        $comentarios = [];

        while ($row = $stmt->fetch_assoc()) {
            $comentario = [
                'comentario_id' => $row['comentario_id'],
                'cliente_id' => $row['cliente_id'],
                'comentario' => $row['comentario'],
                'valoracion' => $row['valoracion']
            ];

            $comentarios[] = $comentario;
        }

        return $comentarios;
    }
}
?>

