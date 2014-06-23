<?php
require_once("conexion.php");

//VARIABLES DE USARIO Y PASS
$RqUsuario=$_POST["usuario"];
$RqPassword=$_POST["password"];

//FUNCION ANTI-INJECTION SQL
$usuario=mysql_real_escape_string($RqUsuario);
$password=mysql_real_escape_string($RqPassword);

//VERIFICAR EXISTE USUARIO
$qr_VerExist=mysql_query("SELECT * FROM lndd_rciud_usuario_datos WHERE usuario='$usuario'", $conexion);
$fl_VerExist=mysql_fetch_array($qr_VerExist);
$nm_VerExist=mysql_num_rows($qr_VerExist);

//VARIABLES
$VerExistAct=$fl_VerExist["activacion"];

/* MENSAJES EN LOGIN
1 - TU CUENTA NO ESTÁ ACTIVADA
2 - EL USUARIO Y CONTRASEÑA NO SON CORRECTOS
*/

//VERFICIAR SI CUENTA EXISTE
if($nm_VerExist==0){

	mysql_close($conexion);
	header("Location:../../login.php?msj=2");

}else{

	//VERIFICAR DE QUE ESTÉ ACTIVADA LA CUENTA
	if($VerExistAct==0){
		header("Location:../../login.php?msj=1");
	}elseif($VerExistAct==1){
		//VERIFICACION DE USUARIO Y PASSWORD
		$query=sprintf("SELECT * FROM lndd_rciud_usuario WHERE usuario='$usuario' AND password='$password'");
		$rst=mysql_query($query, $conexion);
		$num_registros=mysql_num_rows($rst);

		if($num_registros==1){
			$fila=mysql_fetch_array($rst);
			session_start();
			$_SESSION["user-".$sesion_pre.""]=$fila["usuario"];
			$_SESSION["user_nombre-".$sesion_pre.""]=$fila["nombre"];
			$_SESSION["user_apellido-".$sesion_pre.""]=$fila["apellidos"];
			header("Location:../paginas/noticias/lista.php");
		}elseif($num_registros==0) {
			mysql_close($conexion);
			header("Location:../../login.php?msj=2");
		}
	}

}

?>