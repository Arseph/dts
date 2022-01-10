<?php 
session_start();

include "connection_db/connection.php";
?>

<?php

$query = "SELECT tracking_no FROM file_upload ORDER BY tracking_no DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

if(empty($lastid))
{
  $number = "DTS-00001";
}
else
{
  $idd = str_replace("DTS-","",$lastid);
  $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
  $number = 'DTS-' .$id;
}

?>

<?php

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $tracking_no = $_POST['tracking_no'];
  $file_name = $_POST['file_name'];
  $file_description = $_POST['file_description'];
  $date = $_POST['Sdate'];
  $department = $_POST['department'];
  $attach_file = $_FILES['attach_file'];
  $type_document = $_POST['type_document'];

  if(!$conn)
  {
    die("connection failed" .mysqli_connect_error());
  }
  else
  {
    $sql = "INSERT INTO file_upload (tracking_no, file_name, file_description, Sdate, department, attach_file, type_document) VALUES ('".$tracking_no."', '".$file_name."', '".$file_description."', '".$date."', '".$department."', '".$attach_file."', '".$type_document."')";

    if (mysqli_query($conn,$query))
    {
      $query = "SELECT tracking_no FROM file_upload ORDER BY tracking_no desc";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_array($result);
      $lastid = $row['tracking_no'];

      if(empty($lastid))
      {
        $number = "DTS-00001";
      }
      else
      {
        $idd = str_replace("DTS-","",$lastid);
        $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
        $number = 'DTS-' .$id;
      }
    }

    else
    {
      echo "Failed to add record";
    }

  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Upload Files</title>
  <link rel="stylesheet" href="upload_files.css"/>
</head>
<body>
  <!--label for add new document-->
    <div class="main-content">
        <div class="info">
        <h1>Add New Document</h1>
        </div>
    </div>
  <!--end-->

  <!--container start-->
<div class="container">
      <div class="row">
        <form action="upload_files.php" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-25">
                <label for="fname">Tracking Number: </label>
                </div>
                <div class="col-75">
              <input type="text" name="tracking_no" value="<?php echo $number;?>" readonly>
             </div>
           </div>

           <div class="row">
                <div class="col-25">
                <label for="fname">File Name: </label>
                </div>
                <div class="col-75">
              <input type="text" name="file_name">
             </div>
           </div>

           <div class="row">
                <div class="col-25">
                <label for="fname">File Description: </label>
                </div>
                <div class="col-75">
              <input type="text" name="file_description">
             </div>
           </div>

           <div class="row">
                <div class="col-25">
                  <label for="start">Select date:</label>
                    <input type="date" id="start" name="Sdate"
                           value="2021-07-27"
                           min="2021-01-01" max="2021-12-31">   
                </div>
           </div>

          <div class="row">
              <div class="col-25">
                  <label for="department">Department:</label>
              </div>
              <div class="col-75">
                <select id="department" name="department">
                  <option value="ict">ICT Department</option>
                  <option value="bce">BCE Department</option>
                  <option value="thm">THM Department</option>
                  <option value="bacomm">BACOMM Department</option>
                </select>
             </div>
          </div>

        <div class="row">
            <label for="file">Attach File:</label>
              <div class="file">
                <input type="file" name="attach_file"><br>
              </div>
        </div>

      <div class="row">
            <div class="col-25">
              <label for="typeD">Type of Document:</label>
            </div>
            <div class="col-75">
                <select id="typeD" name="type_document">
                  <option value="cos">Certificate of Service</option>
                  <option value="letter">Letter</option>
                  <option value="moa">Memorandum of Agreement</option>
                  <option value="unclass">Unclassified</option>
                </select>
          </div>
    </div>

          <button type="submit" name="save">Upload</button>
        </form>
      </div>
    </div>

</body>
</html>