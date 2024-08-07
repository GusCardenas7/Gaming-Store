<?php
    session_start();
?>

<html>
<head>
    <title>Contacto</title>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script>
        //estas lineas de codigo evitan que se envie el formulario al presionar la tecla Enter
        $(document).ready(function() {
            $("form").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });
        });

        function valida() {
            var nombre = document.forma01.nombre.value;
            var apellidos = document.forma01.apellidos.value;
            var correo = document.forma01.correo.value;
            var mensaje = document.forma01.mensaje.value;
            
            if((nombre == "") || (apellidos == "") || (correo == "") || (mensaje == "")) {
                $('#mensaje2').html('Faltan campos por llenar');
                setTimeout("$('#mensaje2').html('')",5000);
                return false;
            }
            return true;
        }
    </script>
    <style>
        body {
            background: url("imagenes/contacto.jpg"); 
            background-size: cover;
            background-repeat: repeat;
            margin: 0;
            height: 100vh;
            box-sizing: border-box;
        }

        .letraFooter { 
            color: black;
        }

        .barraRoja {
            background-color: red;
            border: 0;
            height: 5px;
            position: relative;
            left: 0;
            top: 0;
            width: 100%;
            animation: animar_roja 2s ease-in;
        }

        @keyframes animar_roja {
        from {
            width: 0%;
        }

        to {
            width: 100%;
        }
        }

        label{
            display: inline-block;
            width: 100px;
            text-align: center;
        }

        input, textarea, select {
            width: 250px;
            margin:2px auto;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
            font-family: Arial;
            font-size: 13.3333px;
        }

        #mensaje2 {
            height:20px;
            line-height:20px;
            border: 2px solid black;
            background: lightcoral;
            color: white;
            font-size: 16px;
            font-weight: bold;
            width: 250px;
            text-align: center;
            margin:2px auto;
        }
    </style>
</head>
<body>
    <header>
        <hr class='barraRoja'>
        <?php 
            include 'funciones/menu.php'; 
        ?>
        <hr class='barraRoja'>
    </header>
    <div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Formulario de contacto</div><br>
    <HR noshade align='center'><br>
    <form name="forma01" action="contacto_envia.php" method="POST" align="center">
    <label for="nombre">Nombre</label>
	<input type="text" name="nombre" id='nombre' placeholder="Escribe tu nombre">
    <br>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id='apellidos' placeholder="Escribe tus apellidos">
    <br>
    <label for="correo">Correo</label>
    <input type="email" name="correo" id="correo" placeholder="Escribe tu correo">
    <br>
    <label for="mensaje" style="margin: 2px 250px 0px 0px;">Mensaje</label><br>
    <textarea style="margin: 2px 0px 2px 8.2%;" name="mensaje" id='mensaje' cols="30" rows="5" placeholder="Escribe el mensaje a enviar"></textarea>
    <br>
	<input style="background-color: red; width: 150px; margin: 10px auto; color: white;" onclick="return valida();" type="submit" value="Enviar">
	</form>
    <div id='mensaje2'></div>
    <br><br>
    <footer align="center" class="letraFooter">Todos los derechos reservados 2022 | Términos y condiciones | Política de privacidad | Redes sociales</footer>
    <br>
</body>
</html>