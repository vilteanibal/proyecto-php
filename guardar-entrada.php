<?php

if (isset($_POST)){
  require_once 'includes/redireccion.php';
  require_once 'includes/conexion.php';
  
  $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($bd, $_POST['titulo'])  : false;
  $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($bd, $_POST['descripcion'])  : false;
  $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria']  : false;
  $usuario = $_SESSION['usuario']['id'];
  
  // Array de Errores
  $errores = array();


  // VALIDAR datos antes de guardarlos en la Base de Datos

  // Validar el campo TITULO
  if (!empty($titulo)  ){
    $titulo_validado = TRUE;
  }else {
    $titulo_validado = FALSE;
    $errores['titulo'] = "El Titulo no es valido";
  }

    // Validar el campo DESCRIPCION
  if (!empty($descripcion)  ){
    $descripcion_validado = TRUE;
  }else {
    $descripcion_validado = FALSE;
    $errores['descripcion'] = "La Descripcion no es valida";
  }

    // Validar el campo CATEGORIA
  if ( !empty($categoria)  && is_numeric($categoria) ){
    $categoria_validado = TRUE;
  }else {
    $categoria_validado = FALSE;
    $errores['categoria'] = "La Categoria no es valida";
  }
  
	
    $guardar_usuario = false;
  if (count($errores) == 0 ){
    $guardar_usuario = true;
    // ***  Insertar Registro en la Base de Datos
    $sql = "INSERT INTO entradas VALUES(null, '$usuario' , '$categoria' , '$titulo', '$descripcion' , CURDATE() );";
    $guardar = mysqli_query($bd , $sql  );
    if ($guardar){
        $_SESSION['completado_entrada'] = 'Entrada registrada con exito';
	 header("Location: index.php");
    }else{
        $_SESSION['errores_entrada']['general']= 'Fallo al guardar la Entrada';
	header("Location: crear-entradas.php");
      }
  }else{
    $_SESSION['errores_entrada']= $errores;
	header("Location: crear-entradas.php");
  }

  
  }
  
 

