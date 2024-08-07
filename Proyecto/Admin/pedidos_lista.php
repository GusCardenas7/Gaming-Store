<?php
    include 'funciones/comprobarSesion.php';
    include 'funciones/menu.php';
    require "funciones/conecta.php";
    $con = conecta();

    $sql = "SELECT * FROM pedidos WHERE status = 1";
    $res = $con->query($sql);

    echo "<div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Listado de Pedidos Cerrados</div><br>";
    echo "<HR noshade align='center'><br>";

    echo "<div class='tabla'>
        <div class='encabezado'>
            <div class='celdas'>ID</div>
            <div class='celdas'>Fecha</div>
            <div class='celdas'>Usuario</div>
            <div class='celdas'>Ver Detalles del Pedido</div>
        </div>";
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $fecha = $row["fecha"];
                $usuario = $row["usuario"];
                
                echo "<div class='filas2' id='tr$id'>
                    <div class='celdas'>$id</div>
                    <div class='celdas'>$fecha</div>
                    <div class='celdas'>$usuario</div>
                    <div class='celdas'><a href=\"pedidos_detalle.php?id=$id\">Ver detalle</a></div>
                </div>";
            }
    echo "</div>
        <br><br>";
?>

<title>Listado de Pedidos</title>
<style>
    .tabla {
        display: table;
        width: 1200px;
        border: 2px solid black;
        margin: auto;
    }

    .encabezado {
        display: table-row;
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        height: 50px;
        background-color: lightskyblue;
    }

    .filas2 {
        display: table-row;
        border: 2px solid black;
        background-color: lightcyan;
    }

    .celdas {
        display: table-cell;
        border: 2px solid black;
        text-align: center;
        vertical-align: middle;
        width: 25%;
    }

    body {
        background-image: url("imagenes/fondoLista.jpg");
        background-size: cover;
        background-repeat: repeat;
        margin: 0;
        height: 100vh;
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
</style>