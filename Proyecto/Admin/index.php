<?php
    session_start();
    if(isset($_SESSION['correo'])) {
        header("Location: bienvenido.php");
    }
?>

<html>
<head>
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
        var usuario = document.forma01.user.value;
        var contraseña = document.forma01.pass.value;
        
        if((usuario == "") || (contraseña == "")) {
            $('#mensaje').html('Faltan campos por llenar');
            setTimeout("$('#mensaje').html('')",5000);
            return false;
        }
        else {
            var user = $("#user").val();
            var pass = $("#pass").val();
            if(user && pass) {
                $.ajax ({
                        url     : 'funciones/validaUsuario.php?user='+user+'&pass='+pass,
                        type    : 'post',
                        datatype : 'text',
                        data    : {'user' : user, 'pass' : pass},
                        success : function(res) {
                            if (res == 1) {
                                window.location.href = "bienvenido.php";
                            } else {
                                $('#mensaje').html('Usuario no valido');
                                setTimeout("$('#mensaje').html('')",5000);
                            }
                    },error: function() {
                        alert('Error archivo no encontrado...');
                    }
                });
            }
            return false;
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        
        #mensaje {
            height:20px;
            line-height:20px;
            color: #F00;
            font-size: 20px;
            font-weight: bold;
            width: 250px;
            text-align: center;
            margin: auto;
        }

        body {
            background: url("imagenes/fondoLogin.jpg"); 
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            box-sizing: border-box;
        }

        .container{
            width: 440px;
            height: 420px;
            background: #FFF;
            border-radius: 6px;
            position: absolute;
            top: 62%;
            left: 50%;
            transform: translate(-50%,-50%);
            box-shadow: 0px 1px 10px 1px #000;
            overflow: hidden;
            display: inline-block;
        }
        .wrapper{
            width: 100%;
            height: 85%;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
        }
        .wrapper .title{
            height: 90px;
            background: blue;
            border-radius: 5px 5px 0 0;
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins',sans-serif;
        }
        .wrapper form{
            padding: 30px 25px 45px 25px;
        }
        .wrapper form .row{
            height: 45px;
            margin-bottom: 20px;
            position: relative;
        }
        .wrapper form .row input{
            height: 105%;
            width: 100%;
            outline: none;
            padding-left: 60px;
            border-radius: 5px;
            border: 1px solid blue;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Poppins',sans-serif;
        }
        form .row input:focus{
            border-color: blue;
            box-shadow: inset 0px 0px 2px 2px blue;
        }
        form .row input::placeholder{
            color: #999;
        }
        .wrapper form .row i{
            position: absolute;
            width: 47px;
            height: 100%;
            color: #fff;
            font-size: 18px;
            background: blue;
            border: 1px solid blue;
            border-radius: 5px 0 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper form .pass{
            margin: -8px 0 20px 0;
        }

        .wrapper form .button input{
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            padding-left: 0px;
            background: blue;
            border: 1px solid blue;
            cursor: pointer;
            margin-top: 10px;
            font-family: 'Poppins',sans-serif;
        }
        form .button input:hover{
            background: #0078FF;
            border: 1px solid #0078FF;
        }
    </style>
</head>
<body>
    <div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Login Administradores</div><br>
    <HR noshade align='center' style='margin-bottom: 30;'>
    <div class='container'>
        <div class='wrapper'>
            <div class='title'><span>Bienvenid@</span></div>
            <form name="forma01" method="POST">
            <div class='row'>
                <i class='fas fa-user'></i>
                <input type="email" name="user" id="user" placeholder='Nombre de usuario'>
            </div>
            <div class='row'>
                <i class='fas fa-lock'></i>
                <input type='password' name='pass' id="pass" placeholder='Contraseña'>
            </div>
            <div class='row button'>
                <input onclick='return valida();' type='submit' value='Login'>
            </div>
            </form>
            <div id='mensaje'></div>
        </div>
    </div>
</body>
</html>