<?php
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correo'];
    $to = 'gustavo.cardenas5755@alumnos.udg.mx';
    $message = $_REQUEST['mensaje'];
    $mensaje = $message . "\n" . 'Correo de contacto de vuelta: ' . $correo;
    $subject = 'Petición de contacto de: '.$nombre.' '.$apellidos;
    $headers = "From: $correo\r\n";
 
    mail($to, $subject, $mensaje, $headers);
    header("Location: index.php");
?>