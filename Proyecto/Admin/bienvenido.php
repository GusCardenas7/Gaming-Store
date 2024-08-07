<?php
    include 'funciones/comprobarSesion.php';
    echo "<title>Bienvenido</title>";
    echo "<hr class='barraSkyBlue'>";
    include 'funciones/menu.php';
    echo "<hr class='barraSkyBlue'>";

    echo "<div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Bienvenid@ al Sistema de Administración...</div><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 20px; margin-top: 10;'>......</div><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 20px; margin-top: 10;'>......</div><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 20px; margin-top: 10;'>......</div><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 20px; margin-top: 10;'>......</div><br>";
?>

<style>
    body {
        background-image: url("imagenes/fondoBienvenido.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        height: 100vh;
    }

    .barraSkyBlue {
    background-color: blue;
    border: 0;
    height: 5px;
    position: relative;
    left: 0;
    top: 0;
    width: 100%;
    animation: animar_skyBlue 2s ease-in;
    }

    @keyframes animar_skyBlue {
    from {
        width: 0%;
    }

    to {
        width: 100%;
    }
    }
</style>