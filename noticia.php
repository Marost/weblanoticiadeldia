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
		<nav class="clearfix">
			<a href="" id="menu-button"><i class="fa fa-bars"></i></a>  
			<ul class="menu col-md-9 list-inline">
				<li><a href="fashion.html">Fashion</a></li>
				<li class="dropdown-submenu">
					<a href="travel.html">Science</a>
					<ul class="dropdown-menu">
						<li><a href="">Physics</a></li>
						<li class="dropdown-submenu">
							<a href="">Mathematics</a>
							<ul class="dropdown-menu">
								<li><a href="">Physics</a></li>
								<li><a href="">Mathematics</a></li>
								<li><a href="">Astronomy</a></li>
							</ul>
						</li>
						<li><a href="">Astronomy</a></li>
						<li><a href="">Astrophysics</a></li>
						<li><a href="">Ufology</a></li>
					</ul>
				</li>
				<li><a href="fashion.html">Industry</a></li>
				<li><a href="travel.html">Inspiration</a></li>
				<li class="dropdown-submenu">
					<a href="fashion.html">Music</a>
					<ul class="dropdown-menu">
						<li><a href="">Physics</a></li>
						<li><a href="">Mathematics</a></li>
						<li><a href="">Astronomy</a></li>
						<li><a href="">Astrophysics</a></li>
						<li><a href="">Ufology</a></li>
					</ul>
				</li>
				<li><a href="travel.html">Movies & Stars</a></li>
				<li><a href="fashion.html">Lifestyle</a></li>
				<li><a href="travel.html">Travel</a></li>
			</ul>
			<form class="form-search col-md-3">
				<div class="input-group">
					<input type="text" class="search-query form-control" placeholder="Search smth">
	      			<span class="input-group-btn">
	        			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	      			</span>
			  	</div>
			</form>
		</nav>
		<!--END MENU-->
		
		<!--MAIN SECTION-->
		<div class="main post-page">
			<div class="row">
				<!--CONTENT-->
				<div class="col-md-9 col-sm-12 clearfix">
					<!--POST-->
					<article class="post mid fullwidth">
						<img src="<?php echo $not_web_img; ?>" alt="post-image">
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
					<h3>Comments</h3>
					
					<!-- FIN COMENTARIOS -->
				</div>
				<!--END CONTENT-->

				<!--SIDEBAR-->
				<aside class="col-md-3 col-sm-12">

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

					<div class="newsletter visible-md visible-lg">
						<h3>Newsletter</h3>
						<p>Subscribe to be the first to know our about sales, events and special offers!</p>
						<form action="POST">
							<input type="email" class="form-control" placeholder="Enter your email">
							<input type="submit" value="subscribe" class="btn btn-default btn-block">
						</form>
					</div>

					<div class="archive categories col-md-12 col-sm-6">
						<h4>Archive</h4>
						<ul>
							<li><a href="#">Fashion (13)</a></li>
							<li><a href="#">Science (23)</a></li>
							<li><a href="#">Lifestyle (781)</a></li>
							<li><a href="#">Industry (14)</a></li>
							<li><a href="#">Inspiration (3)</a></li>
							<li><a href="#">Music (5)</a></li>
							<li><a href="#">Movies & Stars (32)</a></li>
						</ul>
					</div>

					<div class="most-commented col-md-12 visible-md visible-lg">
						<h4>Most commented posts</h4>
						<article class="small clearfix">
							<div class="counter">
								<i class="fa fa-comment"></i>
								<p>74</p>
							</div>
							<div class="info">
								<p class="tags">
									<a href="">Science</a>
									<a href="">lifestyle</a>
								</p>
								<h1><a href="">Ray Ban Experience</a></h1>
								<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
								<p class="text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
								
							</div>
							<ul class="counters list-inline">
								<li>
									<a href=""><i class="fa fa-eye"></i>15271</a>
								</li>
								<li>
									<a href=""><i class="fa fa-comment"></i>25</a>
								</li>
								<li>
									<a href=""><i class="fa fa-heart"></i>724</a>
								</li>
							</ul>
						</article>
					
						<article class="small clearfix">
							<div class="counter">
								<i class="fa fa-comment"></i>
								<p>74</p>
							</div>
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
							<ul class="counters list-inline">
								<li>
									<a href=""><i class="fa fa-eye"></i>15271</a>
								</li>
								<li>
									<a href=""><i class="fa fa-comment"></i>25</a>
								</li>
								<li>
									<a href=""><i class="fa fa-heart"></i>724</a>
								</li>
							</ul>
						</article>
					
						<article class="small clearfix">
							<div class="counter">
								<i class="fa fa-comment"></i>
								<p>74</p>
							</div>
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
							<ul class="counters list-inline">
								<li>
									<a href=""><i class="fa fa-eye"></i>15271</a>
								</li>
								<li>
									<a href=""><i class="fa fa-comment"></i>25</a>
								</li>
								<li>
									<a href=""><i class="fa fa-heart"></i>724</a>
								</li>
							</ul>
						</article>
					</div>

					<div class="hidden-xs hidden-sm hidden-md hidden-lg"></div>

					<div class="recent-videos col-md-12 col-sm-6">
						<h4>Recent videos</h4>
						<article class="mid">
							<div class="video">
								
								<iframe src="//player.vimeo.com/video/78894665?title=0&amp;byline=0&amp;portrait=0&amp;color=f1284e"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>
							
							<div class="info">
								<h1><a href="">From lettering to calligraphy</a></h1>
								<p class="details">Sep 25, 2013 | <a href="author.html">Alex Grosville</a></p>
								<p class="tags">
									<a href="">Fashion</a>
									<a href="">Inspiration</a>
									<a href="">lifestyle</a>
								</p>
								<p class="text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
								<a href="">Read more<i class="fa fa-align-left"></i></a>
								<ul class="counters list-inline">
									<li>
										<a href=""><i class="fa fa-eye"></i>15271</a>
									</li>
									<li>
										<a href=""><i class="fa fa-comment"></i>25</a>
									</li>
									<li>
										<a href=""><i class="fa fa-heart"></i>724</a>
									</li>
								</ul>
								
							</div>
						</article>
					</div>
				</aside>
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