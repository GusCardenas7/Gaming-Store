<?php
    include 'funciones/comprobarSesion.php';
    include 'funciones/menu.php';
    require "funciones/conecta.php";
    $con = conecta();

    $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0";

    //Solo nombre SELECT id, nombre FROM administradores ....

    $res = $con->query($sql);

    echo "<div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Listado de Productos</div><br>";
    echo "<HR noshade align='center'><br>";
    echo "<div class='link divALaDerecha'><a href=\"productos_alta.php\">Crear nuevo producto</a></div><br><br>";

    echo "<div class='tabla'>
        <div class='encabezado'>
            <div class='celdas'>ID</div>
            <div class='celdas'>Nombre</div>
            <div class='celdas'>Código</div>
            <div class='celdas'>Descripción</div>
            <div class='celdas'>Costo</div>
            <div class='celdas'>Stock</div>
            <div class='celdas'>Eliminar Producto</div>
            <div class='celdas'>Ver Detalles del Producto</div>
            <div class='celdas'>Editar Producto</div>
        </div>";
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["nombre"];
                $codigo = $row["codigo"];
                $descripcion = $row["descripcion"];
                $costo = $row["costo"];
                $stock = $row["stock"];
                
                echo "<div class='filas2' id='tr$id'>
                    <div class='celdas'>$id</div>
                    <div class='celdas'>$nombre</div>
                    <div class='celdas'>$codigo</div>
                    <div class='celdas'>$descripcion</div>
                    <div class='celdas'>$$costo</div>
                    <div class='celdas'>$stock</div>
                    <div class='celdas'><a href=\"javascript:eliminar($id);\">Eliminar</a></div>
                    <div class='celdas'><a href=\"productos_detalle.php?id=$id\">Ver detalle</a></div>
                    <div class='celdas'><a href=\"productos_edita.php?id=$id\">Editar</a></div>
                </div>";
            }
    echo "</div>
        <div id='mensaje'></div>
        <br>";
?>
    <title>Listado de Productos</title>
    <script src="JS/jquery-3.3.1.min.js"></script>
        <script>
            function eliminar(idE) {
                var id = idE;
                if(id) {
                    var mensaje = confirm("¿Esta seguro de querer eliminar este producto de la tabla?");
                    if (mensaje) {
                        $.ajax ({
                            url     : 'productos_elimina.php?id='+id,
                            type    : 'post',
                            datatype : 'text',
                            data    : 'id='+id,
                            success : function(res) {
                                $("#tr" + id).hide();
                                $('#mensaje').html('<img src="imagenes/loader2.gif"/>');
                                setTimeout("$('#mensaje').html('')",5000);
                                alert("Producto eliminado con exito");
                            },error: function() {
                                alert('Error archivo no encontrado...');
                            }
                        });
                    }
                    else {
                        alert("El producto no se ha eliminado");
                    }
                } else {
                    $('#mensaje').html('Ha ocurrido un error');
                }
            }
    </script>

<style>
    .divALaDerecha {
        margin: 0px 0px 0px 83%;
    }

    .tabla {
        display: table;
        width: 1200px;
        border: 2px solid black;
        margin: auto;
    }

    .encabezado {
        display: table-row;
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        height: 50px;
        background-color: lightskyblue;
    }

    .filas2 {
        display: table-row;
        border: 2px solid black;
        background-color: lightcyan;
    }

    .celdas {
        display: table-cell;
        border: 2px solid black;
        text-align: center;
        vertical-align: middle;
    }

    body {
        background-image: url("imagenes/fondoLista.jpg");
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
        color: #F00;
        font-size: 18px;
        font-weight: bold;
        width: 400px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        margin:15px auto;
      }
</style>