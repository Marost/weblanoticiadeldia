<?php
//CATEGORIA
$rst_categoria=mysql_query("SELECT * FROM lndd_noticia_categoria WHERE id<>7 AND menu=1 ORDER BY orden ASC;", $conexion);

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
		<li><a href="seccion/noticia">Noticia</a></li>
		<li><a href="seccion/informe">Informe</a></li>
		<li><a href="seccion/entrevista">Entrevista</a></li>
		<li><a href="columnistas">Columnista</a></li>
		<li><a href="seccion/portal-tv">Portal TV</a></li>
		<li><a href="seccion/mira-peru">Mira el Perú</a></li>
		<li class="menu-rcid dropdown-submenu">
			<a href="javascript:;"><?php echo $rciud_titulo; ?></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $rciud_UrlWeb; ?>">Noticias</a></li>
				<li><a target="_blank" href="reportero-ciudadano/">Registrarse</a></li>
				<li><a target="_blank" href="reportero-ciudadano/login.php">Iniciar sesión</a></li>
			</ul>
		</li>
	</ul>

	<div class="buscador form-search col-md-2">
		<script>
		  (function() {
		    var cx = '018282985496243368695:hzzjbqgus9q';
		    var gcse = document.createElement('script');
		    gcse.type = 'text/javascript';
		    gcse.async = true;
		    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		        '//www.google.com/cse/cse.js?cx=' + cx;
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(gcse, s);
		  })();
		</script>
		<gcse:searchbox-only></gcse:searchbox-only>
	</div>

</nav>