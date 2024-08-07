<?php
    session_start();
    if(isset($_SESSION['nombreC']) && !empty($_SESSION['nombreC'])){
        $nombre = $_SESSION['nombreC'];
    } else {
        $nombre = '';
    }
    require 'funciones/conecta.php';
    $con = conecta();
    //Estas lineas son para obtener el banner aleatoriamente
    $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 AND stock > 0";
    $result = $con->query($sql);

    $registros = $result->num_rows;
?>

<html>
<head>
    <title>Productos</title>
    <style>
        body {
            background: url("imagenes/fondoProductos.jpg"); 
            background-size: cover;
            background-repeat: repeat;
            margin: 0;
            height: 100vh;
            box-sizing: border-box;
        }

        .letraFooter { 
            color: black;
        }

        .tabla {
            display: table;
            width: 1000px;
            height: 600px;
            margin: auto;
        }

        .filas {
            display: table-row;
        }

        .celdas {
            display: table-cell;
        }

        h3 {
            color: black;
            text-align: center;
            font-weight: bold;
            line-height: .6;
        }

        p {
            font-size: 16px;
            color: black;
            text-align: center;
            font-weight: lighter;
            line-height: .6;
        }

        .links {
            color: black;
            font-weight: bold;
        }

        .links:hover {
            color: red;
        }

        .links:active {
            color: blue;
        }

        .barraRoja {
            background-color: red;
            border: 0;
            height: 5px;
            position: relative;
            left: 0;
            top: 0;
            width: 100%;
            animation: animar_roja 2s ease-in;
        }

        @keyframes animar_roja {
        from {
            width: 0%;
        }

        to {
            width: 100%;
        }
        }
    </style>
</head>
<body>
    <header>
        <hr class='barraRoja'>
        <?php 
            include 'funciones/menu.php'; 
        ?>
        <hr class='barraRoja'>
    </header>
    <div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Productos</div><br>
    <HR noshade align='center'><br>
    <div class="tabla">
        <?php  
            for($x = 0; $x < $registros; $x++) {
                if($x % 3 == 0) {
                    $vuelta = 0;
                    echo "<div class='filas'>";
                    while($vuelta < 3 && $row = $result->fetch_array()) {
                        $id = $row['id'];
                        $imagen = $row['archivo'];
                        $nombre = $row['nombre'];
                        $codigo = $row['codigo'];
                        $costo = $row['costo'];
                        $stock = $row['stock'];
                        echo "<div class='celdas' align='center'><br><br><img src='Admin/imagenes/fotosProductos/$imagen' width='180px' height='200px'>
                            <h3><a href=\"producto_detalle.php?id=$id\" class='links'>$nombre</a></h3>
                            <p>Código: $codigo</p> 
                            <p>$$costo</p>
                            <form action='agrega_producto.php' method='POST' name='forma01'>";
                                $sql2 = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
                                $result2 = $con->query($sql2);
                                $numeroDeRegistros = $result2->num_rows;
                                if($numeroDeRegistros > 0) {
                                    $row2 = $result2->fetch_array();
                                    $id_pedido = $row2['id'];
                                    echo "<input type='hidden' name='id_pedido' id='id_pedido' value='$id_pedido'>";
                                }
                                echo "<input type='hidden' name='id' id='id' value='$id'>
                                <input type='hidden' name='nombre' id='nombre' value='$nombre'>
                                <input type='hidden' name='costo' id='costo' value='$costo'>
                                <input type='submit' style='background-color: lightcoral; color: white; margin-left: 20px;' value='Comprar'>
                                <select name='cantidad' id='cantidad' style='background-color: lightcoral; color: white;'>";
                                    foreach (range(1, $stock) as $num):
                                    echo "<option value='$num'>$num</option>";
                                    endforeach;
                                echo "</select>
                            </form>
                        </div>";
                        $vuelta++;
                    }
                    echo "</div>";
                }
            }
        ?>
    </div>
    <br><br>
    <footer align="center" class="letraFooter">Todos los derechos reservados 2022 | Términos y condiciones | Política de privacidad | Redes sociales</footer>
    <br>
</body>
</html>