<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['updateProfile'])){
		$id = $_POST['pid'];
		#$uploadPic = $_POST['uploadPic'];
	    $pname = $_FILES["uploadPic"]["name"];
	    $tname = $_FILES["uploadPic"]["tmp_name"];
	    $uploads_dir = 'img/';
    	move_uploaded_file($tname, $uploads_dir.'/'.$pname);
		$sql = "UPDATE admin_account SET imageProfile = '$pname' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'Your profile image has been updated.';
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: profile.php');
	}



	//update profile function
		if(isset($_POST['updateBtn'])){	
		$id = $_POST['update_id'];
		$firstname = $_POST['updateFname'];
		$lastname = $_POST['updateLname'];
		$email = $_POST['updateEmail'];
		$username = $_POST['updateUname'];
		$phone_number = $_POST['updateNum'];

		$sql = "UPDATE admin_account SET email = '$email', username = '$username', firstname = '$firstname', lastname = '$lastname', phone_number = '$phone_number' WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success1'] = 'Updated successfully.';
		}

		else{
			$_SESSION['errorStat'] = 'Something went wrong. Please try again.';
		}
		header('location: profile.php');
	}
  

  //delete image
	#$id = $_POST['deleteImage'];
	#$sqlDlt = "DELETE imageProfile FROM admin_account WHERE id = '$id'";
	if(isset($_GET['id']))
	{
		#$id = $_POST['deleteImage'];
		$sql = "DELETE imageProfile FROM admin_account WHERE id = '".$_GET['id']."'";
		if($conn->query($sql)){
			$_SESSION['statusSuccess'] = 'File deleted successfully.';
			header('location: profile.php');
		}
		
		else{
			$_SESSION['error1'] = 'Something went wrong. Please try again.';
			header('location: profile.php');
		}
	}
?>