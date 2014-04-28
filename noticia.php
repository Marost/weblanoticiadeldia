<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//VARIABLES DE URL
$ReqId=$_REQUEST["id"];
$ReqUrl=$_REQUEST["url"];

//NOTICIA
$rst_nota=mysql_query("SELECT * FROM lndd_noticia WHERE id=$ReqId;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$not_titulo=$fila_nota["titulo"];
$not_contenido=$fila_nota["contenido"];
$not_imagen=$fila_nota["imagen"];
$not_imagen_carpeta=$fila_nota["imagen_carpeta"];
$not_categoria=$fila_nota["categoria"];

//GALERIA DE FOTOS
$rst_notaFotos=mysql_query("SELECT * FROM lndd_noticia_slide WHERE noticia=$ReqId ORDER BY orden ASC", $conexion);
$num_notaFotos=mysql_num_rows($rst_notaFotos);

//URLS
$not_web=$web."noticia/".$not_id."-".$not_url;
$not_web_img=$web."imagenes/upload/".$not_imagen_carpeta."".$not_imagen;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $not_titulo; ?></title>
	
	<?php require_once("wg-header-script.php"); ?>

</head>
<body>
	<!--HEADER-->
	<?php require_once("wg-header.php"); ?>
	<!--END HEADER-->

	<!--CONTAINER-->
	<div class="container">
		<!--MENU-->
		<?php require_once("wg-header-menu.php"); ?>
		<!--END MENU-->
		
		<!--MAIN SECTION-->
		<div class="main post-page">
			<div class="row">
				<!--CONTENT-->
				<div class="col-md-9 col-sm-12 clearfix">
					<!--POST-->
					<article class="post mid fullwidth">
						<div class="row">
							<?php if($num_notaFotos==0){ ?>
							<img src="<?php echo $not_web_img; ?>" alt="post-image">
							<?php }elseif($num_notaFotos>0){ ?>
							<div class="post-slider col-md-12 col-sm-12">
								<div class="controls">
									<p class="prev"><i class="fa fa-angle-left"></i></p>
									<p class="next"><i class="fa fa-angle-right"></i></p>
								</div>	
								<div class="slides">
									<?php while($fila_notaFotos=mysql_fetch_array($rst_notaFotos)){
											$notaFotos_imagen=$fila_notaFotos["imagen"];
											$notaFotos_imagen_carpeta=$fila_notaFotos["imagen_carpeta"];
											$notaFotos_UrlImg=$web."imagenes/upload/".$notaFotos_imagen_carpeta."".$notaFotos_imagen;
									?>
									<img src="<?php echo $notaFotos_UrlImg; ?>" alt="post-image">
									<?php } ?>
								</div>
							</div>	
							<?php } ?>
						</div>

						<div class="row">
							<div class="info col-md-12 col-sm-12">
								<div class="info">
									<h1><?php echo $not_titulo; ?></h1>
									<div class="data">
										<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
									</div>
									<div class="text">
										<?php echo $not_contenido; ?>
									</div>
									
									<!--
									<p class="tags">
										<a href="">Fashion</a>
										<a href="">Inspiration</a>
										<a href="">lifestyle</a>
									</p>
									-->
										
								</div>
							</div>
						</div>
					</article>
					<!--END POST-->

					<h3>Sobre el Autor</h3>	
					<article class="row mid member">
							<img src="img/author.jpg" alt="author">
							<div class="info">
								<p class="tags">
									<a href="">Founder</a>
									<a href="">Ceo</a>
								</p>
								<h1><a href="author.html">Alex Grosville</a></h1>
								<p class="text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<ul class="social list-inline">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google-plus"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa  fa-tumblr"></i>
										</a>
									</li>
								</ul>
							</div>	
					</article>
				
					<!-- COMENTARIOS -->
					<h3>Comentarios</h3>
					
					<!-- FIN COMENTARIOS -->
				</div>
				<!--END CONTENT-->

				<!--SIDEBAR-->
				<?php require_once("wg-sidebar.php"); ?>
				<!--END SIDEBAR-->
			</div>	
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