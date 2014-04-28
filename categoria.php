<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//VARIBALES DE URL
$ReqUrl=$_REQUEST["url"];

//CATEGORIA
$rst_notCat=mysql_query("SELECT * FROM lndd_noticia_categoria WHERE url='$ReqUrl';", $conexion);
$fila_notCat=mysql_fetch_array($rst_notCat);

//VARIABLES
$notCat_id=$fila_notCat["id"];
$notCat_titulo=$fila_notCat["categoria"];

//NOTICIAS
$rst_notas=mysql_query("SELECT * FROM lndd_noticia WHERE categoria=$notCat_id ORDER BY fecha_publicacion ASC LIMIT 9;", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title><?php echo $notCat_titulo; ?></title>
	
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
		<div class="main">
			<div class="row">
				<!--CONTENT-->
				<div class="col-md-9 col-sm-12 clearfix">
					<h2><?php echo $notCat_titulo; ?></h2>			
					
					<?php while($fila_notas=mysql_fetch_array($rst_notas)){
							$nota_id=$fila_notas["id"];
							$nota_url=$fila_notas["url"];
							$nota_titulo=$fila_notas["titulo"];
							$nota_contenido=soloDescripcion($fila_notas["contenido"]);
							$nota_imagen=$fila_notas["imagen"];
							$nota_imagen_carpeta=$fila_notas["imagen_carpeta"];
							$nota_fecha_publicacion=$fila_notas["fecha_publicacion"];

							//URLS
							$nota_UrlWeb=$web."noticia/".$nota_url."-".$nota_id;
							$nota_UrlImg=$web."imagenes/upload/".$nota_imagen_carpeta."thumb/".$nota_imagen;
					?>
					<article class="col-md-4 col-sm-4 mid">
						<div class="img">
							<img src="<?php echo $nota_UrlImg; ?>" alt="post">
						</div>
						<div class="info">
							<!--
							<p class="tags">
								<a href="">Fashion</a>
								<a href="">Inspiration</a>
								<a href="">lifestyle</a>
							</p>
							-->
							<h1><a href="<?php echo $nota_UrlWeb; ?>"><?php echo $nota_titulo; ?></a></h1>
							<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
							<p class="text">
								<?php echo $nota_contenido; ?>
							</p>
							
						</div>
					</article>
					<?php } ?>
					
				  	<ul class="pagination">
				    	<li class="disabled"><span><i class="fa fa-long-arrow-left"></i></span></li>
				    	<li class="active"><span>1</span></li>
				    	<li><a href="#">2</a></li>
				    	<li><a href="#">3</a></li>
				    	<li><a href="#">...</a></li>
				    	<li><a href="#">15</a></li>
				    	<li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
				 	</ul>

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