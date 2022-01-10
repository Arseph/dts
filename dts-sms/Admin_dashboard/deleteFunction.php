<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM batch_upload WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['successUser'] = 'User removed successfully';
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

<?php
session_start();
include_once('connection_db/connection.php');

if(isset($_POST['delete_multiple']))
{
    $all_id = $_POST['delete_id[]'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM register WHERE id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: index.php");
    }
}
