<?php

if (isset($_POST)) {

    // Conexión a la base de datos
    require_once 'includes/conexion.php';

    // Iniciar sesión
    if(!isset($_SESSION)){
        session_start();
    }
    

    // Recoger los valores del Formulario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre'])  : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($bd, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($bd, $_POST['password']) : false;
    
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
    if (!empty($password) ){
        $contrasenia_validado = TRUE;
    }  else {
        $contrasenia_validado = FALSE;
        $errores['password'] = "La contraseña esta vacia";
    }
    
    $guardar_usuario = false;
    if (count($errores) == 0 ){
        $guardar_usuario = true;

        //  Cifrar la Contraseña
        $password_segura = password_hash($password,PASSWORD_BCRYPT, ['cost'=>4]);
        
        //Insertar Registro en la Base de Datos
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($bd , $sql  );
        if ($guardar){
            $_SESSION['completado'] = 'Usuario registrado con exito';
        }else{
            $_SESSION['errores']['general']= 'Fallo al guardar el Usuario';
        }
    }else{
        $_SESSION['errores']= $errores;
        
    }
}
//echo "<hr/>";
//var_dump($_POST);
//echo "<hr/>";
//echo "<hr/>";
//echo "$nombre";echo "<br/>";
//echo "$apellidos";echo "<br/>";
//echo "$email";echo "<br/>";
//echo "$password";echo "<br/>";
//echo "<hr/>";
//var_dump($errores);
//echo "<hr/>";
//var_dump($guardar_usuario);
//echo "<hr/>";
//var_dump($password);echo "<br/>";
//var_dump($password_segura);echo "<br/>";
//var_dump(password_verify($password, $password_segura));echo "<br/>";
//
//echo "<hr/>";
//var_dump($sql);echo "<br/>";
//var_dump($bd);
//var_dump($guardar);echo "<br/>";
//die();

header('Location: index.php'); 
