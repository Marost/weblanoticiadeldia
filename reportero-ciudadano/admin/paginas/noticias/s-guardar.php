<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));
$contenido=$_POST["contenido"];
$contenido_corto=$_POST["contenido_corto"];
$categoria=7;
$usuario=$_SESSION["user-".$sesion_pre.""];

//FECHA Y HORA
$fecha_publicacion=$fechaActual;
$publicar=0;


//SUBIR IMAGEN
$upload_imagen=$_POST["uploader_0_tmpname"];

//SUBIR VIDEO
$video_youtube=$_POST["video_youtube"];
$video_upload=$_POST["uploader_video_0_tmpname"];

//IMAGEN
if($upload_imagen<>""){
	$imagen=$upload_imagen;
	$imagen_carpeta=fechaCarpeta()."/";	
	$mostrar_imagen=1;
	
	//IMAGEN NORMAL
	$thumb=PhpThumbFactory::create("../../../../imagenes/upload/".$imagen_carpeta."".$imagen."");
	$thumb->cropFromCenter(870,500);
	$thumb->save("../../../../imagenes/upload/".$imagen_carpeta."".$imagen."", "jpg");

	//THUMB
	$thumb=PhpThumbFactory::create("../../../../imagenes/upload/".$imagen_carpeta."".$imagen."");
	$thumb->cropFromCenter(570,460);
	$thumb->save("../../../../imagenes/upload/".$imagen_carpeta."thumb/".$imagen."", "jpg");
}else{
	$imagen=""; $imagen_carpeta="";
}

//VIDEO YOUTUBE
if($video_youtube<>""){
	$mostrar_video=1;
	$tipo_video="youtube";
	$video=$video_youtube;
	$video_carpeta="";
}elseif($video_youtube==""){
	$mostrar_video=0;
	$tipo_video="";
	$video="";
	$video_carpeta="";
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_noticia (url, titulo, contenido_corto, contenido, categoria, imagen, imagen_carpeta, fecha_publicacion, publicar, video, tipo_video, mostrar_video, carpeta_video, usuario) VALUES('$url', '".htmlspecialchars($nombre)."', '$contenido_corto','$contenido', $categoria, '$imagen', '$imagen_carpeta', '$fecha_publicacion', $publicar, '$video', '$tipo_video', '$mostrar_video', '$video_carpeta', '$usuario');",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>