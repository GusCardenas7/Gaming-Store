<?php
    include 'funciones/comprobarSesion.php';
    include 'funciones/menu.php';
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM productos WHERE id = $id";
 
    $res = $con->query($sql);

    $row = $res->fetch_array();
    $imagen = $row["archivo"];
    $nombre = $row["nombre"];
    $codigo = $row["codigo"];
    $descripcion = $row["descripcion"];
    $costo = $row["costo"];
    $stock = $row["stock"];

    echo "<div class='link divALaIzquierda'><a href=\"productos_lista.php\">Regresar al listado</a></div><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 40px;'>Detalles del Producto:</div><br>";
    echo "<HR noshade align='center' style='margin-bottom: 30;'><br><br><br>";

    echo "<div class='card-container'>
            <div class='upper-container'>
                <div class='image-container'>
                <img src='imagenes/fotosProductos/$imagen'/>
                </div>
            </div>
            <div class='lower-container'>
                <div>
                    <h3>$nombre</h3>
                    <h4 style='margin-right: 36px;'>Código:</h4>
                    <p>$codigo</p>
                    <br>
                    <h4 style='margin-right: 5px;'>Descripción:</h4>
                    <p>$descripcion</p>
                    <br>
                    <h4 style='margin-right: 47px;'>Costo:</h4>
                    <p>$$costo</p>
                    <br>
                    <h4 style='margin-right: 47px;'>Stock:</h4>
                    <p>$stock</p>
                    <br>
                </div>
            </div>
        </div>";
?>

  <title>Ver Detalles del Producto</title>
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
        width: 300px;
        height: 400px;
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
        height: 150px;
        background: lightskyblue;
    }
    .image-container {
        background: lightblue;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        padding: 5px;
        transform: translate(100px,100px);
    }
    .image-container img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }
    .lower-container {
        height: 280px;
        background: lightcyan;
        padding: 20px;
        padding-top: 50px;
    }
    .lower-container h3, h4 {
        box-sizing: border-box;
        line-height: .6;
        font-weight: 700;
        text-align: center;
    }
    .lower-container h4 {
        color: black;
        font-weight: bold;
        text-align: left;
        display: inline;
        line-height: 1.5;
    }

    .lower-container p {
        font-size: 16px;
        color: black;
        display: inline;
        font-weight: lighter;
    }
  </style>