<?php 

include("BD.php");

$Usuario_admin = $_POST['Usuario_Admin'];
$Contrasena_admin = $_POST['Contrasena_Admin'];

$QueryAdmin = "Select * FROM Administrador WHERE Usuario_admin ='$Usuario_admin'";


$resAdmin = mysqli_query($conexion_BD, $QueryAdmin);

$Admin = mysqli_fetch_array($resAdmin);

if ($Usuario_admin == $Admin['Usuario_admin']) {
	if ($Contrasena_admin == $Admin['Contrasena_admin']) {
      session_start();
      $_SESSION['Usuario_admin'] = $Admin['Usuario_admin'];

      
      

		 header("location: perfilAdmin.php");
     
  }else{
    echo '<script>
         alert("Contraseña incorrecta");
         window.history.go(-1);
         </script>';
  }
	}else {
  
       echo '<script>
         alert("Usuario incorrecto");
         window.history.go(-1);
         </script>';
}


 ?>