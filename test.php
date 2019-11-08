
<?php

require_once 'includes/conexion.php';
require_once 'includes/helpers.php';
if(!isset($_SESSION)){
        session_start();
    }

$categorias = conseguirCategorias($bd);

var_dump($bd);
echo "<hr/>";
echo "<h3>".
var_dump($categorias)."</h3>";

echo "<hr/>";
if (empty($categorias) && mysqli_num_rows($categorias) == 0 ){
    echo "categorias vacias";
    echo mysqli_num_rows($categorias);
}else{
    echo 'con valores';
    while ($categoria = mysqli_fetch_assoc($categorias)) {
        var_dump($categoria);
    }
}

echo "<hr/>";
$mibaseDatos = $_SESSION['baseDatos'];
var_dump($mibaseDatos);

echo "<hr/>";
$ncategorias = conseguirCategorias($mibaseDatos);
var_dump($ncategorias);
    
