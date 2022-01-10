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
  <link href="../js/daterangepicker_old/daterangepicker-bs3.css" rel="stylesheet">
  <link href="../js/daterangepicker_old/datepicker3.css" rel="stylesheet">
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

  <div class="info">
     

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                     <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600; cursor: pointer;">Dashboard</a> /</b>
                      <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 15px; font-weight: 600; color: black;"> Inquiry</a>
                    
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-left"
                                aria-labelledby="userDropdown" style="border-radius: 0; height: auto; width: 23%;">
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%">
                                    Search Departments
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%">
                                  Document Status
                                </a>
                       
                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Track Document's Route
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Select
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Select
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Select
                                </a>
                            </div>
                    </li>
              </ul>
  </div>
</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
    
  </div>

<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");

$query = "SELECT DISTINCT department FROM register ORDER BY department ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>

<?php include('addUserModal.php') ?>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%;">
<!---- card header start ---->
  <div class="card-header">

  <div class="form-group">
      <label style="font-size: 13px; font-weight: 550; color: #333333;margin-bottom: -5%;">Search by Departments:</label>
       <select name="filter" id="filter" class="form-control rounded-0" style="font-size: 12px; width: 40%; height: 35px;" >
       <option selected="true" style="font-size: 12px;"></option>
       <?php
        foreach($result as $row)
        {
          echo '<option value="'.$row["department"].'">'.$row["department"].'</option>';  
        }
        ?>
       </select>
       <input type="hidden" name="hidden_details" id="hidden_details" />
  </div>
  <div style="width: 35%; margin-left: 42%; margin-right: -6%; margin-top: -51px;">
     <input type="text" class="form-control" name="date_range" placeholder="Filter your date here..." id="consolidate_date_range">
  </div>

    <div class="search-box" style="width: 35%; float: right; margin-right: -6%; margin-top: -35px;">
          <input type="text" id="search" class="form-control rounded-0" placeholder="Search by names" style="font-size: 12px;">
    </div>
</div>
<!---- card header end ---->

<div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead" style="height: 35px">
              <th>TRACK NO</th>
              <th>FILE NAME</th>
              <th>DOCUMENT TYPE</th>
              <th>CREATED BY</th>
              <th>DEPARTMENT</th>
              <th>DATE CREATED</th>
              <th>RECEIVED BY</th>
              <th>DATE RECEIVED</th>
            </tr>
          </thead>
          <tbody id="reportTable">
          </tbody>
        </table>
      </div>
    </div>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="../js/daterangepicker_old/moment.min.js"></script>
<script src="../js/daterangepicker_old/daterangepicker.js"></script>
<!-- generate datatable on our table -->

<script>
$(document).ready(function(){
  // Activate tooltips
  $('[data-toggle="tooltip"]').tooltip();
    
  // Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(1)").text().toLowerCase();
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
    
    function load_data(dept='', date_range='')
    {
        $.ajax({
            url:"fetch_report.php",
            method:"POST",
            data:{
              query:dept,
              date_range: date_range
            },
            success:function(data)
            {
                $('#reportTable').html(data);
            }
        })
    }

    $('#filter').change(function(){
        var date_range = $('#consolidate_date_range').val();
        $('#hidden_details').val($('#filter').val());
        var query = $('#hidden_details').val();
        load_data(query, date_range);
    });

    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#consolidate_date_range').daterangepicker();
    $('#consolidate_date_range').on('apply.daterangepicker', function(ev, picker) {
      var date_range = $('#consolidate_date_range').val();
        $('#hidden_details').val($('#filter').val());
        var query = $('#hidden_details').val();
        load_data(query, date_range);
    });
    
});
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);
</script> 

</body>
</html>
<!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>