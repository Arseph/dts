<?php
 session_start();
 $firstname = $_SESSION['firstname'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Files</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
</head>
<body>
    <!-----Top bar navigation---->
      <div class="wrapper">
        <div class="topnav">
          <div class="container-fluid">
            <div class="navbar-header">
            <ul class="nav navbar-nav navbar-right">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
                <span class="fas fa-bell fa-w" style="font-size:30px; color: #fff;"></span>
                <span class="badge badge-warning"style="margin-bottom: 15px; background: red;">3</span></a>
              <ul class="dropdown-menu"></ul>
            <div class="dropdown navbar-right">
            <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $firstname; ?>
              <a class="btn btn-warning" style="margin-right: 50px;" href="logout.php" role="button">Logout</a>
            </a>
            
           </li>
          </ul>
            </div>  
          </div>
          </div>  
        </div>
      </div>
        <style>
        /********TOP BAR STYLE********/
          /* User Profile */
          .wrapper .topnav .user {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
          }
          .wrapper .topnav .user .img {
            width: 40px;
            height: 40px;
          }
          .wrapper .topnav .user .img-case {
            position: absolute;
            width: 40px;
            height: 40px;
            margin-left: 90px;
          }
          .wrapper .topnav .user .img-case img {
            position: absolute;
            top: 8px;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 100%;
            margin-left: 425px;
            margin-bottom: 20px;
          }
          .topnav {
              background-color: #63A2E7;
              overflow: hidden;
          }
          .topnav input[type=text] {
            width: 25%;
            height: 28px;
            float: left;
            padding-left: 15px;
            border: none;
            margin-top: 15px;
            margin-left: 300px;
            font-size: 15px;
            border-radius: 5px;

          }   
          .container-fluid 
          {
            padding: 14px;
          }
          .container-fluid a
          {
            margin-left: 1px;
            margin-right: 15px;
          }
          .navbar-header {
            float: right;
          }
          .main-content .info h1{
           font-size: 26px;
          font-weight: 600;
          }

          </style>

          <!--- Label for Add Document-->  
      <div class="main-content">
        <div class="info">
          <h3><b>Repositories | Drafts</b></h3>
        </div>
      </div>
<!----------- container end ------------>

<!--Style for Add Document-->
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
  .content {
    position: relative;
  }

  .content .cards {
    padding: 20px 15px;
    display: block;
    align-items: center;  
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .content .cards .card {
    width: 80%;
    height: 50px;
    background: white;
    margin: 0px 10px;
    margin-left: 265px;
    margin-top: -20px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 12px 0 rgba(0, 0, 0, 0.10);
  }
</style>

  <!-----Side bar navigation---->
      <div class="wrapper">
      <div class="side-bar">
        <div class="imgcontainer">
                <img src="logo2.png" width="180px" height="100px;" class="img-fluid" alt="">
                <style>
                  .imgcontainer{
                    margin-left: -17px;
                    text-align: center;
                    line-height: 20px;
                    border-bottom: 1px solid rgb(0, 0, 0, 0.1);
                  }
                </style>
              </div>
              <div class="menu">
                <div class="item"><a href="navbar.php"><i class="fas fa-home"></i>Dashboard</a></div>
              <div class="item">
                  <a class="sub-btn"><i class="fas fa-folder-open"></i>Documents<i class="fas fa-angle-right dropdown"></i>

                <div class="sub-menu">
                    <a href="add_document.php"><i class="fas fa-folder-plus"></i>Add New Document</a>
                    <a href="receive_docu.php"><i class="fas fa-file-import"></i>Received Document</a>
                    <a href="draft_files.php"><i class="fas fa-folder"></i>Drafts</a>
                    <a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a>
                    <a href="archive.php"><i class="fas fa-file-archive"></i>Archive</a>  
                </div>
              </div>
              </div>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.sub-btn').click(function(){
          $(this).next('.sub-menu').slideToggle();
          $(this).find('.dropdown').toggleClass('rotate');
        });
      });
    </script>

    <!---- VIEW USERS ------->
    <div class="container">
      <!--<a href="#" class="btn btn-danger"><span>Delete File</span></a>-->
     
       <!--<button type="submit" ><i class="fa fa-search"></i></button>-->
          <style>
          /*Add users css*/
          .material-icons { font-size: 15px;}
          .container .upload{
            float: right;
          }
          .container button[type=submit] {
            float: right;
            width: 5%;
            height: 30px;
            margin-top: -15px;
            margin-bottom: 10px;
            margin-right: 8px;
            padding: 2px;
            background: #2F00FF;
            color: white;
            border: 1px solid #2E75B6;
            border-left: none;
            border-radius: 0 1.2px;
            cursor: pointer;
            display: block;
          }
          .container button[type=submit]:hover {
              background: #0C56D0;
          }
          .container input[type="text"]{
            width: 35%;
            height: 30px;
            float: left;
            padding-left: 15px;
            border: 1.2px solid #C9C7C7;
            margin-top: -15px;
            margin-bottom: 10px;
            margin-left: 425px;
            font-size: 13px;
            border-radius: 4px;
            background-color: #transparent;
            display: block;
          }
          .search {
          margin-left: 249%;
          margin-bottom: -10%;
          display: block;
          }
        </style>

  <div class="row">
    <div class="col-lg-20 col-lg-offset-2">
    <!----row start---->
      <div class="row">
      <?php
        if(isset($_SESSION['error'])){
          echo
          "
          <div class='alert alert-danger text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['error']."
          </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo
          "
          <div class='alert alert-success text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['success']."
          </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      </div>
    <!-----end of row----->


      <div class="row">
        <a href="#addnew" data-toggle="modal" class="addMdl btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
      </div>
      <div class="height40">
      <form>
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="btnSearch" ><i class="fa fa-search"></i></button>
      </form>
      </div>
    <div class="content-table">
      <div class="table-wrapper">
        <table class="table table-striped table-hover">
          <thead>
                        <th>Tracking No.</th>
                        <th>File Name</th>
                        <th>File Description</th>
                        <th>Date Uploaded</th>
                        <th>Attached File</th>
                        <th>Originating Department</th>
                        <th>Document Type</th>
                        <th colspan="2"></th>
                        
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM file_upload";

              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['tracking_no']."</td>
                  <td>".$row['file_name']."</td>
                  <td>".$row['file_description']."</td>
                  <td>".$row['select_date']."</td>
                  <td>".$row['attach_file']."</td>
                  <td>".$row['department']."</td>
                  <td>".$row['type_document']."</td>
                  <td>
                    <a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                  </td>
                  <td>
                    <a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='btnDelete glyphicon glyphicon-trash'></span> Delete</a>
                  </td>
                </tr>";
                include('edit_delete_modal.php');
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

<?php include('add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src=https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
  //inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
      $('.alert').hide();
    })
});

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 2000);
</script>
</body>
</html>

<style>
      .addMdl {
        margin-top: -1%;
        margin-left: -15%;
        background-color: #5CB323;
        border: none;
      }
      .addMdl:hover{
        background-color: #84C65A;
      }
      .mtop10{
        margin-top:0px;
      }
      .modal-label{
        position:relative;
        top:7px
      }
      .content-table{
        right: 4.5%;

      }
      .height40{
        bottom: -10px;
      }

</style>

      <style>
      /*@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');*/

      /*DELETE BUTTON*/
      button
      {
        padding: 0;
        border: none;
        font: inherit;
        color: inherit;
        background-color: transparent;
        cursor: pointer;
      }
      button:focus {
        outline: 0;
      }
      table .btndelete{
     float: none;
     display: inline;
    }
     .pagination {
        float: right;
        margin: 0 0 5px;
      }
      .pagination li a {
          border: none;
          font-size: 13px;
          min-width: 30px;
          min-height: 30px;
          color: #999;
          margin: 0 2px;
          line-height: 30px;
          border-radius: 1px !important;
          text-align: center;
          padding: 0 6px;
      }
      .pagination li a:hover {
          color: #666;
      } 
      .pagination li.active a, .pagination li.active a.page-link {
          background: #03A9F4;
      }
      .pagination li.active a:hover {        
          background: #0397d6;
      }
      .pagination li.disabled i {
          color: #ccc;
      }
      .pagination li i {
          font-size: 16px;
          padding-top: 6px
      }
      .hint-text {
          float: left;
          color: gray;
          margin-left: 10px;
          margin-top: 10px;
          font-size: 13px;
      }
      /* VIEW USER DESIGN */
          *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
          }
          body{
              display: block;
              height: 100vh;
              justify-content: center;
              align-items: center;
              background: #86ABF9;
          }
          td :hover{ background-color:}
          .container{
                max-height: 500px;
                height: 70%;
                max-width: 75%;
                background: transparent;
                padding: 40px 50px;
                border-radius: 5px;
                margin-left: 300px;

        }

        /*  Alert message design */
      .alert{
            width: 50%;
            margin-right: 10%;
            margin-bottom: -12px;
            font-size: 12px;
          }
      /* VIEW USER DESIGN */
          *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
          }
          table.table tr th:first-child {
          width: 100px;
          }
          .content-table{
            width: 90%;
            position: absolute;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 0px 0px 0 0;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
          }
          .content-table thead, th{
            background-color: #2E75B6;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
          }
          .content-table th,
          .content-table td {
            padding: 12px 15px;
          }
          .content-table tbody tr:last-of-type {
          border-bottom: 1px solid #223C94;
          }
          .content-table tbody tr:nth-of-type(even) {
          background-color: #f3f3f3;
          }
          /*table, td:hover{
            background: #E5E5E5;
          }*/
          .table{
            margin: auto;
            width: 100% !important; 
          }
          .container{
              max-height: 500px;
              height: 75%;
              max-width: 75%;
              background: transparent;
              padding: 40px 50px;
              border-radius: 5px;
              margin-left: 300px;
              position: relative;
        }



/* SIDE BAR DESIGN */

 *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body{
  min-height: 100vh;
  background: #F5F5F5;
  background-size: cover;
  background-position: center;
}

.wrapper .side-bar{
  position: fixed;
  left: 0;
  top: 0;
  width: 280px;
  height: 100vh;
  background: #86ABF9;
  position: fixed;
}

.wrapper .side-bar .menu{
  width: 100%;
  margin-top: 0px;
}

.wrapper .side-bar .menu .item{
  position: relative;
  cursor: pointer;
}

.wrapper .side-bar .menu .item a{
  color: white ;
  font-size: 16px;
  text-decoration: none;
  display: block;
  padding: 5px 20px;
  line-height: 40px;
}

.wrapper .side-bar .menu .item a:hover{
  color: white;
  background: #2F5597;
  transition: 0.2s ease;
}

.wrapper .side-bar .menu .item i{
  margin-right: 18px;
}

.wrapper .side-bar .menu .item a .dropdown{
  position: absolute;
  right: 20px;
  margin: 20px;
  margin-top: 11px;
  transition: 0.2s ease;
}

.wrapper .side-bar .menu .item .sub-menu{
  background: rgba(255, 255, 255, 0.1);
  display: none;
}

.wrapper .side-bar .menu .item .sub-menu a{
  padding-left: 55px;
}
.rotate{
  transform: rotate(90deg);
}
      </style>
    </div>
  </form>
</div>
</body>
<script>
  $('.btnDelete').click(function(){
    _conf("Are you sure to delete this Person?","btnDelete",[$(this).attr('data-id')])
  })

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

</script>

