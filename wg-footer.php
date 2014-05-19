<?php
//CATEGORIA
$rst_catFooter=mysql_query("SELECT * FROM lndd_noticia_categoria ORDER BY orden ASC;", $conexion);
?>
<footer>
	<div class="row">
		<div class="about col-md-3 col-sm-6">
			<img src="img/about-logo.png" alt="logo">
			<h5>Sobre TabloideDigital</h5>
			<p>
				Tbla bla bla jdbjvbjvb jvbkjvbk jbvjvbkfjvb kbvjdfb vkjdfb vkjfdbv kjfbvkj jf kjfd kjfvkjn v jdf vkjf kjf jb jfdbfjdb kfnb lkfbnfldk n blknb lkdnblkd flknblkn dflkbnfb n 
			</p>

			<ul class="social list-inline">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
				<li><a href="#"><i class="fa fa-flickr"></i></a></li>
				<li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
				<li><a href="#"><i class="fa  fa-tumblr"></i></a></li>
				<li><a href="#"><i class="fa fa-rss"></i></a></li>
			</ul>
		</div>

		<div class="categories col-md-3 col-sm-6">
			<h5>Categorias</h5>
			<ul>
				<?php while($fila_catFooter=mysql_fetch_array($rst_catFooter)){
					$catFooter_url=$fila_catFooter["url"];
					$catFooter_titulo=$fila_catFooter["categoria"];

					//URL
					$catFooter_UrlWeb=$web."seccion/".$catFooter_url;
				?>
				<li><a href="<?php echo $catFooter_UrlWeb; ?>"><?php echo $catFooter_titulo; ?></a></li>
				<?php } ?>
				<li><a href="javascript:;">Reportero Ciudadano</a></li>
			</ul>
		</div>

		<div class="events col-md-3 col-sm-6">
			<h5>Eventos</h5>
			<div class="event">
				<div class="col">
					<h1><a href="">21</a></h1>
					<p>nov</p>
				</div>
				<div class="info">
					<h2><a href="">jkdfvndj jn jdvjknkjf</a></h2>
					<p>mdflknvjvndkjvn  jn jn dj jdnf j n d k dkn dkjn dj fdjh dj .</p>
				</div>
			</div>
			<div class="event">
				<div class="col">
					<h1><a href="">17</a></h1>
					<p>nov</p>
				</div>
				<div class="info">
					<h2><a href="">nfdjn jdnjd f</a></h2>
					<p>dfnvjkdfnv jdfnvjfnjd nvfjvndj kvndfjn jnjkfdn vjkj.</p>
				</div>
			</div>
			<div class="event">
				<div class="col">
					<h1><a href="">25</a></h1>
					<p>nov</p>
				</div>
				<div class="info">
					<h2><a href="">dfijvn jnvid</a></h2>
					<p>Tnfdjnvvj vjdnvkjdfbj fdkbkjdf fjvndjkvn .</p>
				</div>
			</div>					
		</div>

		<div class="col-md-3 col-sm-6">
			<h5>Calendario</h5>
			<div class="calendar">
				<div class="header clearfix">
					<h1>Marzo 2014</h1>
					<div class="calendar-nav">
						<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
						<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<div class="calendar-body">
					<table>
						<tr>
							<td><a href="" class="prev-month">30</a></td>
							<td><a href="" class="prev-month">31</a></td>
							<td><a href="">1</a></td>
							<td><a href="">2</a></td>
							<td><a href="">3</a></td>
							<td><a href="">4</a></td>
							<td><a href="">5</a></td>
						</tr>
						<tr>
							<td><a href="">6</a></td>
							<td><a href="">7</a></td>
							<td><a href="">8</a></td>
							<td><a href="">9</a></td>
							<td><a href="">10</a></td>
							<td><a href="">11</a></td>
							<td><a href="">12</a></td>
						</tr>
						<tr>
							<td><a href="">13</a></td>
							<td><a href="">14</a></td>
							<td><a href="">15</a></td>
							<td><a href="">16</a></td>
							<td><a href="">17</a></td>
							<td><a href="">18</a></td>
							<td><a href="">19</a></td>
						</tr>
						<tr>
							<td><a href="">20</a></td>
							<td><a href="">21</a></td>
							<td><a href="">22</a></td>
							<td><a href="">23</a></td>
							<td><a href="">24</a></td>
							<td><a href="">25</a></td>
							<td><a href="">26</a></td>
						</tr>
						<tr>
							<td><a href="">27</a></td>
							<td><a href="">28</a></td>
							<td><a href="">29</a></td>
							<td><a href="">30</a></td>
							<td><a href="" class="next-month">1</a></td>
							<td><a href="" class="next-month">2</a></td>
							<td><a href="" class="next-month">3</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="rights clearfix">
		<p>© 2014 Todos los derechos reservados.</p>
		<p>Designed by <a href="http://www.grupo7peru.com">Grupo 7 Perú</a>.</p>
	</div>
</footer>