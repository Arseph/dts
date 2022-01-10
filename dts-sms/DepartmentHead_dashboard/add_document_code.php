
<?php
session_start();
include 'connection_db/connection.php'; ?>
<?php 
    
    $rand = sprintf(rand(1,9999999999));
    $tracking_no = $rand;
?>
<?php 
  $success  = "";
  if(isset($_POST['draft']))
  {
    $receiber = $_POST['receiving_name'];
    $receiber = explode('|', $receiber);
    $send       = $_POST['send_releasing'];
    $send = explode(',', $send);
    $sender_name       = $_POST['sender_name'];
    $is_tosend         = $_POST['isFiletoBeSend'];
    $tracking_no       = $_POST['tracking_no'];
    $file_name         = $_POST["file_name"];
    $user         = $_POST["user"];
    $file_description  = $_POST["file_description"];
    date_default_timezone_set('Asia/Manila');
    $select_date       = date("m/d/Y h:i A"); 
    #$select_date       = date('Y-m-d', strtotime($_POST['select_date']));
    $department        = $_POST["department"];
    
    #php code for attach file#
    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
    $tname = $_FILES["myfile"]["tmp_name"];
    $uploads_dir = '../upload/';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    $type_document     = $_POST["type_document"];
    $routedTo     = $_POST["routedTo"];
    $pleaseNote     = $_POST["pleaseNote"];
    $forYour     = $_POST["forYour"];

    $dit       = date("m/d/Y"); 
    $taym       = date("h:i A");
    $created_at       = date("Y-m-d H:i:s");
    if(!$conn)
    {
      die("Connection failed " . mysqli_connect_error());
    }
    else
    {
      if($is_tosend) {
        if(count($send) > 0) {
          foreach ($send as $val) {
            $sqli = "INSERT INTO release_file (releaser_id, tracking_no, sender_name, date_time, status) VALUES ('$val', '$tracking_no', '$sender_name', '$select_date', 'Unread')";
              mysqli_query($conn,$sqli);
              $sqlinotifi = "INSERT INTO notif_release (releaser_id, name, tracking_no, department, document, date, time, status) VALUES ('$val', '$sender_name', '$tracking_no', '$department', '$file_name', '$dit', '$taym', '0')";
                mysqli_query($conn,$sqlinotifi);
              $sql_status_docu = "INSERT INTO status_document (tracking_no, user_id, status, date_time) VALUES ('$tracking_no', '$val', 'Pending', '$select_date')";
              mysqli_query($conn,$sql_status_docu);
          }
        }
      }
      #insert into database#
      $status = $is_tosend ? 'Send' : 'Draft';
      $sql = "INSERT INTO file_upload (tracking_no, user, file_name, file_description, select_date, department, attach_file, type_document, routedTo, pleaseNote, forYour, status, created_at) VALUES ('$tracking_no', '$user', '$file_name', '$file_description', '$select_date', '$department', '$pname', '$type_document', '$routedTo', '$pleaseNote', '$forYour', '$status', '$created_at')";
      

      if(mysqli_query($conn,$sql))
      {
        if ($status == 'Send') {
          $sqlinotif = "INSERT INTO admin_notif_dept_sent (tracking_no, position, dept_sender, dept_releaser, name_sender, name_releaser, document, date, time, status) VALUES ('$tracking_no', 'Department Head', '$department', '$department', '$sender_name', '$releaser', '$file_name', '$dit', '$taym', '0')";
          mysqli_query($conn,$sqlinotif);
          $_SESSION['ss'] = 'File sent successfully.';
        }
        elseif ($status == 'Draft')
        {
          $_SESSION['ss'] = 'File save as draft.';
        }
        header("Location: add_document.php");
      }
      else
      {
        #echo "Record failed";
        $_SESSION['err'] = 'Something went wrong. Please try again.';
        #echo "Error: " . $sql . " " . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
 ?>

