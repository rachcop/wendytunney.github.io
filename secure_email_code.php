<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/layout.css" type="text/css" media="all">
<title></title>
</head>

<body>
	<?php
	if(isset($_POST["submit"])){
		// Checking For Blank Fields..
		if($_POST["name"]==""||$_POST["email"]==""||$_POST["comment"]==""){
			echo '<p class="error">Please complete all required fields.</p>';
		}else{
			// Check if the "Sender's Email" input field is filled out
			$email=$_POST['email'];
			// Sanitize E-mail Address
			$email =filter_var($email, FILTER_SANITIZE_EMAIL);
			// Validate E-mail Address
			$email= filter_var($email, FILTER_VALIDATE_EMAIL);
			if (!$email){
				echo '<p class="error">Invalid Email</p>';
			}
			else{
				$subject = 'NEW MESSAGE: A new booking request has been received from ' . $_POST['name'];
				$sender = 'From: ' . $_POST['name'];
				$message = $_POST['comment'];
				$headers = 'From:'. $email2 . "\r\n"; // Sender's Email
				$headers .= 'Cc:'. $email_from . "\r\n"; // Carbon copy to Sender
				// Message lines should not exceed 70 characters (PHP rule), so wrap it
				$message = wordwrap($message, 70);
				
				
				// Send Mail By PHP Mail Function
				mail("wendytunney@outlook.com", $subject, $sender, $message, $headers);
				echo '<p class="success">Thank you, your request has successfully been submitted!</p>';
			}
		}
	}
	?>
</body>
</html>