<?php
    include 'funciones/comprobarSesion.php';
    include 'funciones/menu.php';
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $id";
 
    $res = $con->query($sql);
    
    echo "<div class='link divALaIzquierda'><a href=\"pedidos_lista.php\">Regresar al listado</a></div><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 40px;'>Detalles del Pedido:</div><br>";
    echo "<HR noshade align='center' style='margin-bottom: 30;'><br><br><br>";

    echo "<div class='tabla'>
        <div class='encabezado'>
            <div class='celdas'>Producto</div>
            <div class='celdas'>Cantidad</div>
            <div class='celdas'>Costo unitario</div>
            <div class='celdas'>Subtotal</div>
        </div>";
                $total = 0;
                while($row = $res->fetch_array()){
                    $id_producto = $row["id_producto"];
                    $cantidad = $row['cantidad'];
                    $costo = $row['precio'];
                    $subtotal = $costo * $cantidad;
                    
                    $sql = "SELECT * FROM productos WHERE id = $id_producto";
                    $res2 = $con->query($sql);
                    $row2 = $res2->fetch_array();
                    $nombre = $row2['nombre'];
                    $total += $subtotal;
                    echo "<div class='filas'>
                        <div class='celdas'>$nombre</div>
                        <div class='celdas'>$cantidad</div>
                        <div class='celdas'>$$costo</div>
                        <div class='celdas'>$$subtotal</div>
                    </div>";
                }
                echo "<div class='filas'>
                        <div class='celdas'></div>
                        <div class='celdas'></div>
                        <div class='celdas'></div>
                        <div class='celdas' style='font-weight: bold;'>Total: $$total</div>
                    </div>";
        echo "</div>
        <br><br>";
?>

  <title>Ver Detalles del Pedido</title>
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

    .filas {
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