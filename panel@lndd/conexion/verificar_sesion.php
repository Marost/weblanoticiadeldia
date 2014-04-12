<?php
session_start();

if ($usuario_user==""){
	header("Location:".$web"".$carpeta_admin."/login.php?nosesion=1");
}
?>