<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//VARIABLES
$codigoAl=codigoAleatorio(10,false,true,false);
$carpeta="../../../../imagenes/rciud/".fechaCarpeta();

//EXTRAER URL DE USUARIO
$rst_user=mysql_query("SELECT * FROM ".$tabla_suf."_rciud_usuario_datos WHERE usuario='$usuario_user'", $conexion);
$fila_user=mysql_fetch_array($rst_user);
$usuario_url=$fila_user["url"];

//COMPROBAR QUE EXISTE CARPETA
if (!file_exists($carpeta)){ @mkdir($carpeta, 0755); }

//SUBIR IMAGEN
if($_FILES['fileInput']['name']!=""){
	if(is_uploaded_file($_FILES['fileInput']['tmp_name'])){ 
		$fileName=$_FILES['fileInput']['name'];
		$uploadDir="../../../../imagenes/rciud/".fechaCarpeta()."/";
		$uploadFile=$uploadDir.$fileName;
		$num = 0;
		$imagen = $fileName;
		$extension = end(explode('.',$fileName));     
		$onlyName = substr($fileName,0,strlen($fileName)-(strlen($extension)+1));
		$imagen = $usuario_url."-".$codigoAl.".".$extension;
		$uploadFile = $uploadDir.$imagen; 
		move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadFile);  
		$imagen;
		$imagen_carpeta=fechaCarpeta()."/";

		//IMAGEN NORMAL
		$thumb=PhpThumbFactory::create("../../../../imagenes/rciud/".$imagen_carpeta."".$imagen."");
		$thumb->adaptiveResize(400,400);
		$thumb->save("../../../../imagenes/rciud/".$imagen_carpeta."".$imagen."", "jpg");

		//THUMB
		$thumb=PhpThumbFactory::create("../../../../imagenes/rciud/".$imagen_carpeta."".$imagen."");
		$thumb->cropFromCenter(300,300);
		$thumb->save("../../../../imagenes/rciud/".$imagen_carpeta."".$imagen."", "jpg");
	}
}else{
	$imagen=$_POST["imagen"];
	$imagen_carpeta=$_POST["imagen_carpeta"];
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_rciud_usuario_datos SET foto='$imagen', foto_carpeta='$imagen_carpeta' WHERE usuario='$usuario_user';", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:perfil.php?msj=erf");
} else {
	mysql_close($conexion);
	header("Location:perfil.php?msj=okf");
}

?>