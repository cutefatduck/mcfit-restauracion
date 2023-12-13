<?php
session_start();

class ProtectedFunc{
    public static function sessionEmpty(){
        if (!isset($_SESSION['user'])) {
            header('Location:'.url.'?controller=login&action=login');
        }
    }
    
    public static function sessionFull(){
        if (isset($_SESSION['user'])) {
            header('Location:'.url);
        }
    }
}


?>