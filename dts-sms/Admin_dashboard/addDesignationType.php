<?php
session_start();
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Document Tracking System</title>
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
  </div>

<!-----Side bar navigation---->
  <div class="wrapper">
    <?php include_once"include/sidebar.php"; ?>
  </div>

<!--- Label for Add Document-->  
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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Manage Designation</b>
</div>
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

<div class="card" style="width:950px; margin-top: -0.6%; margin-left: 23.5%;">
  <div class="card-header" style="height:  40px; font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white;">
  
      <a href="viewDesignationType.php" class="" style="float: left; margin-top: -3px; width: 15%; height: 33px;margin-left: -2px; font-size: 14px; color: #747272;"><i class="fas fa-arrow-left"></i>&nbsp;Back </a>
  </div>
  
<div class="card-body" style="height: 400px;">
<form method="POST" action="addDepartmentFunction.php">
      <div class="card shadow" style="width:400px; margin-top: -0.6%; margin-left: 23.5%; border-top: 3px solid #52AA36;">
        <div class="card-header" style="font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white;">Add New Designation</div>
        <div class="card-body" style="height: 120px;">
          <div class="form-group">
            <label for="addDesignation" style="margin-bottom: 4px; font-size: 14px;">Enter new designation: </label>
            <input  class="form-control" type="text" placeholder="Enter here" name="addDesignation" id = "addDesignation" style="font-size: 12px;" required /> 
           <div id="errFirst"></div>
           </div>

        </div>
        <div class="" style="background-color: white;">
          <button type="submit" name="add_des" class="btn btn-success" style="width: 25%; font-size: 11px; margin-left: 70%; margin-top: -13%;">Save</button>  
        </div>
      </div>
</form>

</div> 
</div>

<div class="wrapper">



 <!---card body end---> 
</div>
<?php include('addUserModal.php') ?>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);
</script>


</body>
</html>