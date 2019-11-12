<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>

<!-- Caja Principal -->
<div id="principal">
   <h1>Crear Entradas</h1>
   <p>
     Añade nuevas categorias al Blog para que los usuarios puedan usarlas
     al crear sus entradas
   </p>
   <br/>
   <form action="guardar-entradas.php" method="POST" enctype="multipart/form-data">
       
       <label for ="titulo"> Nombre del Titulo: </label>
       <input type="text" name="nombre" placeholder="Escriba el nombre de la Titulo ...">
       
       <label for ="descripcion"> Nombre de la Categoria: </label>
       <input type="text" name="descripcion" placeholder="Escriba el nombre de la descripcion ...">
       
       <input type="submit" value="Guardar"/>
   </form>
</div> <!--   Fin principal 	 -->

  <?php require_once 'includes/pie.php';?>    
