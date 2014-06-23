<?php 

	if (!isset($_SESSION)) session_start(); 
	if(!$_POST) exit;
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All Contact messages will be sent there
	$receiver_email = "address@example.com";
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "New Booking";
	
	$nombre = strip_tags(trim($_POST["nombre"]));
	$apellidos = strip_tags(trim($_POST["apellidos"]));
	$documento = strip_tags(trim($_POST["documento"]));
	$documentonum = strip_tags(trim($_POST["documentonum"]));
	$email = strip_tags(trim($_POST["email"]));
	$securitycode = strip_tags(trim($_POST["securitycode"]));
	
	/*
	========================================
	Start server side validation
	========================================
	*/ 
	$errors = array();
	 //validate nombre
	if(isset($_POST["nombre"])){
	 
			if (!$nombre) {
				$errors[] = "You must enter a name.";
			} elseif(strlen($nombre) < 2)  {
				$errors[] = "Name must be at least 2 characters.";
			}
	 
	}
	//validate apellidos
	if(isset($_POST["apellidos"])){
	 
			if (!$apellidos) {
				$errors[] = "You must enter a name.";
			} elseif(strlen($apellidos) < 2)  {
				$errors[] = "Name must be at least 2 characters.";
			}
	 
	}
	//validate documento
	if(isset($_POST["documento"])){
		if (!$documento) {
			$errors[] = "You must enter an email.";
		} else if (!validEmail($documento)) {
			$errors[] = "Your must enter a valid email.";
		}
	}
	//validate documento numero
	if(isset($_POST["documentonum"])){
		if (!$documentonum) {
			$errors[] = "You must enter an email.";
		} else if (!validEmail($documentonum)) {
			$errors[] = "Your must enter a valid email.";
		}
	}
	//validate email address
	if(isset($_POST["email"])){
		if (!$email) {
			$errors[] = "You must enter an email.";
		} else if (!validEmail($email)) {
			$errors[] = "Your must enter a valid email.";
		}
	}

	//validate file uploads
	if(isset($_FILES['orderfiles'])) {
		// => maximum file size :: 2MB
		$maxsize    =  2097152; 
		// => Blacklisted filetypes
		$blacklist  = array( 
			'.phtml', 
			'.php', 
			'.php3', 
			'.php4', 
			'.php5', 
			'.php6', 
			'.phps',
			'.cgi', 
			'.exe', 
			'.pl', 
			'.asp', 
			'.aspx', 
			'.shtml', 
			'.shtm', 
			'.fcgi',
			'.fpl', 
			'.jsp', 
			'.htm', 
			'.html', 
			'.wml',
			'.com',
			'.bat' 
		);
		// => only allowed filetypes
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png'
		);
		// => File must be attached
		if (empty($_FILES['orderfiles']['name'])) {
			$errors[] = "You must browse or attach a file.";
		}
		// => File size must be 1MB or less
		if ($_FILES['orderfiles']['size'] > $maxsize) {
			$errors[] = "File uploaded is too large. Try 2MB or less.";
		}
		// => Detect blacklisted file types
		foreach ($blacklist as $item) {
			if(preg_match("/$item$/i", $_FILES['orderfiles']['name'])) {
				$errors[] = "The file format attached is not allowed";
			}
		}
		// => Detect allowed filetypes
		if((!in_array($_FILES['orderfiles']['type'], $acceptable)) && (!empty($_FILES["orderfiles"]["type"]))) {
			$errors[] = "Please upload a jpg or png image file.";
		}
		// => Other upload errors 
		if (!isset($_FILES['orderfiles']['error']) || is_array($_FILES['orderfiles']['error'])){
			$errors[] = "Invalid upload parameters"; 
		}
		switch ($_FILES['orderfiles']['error']) {
			case UPLOAD_ERR_OK:
				break;
			case UPLOAD_ERR_NO_FILE:
				$errors[] = "Warning! No file sent";
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				$errors[] = "Exceeded upload size limit";
			default:
				$errors[] = "Unknown errors";
		}
		// => Detect file info - in case of fake file extensions 
		// => Only supported on servers with PHP 5.3+
		// => Un comment if you have PHP version 5.3+
		/* 
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		if (false === $ext = array_search(
			$finfo->file($_FILES['orderfiles']['tmp_name']),
			array(
				'image/jpeg',
				'image/jpg',
				'image/png'
			), true
		)) {
			$errors[] = "You are attempting to upload a fake file extension"; 
		}*/
					
	}

	//validate security captcha
	if(isset($_POST["securitycode"])){
		if (!$securitycode) {
			$errors[] = "You must enter the security code";
		} else if (md5($securitycode) != $_SESSION['smartCheck']['securitycode']) {
			$errors[] = "The security code you entered is incorrect.";
		}
	}
	
	if ($errors) {
		//Output errors in a list
		$errortext = "";
		foreach ($errors as $error) {
			$errortext .= '<li>'. $error . "</li>";
		}
	
		echo '<div class="alert notification alert-error">The following errors occured:<br><ul>'. $errortext .'</ul></div>';
	
	} else{	
	
		require "PHPMailerAutoload.php";
		require "smartmessage.php";
			
		$mail = new PHPMailer();
		$mail->isSendmail();
		$mail->IsHTML(true);
		$mail->From = $email;
		$mail->CharSet = "UTF-8";
		$mail->FromName = $guestname;
		$mail->Encoding = "base64";
		$mail->Timeout = 200;
		$mail->ContentType = "text/html";
		$mail->addAddress($receiver_email, $receiver_name);
		$mail->Subject = $msg_subject;	
		$mail->Body = $message;
		$mail->AltBody = "Use an HTML compatible email client";
				
		// For multiple email recepients from the form 
		// Simply change recepients from false to true
		// Then enter the recipients email addresses
		$recipients = false;
		if($recipients == true){
			$recipients = array(
				"address@example.com" => "Recipient Name",
				"address@example.com" => "Recipient Name",
			);
			
			foreach($recipients as $email => $name){
				$mail->AddBCC($email, $name);
			}	
		}
		
		if($mail->Send()) {
		  	echo '<div class="alert notification alert-success">Congs! message sent successfully! </div> '; 
		  
			// Start delete function 
			// Automatically deletes files from the smuploads folder after successful sending
			// You can remove this function if you want to keep uploads on your server
			$files = glob('../smuploads/*'); 
			foreach($files as $file){ 
			  if(is_file($file))
				unlink($file); 
			} 
			// end delete function		  
		  
		} else {
		  echo '<div class="alert notification alert-error">Sorry! an error occurred while sending!</div> ';
		}
	}

	// end error array if	
	// ultimate email validation function
	function validEmail($email) {
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		} else {
			$domain = substr($email, $atIndex + 1);
			$local = substr($email, 0, $atIndex);
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