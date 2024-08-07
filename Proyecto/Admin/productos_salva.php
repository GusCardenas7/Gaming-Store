<?php
    //administradores_salva.php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $nombre = $_REQUEST['nombre'];
    $codigo = $_REQUEST['codigo'];
    $descripcion = $_REQUEST['descripcion'];
    $costo = $_REQUEST['costo'];
    $stock = $_REQUEST['stock'];
    $archivo_n = $_FILES['imagen']['name']; //nombre real del archivo
    $archivo_temp = $_FILES['imagen']['tmp_name']; //nombre temporal del archivo
    $ext = pathinfo($archivo_n, PATHINFO_EXTENSION);
    $dir = "imagenes/fotosProductos/"; //carpeta donde se guardan los archivos
    $archivo = md5_file($archivo_temp); //nombre del archivo encriptado

    if ($archivo_n != '') {
        $file_Name1 = "$archivo.$ext";
        copy($archivo_temp, $dir.$file_Name1);
    }

    $sql = "INSERT INTO productos
    (nombre, codigo, descripcion, costo, stock, archivo_n, archivo)
    VALUES ('$nombre', '$codigo', '$descripcion', '$costo', $stock, '$archivo_n', '$file_Name1')";

    $res = $con->query($sql);
    
    header("Location: productos_lista.php");
?>