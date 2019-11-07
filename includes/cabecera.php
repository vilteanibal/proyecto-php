<?php 
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/css/mistyle.css">
    <title>Blog de Videos Juegos</title>
</head>
<body>
  <!-- Cabecera -->
  <header id="cabecera">
    <!-- Logo-->
    <div id="logo">
	<a href="index.php">Blog de Video Juegos</a>
    </div>

    <!-- Menu -->

    <nav id="menu">
      <ul>
	<li><a href="index.php">Inicio</a></li>

	  <?php $categorias = conseguirCategorias($bd); ?>
	  <?php while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
	    <li><a href="categoria.php?id=<?=$categoria['id']?>"> <?= $categoria['nombre'] ?> </a></li>
	  <?php endwhile; ?>

	<li><a href="sobremi.php">Sobre Mi</a></li>
	<li><a href="contacto.php">Contacto</a></li>
      </ul>
    </nav>
    <div class="clearfix"></div>
  </header>

    <div id="contenedor">