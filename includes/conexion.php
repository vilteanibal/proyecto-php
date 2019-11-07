<?php

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}  
  
// Conexion
$servidor='localhost';
$usuario='hannibal';
$clave='a27d47e32v';
$base_datos='blog_master';

$bd=mysqli_connect($servidor,$usuario,$clave,$base_datos);

#$bd=mysqli_connect('localhost', 'root', '', 'blog_master');

#mysqli_query($mibd, "SET NAME 'UTF8'");
mysqli_query($bd, "SET NAME 'UTF8' ");

$_SESSION['baseDatos']=$bd;