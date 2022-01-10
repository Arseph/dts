<?php
include 'add_document_code.php'; 
session_start();
$username = $_SESSION['username'];
$department = $_SESSION['department'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department Head | Document Tracking System</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body style="background-color: #f5f5f5;">

<!-----Top bar navigation---->
  <div class="wrapper">
    <?php include_once"include/topbar.php"; ?>

<!---- Sidebar ---->
    <?php include_once"include/sidebar.php"; ?>
  </div>

<!--- MAIN CONTENT START --->
<div class="main-content">
       <?php
        if(isset($_SESSION['err'])){
          echo
          "
          <div class='alert alert-danger text-center'>
            ".$_SESSION['err']."
          </div>
          ";
          unset($_SESSION['err']);
        }
        if(isset($_SESSION['ss'])){
          echo
          "
          <div class='alert alert-success text-center'>
            ".$_SESSION['ss']."
          </div>
          ";
          unset($_SESSION['ss']);
        }
      ?>
<style>
        .alert
        {
          font-size: 12px;
          width: 20%;
          margin-left: 77%;
          margin-top: -2.6%;
          float: right;
          margin-right: 1%;
          z-index: 1;
          position: fixed;
        }
</style>
<div class="info">
    <b style="font-size: 15px; font-weight: 600;"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600;">Dashboard</a> / Add New Document / </b><a href="draft_files.php" style="font-size: 15px; font-weight: 600">&nbsp;Drafts</a>
  </div>
  <style>
  .main-content .info{
    margin: 10px;
    margin-left: 4%;
    color: #1F4E79;;
    margin-top: 20px;
    margin-bottom: 15px;
    border-bottom: 1px solid #2F5597;
  }
</style>

<!--- MAIN CONTENT END--->
</div>


  <div class="card shadow" style="width: 70%; margin-left: 15%; border: none; margin-top: 1%">
    <div class="card-body">
      <form action="add_document_code.php" method="POST" enctype="multipart/form-data" class="wrapper">

              <div class="form-inline">
              <label>Tracking Number: </label>
              <div class="tracking_no ">
                <input type="text" class="form-control" name="tracking_no" style="font-size: 13px; width: 175%;" value="<?php echo $tracking_no;?>" readonly>
              </div>
            </div><br>

             <div class="form-inline">
              <label><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;File Name: </label>
              <div class="file_name ">
                <input type="text" class="form-control" name="file_name" style="font-size: 13px; width: 175%;" onkeyup = "Validate(this)" id="txt" required>
                <input type="hidden" name="user" value="<?php echo $username; ?>" required>
              </div>
            </div><br>

         <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM tbl_typedocument WHERE department = '$department'";
            $result = mysqli_query($conn, $query);
            $options = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options = $options."<option>$row2[2]</option>";
            }

          ?>
  
            <div class="form-inline">
              <label>Details: </label>
              <div class="file_description ">
                <textarea class="form-control" name="file_description" placeholder="Write something.." style="width: 100%;height:100px; font-size: 13px; width: 185%;"></textarea>
              </div>
            </div><br>

            <div class="form-inline">
              <label><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Attach File: </label>
              <div class="myfile ">
                <input type="file" class="upload-box form-control" name="myfile" id="myfile" style="font-size: 13px; width: 120%;" onchange="getImagePreview(event)" required>
              </div>
            </div><br>
            <div id="preview" style="margin-left: 34%; margin-bottom: 5px; margin-top: -10px">
              
            </div>
            <div class="form-inline">
              <label><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Types of Document: </label>
              <div class="type_document ">
                <select id="type_document" class="form-control" name="type_document" style="width: 202%; font-size: 13px;" >
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options;?>
                    
                </select>
              </div>
            </div><br>

            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="submit" style="width: 23%; margin-top: -1%; font-size: 13px; float: left; margin-left: 27%"><i class="fas fa-save"></i></span>&nbsp; Save as Draft</button>

              <!---- SEND DOCUMENT BUTTON ------>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#send_modal" style="width: 20%; font-size: 13px; margin-top: -6.2%; float: left; margin-left: 52%"><span><i class="fas fa-paper-plane"></i></span>&nbsp; Send</button>
            </div>

      </form>
    </div>
  </div>


         <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM register WHERE usertype NOT IN ('Employee', 'Department Head', 'Receiving Officer') ORDER BY fullname ASC";
            $result1 = mysqli_query($conn, $query);
            $options3 = "";
            while($row = mysqli_fetch_array($result1))
            {
                $options3 = $options3."<option>$row[1]</option>";
            }

          ?>


<!--- modal for send document ni department head---->

<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-0" style="width: 90%;">
      <div class="modal-header" style="background-color: #86ABF9; height: 40px;">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550;color: white; margin-top: -1%">SEND THIS DOCUMENT</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -5%; color: white; font-size: 25px">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="receiver" style="margin-bottom: 4px; font-size: 14px; margin-left: 12%; color: #2C3953;"> TO:</label>
          <select id="receiver" class="form-control" name="receiver" style="width: 75%; font-size: 12px; cursor: pointer; margin-left: 13%">
            <option selected="true" disabled="disabled" hidden></option>
              <?php
                foreach($result1 as $row)
                {
                  echo '<option value="'.$row["fullname"].'">'.$row["fullname"].'</option>';  
                }
              ?>
                    
          </select>
        </div>

        <div class="form-group">
          <label for="receiver2" style="margin-bottom: 4px; font-size: 14px; margin-left: 12%; color: #2C3953;"> Multiple Send: </label>
          <select id="receiver2" class="form-control" name="receiver2" style="width: 75%; font-size: 12px; cursor: pointer; margin-left: 13%;">
            <option selected="true" disabled="disabled" hidden></option>
             <?php
                foreach($result1 as $row)
                {
                  echo '<option value="'.$row["fullname"].'">'.$row["fullname"].'</option>';  
                }
              ?>
                    
          </select>
        </div>
      </div>
      <div class="modal-footer" style="height: 50px">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px; margin-top: -1%">Cancel</button>
        <button type="button" class="btn btn-primary" style="font-size: 12px; margin-top: -1%">Send</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>

<style>

  label
  {
    font-size: 14px;
    display: inline-block;
    width: 150px;
    font-weight: 550;
    margin-left: -7%;
  }

  .wrapper
  {
    margin-left: 20%;
  }
  .upload-box{
    font-size: 14px;
    background-color: white;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button{
    color: white;
    background: #357EDD;
    border: none;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button:hover{
    background: #2C5EBA;
  }

  .getImagePreview
  {
    padding: 100px;
  }
</style>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="150";
    imagediv.appendChild(newimg);
  }
  
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 4000);


 // validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\rA-Za-z\s-_-\%\$\.\,\@]+/g, '');
}
</script>