
<?php

require_once 'includes/conexion.php';
require_once 'includes/helpers.php';
if(!isset($_SESSION)){
        session_start();
    }

$categorias = conseguirCategorias($bd);

if (!empty($categorias) ){
    while ($categoria = mysqli_fetch_assoc($categorias)) {
        echo "<br/>";
        var_dump($categoria);
    }
}

echo "<hr/>";
$mibaseDatos = $_SESSION['baseDatos'];
var_dump($mibaseDatos);

echo "<hr/>";
$ncategorias = conseguirCategorias($mibaseDatos);
var_dump($ncategorias);

if (!empty($ncategorias)){
    while ($categoria = mysqli_fetch_assoc($ncategorias)) {
        echo "<br/>";
        var_dump($categorias);
    }
}
