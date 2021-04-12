<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';



define("WEBMASTER_EMAIL", 'contact@phnompenhsuperstore.com'); // Enter your e-mail
 
error_reporting (E_ALL); 




function sendEmail($message)
{
		
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
		//Server settings
		//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
		$mail->isSMTP();
		$mail->CharSet="UTF-8";
		$mail->SMTPSecure = 'tls';
		// Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 587;                              // Enable SMTP authentication
		$mail->Username = 'sen.sov@gmail.com';                 // SMTP username
		$mail->Password = '!2Pied2Porc!';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->SMTPAuth = true;              // TCP port to connect to

		//Recipients
		$mail->setFrom('sen.sov@gmail.com', 'Contact PPSS');
		$mail->addAddress('sen.sov@gmail.com');               // Name is optional
	  
		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = "PPSS Enquiry";
		$mail->Body    = $message;

		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}

}



if(count($_POST))
{
	
	$name = htmlspecialchars($_POST['name']);
	$email = $_POST['email'];
	$message = htmlspecialchars($_POST['message']);
	$subject = htmlspecialchars($_POST['subject']);
	 
	$error = array();
	 
	 
	if(empty($subject))
	{
		$error[] = 'Please enter <strong>subject!</strong>';
	}

	if(empty($name))
	{
		$error[] = 'Please enter your <strong>name</strong>';
	}
	 
	 
	if(empty($email))
	{
		$error[] = 'Please enter your <strong>e-mail</strong>';
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{ 
		$error[] = 'E-mail is incorrect';
	}
	 
	 
	if(empty($message) || empty($message{15})) 
	{
	$error[] = "Enter message more than <strong>15</strong> characters";
	}
	 
	if(empty($error))
	{ 
		$message = 
		'Name: ' . $name . 
		'<br> Email: ' . $email . 
		'<br> Message: ' . $message;
		sendEmail($message);
	}
}
/*
$mail = mail(WEBMASTER_EMAIL, '[Message from WebSite] '.$subject, $message,
     "From: ".$name." \r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());
if($mail)
{
echo 'OK';
}
 
}
else
{
echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Warning!</h3>'.implode('<br/>', $error).'</div>';
}
}
*/