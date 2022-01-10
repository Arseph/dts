<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['save'])){
		$repoID = $_POST['repoID'];
		$repository = $_POST['repository'];
		$sql = "UPDATE user_repo_folder SET folder_name = '$repository' WHERE id = '$repoID'";
		$conn->query($sql);
		foreach($_FILES['myfile']['name'] as $i => $name)
		{
			$namemo = rand(1000,10000)."-".$name;
			$uploads_dir = '../upload/';
  		    move_uploaded_file($_FILES['myfile']['tmp_name'][$i],$uploads_dir."/".$namemo);
  		    $sqlquery = "INSERT INTO user_repositories (folder_name, file_name) VALUES ('$repoID', '$namemo')";
			mysqli_query($conn,$sqlquery);
  		}
		header('location: ../dts-sms/Admin_Dashboard/view_files.php');
	}
?>
