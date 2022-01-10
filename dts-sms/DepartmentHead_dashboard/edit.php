<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$file_name         = $_POST["file_name"];
	    $file_description  = $_POST["file_description"];
	    date_default_timezone_set('Asia/Manila');
    	$select_date       = date("Y/m/d h:i A"); 
	    #$department 	   = $_POST['department'];

		#php code for attach file#
	    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
	    $tname = $_FILES["myfile"]["tmp_name"];
	    $uploads_dir = '../upload';
	    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    	$type_document     = $_POST["type_document"];
		
		$sql = "UPDATE file_upload SET file_name = '$file_name', file_description = '$file_description', select_date = '$select_date', attach_file = '$pname', type_document = '$type_document' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['statusSuccess'] = 'File updated successfully';
		}
		
		else{ 
			$_SESSION['error1'] = 'Something went wrong in updating member';
		}
		header('location: draft_files.php');
	}
	else{
		#$_SESSION['error1'] = 'Select file to edit first';
	}

	if(isset($_POST['submitDocu'])) {
		$id = $_POST['id'];
		$releaser_id = $_POST["releaser_id"];
		$tracking_no = $_POST["tracking_no"];
		$sender_name = $_POST["sender_name"];
		date_default_timezone_set('Asia/Manila');
    	$select_date       = date("m/d/Y h:i A"); 
		$sqli = "INSERT INTO release_file (releaser_id, tracking_no, sender_name, date_time, status) VALUES ('$releaser_id', '$tracking_no', '$sender_name', '$select_date', 'Unread')";
        mysqli_query($conn,$sqli);
        $sql = "UPDATE file_upload SET select_date = '$select_date', status = 'Send' WHERE id = '$id'";
        $conn->query($sql);
        header('location: draft_files.php');
        $_SESSION['statusSuccess'] = 'Sent Successfully';
	}


?>