<?php include("BD.php"); ?>
<?php
session_start();
if (isset($_SESSION['Usuario_admin'])) {
	header("location: perfilAdmin.php");
}else{

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Zapatería Arther - Damas</title>

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

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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
						
						<li><a href="login.php"><i class="fa fa-user-o"></i> My Account</a></li>
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
						<div class="col-md-6">
							<div class="header-search">
								<form action="buscar.php" method="POST" enctype="multipart/form-data">
									<input class="input" placeholder="Search here" name="buscar">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
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
						<li><a href="index.php">Inicio</a></li>
						<li class="active"><a href="damas.php">Damas</a></li>
						<li><a href="caballeros.php">Caballeros</a></li>
						<li><a href="niños.php">Niños</a></li>
						<li><a href="contacto.php">Contactanos</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/dama.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Sección<br>Dama</h3>
								<a href="damas.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/caballero.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Sección<br>Caballero</h3>
								<a href="caballeros.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/niño.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Sección<br>Niños</h3>
								<a href="niños.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
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
							<h3 class="title">Productos Damas</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php 
										$query = "SELECT * FROM Inventario  WHERE Categoria_Producto = '2'";
        								$resultadoProducto = mysqli_query($conexion_BD, $query);
        								while ($card = mysqli_fetch_array($resultadoProducto)) { 
        								?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<?php 
												$foto = $card['Img_Producto'];
												echo "<img src='data:image/jpg; base64," . base64_encode($foto) ."' >"  ?>
												<div class="product-label">
													<?php if ($card['Descuento_Producto'] > 0) {

													?>
													<span class="sale"> <?php echo "-".$card['Descuento_Producto']."%";?></span>
													<span class="new">NEW</span>
													<?php  

													}?>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php
												if ($card['Categoria_Producto'] == 1) {
													$category = "Caballero";
												}elseif ($card['Categoria_Producto'] == 2) {
													$category = "Dama";
												}else{
													$category = "Kids";
												}

												?></p>
												<h3 class="product-name"><a href="#"><?php echo $card['Descripcion_Producto']; ?> </a></h3>
												<h3 class="product-name"><a href="#"><?php echo $category; ?> </a></h3>
												<h4 class="product-price"><?php echo "$ " .$card['Precio_Producto']; ?></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo"> Realiza tu pedido</button>	
											</div>
										</div>
										<?php }?>
									</div>
									<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">

													<div class="modal-content">
														<div class="modal-header bg-info">
															<h5 class="modal-title" id="exampleModalLabel">Apartar Producto</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-body">
															<form action="registrarPedido.php.php" method="POST" enctype="multipart/form-data">
																<p>Seleccione el producto que desee apartar.</p>
																<hr>
																<div class="form-group">
												                  <label for="message-text" class="col-form-label">Descripción de producto:</label>
												                  <?php
												                  $consulta = "SELECT * FROM Inventario WHERE Categoria_Producto = '2'";
												                  $query = mysqli_query($conexion_BD, $consulta); ?>
												                  <select name="Producto">
												                    <?php while ($producto = mysqli_fetch_assoc($query)) { ?>
												                      <option><?php echo $producto['Descripcion_Producto'] ?> </option>
												                    <?php } ?> 
												                  </select>
												                </div>
												                <div class="form-group col-md-6">
															      <label for="inputZip">Cantidad</label>
															      <input type="number" class="form-control" id="inputZip" name="Cantidad">
															    </div>
															    <div class="form-group col-md-6">
																	<label for="recipient-name" class="col-form-label">Precio:</label>
																	<input type="text" class="form-control" id="recipient-name" name="Precio" >
																</div>
																<div class="form-group col-md-8">
																	<label for="recipient-name" class="col-form-label">Nombre de cliente::</label>
																	<input type="text" class="form-control" id="recipient-name" name="Nombre_Cliente" placeholder="Ej.  Benito Antonio Martínez Ocasio">
																</div><br><br><br><br><br><br><br>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<input type="submit" value="Eliminar producto" class="btn btn-info" name="submit">
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>

									<div id="slick-nav-1" class="products-slick-nav"></div>

								</div>
								<!-- /tab -->
							</div>
						</div>
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
							<h2 class="text-uppercase">Ven y aprovechas las promociones!</h2>
							<p>pregunta en tu sucursal más cercana</p>
							<a class="primary-btn cta-btn" href="index.php">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		
		<!-- /SECTION -->

		<!-- SECTION -->
		
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://twitter.com/explore"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
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
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Benito Juare Col. Centro</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+52 1 9211463535</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>Arther@email.com</a></li>
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
<?php } ?>