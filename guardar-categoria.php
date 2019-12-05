<?php

if (isset($_POST)){
  require_once 'includes/redireccion.php';
  require_once 'includes/conexion.php';
  
  $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre'])  : false;
  
  // Array de Errores
  $errores = array();


  // VALIDAR datos antes de guardarlos en la Base de Datos

  // Validar el campo NOMBRE
  if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre) ){
    $nombre_validado = TRUE;
  }else {
    $nombre_validado = FALSE;
    $errores['nombre'] = "El Nombre/s no es valido";
  }

    $guardar_usuario = false;
  if (count($errores) == 0 ){
    $guardar_usuario = true;
    // ***  Insertar Registro en la Base de Datos
    $sql = "INSERT INTO categorias VALUES(null, '$nombre');";
    $guardar = mysqli_query($bd , $sql  );
    if ($guardar){
        $_SESSION['completado'] = 'Usuario registrado con exito';
    }else{
        $_SESSION['errores']['general']= 'Fallo al guardar la Categoria';
      }
  }else{
    $_SESSION['errores']= $errores;
  }

  
  }
  
  header("Location: index.php");