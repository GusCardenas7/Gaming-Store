<?php
    session_start();
    if(isset($_SESSION['nombreC']) && !empty($_SESSION['nombreC'])){
        $nombre = $_SESSION['nombreC'];
        require "funciones/conecta.php";
        $con = conecta();
        $id_pedido = $_REQUEST['id_pedido'];
        $id_producto = $_REQUEST['id'];
        $cantidad = $_REQUEST['cantidad']; 
        $precio = $_REQUEST['costo']; 

        $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
        $result = $con->query($sql);

        $registros = $result->num_rows;

        //creacion del nuevo pedido si es que no existe uno abierto
        if($registros == 0) {
            $datetime = date_create()->format('Y-m-d H:i:s');
            $sql = "INSERT INTO pedidos (fecha, usuario) VALUES ('$datetime', '$nombre')";
            $result = $con->query($sql);
            //validacion de si existe un producto ya agregado
            if(isset($id_pedido)) {
                $sql = "SELECT * FROM pedidos_productos WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
                $result = $con->query($sql);
                $registrosProductos = $result->num_rows;
                if($registrosProductos > 0) {
                    //si si, entonces le actualizamos la cantidad
                    $sql = "UPDATE pedidos_productos SET cantidad = cantidad + $cantidad WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
                    $result = $con->query($sql);
                    header("Location: carrito_paso01.php");
                } else {
                    //si no, simplemente lo agregamos al pedido
                    $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
                    $result = $con->query($sql);
                    $row = $result->fetch_array();
                    $id_pedido = $row['id'];
                    $sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) 
                    VALUES ('$id_pedido', '$id_producto', '$cantidad', '$precio')";
                    $result = $con->query($sql);
                    header("Location: carrito_paso01.php");
                } 
            } else {
                $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
                $result = $con->query($sql);
                $row = $result->fetch_array();
                $id_pedido = $row['id'];
                $sql = "SELECT * FROM pedidos_productos WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
                $result = $con->query($sql);
                $registrosProductos = $result->num_rows;
                if($registrosProductos > 0) {
                    //si si, entonces le actualizamos la cantidad
                    $sql = "UPDATE pedidos_productos SET cantidad = cantidad + $cantidad WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
                    $result = $con->query($sql);
                    header("Location: carrito_paso01.php");
                } else {
                    //si no, simplemente lo agregamos al pedido
                    $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
                    $result = $con->query($sql);
                    $row = $result->fetch_array();
                    $id_pedido = $row['id'];
                    $sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) 
                    VALUES ('$id_pedido', '$id_producto', '$cantidad', '$precio')";
                    $result = $con->query($sql);
                    header("Location: carrito_paso01.php");
                } 
            } 
        } else {
            $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
            $result = $con->query($sql);
            $row = $result->fetch_array();
            $id_pedido = $row['id'];
            //validacion de si existe un producto ya agregado
            $sql = "SELECT * FROM pedidos_productos WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
            $result = $con->query($sql);
            $registrosProductos = $result->num_rows;
            if($registrosProductos > 0) {
                //si si, entonces le actualizamos la cantidad
                $sql = "UPDATE pedidos_productos SET cantidad = cantidad + $cantidad WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
                $result = $con->query($sql);
                header("Location: carrito_paso01.php");
            } else {
                //si no, simplemente lo agregamos al pedido
                $sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = '$nombre'";
                $result = $con->query($sql);
                $row = $result->fetch_array();
                $id_pedido = $row['id'];
                $sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) 
                VALUES ('$id_pedido', '$id_producto', '$cantidad', '$precio')";
                $result = $con->query($sql);
                header("Location: carrito_paso01.php");
            } 
        }
    } else {
        echo "<script>
            function validar() {
                alert('Inicie sesión para agregar productos al carrito...');
                window.location.href = 'index.php';
                
            }
            setTimeout(validar, 0);
            </script>";
    }
?>