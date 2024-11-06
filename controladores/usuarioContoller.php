<?php
//4
require_once("../modelo/usuarioDAO.php");

// Parametros del request
if (isset($_GET['opcion'])) {
    $opc = $_GET['opcion'];
}
if (isset($_GET['id'])) {
    $datos['id'] = $_GET['id'];
}
if (isset($_POST['id'])) {
    $datos['id'] = $_POST['id'];
}
if (isset($_POST['nombre'])) {
    $datos['nombre'] = $_POST['nombre'];
}
if (isset($_POST['fecha'])) {
    $datos['fecha'] = $_POST['fecha'];
}
if (isset($_POST['categoria'])) {
    $datos['categoria'] = $_POST['categoria'];
}
if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['keywords'];
}

switch($opc) {
    case "findByNick":
        findByNick($datos);
        break;
    case "update":
        updatePelicula($datos);
        break;
    case "add":
        addPelicula($datos);
        break;
    case "drop":
        dropPelicula($datos);
        break;
}

// Funciones de ejecucion de las acciones
function findByNick($datos) {
    $usuarioDao = new usuarioDAO();
    $rst = $usuarioDao->findByNick($datos['nombre']);
    $result = "";
    foreach($rst as $fila) {
        $result .= "Hola " . $fila['nombre'];
    }
    echo $result;
}


function findAll() {
    $usuarioDao = new usuarioDAO();
    $rst = $usuarioDao->findAll();
    
    $tabla = "<table>";
    foreach ($rst as $reg) {
        $tabla .= "<tr><td>";
        $tabla .= $reg['nombre'];
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= $reg['fecha'];
        $tabla .= "</td>";
        $tabla .= "</tr>";
        $tabla .= $reg['categoria'];
        $tabla .= "</td>";
        $tabla .= "</tr>";
    }
    $tabla .= "</table>";
    return $tabla;
}

// Funciones de ejecucion de las acciones
function addPelicula($datos) {
    $usuarioDao = new usuarioDAO();
    $filtro['id'] = $datos['id'];
    $result = $usuarioDao->add($datos, $filtro);
    echo $result;
    header("refresh:5;url=../listado.php");
}

// Funciones de ejecucion de las acciones
function updatePelicula($datos) {
    $usuarioDao = new usuarioDAO();
    $filtro['id'] = $datos['id'];
    $result = $usuarioDao->update($datos, $filtro);
    echo $result;
    header("refresh:5;url=../listado.php");
}

//lo elimina de la base de datos
function dropPelicula($datos) {
    $usuarioDao = new usuarioDAO();
    $filtro['id'] = $datos['id'];
    $result = $usuarioDao->delete($datos, $filtro);
    echo $result;
    header("refresh:5;url=../listado.php");
}

?>

