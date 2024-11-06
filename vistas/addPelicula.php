<?php
    require_once("../modelo/usuarioDAO.php");
    $usrDao = new usuarioDAO();
?>

<html>
    <head>
        <title>Añadir Pelicula</title>
        <style>
            .tarjeta {
                width: 500px;
                background-color: #ffaa45;
            }
        </style>
    </head>
    <body>
        <div class='tarjeta'>
            <form action="../controladores/usuarioController.php" 
                  method="post">
            <input type="hidden" name="opcion" value="add"/>
            <p>
                Nombre:<br>
                <input type="text" name="nombre" value=""/>
            </p>
            <p>
                Fecha:<br>
                <input type="text" name="fecha" value=""/>
            </p>
            <p>
                Categoria:<br>
                <input type="text" name="categoria" value=""/>
            </p>
            
            <input type="submit" value="Enviar"/>
            </form>
        </div>
    </body>
</html>