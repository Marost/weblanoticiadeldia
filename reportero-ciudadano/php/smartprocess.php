<?php
require_once("../admin/conexion/conexion.php");
require_once("../admin/conexion/funciones.php");

	if (!isset($_SESSION)) session_start(); 
	if(!$_POST) exit;
	
	// Enter your name or company name below
	$receiver_name = $_POST["rciud_nombre"];
	
	// Enter email address below for receiving the form
	// All order messages will be sent there
	$receiver_email = $_POST["rciud_email"];
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "Confirmación de Correo";	
		
	$rciud_nombre= strip_tags(trim($_POST["rciud_nombre"]));
	$rciud_apellidos= strip_tags(trim($_POST["rciud_apellidos"]));
	$rciud_email = strip_tags(trim($_POST["rciud_email"]));
	$rciud_telefono = strip_tags(trim($_POST["rciud_telefono"]));
	$rciud_documentotipo = strip_tags(trim($_POST["rciud_documentotipo"]));
	$rciud_documentonumero = strip_tags(trim($_POST["rciud_documentonumero"]));
	$rciud_direccion = strip_tags(trim($_POST["rciud_direccion"]));
	$rciud_password = strip_tags(trim($_POST["password"]));
	$securitycode = strip_tags(trim($_POST["securitycode"]));
	
	//VERIFICAR SI EXISTE EMAIL
	$qr_UserEmail=mysql_query("SELECT * FROM lndd_rciud_usuario WHERE usuario='$rciud_email'", $conexion);
	$nm_UserEmail=mysql_num_rows($qr_UserEmail);

	/*
	========================================
	Start server side validation
	========================================
	*/ 
	$errors = array();
	 //validate name
	if(isset($_POST["rciud_nombre"])){
			if (!$rciud_nombre) {
				$errors[] = "Ingresa tu nombre.";
			} elseif(strlen($rciud_nombre) < 2)  {
				$errors[] = "El nombre debe tener al menos 2 caracteres.";
			}
	}

	if(isset($_POST["rciud_apellidos"])){
			if (!$rciud_apellidos) {
				$errors[] = "Ingresa tus apellidos.";
			} elseif(strlen($rciud_apellidos) < 2)  {
				$errors[] = "El apellido debe tener al menos 2 caracteres.";
			}
	}
	
	//validate email address
	if(isset($_POST["rciud_email"])){
		if (!$rciud_email) {
			$errors[] = "Ingresa tu email.";
		} else if (!validEmail($rciud_email)) {
			$errors[] = "Debe introducir un email válido.";
		} 
	}
		
	//validate services
	if(isset($_POST["rciud_documentotipo"])){
			if (!$rciud_documentotipo) {
				$errors[] = "Selecciona un tipo de documento.";
			}
	}

	//validate email address
	if(isset($_POST["rciud_documentonumero"])){
		if (!$rciud_documentonumero) {
			$errors[] = "Ingresa tus apellidos.";
		} elseif(strlen($rciud_documentonumero) < 2)  {
			$errors[] = "El número de documento debe tener al menos 2 caracteres.";
		}
	}

	//validate email address
	if(isset($_POST["rciud_direccion"])){
		if (!$rciud_direccion) {
			$errors[] = "Ingresa tus apellidos.";
		} elseif(strlen($rciud_direccion) < 2)  {
			$errors[] = "El dirección debe tener al menos 2 caracteres.";
		}
	}

	//validate email address
	if(isset($_POST["password"])){
		if (!$rciud_password) {
			$errors[] = "Ingresa tus apellidos.";
		} elseif(strlen($rciud_direccion) < 6)  {
			$errors[] = "El dirección debe tener al menos 2 caracteres.";
		}
	}
	
	//validate security captcha
	if(isset($_POST["securitycode"])){
		if (!$securitycode) {
			$errors[] = "Debe introducir el código de seguridad";
		} else if (md5($securitycode) != $_SESSION['smartCheck']['securitycode']) {
			$errors[] = "El código de seguridad que ha introducido es incorrecta.";
		}
	}
	
	//In case there are errors, output them in a list
	if ($errors) {
		$errortext = "";
		foreach ($errors as $error) {
			$errortext .= '<li>'. $error . "</li>";
		}
		echo '<div class="alert notification alert-error">Los siguientes errores ocurrieron:<br><ul>'. $errortext .'</ul></div>';
	
	} else{
		//GUARDAR DATOS
		$activacion=0;
		$activacion_codigo=codigoAleatorio(100, true, true, false);
		$qr_UserDatos=mysql_query("INSERT INTO lndd_rciud_usuario_datos (usuario, nombre, apellidos, telefono, documento_tipo, documento_numero, direccion, activacion, activacion_codigo) VALUES ('$rciud_email', '$rciud_nombre', '$rciud_apellidos', '$rciud_telefono', '$rciud_documentotipo', '$rciud_documentonumero', '$rciud_direccion', $activacion, '$activacion_codigo')", $conexion);

		//GUARDAR USUARIO Y CONTRASEÑA
		$qr_UserPass=mysql_query("INSERT INTO lndd_rciud_usuario (usuario, password) VALUES ('$rciud_email', '$rciud_password')", $conexion);

		if (mysql_errno()==1062){
			//echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
			echo '<div class="alert notification alert-error">Los siguientes errores ocurrieron:<br><ul><li>El Email ya existe</li></ul></div>';
		} else {
			require "PHPMailerAutoload.php";
			require "smartmessage.php";
				
			$mail = new PHPMailer();
			$mail->isSendmail();
			$mail->IsHTML(true);
			$mail->From = "soporte@portalperu.pe";
			$mail->CharSet = "UTF-8";
			$mail->FromName = "Portal Perú";
			$mail->Encoding = "base64";
			$mail->Timeout = 200;
			$mail->ContentType = "text/html";
			$mail->addAddress($receiver_email, $receiver_name);
			$mail->Subject = $msg_subject;	
			$mail->Body = $message;
			$mail->AltBody = "Utilice un cliente de correo electrónico compatible HTML";
			
			if($mail->Send()) {
			  echo '<div class="alert notification alert-success">Mensaje enviado con éxito!<br>Recuerda revisar la bandeja de correo no deseado (Spam) es probable que los correos electrónicos que te enviamos se encuentren allí.<br>Ábrelos y marca el contenido como seguro o elimina la etiqueta de Spam.</div>';		  
			} else {
			  echo '<div class="alert notification alert-error">¡Lo siento! se ha producido un error al enviar!</div>';
			}
		}

		
	} // end else
	

	// end error array if	
	// ultimate email validation function
	function validEmail($rciud_email) {
		$isValid = true;
		$atIndex = strrpos($rciud_email, "@");
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		} else {
			$domain = substr($rciud_email, $atIndex + 1);
			$local = substr($rciud_email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64) {
				// local part length exceeded
				$isValid = false;
			} else if ($domainLen < 1 || $domainLen > 255) {
				// domain part length exceeded
				$isValid = false;
			} else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
				// local part starts or ends with '.'
				$isValid = false;
			} else if (preg_match('/\\.\\./', $local)) {
				// local part has two consecutive dots
				$isValid = false;
			} else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
				// character not valid in domain part
				$isValid = false;
			} else if (preg_match('/\\.\\./', $domain)) {
				// domain part has two consecutive dots
				$isValid = false;
			} else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
					$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}		

?>