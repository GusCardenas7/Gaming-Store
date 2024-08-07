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
    $sql = "SELECT * FROM banners";
    $result = $con->query($sql);

    $registros = $result->num_rows;

    $numero = rand($min = 1, $max = $registros); 

    $sql = "SELECT archivo FROM banners WHERE id = $numero";
    $result = $con->query($sql);
    $row = $result->fetch_array();
    $banner = $row['archivo']; 
?>

<html>
<head>
    <title>Home</title>
    <style>
        body {
            background: url("imagenes/fondoHome.jpg"); 
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            height: 210vh;
            box-sizing: border-box;
        }

        .letraFooter { 
            color: white;
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
    <br>
    <?php echo "<div align='center'><img src='Admin/imagenes/fotosBanners/$banner' width='600px' height='200px'></div>";?>
    <br>
    <div class="tabla">
        <?php 
            //Estas otras lineas son para obtener los productos, tambien de manera aleatoria
            $sql = "SELECT * FROM productos";
            $result = $con->query($sql);

            $numero = rand($min = 0, $max = 2); 
            $vuelta = 0;

            if($numero % 2 == 0) {
                $sql = "SELECT * FROM productos WHERE stock > 0 ORDER BY stock DESC LIMIT 6";
                $result = $con->query($sql);
                echo "<div class='filas'>";
                while($vuelta < 3) {
                    $row = $result->fetch_array();
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
                
                $vuelta = 0; 
                echo "<div class='filas'>";
                while($vuelta < 3) {
                    $row = $result->fetch_array();
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
            } else {
                $sql = "SELECT * FROM productos WHERE stock > 0 ORDER BY costo ASC LIMIT 6";
                $result = $con->query($sql);
                echo "<div class='filas'>";
                while($vuelta < 3) {
                    $row = $result->fetch_array();
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
                
                $vuelta = 0; 
                echo "<div class='filas'>";
                while($vuelta < 3) {
                    $row = $result->fetch_array();
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
        ?>
    </div>
    <br><br><br>
    <footer align="center" class="letraFooter">Todos los derechos reservados 2022 | Términos y condiciones | Política de privacidad | Redes sociales</footer>
</body>
</html>