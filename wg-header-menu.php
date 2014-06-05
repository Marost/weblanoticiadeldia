<?php
//CATEGORIA
$rst_categoria=mysql_query("SELECT * FROM lndd_noticia_categoria WHERE id<>7 ORDER BY orden ASC;", $conexion);

//REPORTERO CIUDADANO
$rst_rciud=mysql_query("SELECT * FROM lndd_noticia_categoria WHERE id=7;", $conexion);
$fila_rciud=mysql_fetch_array($rst_rciud);
$rciud_url=$fila_rciud["url"];
$rciud_titulo=$fila_rciud["categoria"];

//URL
$rciud_UrlWeb=$web."seccion/".$rciud_url;
?>
<nav class="clearfix">

	<a href="" id="menu-button"><i class="fa fa-bars"></i></a>

	<ul class="menu col-md-10 list-inline">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		<?php while($fila_categoria=mysql_fetch_array($rst_categoria)){
				$categoria_url=$fila_categoria["url"];
				$categoria_titulo=$fila_categoria["categoria"];

				//URL
				$categoria_UrlWeb=$web."seccion/".$categoria_url;
		?>
		<li><a href="<?php echo $categoria_UrlWeb; ?>"><?php echo $categoria_titulo; ?></a></li>
		<?php } ?>
		<li><a href="columnistas">Columnistas</a></li>
		<li class="menu-rcid"><a href="<?php echo $rciud_UrlWeb; ?>"><?php echo $rciud_titulo; ?></a></li>
	</ul>
	<form action="buscar.php" method="get" name="busqueda" class="form-search col-md-2">
		<div class="input-group">
			<input type="text" class="search-query form-control" placeholder="Buscar" name="busqueda">
  			<span class="input-group-btn">
    			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
  			</span>
	  	</div>
	</form>

</nav>