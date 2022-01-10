<?php
  require_once('connection_db/connection.php');
 session_start();
 $username = $_SESSION['username'];
 $firstname = $_SESSION['firstname'];
 $lastname = $_SESSION['lastname'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Document Tracking System</title>
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

  <!-- Preloader -->
  <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

<!-----Top bar navigation---->
<div class="wrapper">
  <?php include_once"include/topbar.php"; ?>

  <?php include_once"include/sidebar.php";?>
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
    <div style="font-size: 15px; font-weight: 600"><i class="fas fa-home"></i> Admin Dashboard
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

/*************************/
/*     02. Preloader     */
/*************************/
.spinner-wrapper {
  position: fixed;
  z-index: 999999;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: #fff;
}

.spinner {
  position: absolute;
  top: 50%; /* centers the loading animation vertically one the screen */
  left: 50%; /* centers the loading animation horizontally one the screen */
  width: 3.75rem;
  height: 1.25rem;
  margin: -0.625rem 0 0 -1.875rem; /* is width and height divided by two */ 
  text-align: center;
}

.spinner > div {
  display: inline-block;
  width: 1rem;
  height: 1rem;
  border-radius: 100%;
  background-color: #0062CC;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0); }
  40% { -webkit-transform: scale(1.0); }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    -ms-transform: scale(1.0);
    transform: scale(1.0);
  }
}

#wrapper {
    margin-left:auto;
    margin-right:auto;
    width:960px;
}
</style>

</div>
</div>

<?php
$query=mysqli_query($conn,"select id from register where usertype IS NOT NULL");
$total=mysqli_num_rows($query);
?>


<div class="wrapper" style="display: fixed" id="wrapper">
  <!--- Total Users --->
<div class="card shadow-sm bg-white" style="width: 23.5%; margin-left: 15%; border: none; margin-top: 1.8%; display: fixed">
      <div class="card-body" style="height: 120px; border-left: 5px solid #007BFF; border-radius: 5px 0 0 5px;"> 
        <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text mb-1">
              Total Registered Users</div>
              <input type="hidden" class="form-control" placeholder="First name" name="userID" value="<?= $row['id']; ?>" id = "userID">
              <div class="h5 mb-0" style="font-size: 35px; color: #747272;"><?php echo $total;?></div>
              </div>
             <div class="col-auto">
            <i class="fas fa-users" style="font-size: 35px; color: #D4D4D4;"></i>
          </div>
       </div>
      </div>
</div>

<!--- Add new document --->
<div class="card shadow-sm bg-white" style="width: 23.5%; margin-left: 40%; border: none; margin-top: -12.5%; display: fixed">
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



<!--- Create User --->
<div class="card shadow-sm bg-white" style="width: 23.5%; margin-left: 65%; border: none; margin-top: -120px; display: fixed">
    <a href="users.php" style="text-decoration: none;">
      <div class="card-body" style="height: 120px; border-left: 5px solid #1CC88A; border-left: 5px solid #C1960E; border-radius: 5px 0 0 5px;"> 
        <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text mb-1">
              Create User Account</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
             <div class="col-auto">
            <i class="fas fa-user" style="font-size: 35px; color: #D4D4D4;"></i>
          </div>
       </div>
      </div>
    </a>
</div>


<!--- Inquiry --->

<div class="card shadow-sm bg-white" style="width: 23.5%; margin-left: 90%; border: none; margin-top: -120px; display: fixed">
    <a href="viewDepartment.php" style="text-decoration: none;">
      <div class="card-body" style="height: 120px; border-left: 5px solid #1CC88A; border-left: 5px solid #1CC88A; border-radius: 5px 0 0 5px;"> 
        <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text mb-1">
              Inquiry</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
             <div class="col-auto">
            <i class="fas fa-question-circle" style="font-size: 35px; color: #D4D4D4;"></i>
          </div>
       </div>
      </div>
    </a>
</div>

<br>
<div class="card shadow" style="width: 94%; margin-left: 16.5%; border: none; margin-top: 1%">
  <div class="card-header" style=" height: 50px; border: none;">
    <small style="font-size: 12px; font-weight: 550; color: #2B2B2B; font-style: italic;">INCOMING &nbsp;DOCUMENTS</small>
    <a href="receive_docu.php" style="font-size: 12px; float: right;">View Table</a>
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <!--<input type="submit" name="delete_all" value="Remove" class="btn btn-danger btn-xs" style="font-size: 12px; width: 8%; margin-bottom: 10px; margin-left: 4px;">-->

        <table id="userTbl" class="responsive-table table-hover table-striped table-sm" width="100%">
          <thead style=" color: #2B2B2B; font-size: 12px; border-bottom: 1.5px solid #A8A8A8;">
            <tr class="myHead">
              <th style="width: 20%; text-align: center;"><i class="fas fa-user" style="color: gray;"></i> &nbsp;SENDER</th>
              <th style="width: 20%; text-align: center;"><i class="fa fa-calendar" style="color: gray;"></i> &nbsp;DATE & TIME RECEIVED</th>
              <th style="width: 16%; text-align: center;"><i class="fa fa-search" style="color: gray;"></i> &nbsp;TRACKING NO.</th>
              <th style="width: 20%; text-align: center;"><i class="fa fa-envelope-open-text" style="color: gray;"></i> &nbsp;MESSAGE/DESCRIPTION</th>
              <th style="width: 20%; text-align: center;"><i class="fa fa-tasks" style="color: gray;"></i> &nbsp;ACTION</th>
              <!--<th style="width: 18%; text-align: center;">DETAILS</th>-->             
              
              
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT admin_receive_file.status as rs, admin_receive_file.releaser_name as rn, admin_receive_file.date_time as dt, file_upload.* FROM admin_receive_file INNER JOIN file_upload WHERE admin_receive_file.tracking_no = file_upload.tracking_no AND admin_receive_file.status = 'Unread' Order by id DESC";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: center;'>".$row['rn']." <br>(".$row['department'].")</td>
                  <td style='text-align: center;'>".$row['dt']."
                  <div><time class='timeago' datetime='".$row['dt']."' style='font-size: 11px; color: blue'></time></div>
                  </td>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_description']."</td>
                  <td style='text-align: center;'>".$row['forYour']."</td>
                  
                </tr>";
                #include('viewUserDetails.php');
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

<!--
<div class="card shadow-sm bg-white" style="width: 60%; margin-left: 15%; border: none; margin-top: 1%;">
  <div class="card-header" style="background-color: white; border-bottom: 2px solid #85AA9B;">
    <span><i class="fas fa-file" style="font-size: 20px; color: #85AA9B;"></i>&nbsp;&nbsp;&nbsp;</span><label style="font-size: 13px; font-weight: 550; color: #85AA9B;margin-bottom: -5%;">My Recent Drafts</label>
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
              $sql = "SELECT * FROM file_upload where department = 'Administrator ' and status = 'Draft'";
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

<div class="card shadow-sm bg-white" style="width:35%; float: right; border: none; margin-top: -22%; margin-right: -13.5%">
  <div class="card-header" style="background-color: white; border-bottom: 2px solid #859BAA;">
    <span><i class="fas fa-file" style="font-size: 20px; color: #85AA9B;"></i>&nbsp;&nbsp;&nbsp;</span><label style="font-size: 13px; font-weight: 550; color: #859BAA; margin-bottom: -5%;">Documents</label>
  </div>
  <div class="card-body" style="height: auto; display: inline-block;"> 


   <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; width: 55%; font-size: 12px; margin-left: 22%; margin-top: 1%; font-weight: 600;" onclick="location.href = 'receive_docu.php'"><i class="fas fa-reply-all"></i><br> &nbsp;Received Documents</button>
    </div>


  <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; font-size: 12px; margin-left: 22%; margin-top: 5%; width: 55%; font-weight: 600;" onclick="location.href = 'outgoingDocuments.php';"><i class="fa fa-share"></i><br> &nbsp;Outgoing Documents</button>
    </div>

  </div>
</div>
-->

  


<!--<div class="fixed-bottom">
<div class="card shadow-sm bg-white" style="width: 38%; margin-left: 60.5%; border: none; margin-top: -25%;">
  <div class="card-header" style="background-color: white; border-bottom: 2px solid #859BAA;">
    <label style="font-size: 13px; font-weight: 550; color: #859BAA; margin-bottom: -5%;">Documents</label>
  </div>
  <div class="card-body" style="height: 130px; display: inline-block;"> 


   <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; width: 25%; font-size: 12px; margin-left: -1%; margin-top: 1%; width: 30%; font-weight: 600;" onclick="location.href = 'receive_docu.php'"><i class="fas fa-reply-all"></i><br> &nbsp;Incoming</button>
    </div>


  <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; width: 25%; font-size: 12px; margin-left: 33%; margin-top: -19.5%; width: 30%; font-weight: 600;" onclick="location.href = '#';"><i class="fa fa-exclamation-circle"></i><br> &nbsp;Pending</button>
    </div> 

  <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; width: 25%; font-size: 12px; margin-left: 35%; margin-top: -19%; width: 30%; font-weight: 600;" onclick="location.href = 'outgoingDocuments.php';"><i class="fa fa-share"></i><br> &nbsp;Outgoing</button>
    </div>

  </div>
</div>
</div> -->

<!--Repositories 
<div class="card" style="width: 50%; margin-left: 25%; border: none; margin-top: 1%;">
  <div class="card-header" style="background-color: #5B9BD5; height: 38px;">
    <span><i class="fas fa-folder" style="font-size: 20px; color: white;"></i>&nbsp;&nbsp;&nbsp;</span><label style="font-size: 13px; font-weight: 550; color: white; margin-bottom: -5%;">Repositories</label>
  </div>
  <div class="card-body" style="height: 360px;"> 
  </div>
</div>--->

<script src="../jquery.timeago.js"></script>
 <script src="js/scripts.js"></script>
 
<script type="text/javascript">
$(document).ready(function(){
  $(".timeago").timeago();
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#UnreadTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 8000);

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

$('table tbody > tr').slice(3).hide();
</script>
</body>
</html>