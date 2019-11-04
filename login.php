<?php

if (isset($_POST)) {
//      iniciar la sesion y la conexion de BD
  require_once 'includes/conexion.php';

// Iniciar sesión
  if(!isset($_SESSION)){
    session_start();
  }
  //    Recoger los datos del Formulario
  $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, trim($_POST['email'])) : false;
  $password = isset($_POST['password']) ? mysqli_real_escape_string($bd, $_POST['password']) : false;
  
  //    Consultar para comprobar las credenciales del usuario  
  $sql = "SELECT * FROM usuarios WHERE email = '$email';";
  $login = mysqli_query($bd, $sql);
  if ($login && mysqli_num_rows($login) == 1){
    $usuario = mysqli_fetch_assoc($login);
    
    //    Comprobar la Contraseña
    $verify = password_verify($password, $usuario['password']);
    
    if ($verify){
      
    } else {
      //    Mensaje de Error por Contraseña Incorrecta
    }
  }else{
    //    Mensaje de Error por Email incorrecto
  }
  

//      







//      si algo falla enviar una sesion con el fallo


}
echo "<hr/>";
var_dump($_POST);
echo "<hr/>";
echo "$email";echo "<br/>";
echo "$password";echo "<br/>";
echo "<hr/>";
var_dump($bd);echo "<br/>";
echo "<hr/>";
var_dump($sql);echo "<br/>";
var_dump($login);echo "<br/>";
echo "<hr/>";
var_dump($usuario);echo "<br/>";
var_dump($verify);
die();



//      Redigir al index
