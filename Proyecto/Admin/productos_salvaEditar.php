<?php
    //administradores_salva.php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $codigo = $_REQUEST['codigo'];
    $descripcion = $_REQUEST['descripcion'];
    $costo = $_REQUEST['costo'];
    $stock = $_REQUEST['stock'];
    if($_FILES['imagen']['name'] != "" && $_FILES['imagen']['tmp_name'] != "") {
        $archivo_n = $_FILES['imagen']['name']; //nombre real del archivo
        $archivo_temp = $_FILES['imagen']['tmp_name']; //nombre temporal del archivo
        $ext = pathinfo($archivo_n, PATHINFO_EXTENSION); //obtiene la extension del archivo
        $dir = "imagenes/fotosProductos/"; //carpeta donde se guardan los archivos
        $archivo = md5_file($archivo_temp); //nombre del archivo encriptado
    }
    
    if($archivo_n != "") {
        $file_Name1 = "$archivo.$ext";
        copy($archivo_temp, $dir.$file_Name1);
    
        $sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo',
        stock = '$stock', archivo_n = '$archivo_n', archivo = '$file_Name1' WHERE id = '$id'";
    
        $res = $con->query($sql);
        
        header("Location: productos_lista.php");
    } else if($archivo_n == "") {
        $sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo',
        stock = '$stock' WHERE id = '$id'";
    
        $res = $con->query($sql);
        
        header("Location: productos_lista.php");
    }
?>