<?php
    require_once("../modelo/usuarioDAO.php");

    // Parametros del request
    if (isset($_GET['nombre'])) {
        $nickUser = $_GET['nombre'];
    }

    $usrDao = new usuarioDAO();

    $reg = $usrDao->findByNick($nickUser);
?>

<html>
    <head>
        <title>Editar Pelicula</title>
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
            <input type="hidden" name="opcion" value="update"/>
            <p>
                Codigo:<br>
                <input type="hidden" name="id" value="<?php echo $reg['id']; ?>"/>
                <?php echo $reg['id']; ?>
            </p>
            <p>
                Nombre:<br>
                <input type="text" name="nombre" value="<?php echo $reg['nombre'];?>"/>
            </p>
            <p>
                Fecha:<br>
                <input type="text" name="fecha" value="<?php echo $reg['fecha'];?>"/>
            </p>
            <p>
                Categoria:<br>
                <input type="text" name="categoria" value="<?php echo $reg['categoria'];?>"/>
            </p>
            <input type="submit" value="Enviar"/>
            </form>
        </div>
    </body>
</html>