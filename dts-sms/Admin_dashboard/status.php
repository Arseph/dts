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
  <title>Admin | Document Tracking System </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
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
<!-----Sidebar navigation---->
    <?php include_once"include/sidebar.php"; ?>
  </div>

<!--- Label for Add Document-->  
<div class="main-content">
          <?php
        if(isset($_SESSION['errUser'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            ".$_SESSION['errUser']."
          </div>
          ";
          unset($_SESSION['errUser']);
        }
        if(isset($_SESSION['succUser'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            ".$_SESSION['succUser']."
          </div>
          ";
          unset($_SESSION['succUser']);
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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Manage Users Account</b>
  </div>
</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>


<?php include('addUserModal.php') ?>
 <!--<form action="deleteUser.php" method="POST">-->
<div id="targetLayer" class="btn btn-success" style="display:none;width:100%;margin-bottom: 10px;"></div>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1% ">
  <div class="card-header" style="height:  55px;">
    <div class="row">
      <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-primary" style="font-size: 12px; width: 8%; margin-top: 4px; margin-left: 10px; height: 30px"> Refresh</a>
      <!--<input type="submit" name="delete_all" value="Delete"  class="btn btn-danger btn-xs" style="font-size: 12px; width: 8%; margin-top: 4px; margin-left: 6px; height: 30px">-->
      <input type="text" class="search form-control" placeholder="Search user's account" style="font-size: 12px; float: right; margin-left: 60%; margin-top: 1px;margin-bottom: -5%; width: 30%">
    </div>
      
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
      <!--<div class="row" style="margin-top: -1%; margin-left: 5px;">
    <a type="button" id="select-all" style="cursor: pointer; margin-left: -1px; font-size: 12px">Select All</a>&nbsp;
      <a type="button" id="delete" style="cursor: pointer; margin-left: 1px; color: red; font-size: 12px">Delete Selected</a>
            <button type="submit" name="delete_all" class="btnDelete btn-danger btn-xs" ><i class="fa fa-trash"></i>&nbsp; Delete</button>-->
    </div>

<!-- php script -->
    <?php 
        require_once('connection_db/connection.php');
        $res = mysqli_query($conn, "SELECT * FROM register WHERE usertype IN ('Employee', 'Department Head', 'Releasing Officer', 'Receiving Officer') ORDER BY fullname ASC");

    ?>
<!-- php script -->

        <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead" style="height: 35px">
     
              <th style="width: 20%; text-align: left;">NAME</th>
              <th style="width: 16%; text-align: left;">USERTYPE</th>
              <th style="width: 16%; text-align: left;">USERNAME</th>
              <th style="width: 18%; text-align: left;">MOBILE NO.</th>
              <th style="width: 18%; text-align: left;">DEPARTMENT</th>
              <th style="text-align: left;">STATUS</th>
              <th style="text-align: left;">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($row = mysqli_fetch_assoc($res)){

            ?>
            <tr style='font-size: 12px'>
                <td style='text-align: left;'><?php echo $row['fullname'];?></td>
                <td style='text-align: left;'><?php echo $row['usertype'];?></td>
                <td style='text-align: left;'><?php echo $row['username'];?></td>
                <td style='text-align: left;'><?php echo $row['phone_number'];?></td>
                <td style='text-align: left;'><?php echo $row['department'];?></td>
                <td style='text-align: left;'>
                    <?php 
                        if ($row['status']==1)
                        {
                           echo "<p style='color: green' id=str".$row['id'].">Activate</p>";
                        }
                        else
                        {
                            echo "<p style='color: red' id=str".$row['id'].">Deactivate</p>";
                        }
                    ?>
                </td>
                <td style='text-align: left;'>
                    <select onchange="user_status(this.value,<?php echo $row['id']?>)">
                        <option value="1">Active</option>
                        <option value="2">Deactivate</option>
                    </select>
                </td>
                
            </tr>
            <?php

            }?>
          </tbody>
        </table>
        <!--</form>-->
      </div>
   </div>

 <!---card body end---> 
</div>
<style>
    .btnDelete
    {
        width: 10%;
        font-size: 12px;
        height: 30px;
        border-radius: 5px;
        margin-top: -1%;
        margin-left: 10px;
        margin-bottom: 5px;
    }
</style>
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
   }, 5000);
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

//search filter
$(document).ready(function(){
  // Activate tooltips
  $('[data-toggle="tooltip"]').tooltip();
    
  // Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});

 $(document).ready(function(){

    load_data();
    
    function load_data(query='')
    {
        $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('tbody').html(data);
            }
        })
    }

    $('#filter').change(function(){
        $('#hidden_details').val($('#filter').val());
        var query = $('#hidden_details').val();
        load_data(query);
    });
    
});
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);

//active deactive user
function user_status(val, id)
{
    $.ajax({
        type:'post',
        url:'fetch2.php',
        data:{val:val,id:id},
        success: function(res){
            if (res==1) {
                $('#str'+id).html('Activate');
            }
            else {
                $('#str'+id).html('Deactivate');
            }
        }
    });
}
</script>
</body>
</html>
