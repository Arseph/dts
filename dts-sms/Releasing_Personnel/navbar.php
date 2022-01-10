<?php 
	session_start();
  $id = $_SESSION['id'];
	$username = $_SESSION['username'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Releasing Officer | Dashboard</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body style="background-color: #F5F5F5;">
<!-----Top bar navigation---->
  <div class="wrapper">
    <?php include_once"include/topbar.php"; ?>

    <?php include_once"include/sidebar.php"; ?>
  </div>

<div class="main-content">
   <?php
        if(isset($_SESSION['success1'])){
          echo
          "
          <div class='alert alert text-center'>
            ".$_SESSION['success1']."
          </div>
          ";
          unset($_SESSION['success1']);
        }
      ?>
  <div class="info">
    <div style="font-size: 15px; font-weight: 600"><i class="fas fa-home"></i> Dashboard
  </div>

  <style>
    .main-content .info{
    margin: 10px;
    margin-left: 23.5%;
    color: #1F4E79;;
    margin-top: 20px;
    margin-bottom: 15px;
    font-size: 12px; 
    border-bottom: 1px solid #2F5597;

  }
    .alert
  {
      background-color: #5B5B5B;
      color: white;
      font-size: 12px;
      width: 16%;
      margin-left: 83%;
      margin-top: -2.6%;
      float: right;
      margin-right: 1%;
      z-index: 1;
      position: fixed;
  }
</style>
</div>
</div>


<!--- pending documents 
<div class="card shadow-sm bg-white" style="width: 23%; margin-left: 23.5%; border: none; margin-top: 1%; display: fixed">
    <a href="pending_docu.php" style="text-decoration: none;">
      <div class="card-body" style="height: 120px; border-left: 5px solid #C1960E; border-radius: 5px 0 0 5px;"> 
        <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text mb-1">
              Pending Documents</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
             <div class="col-auto">
            <i class="fa fa-exclamation-circle fa-2x text-gray-300" style="font-size: 35px; color: #D4D4D4;"></i>
          </div>
       </div>
      </div>
    </a>
</div> --->

<div class="card" style="width: 70%; margin-left: 25%; border: none; margin-top: 1%">
  <div class="card-body" style="background-color: white;">
  <div class="input-group">
    <input type="text" class="searchIncomingDoc form-control" placeholder="Seach pending documents..." >
    <span class="input-group-append">
        <a class="btn btn-outline-secondary">
            <i class="fa fa-search"></i>
        </a>
      </span>
  </div>
</div>
</div>

<div class="card shadow" style="width: 70%; margin-left: 25%; border: none; margin-top: 1%">
  <div class="card-header" style=" height: 50px; border: none;">
    <small style="font-size: 12px; font-weight: 550; color: #2B2B2B; font-style: italic;">PENDING &nbsp;DOCUMENTS</small>
    <a href="pending_docu.php" style="font-size: 12px; float: right;">View More</a>
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <!--<input type="submit" name="delete_all" value="Remove" class="btn btn-danger btn-xs" style="font-size: 12px; width: 8%; margin-bottom: 10px; margin-left: 4px;">-->

        <table id="userTbl" class="responsive-table table-hover table-striped table-sm" width="100%">
          <thead style=" color: #2B2B2B; font-size: 12px; border-bottom: 1.5px solid #A8A8A8;">
            <tr class="myHead">
              <th style="width: 20%; text-align: center;">TRACKING NO.</th>
              <th style="width: 20%; text-align: center;">MESSAGE / DESCRIPTION</th>
              <th style="width: 20%; text-align: center;">SEND TO</th>
              <th style="width: 16%; text-align: center;">ACTION</th>
              <!--<th style="width: 18%; text-align: center;">DETAILS</th>-->             
              <th style="width: 20%; text-align: center;">DATE & TIME POSTED</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
               $sql = "SELECT release_file.status as Sat, release_file.sender_name as Sender, file_upload.* FROM release_file INNER JOIN file_upload WHERE release_file.tracking_no = file_upload.tracking_no and release_file.status = 'Unread' and release_file.releaser_id = '$id' order by release_file.id Desc";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                $stat = $row['Sat'] == 'Unread' ? 'danger' : 'success';
                echo 
                "<tr style='font-size: 12px'>
                <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_description']."</td>
                  <td style='text-align: center;'>".$row['routedTo']."</td>
                  <td style='text-align: center;'>".$row['forYour']."</td>
                  <td style='text-align: center;'>".$row['select_date']."
                  <div><time class='timeago' datetime='".$row['select_date']."' style='font-size: 11px; color: blue'></time></div>
                  </td>
                </tr>";
                #include('viewUserDetails.php');
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</div>
<!--- outgoing document 
<div class="card shadow-sm bg-white" style="width: 23%; margin-left: 50%; border: none; margin-top: -9.4%; display: fixed">
    <a href="#" style="text-decoration: none;">
      <div class="card-body" style="height: 120px; border-left: 5px solid #4668C9; border-radius: 5px 0 0 5px;"> 
        <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text mb-1">
              Outgoing Documents</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
             <div class="col-auto">
            <i class="fas fa-folder-plus fa-2x text-gray-300" style="font-size: 35px; color: #D4D4D4;"></i>
          </div>
       </div>
      </div>
    </a>
</div> --->
 <!---  <div class="wrapper" style="display: fixed">
 My recent documents
<div class="card shadow-sm bg-white" style="width: 48%; margin-left: 48%; border: none; margin-top: -9.5%;">
  <div class="card-header" style="background-color: white; border-bottom: 2px solid #85AA9B;">
    <span><i class="fas fa-file" style="font-size: 20px; color: #85AA9B;"></i>&nbsp;&nbsp;&nbsp;</span><label style="font-size: 13px; font-weight: 550; color: #85AA9B;margin-bottom: -5%;">My Recent Documents</label>
  </div>
  <div class="card-body" style="height: auto;"> 
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr style="font-size: 13px">
            <th style="width: 20%">File Name</th>
            <th style="width: 20%">Date Modified</th>
            <th style="width: 10%">Action</th>
           </tr>
        </thead>
        <tbody>
          <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM file_upload where user = '$username' and status = 'Draft'";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td>".$row['file_name']."</td>
                  <td>".$row['select_date']."</td>
                  <td>
                    <a href='#delete_".$row['id']."' class='btn btn-sm m-0' data-toggle='tooltip'title='Remove' style='font-size: 15px; color: #E41619'><i class='fa fa-times-circle'></i></a>
                  </td>
                </tr>";
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>-->

<!--<div class="fixed-bottom">
<div class="card shadow-sm bg-white" style="width: 23%; margin-left: 73.5%; border: none; margin-top: -35%;">
  <div class="card-header" style="background-color: white; border-bottom: 2px solid #859BAA;">
    <label style="font-size: 13px; font-weight: 550; color: #859BAA; margin-bottom: -5%;">Documents</label>
  </div>
  <div class="card-body" style="height: 130px; display: inline-block;"> -->

<!-- all incoming documents here 
   <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; width: 25%; font-size: 12px; margin-left: -1%; margin-top: 1%; width: 30%; font-weight: 600;" onclick="location.href = 'receive_docu.php'"><i class="fas fa-reply-all"></i><br> &nbsp;Incoming</button>
    </div>-->

<!-- all pending documents here
  <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; font-size: 12px; margin-left: 20%; margin-top: 3%; width: 60%; font-weight: 600;" onclick="location.href = 'pending_docu.php';"><i class="fa fa-exclamation-circle"></i><br> &nbsp;Pending Documents</button>
    </div> -->

<!-- all forwarded documents here
  <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; width: 25%; font-size: 12px; margin-left:  -3%; margin-top: -1%; width: 44%; font-weight: 600;" onclick="location.href = 'outgoingDocuments.php';"><i class="fa fa-share"></i><br> &nbsp;Outgoing</button>
    </div> -->

  </div>
</div>
</div>

<script src="../jquery.timeago.js"></script>

<style>
  a:hover
  {
    background-color: #ededed;
  }
</style>
</body>
</html>

<script>
   window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 8000);

   $(document).ready(function(){

    $('.searchIncomingDoc').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});

//time ago
$(document).ready(function(){

  $(".timeago").timeago();
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});


$('table tbody > tr').slice(3).hide();
</script>