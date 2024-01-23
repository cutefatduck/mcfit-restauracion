<?php
include 'model/ComentarioDAO.php';


class apiController{
    public function mostrarComentario(){
        $comentario = ComentarioDAO::getAllComentarios();
        echo json_encode($comentario, JSON_UNESCAPED_UNICODE);
        return;
    }
}
?>