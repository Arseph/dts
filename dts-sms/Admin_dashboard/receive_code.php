<?php
session_start();
include 'connection_db/connection.php'; ?>
<?php 
    
    $rand = sprintf(rand(1,9999999999));
    $tracking_no = $rand;
?>
<?php 
  $success  = "";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $trackno       = $_POST['trackno'];
    $dept       = $_POST['dept'];
    date_default_timezone_set('Asia/Manila');
    $dit       = date("m/d/Y"); 
    $taym       = date("h:i A");
    $sql = "UPDATE admin_receive_file SET status = 'Read' WHERE tracking_no = '$trackno'";
        $conn->query($sql);
    $sqlinotif = "INSERT INTO notif_admin_receive_head (tracking_no, department, name, date, time, status) VALUES ('$trackno', '$dept', 'Administrator', '$dit', '$taym', '0')";
            mysqli_query($conn,$sqlinotif);
    $sqlinotifi = "INSERT INTO notif_admin_receive_release (tracking_no, department, name, date, time, status) VALUES ('$trackno', '$dept', 'Administrator', '$dit', '$taym', '0')";
            mysqli_query($conn,$sqlinotifi);
   header("Location: receive_docu.php");
  }
 ?>