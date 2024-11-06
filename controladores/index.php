<?php
require_once("../modelo/conn.php");
 $usr = "root";
 $pwd = "";
 $dbcon = null;
 $url = "mysql:host=localhost:3307;dbname=peliculas";
 $error = null;
 $dbname="peliculas";
 $port = 3307;
 $localhost= "localhost";

$mysqli = new mysqli($localhost, $usr, $pwd, $dbname, $port);
$keywords = $_POST['keywords'];


try {
    $stmt = $mysqli->prepare("SELECT id, nombre , fecha, categoria FROM listado WHERE nombre = ?");
    $stmt->bind_param("s", $keywords);
  
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $nombre, $fecha, $categoria);
    $count=0;

     if ($stmt-> num_rows==1){
        echo '<h2>Resultado encontrado: ',++$count, '</h2>';
        echo "<br>";
        $stmt->fetch();

        echo "Nombre: ", $nombre;
        echo "<br>";
        echo "Fecha: ",$fecha;
        echo "<br>";
        echo "Categoría: ",$categoria;
    } else {
        echo "Pelicula no encontrada";
        header("refresh:5; url=../vistas/listado.php");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();  
}    
?> 