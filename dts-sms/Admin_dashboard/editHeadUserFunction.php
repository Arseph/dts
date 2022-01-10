<?php
	session_start();
	include('viewHeadDept.php');
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

		$sql = "UPDATE department_users SET department = '$department', firstname = '$firstname', lastname = '$lastname', email = '$email', bday = '$bday', username = '$username', password = '$password', phone_number = '$phone_number', address = '$address' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			header('location: viewHeadDept.php');
		}

		else{
			$_SESSION['error1'] = 'Something went wrong in updating user';
		}
		$_SESSION['success1'] = 'User updated successfully';
		mysqli_close($conn);
	}
	

?>