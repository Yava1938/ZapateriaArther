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
				         
				    }else
				    {
				    	header("location: index.php");
				    	$mensaje = "Se registro un pedido a nombre de: ".$Nombre_Cliente." Su Token es: ".$Token." Tiene un plazo de 3 días para recoger su pedido o se cancelara.";
				    	 echo "<script>
						       alert('$mensaje');
						       </script>";
				    	die();
				    	
				    }

 ?>