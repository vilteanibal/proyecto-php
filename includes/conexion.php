<?php

// Conexion
$servidor='192.168.1.108';
$usuario='hannibal';
$clave='a27d47e32v';
$base_datos='blog';

#$mibd=mysqli_connect($servidor,$usuario,$clave,$base_datos);

$db=mysqli_connect('localhost', 'root', '', 'blog_master');

#mysqli_query($mibd, "SET NAME 'UTF8'");
mysqli_query($db, "SET NAME 'UTF8' ");

// Iniciar session

session_start();