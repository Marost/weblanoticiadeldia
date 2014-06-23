<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nota_id=$_REQUEST["id"];
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));
$contenido=$_POST["contenido"];
$usuario=$_SESSION["user-".$sesion_pre.""];

//VIDEO
$video_youtube=$_POST["video_youtube"];

//IMAGEN
if($_POST['uploader_0_tmpname']<>""){
	$imagen=$_POST["uploader_0_tmpname"];
	$imagen_carpeta=fechaCarpeta()."/";	
	
	//IMAGEN NORMAL
	$thumb=PhpThumbFactory::create("../../../../imagenes/upload/".$imagen_carpeta."".$imagen."");
	$thumb->cropFromCenter(870,500);
	$thumb->save("../../../../imagenes/upload/".$imagen_carpeta."".$imagen."", "jpg");

	//THUMB
	$thumb=PhpThumbFactory::create("../../../../imagenes/upload/".$imagen_carpeta."".$imagen."");
	$thumb->cropFromCenter(570,460);
	$thumb->save("../../../../imagenes/upload/".$imagen_carpeta."thumb/".$imagen."", "jpg");
}else{
	$imagen=$_POST["imagen"];
	$imagen_carpeta=$_POST["imagen_carpeta"];
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
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_noticia SET url='$url', titulo='".htmlspecialchars($nombre)."', 
	contenido='$contenido', 
	imagen='$imagen', 
	imagen_carpeta='$imagen_carpeta', 
	video='$video', 
	tipo_video='$tipo_video', 
	mostrar_video=$mostrar_video, 
	carpeta_video='$video_carpeta' WHERE id=$nota_id;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>