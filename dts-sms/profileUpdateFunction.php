<?php
session_start();
include_once('connection_db/connection.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
    $sql = "UPDATE register SET firstname = '$firstname', lastname = '$lastname', username = '$username' WHERE id='$id' ";

    if($conn->query($sql))
    {
        echo '<script>alert("Profile has been updated")</script>';
    }
    else
    {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        
    }
    header("Location: navbar.php");
}

?>