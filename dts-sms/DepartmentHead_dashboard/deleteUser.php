<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM register WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success1'] = 'User removed successfully';
		}
		
		else{
			$_SESSION['error1'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error1'] = 'Select user to delete first';
	}

	header('location: manageUsers.php');
?>