<?php 
    session_start();
    require "conecta.php";
    $con = conecta();
    $correo = $_REQUEST['user'];
    $password = $_REQUEST['pass'];
    $passEnc = md5($password);
    $sql = "SELECT * FROM clientes WHERE correo = '$correo' AND contraseña = '$passEnc'";
    $res = $con->query($sql);

    $num = $res->num_rows;

    $row = $res->fetch_array();
    
    if($num>0) {
        $idU = $row["id"];
        $nombre = $row["nombre"];
        $correo = $row["correo"];

        $_SESSION['idUC'] = $idU;
        $_SESSION['nombreC'] = $nombre;
        $_SESSION['correoC'] = $correo;
        
       $bandera = 1;
    } else {
        $bandera = 0;
    }

    echo $bandera;
?>