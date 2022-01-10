<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$department = $_POST['department'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$bday       = date("Y-m-d H:i:s");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];
		$usertype = $_POST['usertype'];

		$sql = "UPDATE batch_upload SET department = '$department', firstname = '$firstname', lastname = '$lastname', email = '$email', bday = '$bday', username = '$username', password = '$password', phone_number = '$phone_number', address = '$address', usertype = '$usertype' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success1'] = 'User updated successfully';
		}

		else{
			$_SESSION['error1'] = 'Something went wrong in updating member';
		}
		header('location: batchUpload.php');
	}
	

?>