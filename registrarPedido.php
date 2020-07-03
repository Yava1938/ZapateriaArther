<?php
include("BD.php");
				$Producto = $_POST['Producto'];
				$Cantidad = $_POST['Cantidad'];
				$Nombre_Cliente = $_POST['Nombre_Cliente'];
				
				$valores = "SELECT * FROM Inventario WHERE Descripcion_Producto = '$Producto'";
				$query = mysqli_query($conexion_BD, $valores);
				$producto = mysqli_fetch_assoc($query);
				$Id_Producto = $producto['Id_Producto'];
				$PrecioU = $producto['Precio_Producto'];
				$Precio = $Cantidad * $PrecioU;
				$Token=mt_rand(1,5800);
				$Estado = "Pendiente";
				$fecha = date("Y-m-d H:i:s");
				        
						$sql="INSERT INTO Pedido  VALUES (null,'$Id_Producto','$Cantidad','$Precio','$Nombre_Cliente','$Token','$fecha','$Estado');";
				    $ejecutar=mysqli_query($conexion_BD, $sql);
				    if(!$ejecutar)
				    {
				    	echo"Error al registrar el producto.";
				         echo $Cantidad."<br>";
				         echo $Precio."<br>";
				         echo $Nombre_Cliente."<br>";
				         echo $Token."<br>";
				         echo $fecha. "<br>";	
				         echo $Estado;
				    }else
				    {
				    	echo '<script>
   			 			alert("Pedido registrado correctamente")
   			 			</script>';
				        header("location: damas.php");
				    	die();
				    }
 ?>