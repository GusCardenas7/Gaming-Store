<?php
    session_start();
?>

<html>
<head>
    <title>Carrito01</title>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script>
        function cambiarCantidad(idC, idP) {
            var id = idC;
            var id_P = idP;
            var cantidad = $("#cantidad" + id).val();
            if(id && cantidad && id_P) {
                $.ajax ({
                    url     : 'cambiar_cantidad.php',
                    type    : 'post',
                    datatype : 'text',
                    data    : {'id' : id, 'idP' : id_P, 'cantidad' : cantidad},
                    success : function(res) {
                        window.location.href = "carrito_paso01.php";
                    },error: function() {
                        alert('Error archivo no encontrado...');
                    }
                });
            } else {
                $('#mensaje').html('Ha ocurrido un error');
            }
        }

        function eliminar(idE, idP) {
            var id = idE;
            var id_P = idP;
            if(id && id_P) {
                $.ajax ({
                    url     : 'eliminar_producto.php',
                    type    : 'post',
                    datatype : 'text',
                    data    : {'id' : id, 'idP' : id_P},
                    success : function(res) {
                        alert(res);
                        if(res == 1) {
                            window.location.href = "index.php";
                        } else {
                            window.location.href = "carrito_paso01.php";
                        }
                    },error: function() {
                        alert('Error archivo no encontrado...');
                    }
                });
            } else {
                $('#mensaje').html('Ha ocurrido un error');
            }
        }

        function paso2() {
            window.location.href = "carrito_paso02.php";
        }
    </script>
    <style>
        body {
            background: url("imagenes/carrito.jpg"); 
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
            width: 1200px;
            margin: auto;
            border: 2px solid black;
            color: white;
        }

        .encabezado {
            display: table-row;
            text-align: center;
            line-height: 50px;
            font-weight: bold;
            height: 50px;
            background-color: red;
        }

        .filas {
            display: table-row;
            border: 2px solid black;
            background-color: lightcoral;
        }

        .celdas {
            display: table-cell;
            border: 2px solid black;
            text-align: center;
            vertical-align: middle;
            width: 20%;
        }

        h2 {
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

        #mensaje {
            color: #F00;
            font-size: 18px;
            font-weight: bold;
            width: 400px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            margin:15px auto;
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
    <div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Carrito</div><br>
    <HR noshade align='center'><br>
    <?php 
        if(isset($_SESSION['nombreC']) && !empty($_SESSION['nombreC'])){
            $nombre = $_SESSION['nombreC'];
            require 'funciones/conecta.php';
            $con = conecta();
            $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
            $result = $con->query($sql);
            $registros = $result->num_rows;
            if($registros == 0) {
                echo "<h2>Ningún pedido abierto, agregue productos a su carrito...</h2>";
            } else {
                echo "<h3 style='margin-left: 3%;'>Paso 1/2</h3>";
                echo "<div class='tabla'>
                    <div class='encabezado'>
                        <div class='celdas'>Producto</div>
                        <div class='celdas'>Cantidad</div>
                        <div class='celdas'>Costo unitario</div>
                        <div class='celdas'>Subtotal</div>
                        <div class='celdas'>Eliminar Producto</div>
                    </div>";
                    $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
                    $result2 = $con->query($sql);
    
                    $registros2 = $result2->num_rows;
                    $row = $result2->fetch_array();
                    $id_pedido = $row['id'];
                    $sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $id_pedido";
                    $res = $con->query($sql);
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
                            $stock = $row2['stock'];
                            $total += $subtotal;
                            echo "<div class='filas' id='tr$id_producto'>
                                <div class='celdas'>$nombre</div>
                                <div class='celdas'>
                                <select name='cantidad' id='cantidad$id_producto' style='background-color: lightcoral; color: white;' onchange='cambiarCantidad($id_producto, $id_pedido)'>";
                                foreach (range(1, $stock) as $num):
                                    if($num == $cantidad) {
                                        echo "<option value='$num' selected>$num</option>";
                                        $num++;
                                    } else {
                                        echo "<option value='$num'>$num</option>";
                                    }
                                endforeach;
                                
                            echo "</select>
                            </div>
                                <div class='celdas'>$$costo</div>
                                <div class='celdas'>$$subtotal</div>
                                <div class='celdas'><a href=\"javascript:eliminar($id_producto, $id_pedido);\">Eliminar</a></div>
                            </div>";
                        }
                        echo "<div class='filas'>
                                <div class='celdas'></div>
                                <div class='celdas'></div>
                                <div class='celdas'></div>
                                <div class='celdas' style='font-weight: bold;'>$$total</div>
                                <div class='celdas'></div>
                            </div>";
                echo "</div>
                <br>
                <input type='submit' style='background-color: lightcoral; color: white; margin-left: 3%;' value='Continuar' onclick='paso2()'>
                <div id='mensaje'></div>";
            }
        } else {
            echo "<h2>Inicie sesión para agregar productos al carrito...</h2>";
        } 
    ?>
    <br><br>
    <footer align="center" class="letraFooter">Todos los derechos reservados 2022 | Términos y condiciones | Política de privacidad | Redes sociales</footer>
    <br>
</body>
</html>