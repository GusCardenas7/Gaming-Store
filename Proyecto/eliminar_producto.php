<?php
    require "funciones/conecta.php";
    $con = conecta();
    $id = $_REQUEST['id']; 
    $idP = $_REQUEST['idP'];
    $sql = "DELETE FROM pedidos_productos WHERE id_producto = $id AND id_pedido = $idP";
    $result = $con->query($sql);

    $sql2 = "SELECT * FROM pedidos_productos WHERE id_pedido = $idP";
    $result2 = $con->query($sql2);
    $registros = $result2->num_rows;
    if($registros == 0) {
        $sql3 = "DELETE FROM pedidos WHERE id = $idP";
        $result3 = $con->query($sql3);
        $bandera = 1;
    } else {
        $bandera = 0;
    }

    echo $bandera;
?>