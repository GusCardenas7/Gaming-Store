<?php
    session_start();
    unset($_SESSION['idU']);
    unset($_SESSION['nombre']);
    unset($_SESSION['correo']);
    header("Location: ../index.php");
?>