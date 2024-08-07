<?php 
    session_start();
    require "conecta.php";
    $con = conecta();
    $correo = $_REQUEST['user'];
    $password = $_REQUEST['pass'];
    $passEnc = md5($password);
    $sql = "SELECT * FROM administradores WHERE correo = '$correo' AND pass = '$passEnc' AND status = 1 AND eliminado = 0";
    $res = $con->query($sql);

    $num = $res->num_rows;

    $row = $res->fetch_array();
    
    if($num>0) {
        $idU = $row["id"];
        $nombre = $row["nombre"].' '.$row["apellidos"];
        $correo = $row["correo"];

        $_SESSION['idU'] = $idU;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['correo'] = $correo;
        
       $bandera = 1;
    } else {
        $bandera = 0;
    }

    echo $bandera;
?>