<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$bday = date("Y-m-d H:i:s");
		$username = $_POST['username'];
		#$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];
		$usertype = $_POST['usertype'];

		$sql = "UPDATE register SET fullname = '$fullname', department = '$department', email = '$email', bday = '$bday', username = '$username', phone_number = '$phone_number', address = '$address', usertype = '$usertype' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['succUser'] = 'User updated successfully';
		}

		else{
			$_SESSION['errUser'] = 'Something went wrong in updating member';
		}
	}
	else{
		#$_SESSION['error1'] = 'Select user to edit first';
	}
	header('location: userStatus.php');
?>

<?php
	#session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$fullname = $_POST['firstname'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$bday = date("Y-m-d H:i:s");
		$username = $_POST['username'];
		#$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];

		$sql = "UPDATE department_users SET fullname = '$fullname', department = '$department', fullname = '$firstname', email = '$email', bday = '$bday', username = '$username', phone_number = '$phone_number', address = '$address' WHERE user_id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['succUser'] = 'User updated successfully';
		}

		else{
			$_SESSION['errUser'] = 'Something went wrong in updating user';
		}
		header('location: userStatus.php');
	}


?>

