
<?php
include 'connection_db/connection.php'; ?>
<?php 
    
    $rand = sprintf(rand(1,9999999999));
    $tracking_no = $rand;
?>
<?php 
  $success  = "";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $tracking_no       = $_POST['tracking_no'];
    $file_name         = $_POST["file_name"];
    $user         = $_POST["user"];
    $file_description  = $_POST["file_description"];
    $select_date       = date("Y-m-d H:i:s");
    #$select_date       = date('Y-m-d', strtotime($_POST['select_date']));
    #$department        = $_POST["department"];
    
    #php code for attach file#
    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
    $tname = $_FILES["myfile"]["tmp_name"];
    $uploads_dir = 'upload';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    $type_document     = $_POST["type_document"];

    if(!$conn)
    {
      die("Connection failed " . mysqli_connect_error());
    }
    else
    {
      #insert into database#
      $sql = "INSERT INTO file_upload (tracking_no, user, file_name, file_description, select_date, attach_file, type_document) VALUES ('$tracking_no', '$user', '$file_name', '$file_description', '$select_date', '$pname', '$type_document')";
      if(mysqli_query($conn,$sql))
      {
        #echo "Record Successfully saved";
        $_SESSION['ss'] = 'New record created!';
        #$success    =   "Record saved!";
        header("Location: add_document.php");
      }
      else
      {
        #echo "Record failed";
        $_SESSION['err'] = 'Something went wrong while adding';
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