<?php

if (isset($_POST)) {

    // Conexión a la base de datos
    require_once 'includes/conexion.php';

    // Iniciar sesión
    if(!isset($_SESSION)){
        session_start();
    }
    

    // Recoger los valores del Formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE ;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']: FALSE ;
    $email = isset($_POST['email']) ? $_POST['email'] : FALSE;
    $contrasenia = isset($_POST['password']) ? $_POST['password'] : FALSE;
    
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

    //  Validar el campo CONTRASEÑA
    if (!empty($contrasenia) ){
        $contrasenia_validado = TRUE;
    }  else {
        $contrasenia_validado = FALSE;
        $errores['contrasenia'] = "La contraseña esta vacia";
    }
    
    $guardar_usuario = false;
    if (count($errores) == 0 ){
        $guardar_usuario = true;

        //  Cifrar la Contraseña
        $contrasenia_segura = password_hash($contrasenia,PASSWORD_BCRYPT, ['cost'=>4]);
//        var_dump($contrasenia);
//        var_dump($contrasenia_segura);
//        var_dump(password_verify($contrasenia, $contrasenia_segura));
//        die();
//        
        // Insertar Registro en la Base de Datos
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$contrasenia_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        if ($guardar){
            $_SESSION['completado'] = 'Usuario registrado con exito';
        }else{
            $_SESSION['errores']['general']= 'Fallo al guardar el Usuario';
        }
        
        
        
    }else{
        $_SESSION['errores']= $errores;
        
    }
}
header('Location : index.php');
//var_dump($_POST);
//var_dump($errores);
