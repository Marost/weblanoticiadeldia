<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$clave=$_POST["clave"];

//INSERTANDO DATOS
//$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_usuario SET clave='$clave', nombre='$nombre', apellidos='$apellidos', email='$email' WHERE usuario='$nota_id';", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:perfil.php?msj=erc");
} else {
	mysql_close($conexion);
	header("Location:perfil.php?msj=okc");
}

?>