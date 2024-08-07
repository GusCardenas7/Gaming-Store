<?php
    //administradores_salva.php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    $rol = $_REQUEST['rol'];
    $archivo_n = $_FILES['foto']['name']; //nombre real del archivo
    $archivo_temp = $_FILES['foto']['tmp_name']; //nombre temporal del archivo
    $ext = pathinfo($archivo_n, PATHINFO_EXTENSION);
    $dir = "imagenes/fotosAdministradores/"; //carpeta donde se guardan los archivos
    $archivo = md5_file($archivo_temp); //nombre del archivo encriptado

    if ($archivo_n != '') {
        $file_Name1 = "$archivo.$ext";
        copy($archivo_temp, $dir.$file_Name1);
    }
    $passEnc = md5($pass);

    $sql = "INSERT INTO administradores
    (nombre, apellidos, correo, pass, rol, archivo_n, archivo)
    VALUES ('$nombre', '$apellidos', '$correo', '$passEnc', $rol, '$archivo_n', '$file_Name1')";

    $res = $con->query($sql);
    
    header("Location: administradores_lista.php");
?>