<?php
    //administradores_salva.php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    if($_FILES['foto']['name'] != "" && $_FILES['foto']['tmp_name'] != "") {
        $archivo_n = $_FILES['foto']['name']; //nombre real del archivo
        $archivo_temp = $_FILES['foto']['tmp_name']; //nombre temporal del archivo
        $ext = pathinfo($archivo_n, PATHINFO_EXTENSION); //obtiene la extension del archivo
        $dir = "imagenes/fotosAdministradores/"; //carpeta donde se guardan los archivos
        $archivo = md5_file($archivo_temp); //nombre del archivo encriptado
    }
    
    if($pass != "" && $archivo_n != "") {
        $rol = $_REQUEST['rol'];
        $file_Name1 = "$archivo.$ext";
        copy($archivo_temp, $dir.$file_Name1);
        $passEnc = md5($pass);
    
        $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc',
        rol = '$rol', archivo_n = '$archivo_n', archivo = '$file_Name1' WHERE id = '$id'";
    
        $res = $con->query($sql);
        
        header("Location: administradores_lista.php");
    } else if($pass != "" && $archivo_n == "") {
        $rol = $_REQUEST['rol'];
        $passEnc = md5($pass);
    
        $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc',
        rol = '$rol' WHERE id = '$id'";
    
        $res = $con->query($sql);
        
        header("Location: administradores_lista.php");
    } else if($pass == "" && $archivo_n != "") {
        $rol = $_REQUEST['rol'];
        $file_Name1 = "$archivo.$ext";
        copy($archivo_temp, $dir.$file_Name1);
    
        $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo',
        rol = '$rol', archivo_n = '$archivo_n', archivo = '$file_Name1' WHERE id = '$id'";
    
        $res = $con->query($sql);
        
        header("Location: administradores_lista.php");
    } else {
        $rol = $_REQUEST['rol'];

        $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo',
        rol = '$rol' WHERE id = '$id'";

        $res = $con->query($sql);
        
        header("Location: administradores_lista.php");
    }
?>