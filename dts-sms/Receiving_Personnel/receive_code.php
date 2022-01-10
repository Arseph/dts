<?php
session_start();
include 'connection_db/connection.php'; ?>
<?php 
    
    $rand = sprintf(rand(1,9999999999));
?>
<?php 
  $success  = "";
  $department = $_SESSION['department'];
  $releaser_id_daw = $_SESSION['releaser_id_daw'];

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $id = $_SESSION['id'];
    date_default_timezone_set('Asia/Manila');
    $releaser_name = $_POST['releaser_name'];
    $receiver_name = $_POST['receiver_name'];
    $releaser_id = $_POST['releaser_id'];
    $trackno       = $_POST['trackno'];
    $id            = $_POST['id'];
    $dit       = date("m/d/Y"); 
    $taym       = date("h:i A");
    $select_date       = date("m/d/Y h:i A");
    $sql = "UPDATE status_document SET status = 'Received', date_time = '$select_date', description = '$releaser_name' WHERE user_id = '$id' and tracking_no = '$trackno'";
        $conn->query($sql);
    $sql = "UPDATE receive_file SET status = 'Read' WHERE tracking_no = '$trackno' AND receiver_id = '$id'";
        $conn->query($sql);
    $sqlReport = "INSERT INTO reports (tracking_no, receiver_name, date_and_time) VALUES ('$trackno', '$receiver_name', '$select_date')";
          mysqli_query($conn,$sqlReport);
    if($releaser_name === 'Administrator (Administrator)') {
      $sqlinotif = "INSERT INTO admin_outgoing_file (tracking_no, receiver_id, date, time, status) VALUES ('$trackno', '$id', '$dit', '$taym', '0')";
          mysqli_query($conn,$sqlinotif);
    } else {
      $sqlinotif = "INSERT INTO admin_notif_receiver (tracking_no, receiver_id, releaser, date, time, status) VALUES ('$trackno', '$id', '$releaser_name', '$dit', '$taym', '0')";
            mysqli_query($conn,$sqlinotif);

      $sqlinotifi = "INSERT INTO notif_head_send_receive (tracking_no, department, receiver_id, releaser, date, time, status) VALUES ('$trackno', '$department', '$id', '$releaser_name', '$dit', '$taym', '0')";
            mysqli_query($conn,$sqlinotifi);

      $sqlinotification = "INSERT INTO notif_receive_released (releaser_id, department, receiver_name, tracking_no, date, time, status) VALUES ('$releaser_id', '$department', '$receiver_name', '$trackno', '$dit', '$taym', '0')";
            mysqli_query($conn,$sqlinotification);
    }
   header("Location: receive_docu.php");
  }
 ?>