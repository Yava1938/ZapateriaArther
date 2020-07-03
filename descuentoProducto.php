<?php
include ("BD.php");

if(isset($_POST["submit"])){
	if (($_POST['Descuento'] !== null && ($_POST['Producto']) !== null)) {
		$Producto = $_POST['Producto'];
		$Descuento = $_POST['Descuento'];


		$sql = "UPDATE Inventario SET Descuento_Producto = '$Descuento' where  Descripcion_Producto = '$Producto'";


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