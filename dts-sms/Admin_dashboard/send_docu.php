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
    $releaser_id = '0';
    $file_name = $_POST['file_name'];
  	$send       = $_POST['send_receiving'];
    $department       = 'Administrator';
    $send = explode(',', $send);
    $trackno       = $_POST['trackno'];
    $fullname       = 'Administrator';
    date_default_timezone_set('Asia/Manila');
    $select_date       = date("m/d/Y h:i A"); 
    $dit       = date("m/d/Y"); 
    $taym       = date("h:i A");
    $receive_name = $_POST['receiving_name'];
    $receive_name = explode('|', $receive_name);
    $date_time = date("m/d/Y h:i A");
    if(count($send) > 0) {
    foreach ($send as $index => $val) {
      $sqli = "INSERT INTO receive_file (releaser_id, receiver_id, tracking_no, releaser_name, date_time, status) VALUES ('$releaser_id','$val', '$trackno', '$fullname', '$date_time', 'Unread')";
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
        header("Location: receive_docu.php");
      }
      else
      {
        $_SESSION['errSent'] = 'Something went wrong';
        #echo "Error: " . $sql . " " . mysqli_error($conn);
      }
    }
  }
   header("Location: receive_docu.php");
  }
 ?>