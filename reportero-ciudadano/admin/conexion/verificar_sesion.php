<?php
session_start();

if($usuario_user==""){
	header("Location:../../login.php?msj=1");
}
?>