<?php
    $nombre = $_SESSION['nombre'];

    echo "<table class='tablaMenu'>
            <tr class='encabezadoMenu'>
                <td colspan='7' class='celdasMenu'>MENÚ DE NAVEGACIÓN</td>
            </tr>
            <tr class='filasMenu'>
                <td class='celdasMenu'><a href=\"bienvenido.php\">Inicio</a></td>
                <td class='celdasMenu'><a href=\"administradores_lista.php\">Administradores</a></td>
                <td class='celdasMenu'><a href=\"productos_lista.php\">Productos</a></td>
                <td class='celdasMenu'><a href=\"banners_lista.php\">Banners</a></td>
                <td class='celdasMenu'><a href=\"pedidos_lista.php\">Pedidos</a></td>
                <td class='celdasMenu'>Bienvenid@ $nombre</td>
                <td class='celdasMenu'><a href=\"funciones/cerrarSesion.php\">Cerrar Sesión</a></td>
            </tr>
        </table>";
?>

<style>
    .tablaMenu {
        width: 70%;
        border: 2px solid black;
        margin: 2% auto;
    }

    .encabezadoMenu {
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        height: 50px;
        background-color: lightskyblue;
    }

    .filasMenu {
        border: 2px solid black;
        background-color: lightcyan;
    }

    .celdasMenu {
        border: 2px solid black;
        text-align: center;
        vertical-align: middle;
        width: 15%;
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
</style>