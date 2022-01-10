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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Outgoing Documents</b>
  </div>
</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>

<?php include('add_modal.php'); ?>
<form action="deleteOutgoingDocu.php" method="POST">
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%">
  <div class="card-header" style=" height: 50px; border: none;">
    <small style="font-size: 11px; font-weight: 550; color: #2B2B2B; font-style: italic;">SENT &nbsp;DOCUMENTS</small>
     <input type="text" class="search form-control rounded-0" placeholder="Search file here" style="font-size: 12px; float: right; margin-right: -1%; margin-top: -5px; width: 30%;">
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <!--<input type="submit" name="delete_all" value="Remove" class="btn btn-danger btn-xs" style="font-size: 12px; width: 8%; margin-bottom: 10px; margin-left: 4px;">-->

        <table id="userTbl" class="responsive-table table-hover table-striped table-sm" width="100%">
          <thead style=" color: #2B2B2B; font-size: 12px; border-bottom: 1.5px solid #A8A8A8;">
            <tr class="myHead">
              <th style="width: 15%; text-align: center;">TRACKING NO.</th>
              <th style="width: 15%; text-align: center;">FILE NAME</th>
              <!--<th style="width: 18%; text-align: center;">DETAILS</th>-->             
              <th style="width: 16%; text-align: center;">DETAILS</th>
              <th style="width: 18%; text-align: center;">DOCUMENT TYPE</th>
              <th style="width: 15%; text-align: center;">DATE RELEASE</th>
              <th style="width: 15%; text-align: center;">MORE</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM file_upload where user = '$username' and status = 'Send' order by select_date desc";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  <td style='text-align: center;'>".$row['file_description']."</td>
                  <td style='text-align: center;'>".$row['type_document']."</td>
                  <td style='text-align: center;'>".$row['select_date']."
                  <div><time class='timeago' datetime='".$row['select_date']."' style='font-size: 11px; color: blue'></time></div>
                  </td>
                  <td style='text-align: center; font-size: 11px;'>
                  
                    <a class='dropdown' href='#' id='userDropdown' role='button'
                       data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='text-decoration: none; color: #666666'><span style='font-size: 15px; cursor: pointer;'><i class='fas fa-ellipsis-h'></i></span></a>

                            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
                                aria-labelledby='userDropdown'>
                                <a class='dropdown-item' href='../download.php?file_name=".$row['attach_file']."' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-download fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray;'></i>
                                    Download
                                </a>
                            </div>
                  
                  </td>
                </tr>";
                #include('viewUserDetails.php');
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
<script src="../jquery.timeago.js"></script>
<!-- generate datatable on our table -->
<!-- generate datatable on our table -->

<script>
//time ago
$(document).ready(function(){

  $(".timeago").timeago();
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

