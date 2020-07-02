<?php
include ("BD.php");

$Producto = $_POST['Producto'];


$sql ="DELETE FROM Inventario WHERE Descripcion_Producto = '$Producto'";



$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al eliminar producto";
}else{
    echo '<script>
    			alert("Actividad eliminada correctamente");
    			</script>';
    header("location: perfilAdmin.php");
    die();
}

?>