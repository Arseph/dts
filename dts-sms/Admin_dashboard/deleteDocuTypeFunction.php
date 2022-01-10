<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM tbl_typedocument WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'Deleted successfully.';
			header('location: viewDocumentType.php');
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
	}
	else{
		$_SESSION['err'] = 'No row selected.';
	}

	header('location: viewDocumentType.php');
?>


//multple delete dept. file
<?php
session_start();
include_once('connection_db/connection.php');

if(isset($_POST['delete_all']))
{
    $all_id = $_POST['user_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM tbl_typedocument WHERE id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['ss'] = "Deleted successfully.";
        header("Location: viewDocumentType.php");
    }
    else
    {
        $_SESSION['err'] = "Something went wrong. Please try again.";
        header("Location: viewDocumentType.php");
    }
}

?>