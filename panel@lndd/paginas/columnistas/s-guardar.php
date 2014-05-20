<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$nombre_completo=$nombre." ".$apellidos;
$url=getUrlAmigable(eliminarTextoURL($nombre_completo));
$contenido=$_POST["contenido"];
$publicar=1;

//SELECCION DE DIAS
$dia_lunes=$_POST["dia_lunes"];
$dia_martes=$_POST["dia_martes"];
$dia_miercoles=$_POST["dia_miercoles"];
$dia_jueves=$_POST["dia_jueves"];
$dia_viernes=$_POST["dia_viernes"];
$dia_sabado=$_POST["dia_sabado"];
$dia_domingo=$_POST["dia_domingo"];

//DIAS DE PUBLICACION
if($dia_lunes<>""){ $dia_lunes=1; }else{ $dia_lunes=0; }
if($dia_martes<>""){ $dia_martes=1; }else{ $dia_martes=0; }
if($dia_miercoles<>""){ $dia_miercoles=1; }else{ $dia_miercoles=0; }
if($dia_jueves<>""){ $dia_jueves=1; }else{ $dia_jueves=0; }
if($dia_viernes<>""){ $dia_viernes=1; }else{ $dia_viernes=0; }
if($dia_sabado<>""){ $dia_sabado=1; }else{ $dia_sabado=0; }
if($dia_domingo<>""){ $dia_domingo=1; }else{ $dia_domingo=0; }

//SUBIR IMAGEN
$upload_imagen=$_POST["uploader_columnista_0_tmpname"]; //PORTADA 270*270 --> IMAGEN PORTADA
$upload_imagen_cuerpo=$_POST["uploader_columnista_cuerpo_0_tmpname"]; //CUERPO COMPLETO 270*500 --> FOTO

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_columnista (url,
	nombre,
	apellidos,
	nombre_completo,
	imagen_portada,
	foto,
	descripcion,
	publicar,
	dia_lunes,
	dia_martes,
	dia_miercoles,
	dia_jueves,
	dia_viernes,
	dia_sabado,
	dia_domingo) VALUES('$url',
	'$nombre',
	'$apellidos',
	'$nombre_completo',
	'$upload_imagen',
	'$upload_imagen_cuerpo',
	'$contenido',
	$publicar,
	$dia_lunes,
	$dia_martes,
	$dia_miercoles,
	$dia_jueves,
	$dia_viernes,
	$dia_sabado,
	$dia_domingo);",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>