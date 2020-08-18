<?php
	# This script will not work on localhost.
	
	if(isset($_POST['send-mail'])){
		$name = $_POST['name'];
		$mailFrom = $_POST['email'];
		$subject = $_POST['subject'];
		$msg = $_POST['message'];

		$mailTo = "aadharagarwal.47@gmail.com";
		$headers = "From: " . $mailFrom;
		$txt = "You have received an e-mail from" . $name . "\n\n" . $msg;

	
		ini_set("SMTP", "smtp.gmail.com");
		ini_set("smtp_port", "465");
		ini_set("sendmail_from", $mailFrom);

		if(mail($mailTo, $subject, $txt, $headers)){
		header("Location: ../index.php?mailsend");
	}else{
		echo "Can't send mail!";
	}
	}else{
		header("Location: ../contact.php");
	}
	mysqli_close($conn);
?>