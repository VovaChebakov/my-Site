<?php 
	$name = htmlspecialchars($_POST['Name']);
	$email = htmlspecialchars($_POST['Email']);
	$topic = htmlspecialchars($_POST['Topic']);
	$message = htmlspecialchars($_POST['Message']);
	if ($name == '' || $email == '' || $topic == '' || $message == '') {
		echo 'Fill all text boxes';
		exit;
	}
	//Sent
	$topic = "=?utf-8?8?".base64_encode($topic)."?=";
	$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html;
charset=utf-8\r\n";
	if (mail("halk220708@gmail.com", $topic, $message, $headers)) 
		echo "Your message is sent";
	else
		echo "Your message is not sent";
?>