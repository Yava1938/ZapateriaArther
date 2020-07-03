<?php

$Buscar = $_POST['buscar'];


if ($Buscar == "Caballero") {
	header("location: caballeros.php");
	die();
}elseif ($Buscar == "Dama") {
	header("location: damas.php");
	die();
}elseif ($Buscar == "Niño" || $Buscar == "Kids") {
	header("location: niños.php");
	die();
}else{
	header("location: index.php");
	die();
}


?>