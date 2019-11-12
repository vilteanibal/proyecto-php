



  
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

if (!empty($ncategorias)) :
    while ($categoria = mysqli_fetch_assoc($ncategorias)) :
        echo "<br/>";
        var_dump($categorias);
      endwhile;
endif;


echo "<hr/>";
$entradas = conseguirEntradas($bd);

if (!empty($entradas) ) :
    while ($entrada = mysqli_fetch_assoc($entradas)) :
        echo "<br/>";
        var_dump($entrada);
    endwhile;
endif;



?>



<form name="pruebita" method="POST" enctype="multipart/form-data">

<?php
  $categorias = conseguirCategorias($bd);
  if (!empty($ncategorias)) :
        while ($categoria = mysqli_fetch_assoc($ncategorias)) :
?>
          <select name="categorias">
              <option value="$categorias['id']">
                  $categorias['nombre'];
            </option>
            </select>

<?php
        endwhile;
  endif;
?>


</form>       