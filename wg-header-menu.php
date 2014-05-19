<?php
//CATEGORIA
$rst_categoria=mysql_query("SELECT * FROM lndd_noticia_categoria ORDER BY orden ASC;", $conexion);
?>
<nav class="clearfix">

	<a href="" id="menu-button"><i class="fa fa-bars"></i></a>

	<ul class="menu col-md-9 list-inline">
		<?php while($fila_categoria=mysql_fetch_array($rst_categoria)){
				$categoria_url=$fila_categoria["url"];
				$categoria_titulo=$fila_categoria["categoria"];

				//URL
				$categoria_UrlWeb=$web."seccion/".$categoria_url;
		?>
		<li><a href="<?php echo $categoria_UrlWeb; ?>"><?php echo $categoria_titulo; ?></a></li>
		<?php } ?>
		<li><a href="columnistas">Columnistas</a></li>
		<li class="menu-rcid"><a href="javascript:;">Reportero Ciudadano</a></li>
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