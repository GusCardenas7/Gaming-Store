<?php
    require "funciones/conecta.php";
    $con = conecta();
    $id = $_REQUEST['id']; 
    $idP = $_REQUEST['idP'];
    $cantidad = $_REQUEST['cantidad'];
    $sql = "UPDATE pedidos_productos SET cantidad = $cantidad WHERE id_producto = $id AND id_pedido = $idP";
    $result = $con->query($sql);

    echo $result;
?>