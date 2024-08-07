<?php
    include 'funciones/comprobarSesion.php';
    include 'funciones/menu.php';
    echo "<div class='link divALaIzquierda'><a href=\"administradores_lista.php\">Regresar al listado</a></div><br><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 40px;'>Edición de Administradores</div><br>";
    echo "<HR noshade align='center' style='margin-bottom: 30;'>";

    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM administradores WHERE id = $id";
 
    $res = $con->query($sql);

    $row = $res->fetch_array();
    $nombre = $row["nombre"];
    $apellidos = $row["apellidos"];
    $correo = $row["correo"];
    $rol = $row["rol"];
?>

<html>
 <head>
  <title>Edición de Administradores</title>
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
      var rol = document.forma01.rol.value;
      
      if((nombre == "") || (apellidos == "") || (correo == "") || (rol == 0)) {
        $('#mensaje').html('Faltan campos por llenar');
        setTimeout("$('#mensaje').html('')",5000);
        return false;
      }
      return true;
    }

    function validarCorreo() {
      var correo = $('#correo').val();
      var id = $('#id').val();
      if(correo && id) {
          $.ajax ({
                  url     : 'funciones/validarCorreo.php',
                  type    : 'post',
                  datatype : 'text',
                  data    : {'id' : id, 'correo' : correo},
                  success : function(res) {
                      if (res == 1) {
                          $('#mensaje2').html('El correo '+correo+' ya existe').css("color", "#F00");
                          //esta linea borra el contenido del input del correo
                          $('#correo').val('');
                      } else {
                          $('#mensaje2').html('Correo apropiado').css("color", "green");
                      }
                      setTimeout("$('#mensaje2').html('')", 5000);
              },error: function() {
                  alert('Error archivo no encontrado...');
              }
          });
      }
    }

    $(document).on('change','input[type="file"]',function(){
      var fileName = this.files[0].name;
      var ext = fileName.split('.').pop();
      
      // Convertimos en minúscula porque 
      // la extensión del archivo puede estar en mayúscula
      ext = ext.toLowerCase();
      
      // console.log(ext);
      switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png': break;
        default:
          alert('El archivo no tiene la extensión adecuada');
          this.value = ''; // reset del valor
          this.files[0].name = '';
      }
    }
    );
  </script>
  <style>
    .divALaIzquierda {
        margin: 2% 0px 0px 5%;
    }

    label{
      display: inline-block;
      width: 80px;
    }

    .claseCorreo {
      float: left;
      position: relative; 
      width: 80px;
    }

    input, textarea, select {
      width: 250px;
      margin:2px auto;
      box-sizing: border-box;
    }

    body {
      background: url("imagenes/fondoEditar.jpg"); 
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      height: 100vh;
    }

    a {
        color: black;
        font-weight: bold;
    }

    a:hover {
        color: blue;
    }

    a:active {
        color: red;
    }

    #mensaje {
        height:20px;
        line-height:20px;
        border: 2px solid black;
        background: lightskyblue;
        color: #F00;
        font-size: 16px;
        font-weight: bold;
        width: 250px;
        text-align: center;
        margin:2px auto;
    }

    #mensaje2 {
      height:20px;
      line-height:22px;
      color: #F00;
      font-size: 15px;
      font-weight: bold;
      width: 250px;
      text-align: center;
      float: right;
      position: relative;
    }
  </style>
 </head>
 <body>
	<form enctype="multipart/form-data" name="forma01" action="administradores_salvaEditar.php" method="POST" align="center">
    <input type="hidden" name="id" id="id" value=<?php echo $id ?>>
    <label for="nombre">Nombre</label>
		<input type="text" name="nombre" placeholder="Escribe tu nombre" value="<?php echo $nombre ?>">
    <br>
		<label for="apellidos">Apellidos</label>
		<input type="text" name="apellidos" placeholder="Escribe tus apellidos" value="<?php echo $apellidos ?>">
    <br>
    <label for="correo" style="margin: 2px 0px 0px 430px;">Correo</label>
    <input onblur="validarCorreo();" type="email" name="correo" id="correo" placeholder="Escribe tu correo" value=<?php echo $correo ?>>
    <div id='mensaje2' style="margin: 2px 180px 0px 0px;"></div>
    <br>
    <label for="pass">Password</label>
    <input type="password" name="pass" placeholder="Escribe tu password">
    <br>
    <label for="rol">Rol</label>
    <?php
    if($rol == 1) {
    echo "<select name='rol'>
        <option align='center' value='0'>Selecciona</option>
        <option align='center' value='1' selected>Gerente</option>
        <option align='center' value='2'>Ejecutivo</option>			
    </select>";
    } else {
    echo "<select name='rol'>
        <option align='center' value='0'>Selecciona</option>
        <option align='center' value='1'>Gerente</option>
        <option align='center' value='2' selected>Ejecutivo</option>			
    </select>";
    }
    ?>
    <br>
    <label for="foto">Foto</label>
    <input type="file" name="foto" accept="image/jpeg,image/jpg,image/png">
    <br>
		<input style="background-color: lightcyan; width: 150px; margin: 10px auto;" onclick="return valida();" type="submit" value="Editar">
	</form>
  <div id='mensaje'></div>
 </body>
</html>