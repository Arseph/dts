<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['save'])){
		$username = $_POST['user'];
		$repository = $_POST['repository'];
		
		$sql = "INSERT INTO user_repo_folder (user, folder_name) VALUES ('$username', '$repository')";
		if (mysqli_query($conn,$sql)) {
		  $last_id = mysqli_insert_id($conn);
		}
		foreach($_FILES['myfile']['name'] as $i => $name)
		{
			$namemo = rand(1000,10000)."-".$name;
			$uploads_dir = '../upload/';
  		    move_uploaded_file($_FILES['myfile']['tmp_name'][$i],$uploads_dir."/".$namemo);
  		    $sqlquery = "INSERT INTO user_repositories (folder_name, file_name) VALUES ('$last_id', '$namemo')";
			mysqli_query($conn,$sqlquery);
  		}
		header('location: view_files.php');
	}
?>