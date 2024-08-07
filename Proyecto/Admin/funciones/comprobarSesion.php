<?php
    session_start();
    if(!isset($_SESSION['correo'])) {
        header("Location: index.php");
        session_destroy();
        die();
    }
?>