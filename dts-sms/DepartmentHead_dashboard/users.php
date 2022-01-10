<?php
 include'addUserFunction.php'; 
 //session_start();
 $username = $_SESSION['username'];
 #$firstname = $_SESSION['firstname'];
 #$lastname = $_SESSION['lastname'];
 $department = $_SESSION['department'];

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
  <title>Department Head | Document Tracking System</title>
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
        if(isset($_SESSION['error1'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            ".$_SESSION['error1']."
          </div>
          ";
          unset($_SESSION['error1']);
        }
        if(isset($_SESSION['success1'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            ".$_SESSION['success1']."
          </div>
          ";
          unset($_SESSION['success1']);
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




<div class="card" style="width:880px; height: auto; margin-top: 1%; margin-left: 22.8%; border-top: 3px solid #357EDD;">
  <div class="card-header" style="height: 40px;font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white;">Create Users</div>

    <?php 
      require_once('connection_db/connection.php');
      $res = mysqli_query($conn, "SELECT * FROM batch_upload WHERE department = '$department' and username != '$username'");
    ?>


  <div class="card-body" style="height: 450px;">

    <center><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#send_modal" style="margin-top: 1%; font-size: 13px; margin-bottom: 1%;">Select Employee</button></center>
    <center><label style="font-size: 12px; font-style: italic; color: #000081;">Note: By clicking the select button, you can select which employee you wish to create a new account.</label></center>
    <hr>

    <!-- input boxes -->
    <form action="addUserFunction.php" method="POST">
          <div class="row" style="margin-bottom: -2.5%">
            <div class="col">
              <label style="font-size: 12px; font-weight: 560;">Employee Code:</label>
              <input type="text" class="form-control rounded-0" name="empcode" id = "empcode" value="<?php echo $employee_code;?>" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" readonly >
              <input type="hidden" class="form-control" placeholder="First name" name="userID"  id = "userID" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" onkeyup = "Validate(this)" >
            </div>
          <div class="col">
            <label style="font-size: 12px; font-weight: 560;">Department:</label>
            <input type="text" class="form-control rounded-0" name="department"  id = "department" value="<?php echo $department;?>" style="font-size: 12px;" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" readonly>
          </div>
        </div>
          <br>

           <div class="row" style="margin-bottom: -2.5%">
              <div class="col">
                <label style="font-size: 12px; font-weight: 560;">Name:</label>
                <input type="text" class="form-control rounded-0"  name="fullname" id = "fullname" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" onkeyup = "Validate(this)">
              </div>
              <div class="col" >
                <label style="font-size: 12px; font-weight: 560;">Mobile Number:</label>
                <input type="text" class="form-control rounded-0"   name="phone_number" id = "phone_number" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;">
              </div>
           </div>
          <br> 

          <div class="row" style="margin-bottom: -2.5%">
            <div class="col">
              <label style="font-size: 12px; font-weight: 560;">Username:</label>
              <input type="text" class="form-control rounded-0" name="username" id = "username" style="font-size: 12px; color: blue;" style="margin-bottom: 4px; font-size: 12px; " onkeyup = "Validate_username(this)"  minlength="6" >
            </div>
            <div class="col">
              <label style="font-size: 12px; font-weight: 560;">Password:</label>
              <input type="text" class="form-control inputpass rounded-0" name="password" id = "password" style="font-size: 12px; color: blue;" style="margin-bottom: 4px; font-size: 12px;">
              <div class="input-group-append rounded-0">
                <a type="button" class="generate" onclick="generate()">
                  <span class="input-group-text rounded-0" id="basic-addon2" style="font-size: 12px;">Generate</span>
                </a>
             </div>
            </div>
        </div>
        <br>

<style>
  .input-group-append, .input-group-text  {
    margin-top: -6.4%;
    font-size: 13px;
    float: right;
    cursor: pointer;
    background-color: #DADADA;
  }
</style>
          <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM tbl_designation WHERE designation NOT IN ('Department Head')";
            $result2 = mysqli_query($conn, $query);
            $options3 = "";
            while($row = mysqli_fetch_array($result2))
            {
                $options3 = $options3."<option>$row[1]</option>";
            }

          ?>


      <div class="row" style="margin-bottom: -2.5%">
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Designation:</label>
          <select id="usertype" name="usertype" class="form-control rounded-0" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" required>
            <option selected="true" disabled="disabled">Select here</option>
              <?php
                foreach($result2 as $row)
                {
                  echo '<option value="'.$row["designation"].'">'.$row["designation"].'</option>';  
                }
                ?>
          </select>
        </div>
        <div class="col">
          <label style="font-size: 12px; font-weight: 560;">Email Address:</label>
          <input type="text" class="form-control check_email rounded-0" name="email" id = "email" style="font-size: 12px;" style="margin-bottom: 4px; font-size: 12px;" onkeyup = "email_validate(this)">
          <small class="error_email" style="color: red; font-size: 10px; font-weight: 550;"></small>
        </div>
    </div>
    <div class="" style="background-color: white;">
      <button type="button" class="btn btn-info" style="width: 15%; font-size: 11px; margin-left: 82.8%; margin-top: 4%;" onclick="location.href = '<?php $_SERVER['PHP_SELF']; ?>';">Cancel</button>
      <button type="submit" class="btn btn-primary" name="addUser" style="width: 15%; font-size: 11px; margin-left: 66.5%; margin-top: -6.7%;">Save</button>
    </div>
  </div> 
</form>
</div>


<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 130%; border: none;">

      <div class="modal-body scrollBar" style="border-top: 4px solid goldenrod;">
        <h5 style="font-size: 14px; font-weight: 600; font-style: italic; color: grey;">Select an Employee</h5>
        <table id="table" class="responsive-table table-hover table-bordered table-sm m-0" width="100%">
          <thead style=" color: black; font-size: 12px;">
            <tr class="myHead" style="height: 35px">
              <th style="width: 18%; text-align: left;">NAME</th>
              <th style="width: 16%; text-align: left;">USERNAME</th>
              <th style="width: 16%; text-align: left;">EMAIL</th>
              <th style="width: 18%; text-align: left;">MOBILE NO.</th>
              <th style="width: 18%; text-align: left;">DEPARTMENT</th>
            </tr>
            </thead>

            <tbody>          
              <?php 
                while($row = mysqli_fetch_assoc($res)){
               ?>
                <tr style='font-size: 12px'>
                    <td style='text-align: left;'><?php echo $row['fullname'];?></td>
                    <td style='text-align: left;'><?php echo $row['username'];?></td>
                    <td style='text-align: left;'><?php echo $row['email'];?></td>
                    <td style='text-align: left;'><?php echo $row['phone_number'];?></td>
                    <td style='text-align: left;'><?php echo $row['department'];?></td>
                </tr>
                <?php

                }?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer" style="height: 50px">
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-size: 11px; height: 30px;margin-top: -1%">Done</button>
      </div>
    </div>
  </div>
</div>

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

<style>
      .scrollBar{
    height: 250px;
    overflow-y: auto;
    }

    @media (min-height: 500px) {
        .scrollBar { height: 230px; }
    }

    @media (min-height: 800px) {
        .scrollBar { height: 600px; }
    }
    td {
      cursor: default;
    }
</style>
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

//table select
var table = document.getElementById('table');
                
  for(var i = 1; i < table.rows.length; i++)
  {
    table.rows[i].onclick = function()
    {
      //rIndex = this.rowIndex;
      document.getElementById("fullname").value = this.cells[0].innerHTML;
      document.getElementById("username").value = this.cells[1].innerHTML;
      document.getElementById("email").value = this.cells[2].innerHTML;
      document.getElementById("phone_number").value = this.cells[3].innerHTML;
      document.getElementById("department").value = this.cells[4].innerHTML;
      //document.getElementById("password").value = this.cells[2].innerHTML;
      //document.getElementById("age").value = this.cells[2].innerHTML;
                         
    };
  }

function generate()
{
  var charset="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ@";
  var passwordLength=6;
  var password="";
  for (var i=0;i<passwordLength;i++){
    var randomnum = Math.floor(Math.random()*charset.length);
    password += charset.substring(randomnum,randomnum+1);
  }
  document.getElementById("password").value = password;

}

$(document).ready(function(){
  //inialize datatable
    $('#myTable').DataTable();
});

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 5000);
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
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
</style>
