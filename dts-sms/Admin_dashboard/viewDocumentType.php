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
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
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

<?php  
    include('connection_db/connection.php');
    $list = mysqli_query($conn, "SELECT COUNT(*) as count FROM tbl_typedocument WHERE department = '$username'");

    while ($listRow = mysqli_fetch_array($list))
    {
        $var = $listRow['count'];
    }

?>
<div class="info">
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Manage Document Type</b>
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

<?php include('addUserModal.php') ?>

<form action="deleteDocuTypeFunction.php" method="POST">

<div class="card" style="width:950px; margin-top: -0.6%; margin-left: 23.5%;">
  <div class="card-header" style="height:  40px; font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white;">
    List of Document Types
      <a href="addDocumentType.php" class="" style="float: left; margin-top: -20px; width: 20%; height: 33px;margin-left: 84%; font-size: 12px; color: #747272;"><i class="fas fa-book"></i>&nbsp;Create Document Type</a>
  </div>
  <div class="card-body" style="height: auto;">

<div class="card shadow" style="width: 90%; margin-left: 5.5%; border: none; margin-top: -1px;">
  <div class="card-header" style="height:  45px;">
    <!--<div class="row">
      <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-primary" style="float: left; width: 15%; height: 33px;margin-left: 5px; font-size: 12px;"> Refresh</a>
    </div>-->
     <input type="submit" name="delete_all" value="Delete" class="btn btn-danger btn-xs" style="font-size: 12px; width: 10%; margin-top: -4px; margin-left: -10px; height: 30px">

      <input type="text" class="search form-control" placeholder="Search user tags" style="font-size: 12px; float: right; margin-right: -1%; margin-top: -1%;margin-bottom: -5%; width: 40%">
  </div>
  <div class="card-body" style="height: auto; display: fixed; margin-top: -2%;">
    <small style="font-size: 11px; margin-top: -10%;">Show <?php echo "[".$var."] entries";?></small>
  <div class="row">
    <!--<div class="row" style="margin-top: -1%; margin-left: 5px;">
      <a type="button" id="select-all" style="cursor: pointer; margin-left: -1px; font-size: 12px">Select All</a>&nbsp;
      <a type="button" id="delete" style="cursor: pointer; margin-left: 1px; color: red; font-size: 12px">Delete Selected</a>
    </div>-->
        <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%" cellspacing="0">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead">
              <th class="" style="background-color: #0062CC;">
              
              </th>
              <th>DOCUMENT TYPE NAME</th>
              <th>DESCRIPTION</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection.php');
              $sql = "SELECT * FROM tbl_typedocument where department = '$username' ORDER BY id desc";

              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td class=''>
                    <input type='checkbox' class='delete_checkbox' name='user_delete_id[]' value=".$row["id"]." />
                  </td>          
                  <td>".$row['type_document']."</td>
                  <td>".$row['description']."</td>
                  <td>
                    <a href='#editDT_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal' style='font-size: 11px'>Edit</a>
                    <a href='#deleteDT_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal' style='font-size: 11px'>Delete</a>
                  </td>
                </tr>";
                include('edit_delete.php');
              }
            ?>
          </tbody>
        </table>
      </div>
   </div>

  </div>
</div> 
</div>

</form>


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