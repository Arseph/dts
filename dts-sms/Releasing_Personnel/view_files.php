      <?php
      session_start();
      $firstname = $_SESSION['firstname'];
      $lastname = $_SESSION['lastname'];
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
    
      $query3 = "SELECT * FROM user_repositories";
      $result2 = mysqli_query($conn, $query3);
      $folder_name = "";
      if(mysqli_num_rows($result2) > 1) {
        while ($row = mysqli_fetch_assoc($result2)) {
          #$releaser = $row["fullname"];
          $folder_name = $row["id"];
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
          <div class='alert alert-danger text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['error1']."
          </div>
          ";
          unset($_SESSION['error1']);
        }
        if(isset($_SESSION['success1'])){
          echo
          "
          <div class='alert alert-success text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['success1']."
          </div>
          ";
          unset($_SESSION['success1']);
        }
      ?>

  <div class="info">
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / My Repositories</b>
  </div>
  <!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>
</div>


<!-----Drafts Table----->
<?php include('add_modal.php') ?>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%">
    <div class="card-header" style=" height: auto; ">
      <div class="row">
            <a href="#add_repository" class='btn btn-success btn-sm m-0' role='button' data-toggle='modal' style="float: left; margin-left: 5px; font-size: 12px;"><span class="glyphicon glyphicon-refresh"></span><i class="fas fa-folder-plus"></i> &nbsp;Add Repositories</a>
      </div>
    </div>
    <div class="card-body" style="height: auto; display: fixed;">
      <div class="row">
        <?php
          include_once('connection_db/connection.php');

          $sql = "SELECT * FROM user_repo_folder where user = '$username' order by folder_name ASC";
          $queryFolder = $conn->query($sql);
          $color=array("primary"=>"primary","success"=>"success","warning"=>"warning","danger"=>"danger", "info"=>"info");
          while($row = $queryFolder->fetch_assoc()) {
          $random_color=array_rand($color,1);
            echo "
            <div class='col-4'>
            <a href='#view_files' role='button' data-toggle='modal' data-target='#send_modal_".$row['id']."' style='text-decoration: none;'>
              <div class='card border-".$random_color." mb-3' style='max-width: 18rem;'>
                <div class='card-body text-".$random_color."'>
                  <h6 class='card-text text-left h6'> <i class='fas fa-folder-open'></i> &nbsp; ".$row['folder_name']."</h6>
                </div>
              </div>
            </a>
            </div>
            ";
          include('repositories_modal.php');
          }
        ?>
      </div>
    </div>
  </div>



<!-- Repositories Modal -->
<div class="modal fade" id="add_repository" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 45%;">
        <div class="modal-content">
            <div class="modal-header">      
          <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Add Repository</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
            <div class="modal-body">
      <div class="container-fluid">
      <form method="POST" action="repositories_code.php" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="user" value="<?php echo $username; ?>">
        <div class="form-group">
            <input type="text" class="form-control" name="repository" placeholder="Enter Folder Name" style="font-size: 13px; width: 100%;">
          </div>
          <div class="form-group">
            <div class="myfile">
                  <input type="file" class="upload-box form-control" name="myfile[]" style="font-size: 13px; width: 100%;" multiple>
                </div>
          </div>
            </div> 
      </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="save" class="btn btn-success" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-check"></span> Save</a>
      </form>
            </div>

        </div>
    </div>
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

