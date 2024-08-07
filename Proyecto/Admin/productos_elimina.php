<?php
    //productos_elimina.php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    //Solo nombre SELECT id, nombre FROM productos ....
 
    $sql = "UPDATE productos 
            SET eliminado = 1
            WHERE id = $id";
    $res = $con->query($sql);

    echo $res;
?>