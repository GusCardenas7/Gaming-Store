<?php 
    require "conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];
    $codigo = $_REQUEST['codigo'];
    $sql = "SELECT * FROM productos WHERE codigo = '$codigo' AND status = 1 AND eliminado = 0";
    $res = $con->query($sql);

    $res2 = $res->fetch_array();
    $bandera = 0;
    if($res2['codigo'] == $codigo && $res2['id'] != $id) {
       $bandera = 1;
    } else {
        $bandera = 0;
    }

    echo $bandera;
?>