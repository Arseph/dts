<?php
session_start();
include 'connection_db/connection.php'; ?>
<?php 
    
    $rand = sprintf(rand(1,9999999999));
    #$rand = sprintf(uniqid('user_'));
    $tracking_no = $rand;
?>
<?php 
  $success  = "";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $isDraftorSend = $_POST['isDraftorSend'];
    $receiber = $_POST['receiving_name'];
    $receiber = explode('|', $receiber);
    $send       = $_POST['send_receiving'];
    $send = explode(',', $send);
    $tracking_no       = $_POST['tracking_no'];
    $file_name         = $_POST["file_name"];
    $file_description  = $_POST["file_description"];
    $user         = $_POST["user"];
    date_default_timezone_set('Asia/Manila');
    $select_date       = date("m/d/Y h:i A"); 
    #$select_date       = date('Y-m-d', strtotime($_POST['select_date']));
    #$department        = $_POST["department"];
    
    #php code for attach file#
    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
    $tname = $_FILES["myfile"]["tmp_name"];
    $uploads_dir = 'upload';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    $type_document     = $_POST["type_document"];
    $routedTo     = $_POST["routedTo"];
    $pleaseNote     = $_POST["pleaseNote"];
    $forYour     = $_POST["forYour"];
    
    $status = $isDraftorSend == 'send' ? 'Send' : 'Draft';
    $dit       = date("m/d/Y"); 
    $taym       = date("h:i A");
    $created_at       = date("Y-m-d H:i:s");
    if(!$conn)
    {
      die("Connection failed " . mysqli_connect_error());
    }
    else
    {
      #insert into database#
      $sql = "INSERT INTO file_upload (tracking_no, file_name, file_description, select_date, attach_file, type_document, routedTo, pleaseNote, forYour, status, department, created_at) VALUES ('$tracking_no', '$file_name', '$file_description', '$select_date', '$pname', '$type_document', '$routedTo', '$pleaseNote', '$forYour', '$status', 'Administrator', '$created_at')";
      if(count($send) > 0) {
        foreach ($send as $val) {
          $sqli = "INSERT INTO receive_file (receiver_id, tracking_no, releaser_name, date_time, status) VALUES ('$val', '$tracking_no', 'Administrator', '$select_date', 'Unread')";
        mysqli_query($conn,$sqli);  

        $notif = "INSERT INTO notif_receive (receiver_id, department, releaser_name, tracking_no, document, date, time, status) VALUES ('$val', 'Administrator', 'Administrator', '$tracking_no', '$file_name', '$dit', '$taym', '0')";
        mysqli_query($conn,$notif);

        $notif_head = "INSERT INTO notif_head_receive_receive (receiver_id, department, releaser_name, tracking_no, document, date, time, status) VALUES ('$val', 'Administrator', 'Administrator', '$tracking_no', '$file_name', '$dit', '$taym', '0')";
        mysqli_query($conn,$notif_head);  
        }
      }
      if(mysqli_query($conn,$sql))
      {
        if ($status == 'Send') {
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
        $_SESSION['err'] = 'Something went wrong in sending the document.';
        #echo "Error: " . $sql . " " . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
 ?>

<?php
//Incorrect characters for file name
$file_nameErr = $attach_fileErr = $type_documentErr = "";
$file_name = $description = $attach_file = $type_document = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["file_name"])) {
    $file_nameErr = "File name is required.";
  } else {
    $file_name = ($_POST["file_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match('/^[a-zA-Z0-9-az_]+$/',$file_name)) {
      $file_nameErr = "Only letters, numbers and underscore are allowed.";
    }
  }
}

?>