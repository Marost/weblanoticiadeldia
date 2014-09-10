<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");

//DECLARACION DE VARIABLES
$nota_social_facebook=$_POST["social_facebook"];
$nota_social_twitter=$_POST["social_twitter"];
$nota_social_google=$_POST["social_google"];
$nota_social_youtube=$_POST["social_youtube"];
$nota_social_pinterest=$_POST["social_pinterest"];
$nota_social_linkedin=$_POST["social_linkedin"];

//DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_rciud_usuario_datos SET social_facebook='$nota_social_facebook',
social_twitter='$nota_social_twitter',
social_google='$nota_social_google',
social_youtube='$nota_social_youtube',
social_pinterest='$nota_social_pinterest',
social_linkedin='$nota_social_linkedin' WHERE usuario='$usuario_user';", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:perfil.php?msj=ers");
} else {
	mysql_close($conexion);
	header("Location:perfil.php?msj=oks");
}

?>