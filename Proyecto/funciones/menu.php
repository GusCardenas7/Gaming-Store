<?php
    if(isset($_SESSION['nombreC']) && !empty($_SESSION['nombreC'])){
        $nombre = $_SESSION['nombreC'];
        echo "<div id='logo'></div>";
        echo "<table class='tablaMenu letraMenu' style='margin: 0px 10px 0px 0px;'>
            <tr class='encabezadoMenu letraMenu'>
                <td colspan='5' class='celdasMenu'>MENÚ DE NAVEGACIÓN</td>
            </tr>
            <tr class='filasMenu letraMenu'>
                <td class='celdasMenu letraMenu'><a href=\"index.php\">Home</a></td>
                <td class='celdasMenu letraMenu'><a href=\"productos.php\">Productos</a></td>
                <td class='celdasMenu letraMenu'><a href=\"contacto_formulario.php\">Contacto</a></td>
                <td class='celdasMenu letraMenu'><a href=\"carrito_paso01.php\">Carrito</a></td>";
                echo "<td class='celdasMenu'><a href=\"funciones/cerrarSesion.php\">Cerrar Sesión</a></td>";
            echo "</tr>
        </table>";
    } else {
        echo "<div id='logo'></div>";
        echo "<table class='tablaMenu letraMenu' style='margin: 0px 10px 0px 0px;'>
                <tr class='encabezadoMenu letraMenu'>
                    <td colspan='5' class='celdasMenu'>MENÚ DE NAVEGACIÓN</td>
                </tr>
                <tr class='filasMenu letraMenu'>
                    <td class='celdasMenu letraMenu'><a href=\"index.php\">Home</a></td>
                    <td class='celdasMenu letraMenu'><a href=\"productos.php\">Productos</a></td>
                    <td class='celdasMenu letraMenu'><a href=\"contacto_formulario.php\">Contacto</a></td>
                    <td class='celdasMenu letraMenu'><a href=\"carrito_paso01.php\">Carrito</a></td>";
                    echo "<td class='celdasMenu'><a href=\"login.php\">Iniciar Sesión</a></td>";
                echo "</tr>
            </table>";
    }
?>

<style>
    .tablaMenu {
        width: 80%;
        border: 2px solid black;
        float: right;
        position: relative;
    }

    .letraMenu { 
        color: white;
    }

    #logo{
        display: inline-block;
        width:17.5%;
        height: 90px;
        background: url(imagenes/logo.png)no-repeat right;
        filter: brightness(1.1);
        mix-blend-mode: multiply;
    }

    .encabezadoMenu {
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        height: 50px;
        background-color: indianred;
    }

    .filasMenu {
        border: 2px solid black;
        background-color: lightcoral;
    }

    .celdasMenu {
        border: 2px solid black;
        text-align: center;
        vertical-align: middle;
        width: 16.7%;
    }

    a {
        color: white;
        font-weight: bold;
    }

    a:hover {
        color: red;
    }

    a:active {
        color: blue;
    }
</style>