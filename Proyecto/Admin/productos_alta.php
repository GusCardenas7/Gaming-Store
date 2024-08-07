<?php
    include 'funciones/comprobarSesion.php';
    include 'funciones/menu.php';
    echo "<div class='link divALaIzquierda'><a href=\"productos_lista.php\">Regresar al listado</a></div><br><br>";
    echo "<div align='center' style='font-weight: bold; font-size: 40px;'>Alta de Productos</div><br>";
    echo "<HR noshade align='center' style='margin-bottom: 30;'>";
?>

<html>
 <head>
  <title>Alta de Productos</title>
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
      var codigo = document.forma01.codigo.value;
      var descripcion = document.forma01.descripcion.value;
      var costo = document.forma01.costo.value;
      var stock = document.forma01.stock.value;
      var imagen = document.forma01.imagen.value;
      
      if((nombre == "") || (codigo == "") || (descripcion == "") || (costo == "") || (stock == "") || (imagen == "")) {
        $('#mensaje').html('Faltan campos por llenar');
        setTimeout("$('#mensaje').html('')",5000);
        return false;
      }
      return true;
    }

    function validarCodigo() {
      var codigo = $('#codigo').val();
      var id = $('#id').val();
      if(codigo) {
          $.ajax ({
                  url     : 'funciones/validarCodigo.php',
                  type    : 'post',
                  datatype : 'text',
                  data    : {'id' : id, 'codigo' : codigo},
                  success : function(res) {
                      if (res == 1) {
                          $('#mensaje2').html('El código '+codigo+' ya existe').css("color", "#F00");
                          //esta linea borra el contenido del input del codigo
                          $('#codigo').val('');
                      } else {
                          $('#mensaje2').html('Código apropiado').css("color", "green");
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
      width: 100px;
      text-align: center;
    }

    .claseCodigo {
      float: left;
      position: relative; 
      width: 80px;
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

    body {
      background: url("imagenes/fondoAlta.jpg"); 
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
	<form enctype="multipart/form-data" name="forma01" action="productos_salva.php" method="POST" align="center">
    <input type="hidden" name="id" id="id">
    <label for="nombre">Nombre</label>
		<input type="text" name="nombre" placeholder="Escribe el nombre del producto">
    <br>
    <label for="codigo" style="margin: 2px 0px 0px 430px;">Código</label>
    <input onblur="validarCodigo();" type="text" name="codigo" id="codigo" placeholder="Escribe el código del producto">
    <div id='mensaje2' style="margin: 2px 180px 0px 0px;"></div>
    <br>
    <label for="descripcion" style="margin: 2px 250px 0px 0px;">Descripción</label><br>
    <textarea style="margin: 2px 0px 2px 8.2%;" name="descripcion" cols="30" rows="5" placeholder="Escribe la descripción del producto"></textarea>
    <br>
    <label for="costo">Costo</label>
    <input type="number" name="costo" step="0.01" min="0" placeholder="Escribe el costo del producto">
    <br>
    <label for="stock">Stock</label>
    <input type="number" name="stock" min="0" placeholder="Escribe el stock del producto">
    <br>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" accept="image/jpeg,image/jpg,image/png">
    <br>
		<input style="background-color: lightcyan; width: 150px; margin: 10px auto;" onclick="return valida();" type="submit" value="Salvar">
	</form>
  <div id='mensaje'></div>
  <br><br>
 </body>
</html>