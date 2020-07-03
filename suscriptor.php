<?php
include("BD.php");

$Email = $_POST['Email'];

				
  $sql="INSERT INTO Suscriptor  VALUES (null,'$Email');";
  $verificarSuscriptor = mysqli_query( $conexion_BD, "SELECT Cerreo_Suscriptor FROM Suscriptor WHERE Cerreo_Suscriptor='$Email';");

if (mysqli_num_rows($verificarSuscriptor) > 0 ) 
{
	echo '<script>
	alert("Suscriptor ya registrado");
	window.history.go(-1);
	</script>';
}
$ejecutar=mysqli_query($conexion_BD, $sql);
	if(!$ejecutar)
	{
		echo"Error al registrarse.";
	}else{
			echo '<script>
			alert("Registrado correctamente")
			</script>';
			header("location: index.php");
			die();
	}
		  

	
		
	
		    
		        
				
				
		     

 ?>