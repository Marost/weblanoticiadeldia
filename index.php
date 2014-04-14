<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//NOTICIA DESTACADA
$rst_not_dest=mysql_query("SELECT * FROM lndd_noticia WHERE destacada=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 4", $conexion);

//NOTICIA SUPERIOR 1
$rst_not_sup1=mysql_query("SELECT * FROM lndd_noticia WHERE superior_1=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup1=mysql_fetch_array($rst_not_sup1);

//VARIABLES
$notSup1_id=$fila_not_sup1["id"];
$notSup1_url=$fila_not_sup1["url"];
$notSup1_titulo=$fila_not_sup1["titulo"];
$notSup1_contenido=soloDescripcion($fila_not_sup1["contenido"]);
$notSup1_imagen=$fila_not_sup1["imagen"];
$notSup1_imagen_carpeta=$fila_not_sup1["imagen_carpeta"];
$notSup1_categoria=$fila_not_sup1["categoria"];
$notSup1_web=$web."noticia/".$notSup1_id."-".$notSup1_url;
$notSup1_web_img=$web."imagenes/upload/".$notSup1_imagen_carpeta."thumb/".$notSup1_imagen;

//FECHA PUBLICACION
$notSup1_fecha=$fila_not_sup1["fecha_publicacion"];
if($notSup1_fecha=="0000-00-00 00:00:00"){
	$notSup1_fecha=$fila_not_sup1["fecha"];
}else{ $notSup1_fecha=notaTiempo($notSup1_fecha);} 

//CATEGORIA
$fila_notsup1_cat=seleccionTabla($notSup1_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup1Cat_url=$fila_notsup1_cat["url"];
$notSup1Cat_titulo=$fila_notsup1_cat["categoria"];
$notSup1Cat_web=$web."seccion/".$notSup1_categoria."/".$notSup1Cat_url;

//NOTICIA SUPERIOR 2
$rst_not_sup2=mysql_query("SELECT * FROM lndd_noticia WHERE superior_2=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup2=mysql_fetch_array($rst_not_sup2);

//VARIABLES
$notSup2_id=$fila_not_sup2["id"];
$notSup2_url=$fila_not_sup2["url"];
$notSup2_titulo=$fila_not_sup2["titulo"];
$notSup2_contenido=soloDescripcion($fila_not_sup2["contenido"]);
$notSup2_imagen=$fila_not_sup2["imagen"];
$notSup2_imagen_carpeta=$fila_not_sup2["imagen_carpeta"];
$notSup2_categoria=$fila_not_sup2["categoria"];
$notSup2_web=$web."noticia/".$notSup2_id."-".$notSup2_url;
$notSup2_web_img=$web."imagenes/upload/".$notSup2_imagen_carpeta."thumb/".$notSup2_imagen;

//FECHA PUBLICACION
$notSup2_fecha=$fila_not_sup2["fecha_publicacion"];
if($notSup2_fecha=="0000-00-00 00:00:00"){
	$notSup2_fecha=$fila_not_sup2["fecha"];
}else{ $notSup2_fecha=notaTiempo($notSup2_fecha);} 

//CATEGORIA
$fila_notsup2_cat=seleccionTabla($notSup2_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup2Cat_url=$fila_notsup2_cat["url"];
$notSup2Cat_titulo=$fila_notsup2_cat["categoria"];
$notSup2Cat_web=$web."seccion/".$notSup2_categoria."/".$notSup2Cat_url;

//NOTICIA SUPERIOR 3
$rst_not_sup3=mysql_query("SELECT * FROM lndd_noticia WHERE superior_3=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup3=mysql_fetch_array($rst_not_sup3);

//VARIABLES
$notSup3_id=$fila_not_sup3["id"];
$notSup3_url=$fila_not_sup3["url"];
$notSup3_titulo=$fila_not_sup3["titulo"];
$notSup3_contenido=soloDescripcion($fila_not_sup3["contenido"]);
$notSup3_imagen=$fila_not_sup3["imagen"];
$notSup3_imagen_carpeta=$fila_not_sup3["imagen_carpeta"];
$notSup3_categoria=$fila_not_sup3["categoria"];
$notSup3_web=$web."noticia/".$notSup3_id."-".$notSup3_url;
$notSup3_web_img=$web."imagenes/upload/".$notSup3_imagen_carpeta."thumb/".$notSup3_imagen;

//FECHA PUBLICACION
$notSup3_fecha=$fila_not_sup3["fecha_publicacion"];
if($notSup3_fecha=="0000-00-00 00:00:00"){
	$notSup3_fecha=$fila_not_sup3["fecha"];
}else{ $notSup3_fecha=notaTiempo($notSup3_fecha);} 

//CATEGORIA
$fila_notsup3_cat=seleccionTabla($notSup3_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup3Cat_url=$fila_notsup3_cat["url"];
$notSup3Cat_titulo=$fila_notsup3_cat["categoria"];
$notSup3Cat_web=$web."seccion/".$notSup3_categoria."/".$notSup3Cat_url;

//NOTICIA SUPERIOR 4
$rst_not_sup4=mysql_query("SELECT * FROM lndd_noticia WHERE superior_4=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup4=mysql_fetch_array($rst_not_sup4);

//VARIABLES
$notSup4_id=$fila_not_sup4["id"];
$notSup4_url=$fila_not_sup4["url"];
$notSup4_titulo=$fila_not_sup4["titulo"];
$notSup4_contenido=soloDescripcion($fila_not_sup4["contenido"]);
$notSup4_imagen=$fila_not_sup4["imagen"];
$notSup4_imagen_carpeta=$fila_not_sup4["imagen_carpeta"];
$notSup4_categoria=$fila_not_sup4["categoria"];
$notSup4_web=$web."noticia/".$notSup4_id."-".$notSup4_url;
$notSup4_web_img=$web."imagenes/upload/".$notSup4_imagen_carpeta."thumb/".$notSup4_imagen;

//FECHA PUBLICACION
$notSup4_fecha=$fila_not_sup4["fecha_publicacion"];
if($notSup4_fecha=="0000-00-00 00:00:00"){
	$notSup4_fecha=$fila_not_sup4["fecha"];
}else{ $notSup4_fecha=notaTiempo($notSup4_fecha);} 

//CATEGORIA
$fila_notsup4_cat=seleccionTabla($notSup4_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup4Cat_url=$fila_notsup4_cat["url"];
$notSup4Cat_titulo=$fila_notsup4_cat["categoria"];
$notSup4Cat_web=$web."seccion/".$notSup4_categoria."/".$notSup4Cat_url;

//NOTICIA SUPERIOR 5
$rst_not_sup5=mysql_query("SELECT * FROM lndd_noticia WHERE superior_5=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup5=mysql_fetch_array($rst_not_sup5);

//VARIABLES
$notSup5_id=$fila_not_sup5["id"];
$notSup5_url=$fila_not_sup5["url"];
$notSup5_titulo=$fila_not_sup5["titulo"];
$notSup5_contenido=soloDescripcion($fila_not_sup5["contenido"]);
$notSup5_imagen=$fila_not_sup5["imagen"];
$notSup5_imagen_carpeta=$fila_not_sup5["imagen_carpeta"];
$notSup5_categoria=$fila_not_sup5["categoria"];
$notSup5_web=$web."noticia/".$notSup5_id."-".$notSup5_url;
$notSup5_web_img=$web."imagenes/upload/".$notSup5_imagen_carpeta."thumb/".$notSup5_imagen;

//FECHA PUBLICACION
$notSup5_fecha=$fila_not_sup5["fecha_publicacion"];
if($notSup5_fecha=="0000-00-00 00:00:00"){
	$notSup5_fecha=$fila_not_sup5["fecha"];
}else{ $notSup5_fecha=notaTiempo($notSup5_fecha);} 

//CATEGORIA
$fila_notsup5_cat=seleccionTabla($notSup5_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup5Cat_url=$fila_notsup5_cat["url"];
$notSup5Cat_titulo=$fila_notsup5_cat["categoria"];
$notSup5Cat_web=$web."seccion/".$notSup5_categoria."/".$notSup5Cat_url;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LNDD</title>
	
	<?php require_once("wg-header-script.php"); ?>
	
</head>
<body>

	<!--HEADER-->
	<?php require_once("wg-header.php"); ?>
	<!--END HEADER-->

	<!--CONTAINER-->
	<div class="container">

		<!--MENU-->
		<nav class="clearfix">

			<a href="" id="menu-button"><i class="fa fa-bars"></i></a>

			<ul class="menu col-md-9 list-inline">
				<li><a href="fashion.html">Política</a></li>
				<li class="dropdown-submenu">
					<a href="travel.html">Actualidad</a>
					<ul class="dropdown-menu">
						<li><a href="">xxx1</a></li>
						<li class="dropdown-submenu">
							<a href="">xxxxx2</a>
							<ul class="dropdown-menu">
								<li><a href="">xxxx3</a></li>
								<li><a href="">xxxx4</a></li>
								<li><a href="">xxxx5</a></li>
							</ul>
						</li>
						<li><a href="">xxxxx6/a></li>
						<li><a href="">xxxx7</a></li>
						<li><a href="">xxxxx8</a></li>
					</ul>
				</li>
				<li><a href="fashion.html">Economía</a></li>
				<li><a href="travel.html">Tecnología</a></li>
				<li class="dropdown-submenu">
					<a href="fashion.html">Mundo</a>
					<ul class="dropdown-menu">
						<li><a href="">xxxxx1</a></li>
						<li><a href="">Mxxxx2</a></li>
						<li><a href="">xxxxx3</a></li>
						<li><a href="">xxxx4</a></li>
						<li><a href="">xxxxx5</a></li>
					</ul>
				</li>
				<li><a href="travel.html">Sociedad y Cultura</a></li>
				<li></li>
				<li></li>
			</ul>
			<form class="form-search col-md-3">
				<div class="input-group">
					<input type="text" class="search-query form-control" placeholder="Buscar">
	      			<span class="input-group-btn">
	        			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	      			</span>
			  	</div>
			</form>

		</nav>
		<!--END MENU-->
		
		<!--MAIN SECTION-->
		<div class="main">

			<div class="row">

				<!--CONTENT-->
				<div class="posts col-md-9 col-sm-12">

					<!--BREAKING NEWS-->
					<div class="row">
						<div class="breaking col-md-12 col-sm-12">
							<div class="controls">
								<p class="prev"><i class="fa fa-angle-left"></i></p>
								<p class="next"><i class="fa fa-angle-right"></i></p>
							</div>
							<ul class="news">
								<li>
                                <span> Lo último! </span>
									Aumenta presión occidental contra Rusia por el referendo en Crimea
								</li>
								<li>
									<span> Lo último! </span>
									Muere estudiante en nuevo día de protestas en Venezuela. 
								</li>
								
								<li>
                                <span> Lo último! </span>
									Jessica Chastain:Hollywood's Most Versatile Star
								</li>
							</ul>
						</div>
					</div>
					<!--END BREAKING NEWS-->

					<!-- NOTICIA SUPERIOR -->
					<div class="row">

						<!-- POST SLIDER -->
						<div class="post-slider col-md-8 col-sm-8">

							<div class="controls">
								<p class="prev"><i class="fa fa-angle-left"></i></p>
								<p class="next"><i class="fa fa-angle-right"></i></p>
							</div>

							<div class="slides">
								<?php while($fila_not_dest=mysql_fetch_array($rst_not_dest)){
										//VARIABLES
										$notDest_id=$fila_not_dest["id"];
										$notDest_url=$fila_not_dest["url"];
										$notDest_titulo=$fila_not_dest["titulo"];
										$notDest_contenido=soloDescripcion($fila_not_dest["contenido"]);
										$notDest_imagen=$fila_not_dest["imagen"];
										$notDest_imagen_carpeta=$fila_not_dest["imagen_carpeta"];
										$notDest_categoria=$fila_not_dest["categoria"];

										//FECHA PUBLICACION
										$notDest_fecha=$fila_not_dest["fecha_publicacion"];
					                    if($notDest_fecha=="0000-00-00 00:00:00"){
					                        $notDest_fecha=$fila_not_dest["fecha"];
					                    }else{ $notDest_fecha=notaTiempo($notDest_fecha);} 

										//URLS
										$notDest_web=$web."noticia/".$notDest_id."-".$notDest_url;
										$notDest_web_img=$web."imagenes/upload/".$notDest_imagen_carpeta."thumb/".$notDest_imagen;

										//NOTICIA DESTACADA - CATEGORIA
										$rst_notdest_cat=mysql_query("SELECT * FROM lndd_noticia_categoria WHERE id=$notDest_categoria;", $conexion);
										$fila_notdest_cat=mysql_fetch_array($rst_notdest_cat);

										//VARIABLES
										$notDestCat_url=$fila_notdest_cat["url"];
										$notDestCat_titulo=$fila_notdest_cat["categoria"];
										$notDestCat_web=$web."seccion/".$notDest_categoria."/".$fila_notdest_cat["url"];
								?>
								<article class="big clearfix">
									<img src="<?php echo $notDest_web_img; ?>" alt="<?php echo $notDest_titulo; ?>" width="570px" height="460px">
									<div class="info">
										<p class="tags">
											<a href=""><?php echo $notDestCat_titulo; ?></a>
										</p>
										<h1><a href=""><?php echo $notDest_titulo; ?></a></h1>
										<p class="text">
											<?php echo $notDest_contenido; ?>
										</p>
										<p class="details"><?php echo $notDest_fecha; ?><!--  | <a href="author.html">Julio De La Cruz</a> --></p>
									</div>
								</article>
								<?php } ?>

							</div>

						</div>
						<!-- FIN POST SLIDER -->

						<article class="col-md-4 col-sm-4 mid">
							<div class="img">
								<img src="<?php echo $notSup1_web_img; ?>" alt="<?php echo $notSup1Cat_titulo; ?>" width="270">
							</div>
							<div class="info">
								<p class="tags">
									<a href=""><?php echo $notSup1Cat_titulo; ?></a><a href=""></a>
								</p>
								<h1><a href=""><?php echo $notSup1_titulo; ?></a></h1>
								<p class="details"><?php echo $notSup1_fecha ?><!--  | <a href="author.html">Julio De La cruz</a> --></p>
								<p class="text">
									<?php echo $notSup1_contenido; ?>
								</p>
							</div>
						</article>

					</div>
					<!-- FIN NOTICIA SUPERIOR -->

					<!-- NOTICIA CENTRAL -->
					<div class="row">

						<!-- COLUMNISTAS -->
						<div class="col-md-4 col-sm-4">

							<article class="col-md-12 col-sm-12 small col">
								<img src="img/small2.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Hipster Stuff</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Augusto Alvares</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
							<article class="col-md-12 col-sm-12 small col">
								<img src="img/small3.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Floral</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Kourd buneo</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
							<article class="col-md-12 col-sm-12 small col">
								<img src="img/small4.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Small Dogs</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Rosa Maria Palacios</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
							<article class="col-md-12 col-sm-12 small col">
								<img src="img/small2.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">iPhone 5s Review</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Augusto Alvares</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
							<article class="col-md-12 col-sm-12 small col">
								<img src="img/small3.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Pets Problems</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Kourd Burneo</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
							<article class="col-md-12 col-sm-12 small col">
								<img src="img/small4.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">10 Free Wood Patterns</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Rosa Maria Palacios</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>

						</div>
						<!-- FIN COLUMNISTAS -->

						<!-- NOTICIA CENTRAL -->
						<article class="col-md-4 col-sm-4 mid">
							<div class="img">
								<img src="<?php echo $notSup2_web_img; ?>" alt="<?php echo $notSup2Cat_titulo; ?>" width="270">
							</div>
							<div class="info">
								<p class="tags">
									<a href=""><?php echo $notSup2Cat_titulo; ?></a><a href=""></a>
								</p>
								<h1><a href=""><?php echo $notSup2_titulo; ?></a></h1>
								<p class="details"><?php echo $notSup2_fecha ?><!--  | <a href="author.html">Julio De La cruz</a> --></p>
								<p class="text">
									<?php echo $notSup2_contenido; ?>
								</p>
							</div>
						</article>
						<!-- FIN NOTICIA CENTRAL -->

						<!-- NOTICIA CENTRAL -->
						<article class="col-md-4 col-sm-4 mid">
							<div class="img">
								<img src="<?php echo $notSup3_web_img; ?>" alt="<?php echo $notSup3Cat_titulo; ?>" width="270">
							</div>
							<div class="info">
								<p class="tags">
									<a href=""><?php echo $notSup3Cat_titulo; ?></a><a href=""></a>
								</p>
								<h1><a href=""><?php echo $notSup3_titulo; ?></a></h1>
								<p class="details"><?php echo $notSup3_fecha ?><!--  | <a href="author.html">Julio De La cruz</a> --></p>
								<p class="text">
									<?php echo $notSup3_contenido; ?>
								</p>
							</div>
						</article>
						<!-- FIN NOTICIA CENTRAL -->

					</div>
					<!-- FIN NOTICIA CENTRAL -->

					<!-- NOTICIA INFERIOR -->
					<div class="row">

						<article class="col-md-4 col-sm-4 mid">
							<div class="img">
								<img src="<?php echo $notSup4_web_img; ?>" alt="<?php echo $notSup4Cat_titulo; ?>" width="270">
							</div>
							<div class="info">
								<p class="tags">
									<a href=""><?php echo $notSup4Cat_titulo; ?></a><a href=""></a>
								</p>
								<h1><a href=""><?php echo $notSup4_titulo; ?></a></h1>
								<p class="details"><?php echo $notSup4_fecha ?><!--  | <a href="author.html">Julio De La cruz</a> --></p>
								<p class="text">
									<?php echo $notSup4_contenido; ?>
								</p>
							</div>
						</article>

						<article class="col-md-8 col-sm-8 big">
							<div class="img">
								<img src="<?php echo $notSup5_web_img; ?>" alt="<?php echo $notSup5Cat_titulo; ?>" width="570" height="460">
							</div>
							<div class="info">
								<p class="tags">
									<a href=""><?php echo $notSup5Cat_titulo; ?></a><a href=""></a>
								</p>
								<h1><a href=""><?php echo $notSup5_titulo; ?></a></h1>
								<p class="details"><?php echo $notSup5_fecha ?><!--  | <a href="author.html">Julio De La cruz</a> --></p>
								<p class="text">
									<?php echo $notSup5_contenido; ?>
								</p>
							</div>
						</article>

					</div>
					<!-- NOTICIA INFERIOR -->

				</div>
				<!--END CONTENT-->

				<!--SIDEBAR-->
				<aside class="col-md-3 col-sm-12">
					
					<!-- CONTADOR SOCIAL MEDIA -->
					<ul class="aside-social list-inline visible-md visible-lg">
						<li>
							<i class="fa fa-facebook"></i>
							<p>162K</p>
						</li>
						<li>
							<i class="fa fa-twitter"></i>
							<p>73K</p>
						</li>
						<li>
							<i class="fa fa-google-plus"></i>
							<p>29K</p>
						</li>
						<li>
							<i class="fa fa-rss"></i>
							<p>9,012</p>
						</li>
					</ul>
					<!-- FIN CONTADOR SOCIAL MEDIA -->

					<!-- SUSCRIPCION -->
					<div class="newsletter visible-md visible-lg">
						<h3>Mantente al dia</h3>
						<p>Suscribe y recive por mail lo ultimo en informacion y participa de nuestros sorteos</p>
						<form action="POST">
							<input type="email" class="form-control" placeholder="Enter your email">
							<input type="submit" value="suscribete" class="btn btn-default btn-block">
						</form>
					</div>
					<!-- FIN SUSCRIPCION -->

					<!-- PUBLICIDAD -->
					<div class="banner visible-md visible-lg">
						<img src="img/banner2.png" alt="banner">
					</div>
					<!-- PUBLICIDAD -->

					<div class="hidden-xs hidden-sm hidden-md hidden-lg"></div>

					<!-- BLOG -->
					<div class="most-discussed col-md-12 col-sm-6">
						<h4>Blogs</h4>
							<article class="small clearfix">
								<img src="img/small_10.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Trend Colours 2014</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Melomano</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
						
							<article class="small clearfix">
								<img src="img/small_11.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Couple Problems</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">El pasajero</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
						
							<article class="small clearfix">
								<img src="img/small_12.jpg" alt="post">
								<div class="info">
									<p class="tags">
										<a href="">Science</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Mismo Backpaks</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">dinosaurio de latón</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
						<a href="#" class="btn btn-default">Ver todos</a>
					</div>
					<!-- FIN BLOG -->

					<!-- GALERIA DE FOTOS FLICKR -->
					<div class="flickr col-md-12 col-sm-6">
						<h4>Flickr galeria fotografica</h4>
					</div>
					<!-- FIN GALERIA DE FOTOS FLICKR -->

				</aside>
				<!--END SIDEBAR-->
			</div>

			<!-- DEPORTES -->
			<div class="popular">

				<div class="clearfix">
					<h3>Deportes</h3>
					<div class="gallery-nav">
						<p class="prev"><i class="fa fa-angle-left"></i></p>
						<p class="next"><i class="fa fa-angle-right"></i></p>
					</div>
				</div>

				<div class="row gallery">
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte1.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deporte</a>
								<a href="">Champion League</a>
							</p>
							<h1><a href="">This Week In Pictures</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte2.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deporte</a>
								<a href="">Brasil 2014</a>
							</p>
							<h1><a href="">Mismo Backpaks</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte1.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Champion League</a>
							</p>
							<h1><a href="">Theatre Of Actuality</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte4.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Premier League</a>
							</p>
							<h1><a href="">Macnchester Chelsea</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte2.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Brasil 2014</a>
							</p>
							<h1><a href="">Floral</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte4.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Premier League</a>
							</p>
							<h1><a href="">Perfect Quality Materials</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte1.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Liga Española</a>
							</p>
							<h1><a href="">Moto X Drop Test</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte5.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Liga Española</a>
							</p>
							<h1><a href="">iPhone 5s Review</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte3.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Liga Española</a></p>
							<h1><a href="">Street Journey</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte5.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Liga Española</a>
							</p>
							<h1><a href="">Eco Water</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte2.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Brasil 2014</a>
							</p>
							<h1><a href="">Ukraine Revolution</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-3 col-sm-3">
						<div class="img">
							<img src="img/deporte4.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Deportes</a>
								<a href="">Premier League</a>
							</p>
							<h1><a href="">Sahara</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
				</div>

				<div class="pager"></div>

			</div>
			<!-- FIN DEPORTES -->
			
			<div class="category row">

				<!--CATEGORY SECTION-->
				<div class="col-md-9 col-sm-12">

					<!-- VARIEDAD -->
					<h3>Variedad</h3>		
					<div class="row">
						<article class="col-md-4 col-sm-4 mid">
							<div class="img">
								<img src="img/mid.jpg" alt="post">
							</div>
							<div class="info">
								<p class="tags">
									<a href="">xxxxxx</a>
									<a href="">xxxxxxx</a>
									<a href="">xxxxxx</a>
								</p>
								<h1><a href="">bdj hdbcjs dbsjb</a></h1>
								<p class="details">Sep 25, 2013 | <a href="author.html">Julio sdvhsg</a></p>
								<p class="text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
								
							</div>
						</article>
						<article class="col-md-4 col-sm-4 mid">
							<div class="img">
								<img src="img/mid.jpg" alt="post">
							</div>
							<div class="info">
								<p class="tags">
									<a href="">dccsc</a>
									<a href="">cscscd</a>
								</p>
								<h1><a href="">dcscsc sdcscc</a></h1>
								<p class="details">Sep 25, 2013 | <a href="author.html">Julio fgefef</a></p>
								<p class="text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
								
							</div>
						</article>
						<article class="col-md-4 col-sm-4 mid">
							<div class="img">
								<img src="img/mid.jpg" alt="post">
							</div>
							<div class="info">
								<p class="tags">
									<a href="">sxsxa</a>
									<a href="">xasxasx</a>
								</p>
								<h1><a href="">saxadca dsvv</a></h1>
								<p class="details">Sep 25, 2013 | <a href="author.html">vs fvfv</a></p>
								<p class="text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
								
							</div>
						</article>
					</div>
					<!-- FIN VARIEDAD -->

					<!--TABS-->
					<div class="row">

						<div class="col-md-12 col-sm-12">

				            <ul id="Tabs" class="nav nav-tabs">
				              	<li class="active"><a href="#fasion" data-toggle="tab">Sociedad y Cultura</a></li>
				              	<li><a href="#Cine" data-toggle="tab">Cine</a></li>
				              	<li><a href="#Espectaculos" data-toggle="tab">Espectaculos</a></li>
				              	<li><a href="#Musica" data-toggle="tab">Musica</a></li>
				              	<li><a href="#Teatros" data-toggle="tab">Teatros</a></li>
				            </ul>

				            <div id="TabContent" class="tab-content">

				              	<div class="tab-pane fade active in" id="fasion">
				               	 	<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/cultura1.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Scarlett Johansson quiere ser maestra de teatro</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Roberto Guerrero</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/cultura2.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">‘Düsselford’, desamor y dislexia</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Roberto Guerrero</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/cultura3.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Demonios en el jardín</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Roberto Guerrero</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>
									<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/cultura4.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Elenco de Toc Toc celebró sus 150 funciones</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Jaime Tipe</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/cultura5.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">22 de marzo</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Jaime Tipe</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/cultura6.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">The Best Online Stores</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Julio De La Cruz</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>	
				              	</div>

				              	<div class="tab-pane fade" id="science">
				                	<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">The Predictive Power of Big Data</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Fishing Nowadays</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Moto X Drop Test</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>
									<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Neo Science</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">History Dont Sleep</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Unreal Nature</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>	
				              	</div>

				              	<div class="tab-pane fade" id="lifestyle">
				                	<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Miami Men Fashion</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Miami Women Fashion</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Couple Problems</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>
									<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Bicycle Protection</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Garden Secrets 2</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Lomography</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>	
				              	</div>

				              	<div class="tab-pane fade" id="music">
				                	<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Guitar Garage Band</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">iPhone 5s Review</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Iceland</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>
									<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Rain Rain Rain</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">The Predictive Power of Big Data</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href=""> lifestyle</a>
												</p>
												<h1>Moto X Drop Test</h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>	
				              	</div>

				              	<div class="tab-pane fade" id="movies">
				                	<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Ukrainian Revolution</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Unreal Nature</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Miami Men Fashion</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>
									<div class="row">
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">The Best Tourists Places 2014</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Fishing Nowadays</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
										<article class="col-md-4 col-sm-4 small">
											<img src="img/small.jpg" alt="post">
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Street Journey</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
												</p>
												
											</div>
										</article>
									</div>	
				              	</div>

							</div>

						</div>

					</div>
					<!--END TABS-->

				</div>
				<!--END CATEGORY SECTION-->
				
				<!--SIDEBAR-->
				<aside class="col-md-3 col-sm-12">

					<div class="most-trending col-md-12 col-sm-6">
						<h4>LO MÁS COMENTADO</h4>
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						        		<div class="nav-icon">
						        			<i class="fa fa-plus-square"></i>
						        			<i class="fa fa-minus-square"></i>
						        		</div>
						        		<h1>Deportes</h1>
						      		</a>
						   		</div>
						    	<div id="collapseOne" class="panel-collapse collapse in">
						      		<div class="panel-body">
						        		<article class="small clearfix">
											<div class="img">
												<img src="img/small.jpg" alt="post">>
											</div>
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Deportes</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Jaime Tipe</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing.
												</p>
												<a href="">Leer más<i class="fa fa-align-left"></i></a>
												
											</div>
										</article>
						      		</div>
						    	</div>
						  	</div>
						  	<div class="panel panel-default">
						    	<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
						        		<div class="nav-icon">
						        			<i class="fa fa-plus-square"></i>
						        			<i class="fa fa-minus-square"></i>
						        		</div>
						        		<h1>Política</h1>
						      		</a>
						   		</div>
						    	<div id="collapseTwo" class="panel-collapse collapse">
						      		<div class="panel-body">
						        		<article class="small clearfix">
											<div class="img">
												<img src="img/small.jpg" alt="post">>
											</div>
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Coffee Cup</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Julio de La cruz</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing.
												</p>
												<a href="">Leer más<i class="fa fa-align-left"></i></a>
												
											</div>
										</article>
						      		</div>
						    	</div>
							</div>
							<div class="panel panel-default">
						    	<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
						        		<div class="nav-icon">
						        			<i class="fa fa-plus-square"></i>
						        			<i class="fa fa-minus-square"></i>
						        		</div>
						        		<h1>Tecnología</h1>
						      		</a>
						   		</div>
						    	<div id="collapseThree" class="panel-collapse collapse">
						      		<div class="panel-body">
						        		<article class="small clearfix">
											<div class="img">
												<img src="img/small.jpg" alt="post">>
											</div>
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Tecnología</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">Roberto Guerrero</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing.
												</p>
												<a href="">Leer más<i class="fa fa-align-left"></i></a>
											</div>
										</article>
						      		</div>
						    	</div>
							</div>
							<div class="panel panel-default">
						    	<div class="panel-heading">
						    		<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed">
						        		<div class="nav-icon">
						        			<i class="fa fa-plus-square"></i>
						        			<i class="fa fa-minus-square"></i>
						        		</div>
						        		<h1>Economía</h1>
						      		</a>
						   		</div>
						    	<div id="collapseFour" class="panel-collapse collapse">
						      		<div class="panel-body">
						        		<article class="small clearfix">
											<div class="img">
												<img src="img/small.jpg" alt="post">">
											</div>
											<div class="info">
												<p class="tags">
													<a href="">Science</a>
													<a href="">lifestyle</a>
												</p>
												<h1><a href="">Economía</a></h1>
												<p class="details">Sep 25, 2013 | <a href="author.html">sddf sdhkjshd</a></p>
												<p class="text">
													Lorem ipsum dolor sit amet, consectetur adipisicing.
												</p>
												<a href="">Read more<i class="fa fa-align-left"></i></a>
											</div>
										</article>
						      		</div>
						    	</div>
							</div>
						</div>
					</div>

					<div id="twitter" class="col-md-12 col-sm-6">
						<h4>¨Últimos tweets</h4>
						<div>
							<a class="twitter-timeline" href="https://twitter.com/envato" data-widget-id="400278156189237248" data-link-color="#f1284e" data-chrome="noheader nofooter   noscrollbar" lang="EN" data-tweet-limit="2">
								@tabloidedigital
							</a>
							<script>
								!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
							</script>
						</div>
					</div>

				</aside>
				<!--END SIDEBAR-->

			</div>

			<!-- TECNOLOGIA -->
			<div class="best-week picture">

				<h3>Tecnología</h3>
				<div class="row">
					<article class="col-md-2 col-sm-2 mid">
						<div class="img">
							<img src="img/tecnologia1.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Fashion</a>
								<a href="">Inspiration</a>
								<a href="">lifestyle</a>
							</p>
							<h1><a href="">Facebook compra empresa de realidad virtual</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Julio De La Cruz</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-2 col-sm-2 mid">
						<div class="img">
							<img src="img/tecnologia2.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Fashion</a>
								<a href="">Inspiration</a>
								<a href="">lifestyle</a>
							</p>
							<h1><a href="">China bloquea Twiter</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Julio De La Cruz</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-2 col-sm-2 mid">
						<div class="img">
							<img src="img/tecnologia3.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Fashion</a>
								<a href="">Inspiration</a>
								<a href="">lifestyle</a>
							</p>
							<h1><a href="">Bitcoin: La moneda del futuro</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Julio De La Cruz</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-2 col-sm-2 mid">
						<div class="img">
							<img src="img/tecnologia4.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Fashion</a>
								<a href="">Inspiration</a>
								<a href="">lifestyle</a>
							</p>
							<h1><a href="">Pagos por NFC son una realidad</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Julio De La Cruz</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-2 col-sm-2 mid">
						<div class="img">
							<img src="img/tecnologia1.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Fashion</a>
								<a href="">Inspiration</a>
								<a href="">lifestyle</a>
							</p>
							<h1><a href="">svvdc dsvchsv</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Julio De La Cruz</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
					<article class="col-md-2 col-sm-2 mid">
						<div class="img">
							<img src="img/tecnologia2.jpg" alt="post">
						</div>
						<div class="info">
							<p class="tags">
								<a href="">Fashion</a>
								<a href="">Inspiration</a>
								<a href="">lifestyle</a>
							</p>
							<h1><a href="">Hipster Stuff</a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Julio De La Cruz</a></p>
							<p class="text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
							</p>
							
						</div>
					</article>
				</div>
			</div>
			<!-- FIN TECNOLOGIA -->

			<!--ARCHIVE SECTION-->
			<div class="archive">

				<div class="row">

					<img src="img/archive.png" alt="archive" class="visible-md visible-lg col-md-4">

					<div class="col-md-8 col-sm-12">
						<h3>Archivo</h3>
						<div class="row">
							<article class="col-md-6 col-sm-6 small">
								<div class="col">
									<i class="fa fa-trophy"></i>
									<p><i class="fa fa-comment"></i>74</p>
								</div>
								<div class="info">
									<p class="tags">
										<a href="">Fashion</a>
										<a href="">Inspiration</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Hipster Stuff</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">nfkdsk jvksvk</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
							<article class="col-md-6 col-sm-6 small">
								<div class="col">
									<i class="fa fa-gift"></i>
									<p><i class="fa fa-comment"></i>74</p>
								</div>
								<div class="info">
									<p class="tags">
										<a href="">Fashion</a>
										<a href="">Inspiration</a>
										<a href=""> lifestyle</a>
									</p>
									<h1><a href="">Garden Secrets</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">jbdjhwf jcjs</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
						</div>
						<div class="row">
							<article class="col-md-6 col-sm-6 small">
								<div class="col">
									<i class="fa fa-briefcase"></i>
									<p><i class="fa fa-comment"></i>74</p>
								</div>
								<div class="info">
									<p class="tags">
										<a href="">Fashion</a>
										<a href="">Inspiration</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">How to protect your child</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Roberto kdjsdjh</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
							<article class="col-md-6 col-sm-6 small">
								<div class="col">
									<i class="fa fa-camera-retro"></i>
									<p><i class="fa fa-comment"></i>74</p>
								</div>
								<div class="info">
									<p class="tags">
										<a href="">Fashion</a>
										<a href="">Inspiration</a>
										<a href="">lifestyle</a>
									</p>
									<h1><a href="">Somewhere In Europe</a></h1>
									<p class="details">Sep 25, 2013 | <a href="author.html">Julio dhjvgjfd</a></p>
									<p class="text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
									</p>
									
								</div>
							</article>
						</div>

					</div>

				</div>

			</div>
			<!--END ARCHIVE SECTION-->
			
		</div>
		<!--END MAIN SECTION-->

		<!--FOOTER-->
		<?php require_once("wg-footer.php"); ?>
		<!--END FOOTER-->

	</div>
	<!--END CONTAINER-->

<?php require_once("wg-footer-script.php"); ?>

</body>
</html>