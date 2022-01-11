<?php
require_once('connection_db/connection.php');
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
<!-----Sidebar navigation---->
    <?php include_once"include/sidebar.php"; ?>
  </div>

<!--- Label for Add Document-->  
<div class="main-content">
        <?php
        if(isset($_SESSION['errorStat'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            ".$_SESSION['errorStat']."
          </div>
          ";
          unset($_SESSION['errorStat']);
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
<div class="info">
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Employee Profile / <a href="users.php" style="font-size: 15px; font-weight: 600;">User Account Setup</a></b>
</div>
</div>

        <div class="container">
          
            <?php
                $conn = mysqli_connect('localhost','root','','documenttrackingsystem_db');
                if(isset($_POST['submit'])){
                  $file = $_FILES['doc']['tmp_name'];
                  
                  $ext = pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
                  if($ext=='xlsx'){
                    require('import/PHPExcel/PHPExcel.php');
                    require('import/PHPExcel/PHPExcel/IOFactory.php');
                    
                    
                    $obj=PHPExcel_IOFactory::load($file);
                    foreach($obj->getWorksheetIterator() as $sheet){
                      $getHighestRow=$sheet->getHighestRow();
                      for($i=0;$i<=$getHighestRow;$i++){
                        $fullname=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        $department=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        #$firstname=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                        #$lastname=$sheet->getCellByColumnAndRow(3,$i)->getValue();
                        #$usertype=$sheet->getCellByColumnAndRow(3,$i)->getValue();            
                        $email=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                        #$bday=$sheet->getCellByColumnAndRow(3,$i)->getValue();
                        $username=$sheet->getCellByColumnAndRow(3,$i)->getValue();
                        #$password=$sheet->getCellByColumnAndRow(4,$i)->getValue();
                        $phone_number=$sheet->getCellByColumnAndRow(4,$i)->getValue();
                        $address=$sheet->getCellByColumnAndRow(5,$i)->getValue();
                        if($department!=''){
                          mysqli_query($conn,"insert into batch_upload(fullname, department, email, username, phone_number, address) values('$fullname', '$department', '$email', '$username', '$phone_number', '$address')");

                          $_SESSION['success1'] = 'File Imported Successfully';
                        }
                      }
                    }
                  }else{
                    $_SESSION['errorStat'] = 'Invalid File Format';
                    #header('location: addDepartment.php');
                  }
                }
                ?>
    <form method="post" enctype="multipart/form-data">
    <div class="card shadow-sm bg-white" style="width:83.3%; margin-top: -0.6%; margin-left: 21.5%;">
      <div class="card-header" style="font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white; height: 50px;">Batch Uploading of Employees' Profile</div>
      <div class="card-body" style="height: auto;">
        <div class="form-group">
          <label for="addDepartment" style="margin-bottom: 4px; font-size: 14px; margin-bottom: 9px; margin-left: 2%; ">Upload your excel template: </label>&nbsp;&nbsp;
          <input type="file" class="upload-box" name="doc" accept=".xlsx, .xls, .csv" required>
         </div>

      </div>
      <div class="" style="background-color: white;">
        <button type="submit" name="submit" class="btn btn-primary" style="width: 12%; height: 34px; font-size: 11px; margin-left: 65%; margin-top: -15%;"><span><i class="fa fa-upload" aria-hidden="true"></i></span> &nbsp;&nbsp;Import</button>  
      </div>
      <div>
        <div style="margin-top: -10%; margin-left: 8%;">
          <a href="img/Employee-data-sheet.xlsx" download style="width: 16%; font-size: 11px; margin-left: 78%; font-weight: 600;" ata-toggle='tooltip' title='Generate an employee sheet template'><span><i class="fas fa-download" aria-hidden="true"></i></span> &nbsp;Generate Template</a>
        </div>
      </div>
    </div>
  </form>
</div>

<?php  
    include('connection_db/connection.php');
    $list = mysqli_query($conn, "SELECT COUNT(*) as count FROM batch_upload");

    while ($listRow = mysqli_fetch_array($list))
    {
        $var = $listRow['count'];
    }

?>
<?php include('addUserModal.php') ?>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1% ">
  <div class="card-header" style="height: 50px; font-size: 13px; text-align: left; font-weight: 600; color: #747272; background-color: white;">
    List of Personnels
    <div class="row">
      <form method="POST" action="addUserModal.php" style="margin-left: 58.5%; margin-top: -2.5%;">
        <a href="#addnew" data-toggle="modal" class="addMdl btn btn-success sm m-0" style="float: left; width: 100%; height: 33px;font-size: 12px;"><span><i class="fa fa-plus" aria-hidden="true"></i></span> &nbsp;Add New</a>
      </form>
    </div>

      <input type="text" class="search form-control rounded-0" placeholder="Search employee's name" style="font-size: 12px; float: right; margin-right: -1%; margin-top: -32px;margin-bottom: -5.5%; width: 30%">
  </div>
  <div class="card-body" style="height: auto; display: fixed; margin-top: -2%;">
    <small style="font-size: 11px;"> Show <?php echo "[".$var."] entries";?></small>
  <div class="row">
        <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead" style="height: 35px">
              <th style="width: 20%;">NAME</th>
              <th style="width: 20%;">EMAIL ADDRESS</th>
              <th style="width: 15%;">USERNAME</th>
              <th style="width: 15%;">MOBILE NO.</th>
              <th style="width: 20%;">ADDRESS</th>
              <th style="width: 20%;">DEPARTMENT</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
               $sql = "SELECT * FROM batch_upload ORDER BY fullname ASC";

              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo  
                "<tr style='font-size: 12px'>
                  <td><i class='fa fa-user' aria-hidden='true' style='color: gray;'></i>&nbsp;&nbsp;&nbsp;".$row['fullname']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['username']."</td>
                  <td>".$row['phone_number']."</td>
                  <td>".$row['address']."</td>
                  <td>".$row['department']."</td>
                  <td>
                  </td>
                </tr>";
                include('editUserDetails_modal.php');
              }
            ?>
          </tbody>
        </table>
      </div>
   </div>
<style>
  .upload-box{
    font-size: 14px;
    background-color: white;
    border-radius: 50px;
    box-shadow: 5px 5px 10px lightgray;
    width: 350px;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button{
    color: white;
    background: #357EDD;
    padding: 6px;
    border: none;
    border-radius: 50px;
    box-shadow: 1px 0 1px 1px lightgray;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button:hover{
    background: #2C5EBA;
  }
</style>
<script>
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 5000);

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