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
$not_video=$fila_nota["video"];
$not_categoria=$fila_nota["categoria"];
$not_usuario=$fila_nota["usuario"];

//FECHA PUBLICACION
if($fila_nota["fecha_publicacion"]<>"0000-00-00 00:00:00"){
    $nota_fechaPub=$fila_nota["fecha_publicacion"];
    $nota_fechaPubNot=explode(" ", $nota_fechaPub);
    $nota_fechaPubNotFi=explode("-", $nota_fechaPubNot[0]);
    $nota_fechaTotal=nombreFechaTotal($nota_fechaPubNotFi[0],$nota_fechaPubNotFi[1],$nota_fechaPubNotFi[2]);
    $nota_fechaFinal=$nota_fechaTotal;
}else{
    $nota_fechaFinal=$fila_nota["fecha"];
}

//USUARIO
$rst_usuario=mysql_query("SELECT usuario, nombre, apellidos FROM lndd_usuario WHERE usuario='$not_usuario'");
$fila_usuario=mysql_fetch_array($rst_usuario);

//VARIABLES
$user_nomCompleto=$fila_usuario["nombre"]." ".$fila_usuario["apellidos"];

//GALERIA DE FOTOS
$rst_notaFotos=mysql_query("SELECT * FROM lndd_noticia_slide WHERE noticia=$ReqId ORDER BY orden ASC", $conexion);
$num_notaFotos=mysql_num_rows($rst_notaFotos);

//URLS
$not_web=$web."noticia/".$ReqId."-".$ReqUrl;
$not_web_img=$web."imagenes/upload/".$not_imagen_carpeta."".$not_imagen;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $not_titulo; ?> | <?php echo $web_nombre; ?></title>
	
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
						<?php if($not_video<>""){ ?>
						<div class="video">
							<iframe width="100%" height="500px" src="//www.youtube.com/embed/<?php echo $not_video; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
						</div>
						<?php }elseif($num_notaFotos>0){ ?>
						<div class="row">
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
						</div>	
						<?php }elseif($num_notaFotos==0){ ?>
						<img src="<?php echo $not_web_img; ?>" alt="post-image">
						<?php } ?>

						<div class="row">
							<div class="info col-md-12 col-sm-12">
								<div class="info">
									<h1><?php echo $not_titulo; ?></h1>
									<div class="data">
										<p class="details"><?php echo $nota_fechaFinal; ?> | <?php echo $user_nomCompleto; ?></p>
									</div>
									<div class="text">
										<?php echo $not_contenido; ?>
									</div>										
								</div>
							</div>
						</div>

					</article>
					<!--END POST-->
				
					<!-- COMENTARIOS -->
					<div class="row">
						<h3>Comentarios</h3>

						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=258988607636876";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-comments" data-href="<?php echo $not_web; ?>" data-numposts="5" data-colorscheme="light"></div>
					</div>					
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