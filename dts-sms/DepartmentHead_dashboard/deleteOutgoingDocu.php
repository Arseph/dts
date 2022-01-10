<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM file_upload WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'File deleted successfully';
			header('location: outgoingDocuments.php');
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
			header('location: outgoingDocuments.php');
		}
	}
	else{
		$_SESSION['error'] = 'Select file to delete first';
		header('location: outgoingDocuments.php');
	}
?>

<?php
#session_start();
include_once('connection_db/connection.php');

if(isset($_POST['delete_all']))
{
    $all_id = $_POST['user_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM file_upload WHERE id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "File deleted successfully";
        header("Location: outgoingDocuments.php");
    }
    else
    {
        $_SESSION['error'] = "There were error found while deleting file";
        header("Location: outgoingDocuments.php");
    }
}
?>