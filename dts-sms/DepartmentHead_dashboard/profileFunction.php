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
		$sql = "UPDATE register SET imageProfile = '$pname' WHERE id = '$id'";

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
		$email = $_POST['updateEmail'];
		$username = $_POST['updateUname'];
		$phone_number = $_POST['updateNum'];

		$sql = "UPDATE register SET email = '$email', username = '$username', phone_number = '$phone_number' WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success1'] = 'Updated successfully.';
		}

		else{
			$_SESSION['errorStat'] = 'Something went wrong. Please try again.';
		}
		header('location: profile.php');
	}
  
?>