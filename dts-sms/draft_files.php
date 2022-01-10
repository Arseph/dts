      <?php
      session_start();
      $username = $_SESSION['username'];
      $department = $_SESSION['department'];
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM tbl_typedocument WHERE department = '$department'";
            $result = mysqli_query($conn, $query);
            $option1 = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $option1 = $option1."<option>$row2[2]</option>";
            }

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
  <style>
    .names{
      color: #f5f5f5;
    }
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
  </div>

<!-----Side bar navigation---->
  <div class="wrapper">
    <?php include_once"include/sidebar.php"; ?>
  </div>

<div class="main-content">
          <?php
        if(isset($_SESSION['error1'])){
          echo
          "
          <div class='alert alert-danger text-center'>
            ".$_SESSION['error1']."
          </div>
          ";
          unset($_SESSION['error1']);
        }
        if(isset($_SESSION['success1'])){
          echo
          "
          <div class='alert alert-success text-center'>
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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Drafts</b>
  </div>
</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>


<!-----Drafts Table----->
<?php include('add_modal.php') ?>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%">
  <div class="card-header" style=" height: auto; ">
    <div class="row">
        <form method="POST" action="add.php">
          <a href="#upload" data-toggle="modal" class="addMdl btn btn-success" style="float: left; font-size: 12px;"><span class="glyphicon glyphicon-plus"></span> Upload File</a>
          <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-info" style="float: left; margin-left: 5px; font-size: 12px;"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </form>
        <div class="form-group pull-right">
          <input type="text" class="search form-control" placeholder="Search file here" style="font-size: 12px; float: right; margin-right: -360%; margin-bottom: -10%; width: 140%">
        </div>
    </div>
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <div class="row" style="margin-top: -1%; margin-left: 5px;">
      <a type="button" id="select-all" style="cursor: pointer; margin-left: -1px; font-size: 12px">Select All</a>&nbsp;
      <a type="button" id="delete" style="cursor: pointer; margin-left: 1px; color: red; font-size: 12px">Delete Selected</a>
    </div>

        <table id="userTbl" class="table table-hover table-striped table-sm" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead">
              <th class="" style="background-color: #0062CC;">
              <input type="checkbox" class="select-all checkbox" name="select-all" />
              </th>
              <th style="width: 13%;">Tracking No.</th>
              <th style="width: 13%;">File Name</th>
              <th style="width: 13%;">File Description</th>
              <th style="width: 13%;">Date Uploaded</th>
              <th style="width: 13%;">Attached File</th>
              <th style="width: 15%;">Orig. Department</th>
              <th style="width: 15%;">Document Type</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM file_upload where user = '$username'";

              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td class=''>
                    <input type='checkbox' class='select-item checkbox' name='select-item' value='1000' />
                  </td>
                  <td>".$row['tracking_no']."</td>
                  <td>".$row['file_name']."</td>
                  <td>".$row['file_description']."</td>
                  <td>".$row['select_date']."</td>
                  <td>".$row['attach_file']."</td>
                  <td>".$row['department']."</td>
                  <td>".$row['type_document']."</td>
                  <td>
                    <a href='#editDrafts".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                  </td>
                  <td>
                    <a href='#deleteDrafts".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='btnDelete glyphicon glyphicon-trash'></span> Delete</a>
                  </td>
                </tr>";
                include('edit_delete_modal.php');
              }
            ?>
          </tbody>
        </table>
      </div>
   </div>
 <!---card body end---> 
 <!--- footer ---->

</div>


<?php include('add_modal.php') ?>
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

