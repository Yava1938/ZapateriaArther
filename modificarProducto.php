<?php
include ("BD.php");

if(isset($_POST["submit"])){
	if (($_POST['Precio'] !== null && ($_POST['Producto']) !== null)) {
		$Producto = $_POST['Producto'];
		$Precio = $_POST['Precio'];


		$sql = "UPDATE Inventario SET Precio_Producto = '$Precio' where  Descripcion_Producto = '$Producto'";


		$ejecutar=mysqli_query($conexion_BD, $sql);
		if(!$ejecutar){
		    echo"Error al actualizar";
		}else{
		    echo '<script>
		    			alert("Producto registrada correctamente");
		    			</script>';
		    header("location: perfilAdmin.php");
		    die();
		}





	}

}



?>