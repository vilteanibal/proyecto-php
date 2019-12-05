<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>

<!-- Caja Principal -->
<div id="principal">
   <h1>Crear Entradas</h1>
   <p>
     Añade nuevas Entradas al Blog para que los usuarios puedan leerlas y disfrutarlas
	 desde nuestro contenido
   </p>
   <br/>
   <form action="guardar-entrada.php" method="POST" enctype="multipart/form-data">
       
       <label for ="titulo"> Nombre del Titulo: </label>
       <input type="text" name="titulo" placeholder="Escriba el nombre de la Titulo ...">
	<?php echo isset ($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ; ?>
       
       <label for ="descripcion"> Descripcion: </label>
       <textarea name="descripcion" placeholder="Escriba la Descripcion de la Entrada..." ></textarea>  
	<?php echo isset ($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ; ?>
	   
	<label for="categoria"> Categorias  </label>
	<select name="categoria">
	  <?php
		$categorias = conseguirCategorias($bd);
		if (!empty($categorias)) :
		  while ($categoria = mysqli_fetch_assoc($categorias)) :
	  ?>
		  <option value = "<?=$categoria['id']; ?>" > <?=$categoria['nombre'];?> </option>
	  <?php
		  endwhile;
		endif;
	  ?>
	</select>
	<?php echo isset ($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '' ; ?>
	   
       <input type="submit" value="Guardar"/>
   </form>
   <?php borrarErrores(); ?>
</div> <!--   Fin principal 	 -->

  <?php require_once 'includes/pie.php';?>    
