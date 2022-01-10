<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM file_upload WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'File deleted successfully.';
			header('location: draft_files.php');
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
			header('location: draft_files.php');
		}
	}
	else{
		$_SESSION['err'] = 'No row selected.';
		header('location: draft_files.php');
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
        $_SESSION['ss'] = "File/s deleted successfully.";
        header("Location: draft_files.php");
    }
    else
    {
        $_SESSION['err'] = "There were errors found while deleting the file.";
        header("Location: draft_files.php");
    }
}
?>
