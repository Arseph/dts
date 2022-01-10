<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['edit'])){
		$userID = $_POST['id'];
		$department = $_POST['department'];
		$fullname = $_POST['fullname'];
		$usertype = $_POST['usertype'];
		$email = $_POST['email'];
		$bday       = date("Y-m-d H:i:s");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];

		$sql = "UPDATE register SET department = '$department', fullname = '$fullname', usertype = '$usertype', email = '$email', bday = '$bday', username = '$username', password = '$password', phone_number = '$phone_number', address = '$address' WHERE id = '$userID'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success1'] = 'User updated successfully';
		}

		else{
			$_SESSION['error1'] = 'Something went wrong during the update';
		}
	}
	else{
		#$_SESSION['error1'] = 'Select department to edit first';
	}

	header('location: manageUsers.php');

?>
