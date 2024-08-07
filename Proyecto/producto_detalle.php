<?php
    session_start();
    if(isset($_SESSION['nombreC']) && !empty($_SESSION['nombreC'])){
        $nombre = $_SESSION['nombreC'];
    } else {
        $nombre = '';
    }
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM productos WHERE id = $id";
 
    $res = $con->query($sql);

    $row = $res->fetch_array();
    $imagen = $row['archivo'];
    $nombreP = $row['nombre'];
    $codigo = $row['codigo'];
    $costo = $row['costo'];
    $descripcion = $row['descripcion'];
    $stock = $row['stock'];
?>

<html>
<head>
    <title>Ver detalles del producto</title>
    <style>
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
        color: red;
    }

    a:active {
        color: blue;
    }

    .card-container {
        width: 300px;
        height: 400px;
        background: #FFF;
        border-radius: 6px;
        position: sticky;
        top: 50%;
        left: 50%;
        transform: translate(-50%,2%);
        box-shadow: 0px 1px 10px 1px #000;
        overflow: hidden;
        display: inline-block;
    }
    .upper-container {
        height: 150px;
        background: indianred;
    }
    .image-container {
        background: salmon;
        width: 160px;
        height: 160px;
        border-radius: 10%;
        padding: 5px;
        transform: translate(65px,30px);
    }
    .image-container img {
        width: 160px;
        height: 160px;
        border-radius: 10%;
    }
    .lower-container {
        height: 280px;
        background: lightcoral;
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

        .letraFooter { 
            color: black;
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
    <div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Detalles del producto:</div><br>
    <HR noshade align='center'><br>
    <div class='card-container'>
        <div class='upper-container'>
            <div class='image-container'>
            <?php echo "<img src='Admin/imagenes/fotosProductos/$imagen'/>"; ?>
            </div>
        </div>
        <div class='lower-container'>
            <div>
                <?php echo "<h3>$nombreP</h3>"; ?>
                <h4 style='margin-right: 36px;'>Código:</h4>
                <?php echo "<p>$codigo</p>"; ?>
                <br>
                <h4 style='margin-right: 47px;'>Costo:</h4>
                <?php echo "<p>$$costo</p>"; ?>
                <br>
                <h4 style='margin-right: 5px;'>Descripcion:</h4>
                <?php echo "<p>$descripcion</p>"; ?>
                <br><br>
                <form action="agrega_producto.php" method="POST" name="forma01">
                    <?php $sql2 = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
                    $result2 = $con->query($sql2);
                    $numeroDeRegistros = $result2->num_rows;
                    if($numeroDeRegistros > 0) {
                        $row2 = $result2->fetch_array();
                        $id_pedido = $row2['id'];
                        echo "<input type='hidden' name='id_pedido' id='id_pedido' value='$id_pedido'>";
                    }?>
                    <input type="hidden" name="id" id="id" value=<?php echo $id ?>>
                    <input type="hidden" name="nombre" id="nombre" value=<?php echo $nombre ?>>
                    <input type="hidden" name="costo" id="costo" value=<?php echo $costo ?>>
                    <input type="submit" style='background-color: red; color: white; margin-left: 80px;' value="Comprar">
                    <select name="cantidad" id="cantidad" style='background-color: red; color: white;'>
                        <?php foreach (range(1, $stock) as $num): ?>
                        <option value="<?php echo $num;?>"><?php echo $num;?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>
    <footer align="center" class="letraFooter">Todos los derechos reservados 2022 | Términos y condiciones | Política de privacidad | Redes sociales</footer>
    <br>
</body>
</html>
  
  