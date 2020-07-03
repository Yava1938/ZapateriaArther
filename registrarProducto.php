<?php
include("BD.php");
session_start();


if(isset($_POST["submit"])){
	if ($_FILES["Img"]["tmp_name"]) {
		
	
		    $revisar = getimagesize($_FILES["Img"]["tmp_name"]);
		    if($revisar !== false)
		    {
		        
				$Img_Producto = addslashes(file_get_contents($_FILES['Img']['tmp_name']));
		        $Descripcion_Producto = $_POST['Descripcion_Producto'];
				$Categoria_Producto = $_POST['Categoria_Producto'];
				$Precio_Producto = $_POST['Precio_Producto'];
				$Talla_Producto = $_POST['Talla_Producto'];
				$Stock_Producto = $_POST['Stock_Producto'];

				if ($Categoria_Producto == "Caballero") 
				{
					$categoria = 1;
				}elseif ($Categoria_Producto == "Dama") 
				{
					$categoria = 2;
				}else
				{
					$categoria = 3;
				}
				        $sql="INSERT INTO Inventario  VALUES (null,'$Descripcion_Producto','$categoria','$Precio_Producto','$Talla_Producto','$Stock_Producto',CURRENT_TIME(),'$Img_Producto','0');";
				$verificarProducto = mysqli_query( $conexion_BD, "SELECT Descripcion_Producto FROM Inventario WHERE Descripcion_Producto='$Descripcion_Producto';");

				if (mysqli_num_rows($verificarProducto) > 0 ) 
				{
				  echo '<script>
				       alert("Producto ya registrado");
				       window.history.go(-1);
				  </script>';
				}
				 $ejecutar=mysqli_query($conexion_BD, $sql);
				    if(!$ejecutar)
				    {
				         echo"Error al registrar el producto.";
				    }else
				    {
				        echo '<script>
   			 			alert("Producto registrado correctamente")
   			 			</script>';
				        header("location: perfilAdmin.php");
				    	die();
				    }
		    }else{
		        echo "Por favor seleccione imagen a subir.";
		         }
		     }
}
 ?>