      <?php
      session_start();
      #$firstname = $_SESSION['firstname'];
      #$lastname = $_SESSION['lastname'];
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
      $query2 = "SELECT * FROM register WHERE department = '$department' and usertype = 'Releasing Officer'";
      $result1 = mysqli_query($conn, $query2);
      $releaser = "";
      $releaser_id = "";
      if(mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
          $releaser = $row["fullname"];
          $releaser_id = $row["id"];
        }
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
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            
            ".$_SESSION['error1']."
          </div>
          ";
          unset($_SESSION['error1']);
        }
        if(isset($_SESSION['statusSuccess'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            
            ".$_SESSION['statusSuccess']."
          </div>
          ";
          unset($_SESSION['statusSuccess']);
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
          z-index: 1;
          position: fixed;
        }
        a.disabled {
          pointer-events: none;
          cursor: default;
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
<form action="delete.php" method="POST">
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%">
  <div class="card-header" style=" height: auto; ">
    <div class="row">
        <form method="POST" action="add.php">
          <a href="add_document.php" class="addMdl btn btn-success btn-xs" style="float: left; font-size: 12px; margin-left: 10px;"><span class="glyphicon glyphicon-plus"></span> New Document</a>
          <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-info btn-xs" style="float: left; margin-left: 10px; font-size: 12px;"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </form>
        <div class="form-group pull-right">
          <input type="text" class="search form-control rounded-0" placeholder="Search file here" style="font-size: 12px; float: right; margin-right: -350%; margin-bottom: -10%; width: 150%">
        </div>
    </div>
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
        <input type="submit" name="delete_all" value="Delete" class="btn btn-danger btn-xs" style="font-size: 12px; width: 8%; margin-bottom: 10px; margin-left: 4px;">

        <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead">
              <th class="" style="background-color: #0062CC; width: 3%">
              </th>
              <th style="width: 13%; text-align: center;">TRACKING NO.</th>
              <th style="width: 15%; text-align: center;">FILE NAME</th>
              <th style="width: 20%; text-align: center;">DETAILS</th>
              <th style="width: 15%; text-align: center;">ATTACHED FILE</th>
              <th style="width: 15%; text-align: center;">DOCUMENT TYPE</th>
              <th style="width: 15%; text-align: center;">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM file_upload where user = '$username' and status = 'Draft' order by id desc";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                $dis = ($row['attach_file'] && $row['file_name'] && $row['file_description'] && $row['type_document']) ? '' : 'disabled';
                echo 
                "<tr style='font-size: 12px'>
                 <td class=''>
                    <input type='checkbox' class='delete_checkbox' name='user_delete_id[]' value=".$row["id"]." />
                  </td>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  <td style='text-align: center;'>".$row['file_description']."</td>
                  <td style='text-align: center;'>".$row['attach_file']."</td>
                  <td style='text-align: center;'>".$row['type_document']."</td>
                  <td style='text-align: center;'>
                    <a href='#edit_".$row['id']."' class='btn btn-success btn-sm m-0' role='button' data-toggle='modal' style='font-size: 11px'><i class='fas fa-edit'></i></a>

                    <a href='#delete_".$row['id']."' class='btn btn-danger  btn-sm m-0' role='button' data-toggle='modal' style='font-size: 11px'><i class='fa fa-trash'></i></a>

                    <a href='#send_modal_".$row['id']."' class='btn btn-primary  btn-sm m-0 ".$dis."' role='button' data-toggle='modal' style='font-size: 11px'><i class='fas fa-share-square'></i></a>
                  </td>
                </tr>";
                include('edit_delete_modal.php'); ####send document modal###
              }
            ?>
          </tbody>
        </table>
      </div>
   </div>
 <!---card body end---> 
 <!--- footer ---->

</div>
</form>

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
   }, 8000);
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

