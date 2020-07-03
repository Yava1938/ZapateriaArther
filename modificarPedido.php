<?php
include ("BD.php");


	
		$Pedido = $_POST['Pedido'];
		$Estado = $_POST['Estado'];


		$sql = "UPDATE Pedido SET Estado_Pedido = '$Estado' where  Id_Pedido = '$Pedido'";


		$ejecutar=mysqli_query($conexion_BD, $sql);
		if(!$ejecutar){
		    echo"Error al actualizar";
		}else{
		    echo '<script>
		    			alert("Producto registrada correctamente");
		    			</script>';
		    header("location: pedidos.php");
		    die();
		}





	





?>