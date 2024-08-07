<?php
    //administradores_salva.php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    if($_FILES['imagen']['name'] != "" && $_FILES['imagen']['tmp_name'] != "") {
        $archivo_n = $_FILES['imagen']['name']; //nombre real del archivo
        $archivo_temp = $_FILES['imagen']['tmp_name']; //nombre temporal del archivo
        $ext = pathinfo($archivo_n, PATHINFO_EXTENSION); //obtiene la extension del archivo
        $dir = "imagenes/fotosBanners/"; //carpeta donde se guardan los archivos
        $archivo = md5_file($archivo_temp); //nombre del archivo encriptado
    }
    
    if($archivo_n != "") {
        $file_Name1 = "$archivo.$ext";
        copy($archivo_temp, $dir.$file_Name1);
    
        $sql = "UPDATE banners SET nombre = '$nombre', archivo = '$file_Name1' WHERE id = '$id'";
    
        $res = $con->query($sql);
        
        header("Location: banners_lista.php");
    } else if($archivo_n == "") {
        $sql = "UPDATE banners SET nombre = '$nombre' WHERE id = '$id'";
    
        $res = $con->query($sql);
        
        header("Location: banners_lista.php");
    }
?>