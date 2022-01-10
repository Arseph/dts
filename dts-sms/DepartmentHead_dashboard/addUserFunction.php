<?php
	session_start();
	include_once('connection_db/connection.php');

	#Employee Code
	$rand = sprintf(rand(0,9999999));
    $employee_code = $rand;

	if(isset($_POST['addUser'])){
		$employee_code = $_POST['empcode'];
		$department = $_POST['department'];
		$fullname = $_POST['fullname'];
		$phone_number = $_POST['phone_number'];
		$usertype = $_POST['usertype'];
		$email = $_POST['email'];
		#$bday       = date("Y-m-d H:i:s bday");
		$username = $_POST['username'];
		$password = $_POST['password'];
		#$phone_number = $_POST['phone_number'];
		#$address = $_POST['address'];	
		
		$email_query1 = "SELECT * FROM register WHERE fullname='$fullname'";
		$email_query_run1 = mysqli_query($conn, $email_query1);
		if (mysqli_num_rows($email_query_run1) > 0)
		{
			$_SESSION['error1'] = 'User account already exists.';
			header('location: users.php');
		}
		else
		{
			$sql = "INSERT INTO register (employee_code, department, fullname, phone_number, usertype, email, username, password) VALUES ('$employee_code', '$department', '$fullname', '$phone_number', '$usertype', '$email', '$username', '$password')";

			//use for MySQLi OOP
			if($conn->query($sql)){
				$_SESSION['success1'] = 'Account created successfully';
				header('location: users.php');
			}
			
			else{
				//$_SESSION['error1'] = 'Something went wrong while adding';
			}
		}

	header('location: users.php');
	}
	
?>

