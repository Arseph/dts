<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM file_upload WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'File deleted successfully!';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error'] = 'Select file to delete first';
	}

	header('location: draft_files.php');
?>