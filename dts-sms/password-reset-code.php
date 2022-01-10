<?php
	include 'connection_db/connection.php';
	session_start();

	$message="";

				require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";

	require 'vendor/autoload.php';

	function send_password_reset($get_email, $token)
	{
		 //$mailTo = "nurullajie.abdullah18@gmail.com";
		 //$body = "<h2>Hello po!</h2>";

		 $mail = new PHPMailer\PHPMailer\PHPMailer();
		 //$mail-> SMTPDebug = 3;

		 $mail->isSMTP();
		 $mail->SMTPAuth = true;

		 $mail->Host = "mail.smtp2go.com";
		 $mail->Username = "cotabato.sti.edu.ph";
		 $mail->Password = "test1234";

		 $mail->SMTPSecure = "tls";
		 $mail->Port = "2525";

		 $mail->From = "abdullah.153946@cotabato.sti.edu.ph";
		 $mail->FromName = "Document Tracking System";
		 $mail->addAddress($get_email, "user");

		 $mail->isHTML(true); 

		 $mail->Subject = "Hi nicole, goodluck sa Defense natin HAHAHA";
    $body = "<h3>Here is your reset password link.</h3> <a href='http://localhost/dts/dts-sms/password-change.php?token=$token&email=$get_email'>Click me.</a>";
    $mail->Body = $body;
    $mail->AltBody = "This is the reset password link from DTS";
    $mail->send();
  }
	




	if(isset($_POST['password-reset-link']))
	{
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$token = md5(rand());

		$check_email = "SELECT email FROM register WHERE email='$email' LIMIT 1";
		$check_email_run = mysqli_query($conn, $check_email);

		if(mysqli_num_rows($check_email_run) > 0)
		{	
			$row =  mysqli_fetch_array($check_email_run);
			//$get_name =  $row['fullname'];
			$get_email = $row['email'];

			$update_token = "UPDATE register SET password_token = '$token' WHERE email ='$get_email' LIMIT 1";
			$update_token_run = mysqli_query($conn, $update_token);

			if($update_token_run)
			{
				send_password_reset($get_email, $token);
				$_SESSION['status'] = "We e-mail you a passord reset";
				header("Location: password-reset.php");
			}
			else
			{
				$_SESSION['status'] = "Something went wrong. #1";
				header("Location: password-reset.php");	
			}	
		}
			else{
				$_SESSION['status'] = "No email found.";
				header("Location: password-reset.php");	 
		}
	}

?>