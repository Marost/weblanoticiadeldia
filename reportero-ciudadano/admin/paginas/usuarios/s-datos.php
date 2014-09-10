<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");

//DECLARACION DE VARIABLES
$nota_nombre=$_POST["nombre"];
$nota_apellidos=$_POST["apellidos"];
$nota_nombreCompleto=$nota_nombre." ".$nota_apellidos;
$url=getUrlAmigable(eliminarTextoURL($nota_nombreCompleto));
$nota_descripcion=$_POST["descripcion"];
$nota_telefono=$_POST["telefono"];
$nota_direccion=$_POST["direccion"];

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_rciud_usuario_datos SET url='$url',
	nombre='$nota_nombre',
	apellidos='$nota_apellidos',
	telefono='$nota_telefono',
	direccion='$nota_direccion',
	descripcion='".htmlspecialchars($nota_descripcion)."' WHERE usuario='$usuario_user';", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:perfil.php?msj=erd");
} else {
	mysql_close($conexion);
	header("Location:perfil.php?msj=okd");
}

?>