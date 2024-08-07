<?php
    include 'funciones/comprobarSesion.php';
    include 'funciones/menu.php';
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM banners WHERE id = $id";
 
    $res = $con->query($sql);

    $row = $res->fetch_array();
    $imagen = $row["archivo"];
    $nombre = $row["nombre"];

    echo "<div class='link divALaIzquierda'><a href=\"banners_lista.php\">Regresar al listado</a></div><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 40px;'>Detalles del Banner:</div><br>";
    echo "<HR noshade align='center' style='margin-bottom: 30;'><br><br><br>";

    echo "<div class='card-container'>
            <div class='upper-container'><img src='imagenes/fotosBanners/$imagen' width='600' height='200'/></div>
            <div class='lower-container'>$nombre</div>
        </div>";
?>

  <title>Ver Detalles del Banner</title>
  <style>
    .divALaIzquierda {
        margin: 2% 0px 0px 5%;
    }

    body {
      background: url("imagenes/fondoDetalle.jpg"); 
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      height: 100vh;
      box-sizing: border-box;
    }

    a {
        color: black;
        font-weight: bold;
    }

    a:hover {
        color: blue;
    }

    a:active {
        color: red;
    }

    .card-container {
        width: 600px;
        height: 250px;
        background: #FFF;
        border-radius: 6px;
        position: sticky;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-10%);
        box-shadow: 0px 1px 10px 1px #000;
        overflow: hidden;
        display: inline-block;
    }
    
    .upper-container {
        height: 200px;
        background: lightskyblue;
    }

    .lower-container {
        height: 50px;
        background: lightcyan;
        text-align: center;
        font-weight: bold;
        line-height: 2;
        font-size: 25px;
    }
  </style>