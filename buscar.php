<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//VARIBALES DE URL
$urlBuscar=$_REQUEST["busqueda"];

$url_web=$web."buscar.php?busqueda=".$urlBuscar;

//PAGINACION
require("libs/pagination/class_pagination.php");

if ($urlBuscar==""){
    //INICIO DE PAGINACION
	$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
	$rst_notas        = mysql_query("SELECT COUNT(*) as count FROM lndd_noticia WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC", $conexion);
	$fila_notas       = mysql_fetch_assoc($rst_notas);
	$generated      = intval($fila_notas['count']);
	$pagination     = new Pagination("10", $generated, $page, $url_web."&page", 1, 0);
	$start          = $pagination->prePagination();
	$rst_notas        = mysql_query("SELECT * FROM lndd_noticia WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT $start, 10", $conexion);
}elseif($urlBuscar<>""){
    //INICIO DE PAGINACION
	$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
	$rst_notas        = mysql_query("SELECT COUNT(*) as count FROM lndd_noticia WHERE titulo LIKE '%$urlBuscar%' AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC", $conexion);
	$fila_notas       = mysql_fetch_assoc($rst_notas);
	$generated      = intval($fila_notas['count']);
	$pagination     = new Pagination("10", $generated, $page, $url_web."&page", 1, 0);
	$start          = $pagination->prePagination();
	$rst_notas        = mysql_query("SELECT * FROM lndd_noticia WHERE titulo LIKE '%$urlBuscar%' AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT $start, 10", $conexion);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title>Buscar: <?php echo $urlBuscar; ?> | <?php echo $web_nombre; ?></title>
	
	<?php require_once("wg-header-script.php"); ?>

	<!-- PAGINACION -->
    <link rel="stylesheet" href="/libs/pagination/pagination.css" media="screen">

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
				<div class="col-md-9 col-md-12 list-page clearfix">
					<h2>Buscar: <?php echo $urlBuscar; ?></h2>			
					
					<?php while($fila_notas=mysql_fetch_array($rst_notas)){
							$nota_id=$fila_notas["id"];
							$nota_url=$fila_notas["url"];
							$nota_titulo=$fila_notas["titulo"];
							$nota_contenido=soloDescripcion($fila_notas["contenido"]);
							$nota_imagen=$fila_notas["imagen"];
							$nota_imagen_carpeta=$fila_notas["imagen_carpeta"];
							$nota_usuario=$fila_notas["usuario"];

							//FECHA PUBLICACION
							if($fila_notas["fecha_publicacion"]<>"0000-00-00 00:00:00"){
							    $nota_fechaPub=$fila_notas["fecha_publicacion"];
							    $nota_fechaPubNot=explode(" ", $nota_fechaPub);
							    $nota_fechaPubNotFi=explode("-", $nota_fechaPubNot[0]);
							    $nota_fechaTotal=nombreFechaTotal($nota_fechaPubNotFi[0],$nota_fechaPubNotFi[1],$nota_fechaPubNotFi[2]);
							    $nota_fechaFinal=$nota_fechaTotal;
							}else{
							    $nota_fechaFinal=$fila_notas["fecha"];
							}

							//URLS
							$nota_UrlWeb=$web."noticia/".$nota_id."-".$nota_url;
							$nota_UrlImg=$web."imagenes/upload/".$nota_imagen_carpeta."thumb/".$nota_imagen;

							//USUARIO
							$rst_usuario=mysql_query("SELECT usuario, nombre, apellidos FROM lndd_usuario WHERE usuario='$nota_usuario'");
							$fila_usuario=mysql_fetch_array($rst_usuario);

							//VARIABLES
							$user_nomCompleto=$fila_usuario["nombre"]." ".$fila_usuario["apellidos"];
					?>
					<article class="row mid categoria-nota">
						<img src="<?php echo $nota_UrlImg; ?>" alt="post">
						<div class="info">
							<h1><a href="<?php echo $nota_UrlWeb; ?>"><?php echo $nota_titulo; ?></a></h1>
							<p class="details"><?php echo $nota_fechaFinal; ?> | <?php echo $user_nomCompleto; ?></p>
							<p class="text">
								<?php echo $nota_contenido; ?>
							</p>
						</div>
					</article>
					<?php } ?>
					
				  	<div id="paginacion">
		                <?php $pagination->pagination(); ?>
		            </div>

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