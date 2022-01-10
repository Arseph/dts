<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM batch_upload WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['successUser'] = 'User removed successfully!';
		}
		
		else{
			$_SESSION['errorUser'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['errorUser'] = 'Select file to delete first';
	}

	header('location: batchUpload.php');
?>
