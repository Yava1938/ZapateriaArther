<?php

$usuario = "root";
$password = "";
$servidor = "localhost";
$basedatos = "Arther";

$conexion_BD = mysqli_connect($servidor,$usuario,$password,$basedatos);

//Conexion al servidor
$conexion=mysqli_connect($servidor,$usuario,$password) or die ("Error al conectar con la BD");
//Conexion a la BD
$db = mysqli_select_db($conexion, $basedatos) or die ("Error conexion al conectarse a la BD");


 ?>
