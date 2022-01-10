<?php 
	session_start();
	$username = $_SESSION['username'];
  $department = $_SESSION['department'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee | Dashboard</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
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
  <div class="info">
    <div style="font-size: 15px; font-weight: 600">Dashboard
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
</style>
</div>
</div>

<!--- Add new document --->
<div class="card shadow-sm bg-white" style="width: 23%; margin-left: 23.5%; border: none; margin-top: 2%; display: fixed">
    <a href="add_document.php" style="text-decoration: none;">
      <div class="card-body" style="height: 120px; border-left: 5px solid #4668C9; border-radius: 5px 0 0 5px;"> 
        <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text mb-1">
              Add New Document</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
             <div class="col-auto">
            <i class="fas fa-folder-plus fa-2x text-gray-300" style="font-size: 35px; color: #D4D4D4;"></i>
          </div>
       </div>
      </div>
    </a>
</div>

<!--- Received documents --->
<div class="card shadow-sm bg-white" style="width: 23%; margin-left: 48.5%; border: none; margin-top: -9.4%; display: fixed">
    <a href="receive_docu.php" style="text-decoration: none;">
      <div class="card-body" style="height: 120px; border-left: 5px solid #C1960E; border-radius: 5px 0 0 5px;"> 
        <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text mb-1">
              Received Documents</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
             <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300" style="font-size: 35px; color: #D4D4D4;"></i>
          </div>
       </div>
      </div>
    </a>
</div>

<div class="wrapper" style="display: fixed">
  <!--- My recent documents --->
<div class="card shadow-sm bg-white" style="width: 48%; margin-left: 23.5%; border: none; margin-top: 1%;">
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
              $sql = "SELECT * FROM file_upload where user = '$username'";
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
</div>

<!-- <div class="wrapper">
<div class="card shadow-sm bg-white" style="width: 26%; margin-left: 73%; border: none; margin-top: -49.8%;">
  <div class="card-header" style="background-color: white; ">
    <span><i class="fas fa-folder" style="font-size: 20px; color: #859BAA;"></i>&nbsp;&nbsp;&nbsp;</span><label style="font-size: 13px; font-weight: 550; color: #859BAA;margin-bottom: -5%;">Repositories</label>
  </div>
  <div class="card-body" style="height: 500px;"> 

  </div>
</div>
</div> -->

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
</script>