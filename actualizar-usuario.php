<?php

if (isset($_POST)) {

    // Conexión a la base de datos
    require_once 'includes/conexion.php';

    // Iniciar sesión
    if(!isset($_SESSION)){
        session_start();
    }
    

    // Recoger los valores del Formulario de Actualizacion de Usuario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre'])  : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($bd, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, trim($_POST['email'])) : false;
    
    // Array de Errores
    $errores = array();


    // VALIDAR datos antes de guardarlos en la Base de Datos
    
    // Validar el campo NOMBRE
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre) ){
        $nombre_validado = TRUE;
    }  else {
        $nombre_validado = FALSE;
        $errores['nombre'] = "El Nombre/s no es valido";
    }

    //  Validar el campo APELLIDOS
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos) ){
        $apellidos_validado = TRUE;
    }  else {
        $apellidos_validado = FALSE;
        $errores['apellidos'] = "El Apellido/s no es valido";
    }

    //  Validar el campo EMAIL
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $email_validado = TRUE;
    }  else {
        $email_validado = FALSE;
        $errores['email'] = "El email no es valido";
    }

   
    $guardar_usuario = false;
    if (count($errores) == 0 ){
        $guardar_usuario = true;

        
    // Actualizar Datos de un Usuario Registrado en la Base de Datos
    $sql = "UPDATE usuarios SET ".
           "nombre = '$nombre', ".
           "apellidos = '$apellidos', ".
           "email = '$email' ".
           "WHERE id = ".$usuario['id'];        
    $guardar = mysqli_query($bd , $sql  );
    
      if ($guardar){
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellidos'] = $apellidos;
        $_SESSION['usuario']['email'] = $email;
        
        $_SESSION['completado'] = 'Tus datos se han Actualizado con exito';
      }else{
        $_SESSION['errores']['general']= 'Fallo al Actualizar tus Datos';
      }
    }else{
      $_SESSION['errores']= $errores;
    }
}

header('Location: mis-datos.php'); 
