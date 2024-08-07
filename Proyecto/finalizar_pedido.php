<?php
    require "funciones/conecta.php";
    $con = conecta();
    $id = $_REQUEST['id']; 
    $sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $id";
    $result = $con->query($sql);
    $registros = $result->num_rows;
    if($registros > 0) {
        while($row = $result->fetch_array()) {
            $idP = $row['id_producto'];
            $cantidad = $row['cantidad'];
            $sql2 = "UPDATE productos SET stock = stock - $cantidad WHERE id = $idP";
            $result2 = $con->query($sql2);
        }
        $sql3 = "UPDATE pedidos SET status = 1 WHERE id = $id";
        $result3 = $con->query($sql3);

        echo $result3;
    }
?>