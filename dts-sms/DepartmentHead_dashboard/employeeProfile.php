<?php
session_start();
 $username = $_SESSION['username'];
 #$firstname = $_SESSION['firstname'];
 #$lastname = $_SESSION['lastname'];
 #$department = $_SESSION['department'];

  $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

  $query = "SELECT * FROM tbl_typedocument";
  $result = mysqli_query($conn, $query);
  $option1 = "";
  while($row2 = mysqli_fetch_array($result))
  {
    $option1 = $option1."<option>$row2[1]</option>";
  }

?>
<?php
    $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

    $query = "SELECT * FROM tbl_department";
    $result = mysqli_query($conn, $query);
    $options = "";
    while($row2 = mysqli_fetch_array($result))
     {
       $options = $options."<option>$row2[1]</option>";
     }
?>
<?php
    $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

    $query = "SELECT * FROM tbl_designation WHERE designation NOT IN ('Department Head')";
    $result = mysqli_query($conn, $query);
    $option2 = "";
    while($row2 = mysqli_fetch_array($result))
     {
       $option2 = $option2."<option>$row2[1]</option>";
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

    <?php include_once"include/sidebar.php"; ?>
  </div>


<!--- Label for Add Document-->  
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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Employee Profiles</b>
  </div>
</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>

<?php include('addUserModal.php') ?>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%">
  <div class="card-header" style="height: 50px; font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white;">
    List of Department Personnels

      <input type="text" class="search form-control rounded-0" placeholder="Search employee's name" style="font-size: 12px; float: right; margin-right: -1%; margin-top: -5px;margin-bottom: -5.5%; width: 30%">
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <!--<div class="row" style="margin-top: -1%; margin-left: 5px;">
      <a type="button" id="select-all" style="cursor: pointer; margin-left: -1px; font-size: 12px">Select All</a>&nbsp;
      <a type="button" id="delete" style="cursor: pointer; margin-left: 1px; color: red; font-size: 12px">Delete Selected</a>-->
    </div>
      <?php 
        require_once('connection_db/connection.php');
        $res = mysqli_query($conn, "SELECT * FROM batch_upload WHERE department='$department' and username!='$username'");

    ?>
    <div class="row">
        <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead" style="height: 35px">
              <th style="width: 25%;">NAME</th>
              <th style="width: 20%;">EMAIL ADDRESS</th>
              <th style="width: 20%;">USERNAME</th>
              <th style="width: 18%;">MOBILE NO.</th>
              <th style="width: 20%;">DEPARTMENT</th>
              <th>EDIT</th>
            </tr>
          </thead>

          <tbody>          
            <?php 
            while($row = mysqli_fetch_assoc($res)){

            ?>
            <tr style='font-size: 12px'>
                <td style='text-align: left;'><i class='fa fa-user' aria-hidden='true' style='color: gray;'></i>&nbsp;&nbsp;&nbsp;<?php echo $row['fullname'];?></td>
                <td style='text-align: left;'><?php echo $row['email'];?></td>
                <td style='text-align: left;'><?php echo $row['username'];?></td>
                <td style='text-align: left;'><?php echo $row['phone_number'];?></td>
                <td style='text-align: left;'><?php echo $row['department'];?></td>
                <?php
                    echo
                    "
                    <td style='text-align: left; font-size: 11px;'>
                  
                    <a href='#edit_".$row['id']."' class='btn btn-sm m-0' data-toggle='modal' style='font-size: 14px; color: #04A12B'><i class='fas fa-edit'></i></a>
                  
                  </td>";
                    include('editdeleteUserModal.php');
                ?>
            </tr>
            <?php

            }?>
          </tbody>
          <!--<a href='#delete_".$row['id']."' class='btn btn-danger  btn-sm m-0' data-toggle='modal' style='font-size: 11px'><i class='fa fa-trash'></i></a>-->
        </table>
      </div>
   </div>
</div>
 <!---card body end---> 

<?php include('addUserModal.php') ?>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- generate datatable on our table -->
<!-- generate datatable on our table -->

<script>

$(document).ready(function(){
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

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

     $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //button get selected info
        $("#delete").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("Please select an item to delete.");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });
    });

$(document).ready(function(){
  //inialize datatable
    $('#userTbl').DataTable();
});
</script>
</body>
</html>

