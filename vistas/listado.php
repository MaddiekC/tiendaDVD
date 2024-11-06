<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>Listado de peliculas</title>
        <style>
             .mt-catalogo {
                margin: auto;
                width: 800px;
            }
            table {
                width: 60%;
                border: 1;
            }
            .mt-cab {
                    background-color: greenyellow;
                }

            .mt-btn-edit {
                width: 18px;
                height: 18px;
                padding: 8px;
            }
        </style>
    </head>
    <body>
    <div class='mt-catalogo'>
    <p>
    <div> 
        <form action="../controladores/index.php" 
        method="post"> 
            <input type="text" name="keywords" placeholder="Busqueda" required=""> 
            <input type="submit" name="search" id="search" value="Ir"> 
        </form> 
        </div> 
    </p>
    <p>
        <a href='addPelicula.php' title='Añadir Pelicula'>
            <button>Añadir</button>
        </a>
    </p>

<?php
    require_once("../modelo/usuarioDAO.php");
    $usuarioDao = new usuarioDAO();
    $rst = $usuarioDao->findAll();

    echo "<table>";
    echo "<tr class='mt-cab'><td>Codigo</td><td>Nombre</td><td>Año</td><td>Categoria</td><td>Acciones</td></tr>";
    foreach ($rst as $reg) {
        echo "<tr>";
        echo "<td>";
        echo "<a href='vistas/editPelicula.php?id=" . $reg['id']. "'>";  
        echo $reg['id'];
        echo "</a>";
        echo "</td>";
        echo "<td>";
        echo $reg['nombre'];
        echo "</td>";
        echo "<td>";
        echo $reg['fecha'];
        echo "</td>";
        echo "<td>";
        echo $reg['categoria'];
        echo "</td>";
        echo "<td>";

        echo "<a href='editPelicula.php?nombre=" . $reg['nombre']. "' title='Editar'>";  
        echo "<img src='../imagenes/iconos/ico_edit.png' class='mt-btn-edit'/>";
        echo "</a> &nbsp;";
        echo "<a href='../controladores/usuarioController.php?opcion=drop&id=" . $reg['id']. "' title='Eliminar'>";  
        echo "<img src='../imagenes/iconos/ico_trash.png' class='mt-btn-edit'/>";
        echo "</a> &nbsp;";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

?>  
</body>
</html>
