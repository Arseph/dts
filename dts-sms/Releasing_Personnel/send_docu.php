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
    $id = $_SESSION['id'];
    $releaser_id = $_POST['releaser_id'];
    $file_name = $_POST['file_name'];
  	$send       = $_POST['send_receiving'];
    $department       = $_POST['department'];
    $send = explode(',', $send);
    $trackno       = $_POST['trackno'];
    $fullname       = $_POST['fullname'];
    date_default_timezone_set('Asia/Manila');
    $select_date       = date("m/d/Y h:i A"); 
    $dit       = date("m/d/Y"); 
    $taym       = date("h:i A");
    $receive_names = $_POST['receiving_name'];
    $receive_name = explode('|', $receive_names);

    if ($_POST['alsoAdmin'] == 'Yes') {
      $sqli = "INSERT INTO admin_receive_file (tracking_no, releaser_name, date_time, status) VALUES ('$trackno', '$fullname', '$select_date', 'Unread')";
      mysqli_query($conn,$sqli);
      $sqlinotif = "INSERT INTO admin_notif_received_file (tracking_no, department, name, document, date, time, status) VALUES ('$trackno', '$department', '$fullname', '$file_name', '$dit', '$taym', '0')";
          mysqli_query($conn,$sqlinotif);

      $sqlinotif_head = "INSERT INTO notif_head_send_release (releaser_id, department, releaser_name, receiver_name, tracking_no, document, date, time, status) VALUES ('$releaser_id', '$department', '$fullname', 'Administrator' , '$trackno', '$file_name', '$dit', '$taym', '0')";
          mysqli_query($conn,$sqlinotif_head);
    }
    if(count($send) > 0) {
      $sql = "UPDATE status_document SET status = 'Released', date_time = '$select_date', description = '$receive_names' WHERE user_id = '$id'";
        $conn->query($sql);
    foreach ($send as $index => $val) {
      $sql_status_docu = "INSERT INTO status_document (tracking_no, user_id, status, date_time) VALUES ('$trackno', '$val', 'Pending', '$select_date')";
      mysqli_query($conn,$sql_status_docu);

      $sqli = "INSERT INTO receive_file (releaser_id, receiver_id, tracking_no, releaser_name, status) VALUES ('$releaser_id','$val', '$trackno', '$fullname', 'Unread')";
      if(mysqli_query($conn,$sqli))
      {
        $sqlinotif = "INSERT INTO admin_notif_releaser (tracking_no, position, dept_releaser, name_releaser, receiver_id, document, date, time, status) VALUES ('$trackno', 'Releasing Officer', '$department', '$fullname', '$val', '$file_name', '$dit', '$taym', '0')";
          mysqli_query($conn,$sqlinotif);

        $sqlinotif_head = "INSERT INTO notif_head_send_release (department, releaser_name, receiver_name, tracking_no, document, date, time, status) VALUES ('$department', '$fullname', '$receive_name[$index]' , '$trackno', '$file_name', '$dit', '$taym', '0')";
          mysqli_query($conn,$sqlinotif_head);

        $sqlinotifi = "INSERT INTO notif_receive (receiver_id, releaser_id, department, releaser_name, tracking_no, document, date, time, status) VALUES ('$val', '$releaser_id', '$department', '$fullname', '$trackno', '$file_name', '$dit', '$taym', '0')";
          mysqli_query($conn,$sqlinotifi);

        $_SESSION['succSent'] = 'File Sent Successfully';
        $sql = "UPDATE release_file SET status = 'Read' WHERE tracking_no = '$trackno'";
        $conn->query($sql);
        header("Location: pending_docu.php");
      }
      else
      {
        $_SESSION['errSent'] = 'Something went wrong';
        #echo "Error: " . $sql . " " . mysqli_error($conn);
      }
    }
  }
   header("Location: pending_docu.php");
  }
 ?>