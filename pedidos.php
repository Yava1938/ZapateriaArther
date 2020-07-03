<?php include("BD.php"); ?>
<?php
session_start();
if (isset($_SESSION['Usuario_admin'])) {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Zapatería Arther</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href=""><i class="fa fa-phone"></i> +52 1 9211463535</a></li>
						<li><a href=""><i class="fa fa-envelope-o"></i> Arther@email.com</a></li>
						<li><a href=""><i class="fa fa-map-marker"></i> 1734 Benito Juare Col. Centro</a></li>
					</ul>
					<ul class="header-links pull-right">
						
						<li><a href="CerrarSesion.php"><i class="fa fa-user-o"></i> Salir</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/arther.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<br>
						<li><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Modificar</button></li>
					</ul>
					<ul class="header-links pull-right">
						<br>
						<li><a href="perfilAdmin.php"><button type="button" class="btn btn-primary">Inicio</button></a></li>
						<li><a href="ReportesCancelados.php"><button type="button" class="btn btn-primary">Reportes canelados</button></a></li>
						<li><a href="ReportesVendidos.php"><button type="button" class="btn btn-primary">Reportes Vendidos</button></a></li>
					</ul>
					
<!-- Formulario Modificar -->
			<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">

					<div class="modal-content">
						<div class="modal-header bg-warning text-dark">
							<h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form action="modificarPedido.php" method="POST" enctype="multipart/form-data">
								<p>Ingresa los datos requeridos modificar algun producto.</p>
								<hr>
								<div class="form-group">
				                  <p>Selecciona el producto a eliminar.</p>
				                  <label for="message-text" class="col-form-label">Descripción de producto:</label>
				                  <?php
				                  $consulta = "SELECT * FROM Pedido";
				                  $query = mysqli_query($conexion_BD, $consulta); ?>
				                  <select name="Pedido">
				                    <?php while ($producto = mysqli_fetch_assoc($query)) { ?>
				                      <option><?php echo $producto['Id_Pedido'] ?> </option>
				                    <?php } ?> 
				                  </select>
				                </div>
								<div class="form-group col-md-4">
							      <label for="inputState">Estado</label>
							      <select id="inputState" class="form-control" name="Estado">
							        <option selected>Vendida</option>
							        <option>Cancelada</option>
							      </select>
							    </div>
								<br><br><br><br>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<input type="submit" value="Modificar producto" class="btn btn-warning" name="submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Formulario Eliminar -->
		</div>
		</div>
		</div>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->

			</div>
			<!-- /container -->
			<br>
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Pedidos</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="container">
			        <center>
			          <table class="table" id="actividades">
			            <thead>
			              <tr>
			                <th scope="col">id</th>
			                <th scope="col">Producto</th>
			                <th scope="col">Cantidad</th>
			                <th scope="col">Precio</th>
			                <th scope="col">Estado</th>
			                <th scope="col">Fecha</th>
			              </tr>
			            </thead>
			            <?php
				        $consulta = "SELECT * FROM Pedido";
				        $query = mysqli_query($conexion_BD, $consulta);
			            while ($tab = mysqli_fetch_array($query)) {    ?>

			              <tbody>
			                <tr>
			                  <th scope="row"><?php echo $tab['Id_Pedido'] ?></th>
			                  <td><?php echo $tab['Id_Producto'] ?></td>
			                  <td><?php echo $tab['Cantidad_Producto'] ?></td>
			                  <td><?php echo $tab['Precio_Pedido'] ?></td>
			                  <td><?php echo $tab['Estado_Pedido'] ?></td>
			                  <td><?php echo $tab['Fecha_Pedido'] ?></td>
			                </tr>
			              </tbody>
			            <?php } ?>
			          </table>
			        </center>
			      </div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Crea descuentos para tus clientes!</h2>
							<p>Registra los descuentos</p>
							<a class="primary-btn cta-btn" data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo">Nuevo descuento</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- Generador de descuentos-->
		<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">

					<div class="modal-content">
						<div class="modal-header bg-info text-white">
							<h5 class="modal-title" id="exampleModalLabel">Crear descuento</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form action="descuentoProducto.php" method="POST" enctype="multipart/form-data">
								<p>Ingresa los datos requeridos modificar algun producto.</p>
								<hr>

								<div class="form-group">
				                  <p>Selecciona el producto a eliminar.</p>
				                  <label for="message-text" class="col-form-label">Descripción de producto:</label>
				                  <?php
				                  $consulta = "SELECT * FROM Inventario";
				                  $query = mysqli_query($conexion_BD, $consulta); ?>
				                  <select name="Producto">
				                    <?php while ($producto = mysqli_fetch_assoc($query)) { ?>
				                      <option><?php echo $producto['Descripcion_Producto'] ?> </option>
				                    <?php } ?> 
				                  </select>
				                </div>

								<div class="form-group col-md-4">
							      <label for="inputState">Descuento</label>
							      <select id="inputState" class="form-control" name="Descuento">
							        <option selected>0</option>
							        <option>10</option>
							        <option>20</option>
							        <option>30</option>
							        <option>40</option>
							        <option>50</option>
							        <option>60</option>
							        <option>70</option>
							        <option>80</option>
							        <option>90</option>
							      </select>
							    </div>
								<br><br><br><br>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<input type="submit" value="Registrar descuento" class="btn btn-info" name="submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- Fin Generador de descuentos-->
		<!-- NEWSLETTER -->
		
		<!-- /NEWSLETTER -->
		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">SOBRE NOSOTROS</h3>
								<p>Somos una empresa socialmente responsable y comprometida con brindarle un servicio de calidad a través de los mejores productos de calzado.</p>
								<ul class="footer-links">
									<li><a href=""><i class="fa fa-map-marker"></i>1734 Benito Juare Col. Centro</a></li>
									<li><a href=""><i class="fa fa-phone"></i>+52 1 9211463535</a></li>
									<li><a href=""><i class="fa fa-envelope-o"></i>Arther@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="damas.php">Damas</a></li>
									<li><a href="caballeros.php">Caballeros</a></li>
									<li><a href="niños.php">Niños</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="us.php">Acerca de Nosotros</a></li>
									<li><a href="contacto.php">Contactanos</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="index.php">Inicio</a></li>
									<li><a href="login.php">Login</a></li>
									<li><a href="damas.php">Damas</a></li>
									<li><a href="caballeros.php">Caballeros</a></li>
									<li><a href="niños.php">Niños</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Zapaterias Arther <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
<?php } else {
  header("location: index.php");
} ?>