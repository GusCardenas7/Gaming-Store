<?php
    session_start();
    unset($_SESSION['idUC']);
    unset($_SESSION['nombreC']);
    unset($_SESSION['correoC']);
    header("Location: ../index.php");
?>