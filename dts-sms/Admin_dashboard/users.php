<?php
 include'addUserFunction.php'; 
 //session_start();
 $username = $_SESSION['username'];
 $firstname = $_SESSION['firstname'];
 $lastname = $_SESSION['lastname'];

 $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

  $query = "SELECT * FROM tbl_typedocument";
  $result = mysqli_query($conn, $query);
  $option1 = "";
  while($row2 = mysqli_fetch_array($result))
  {
    $option1 = $option1."<option>$row2[1]</option>";
  }

      $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

    $query = "SELECT * FROM tbl_department ORDER BY department ASC";
    $result = mysqli_query($conn, $query);
    $options = "";
    while($row2 = mysqli_fetch_array($result))
     {
       $options = $options."<option>$row2[1]</option>";
     }
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
  <style>
    .height10{
      height:10px;
    }
    .mtop10{
      margin-top:10px;
    }
    .modal-label{
      position:relative;
      top:7px
    }
  </style>
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
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            ".$_SESSION['err']."
          </div>
          ";
          unset($_SESSION['err']);
        }
        if(isset($_SESSION['ss'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
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
    <b style="font-size: 15px; font-weight: 600;"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600;">Dashboard</a> / User Account Setup</b>
  </div>
  <style>
  .main-content .info{
    margin: 10px;
    margin-left: 23.5%;
    color: #1F4E79;;
    margin-top: 20px;
    margin-bottom: 15px;
    border-bottom: 1px solid #2F5597;
  }
</style>

<!--- MAIN CONTENT END--->
</div>

<!--- CONTAINER START --->
<div class="container">

<!--- User setup -->

  <div class="card" style="width:880px; height: 490px; margin-top: 1%; margin-left: 22.8%; border-top: 3px solid #357EDD;">
    <div class="card-header" style="height: 40px;font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white;">Create Users

    </div>

    <div class="card-body" style="height: 120px;">

<!--- SEARCH --->
      <form action="" method="GET">
        <div class="row" style="height: 30px;">
          <input type="text" id="user_id" name="user_id" value="<?php if(isset($_GET['user_id'])){echo $_GET['user_id'];} ?>" class="search form-control rounded-0" autocomplete="off" placeholder="Type to search the employee's name" style="font-size: 12px; float: right; margin-left: 25%; margin-top: -5px;margin-bottom: -5%; width: 40%">
        </div>
        <button type="submit" class="btn btn-primary" style="float: right; margin-right: 19%; margin-top: -4.2%;">Search Employee</button>
          <center><label style="font-size: 12px; font-style: italic; color: #000081;">Note: You can only create a user account once the employee's name is found in the list of employee profile.</label></center>
      </form>

      <hr>
<!--- SEARCH END --->

<?php include_once'addUserFunction.php'; ?>
<form action="addUserFunction.php" method="POST">
  
<div class="row" style="margin-bottom: -2.5%">

<?php
include_once('connection_db/connection.php');

if(isset($_GET['user_id']))
{
  $user_id = $_GET['user_id'];
  $query = "SELECT * FROM batch_upload WHERE fullname='$user_id'";
  $query_run = mysqli_query($conn, $query);

  if(mysqli_num_rows($query_run) > 0)
  {
    foreach($query_run as $row)
    {
      ?>
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Employee Code:</label>
          <input type="text" class="form-control rounded-0" name="empcode" id = "empcode" value="<?php echo $employee_code;?>" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" readonly >
          <input type="hidden" class="form-control" placeholder="First name" name="userID" value="<?= $row['id']; ?>" id = "userID" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" onkeyup = "Validate(this)" required >
        </div>
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Department:</label>
          <input type="text" class="form-control rounded-0" placeholder="Name" name="department" value="<?= $row['department']; ?>" id = "department" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" readonly >
        </div>
     </div>
     <br>
     <div class="row" style="margin-bottom: -2.5%">
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Full Name:</label>
          <input type="text" class="form-control rounded-0" placeholder="Name" name="fullname" value="<?= $row['fullname']; ?>" id = "txt" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" onkeyup = "Validate(this)" readonly >
        </div>
        <div class="col" >
          <label style="font-size: 12px; font-weight: 560;">Mobile No.:</label>
          <input type="text" class="form-control rounded-0" placeholder="Last name" name="phone_number" value="<?= $row['phone_number']; ?>" id = "txt" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" onkeyup = "Validate(this)" readonly >
        </div>
     </div>
     <br>
     <div class="row" style="margin-bottom: -2.5%">
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Username:</label>
          <input type="text" class="form-control rounded-0" name="username" value="<?= $row['username']; ?>" id = "username" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" onkeyup = "Validate_username(this)"  minlength="6" placeholder="The username must contain at least 6 letters." readonly >
        </div>
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Password:</label>
          <input type="text" class="form-control inputpass rounded-0" placeholder="Generate password" name="password" value="<?= $row['password']; ?>" id = "password" style="font-size: 12px;"  readonly >
          <div class="input-group-append rounded-0">
                <a type="button" class="generate" onclick="generate()">
                  <span class="input-group-text rounded-0" id="basic-addon2" style="margin-top: 1.5px; height: 30px; font-size: 12px;">Generate</span>
                </a>
             </div>
        </div>
     </div>
     <br>
         <div class="row" style="margin-bottom: -2.5%">
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Designation:</label>
          <select id="usertype" name="usertype" class="form-control rounded-0" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;">
              <option selected="true" disabled="true" hidden>Select here</option>
              <option>Department Head</option>
              
          </select>
        </div>
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Email Address:</label>
          <input type="text" class="form-control check_email rounded-0" placeholder="Email Address" name="email" value="<?= $row['email']; ?>" id = "email" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" value="@gmail.com" onkeyup = "email_validate(this)" readonly >
          <small class="error_email" style="color: red; font-size: 10px; font-weight: 550;"></small>
        </div>
    </div>
    </div>

    <div class="" style="background-color: white;">
      <button type="button" class="btn btn-info" style="width: 15%; font-size: 11px; margin-left: 82.8%; margin-bottom: -1%;" onclick="location.href = '<?php $_SERVER['PHP_SELF']; ?>';">Cancel</button>
      <button type="submit" class="btn btn-primary" name="addUser" style="width: 15%; font-size: 11px; margin-left: 66.5%; margin-top: -4.6%;">Save</button>
    </div>
  </div>
      <?php
     }
   }
   else
   {
     echo '<script>alert("Employee could not be found in the list.")</script>';
   }
}

?>

</form>


<!-- View buttons 
<div class="card" style="width:500px; margin-top: 25px; margin-left: 38.8%;">
    <div class="card-body" style="height: 100px;">

      Department
      <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 55px; width: 25%; font-size: 12px; margin-left: -2%; margin-top: 1%; width: 33%; font-weight: 600;" onclick="location.href = 'viewDepartment.php';"><i class="fas fa-building"></i><br> &nbsp;Filter Departments</button>
    </div>

    <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 55px; width: 25%; font-size: 12px; margin-left: 33.5%; margin-top: -17.5%; width: 33%; font-weight: 600;" onclick="location.href = 'viewUsers.php';"><i class="fas fa-user-friends"></i><br> &nbsp;Employees</button>
    </div>

    <div class="">
      <button class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 55px; width: 25%; font-size: 12px; margin-left: 69%; margin-top: -28%; width: 33%; font-weight: 600;" onclick="location.href = 'viewHeadDept.php';"><i class="fas fa-user-tie"></i><br> &nbsp;Department Heads</button>
    </div>
    </div>
  </div>
-->

<!--- CONTAINER END --->
</div>

<style type="text/css">
  tr{
    font-size: 12px;
  }
  .btn{
    font-size: 12px;
  }
</style>
<?php include('addUserModal.php') ?>
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

<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
  //inialize datatable
    $('#myTable').DataTable();
});

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 5000);

//autocomplete
  $(function() {
     $( "#user_id" ).autocomplete({
       source: 'fetch2.php',
     });
  });

//checking the availability of email
$(document).ready(function(){

  $('.check_email').keyup(function (e) {

    var email = $('.check_email').val();
    //alert(email);
    $.ajax({
        type: "POST",
        url: "addUserFunction.php",
        data: {
            "check_submit_btn": 1,
            "email_id": email,
        },
        success: function (response) {
          //alert(response);
          $('.error_email').text(response);
        }
    })

  });

});


</script>
</body>
</html>

<style>
  .ui-autocomplete
  {
    border: 1px;
    font-size: 12px;
    -webkit-border-radius: 0px;
       -moz-border-radius: 0px;
            border-radius: 0px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
       -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }

  .ui-autocomplete > li {
   padding: 5px 0px;
  }
  .tooltip{
   font-size: 10px;
 }
</style>
