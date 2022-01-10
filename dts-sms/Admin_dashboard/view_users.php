<?php
include('js/script.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Users</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <!---- Icons/Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!----- Font awesome icon --->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <!-----Top bar navigation---->
      <div class="wrapper">
        <div class="topnav">
          <a class="active" href="#home">Mailbox</a>
          <!--<input type="text" placeholder="Search file here">
          <button type="submit"><i class="fa fa-search"></i></button>-->
          <div class="user">
            <a href="#" class="btn"></a>
            <img src="notifications.png" alt="">
            <div class="img-case">
              <img src="user.png" alt="">     
            </div>  
          </div>  
      </div>    
      </div>
      <style>
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
            margin-left: 1050px;
            margin-bottom: 20px;
          }
          .topnav {
              background-color: #63A2E7;
              overflow: hidden;
          }
          .topnav a {
            float: right;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
          }
          .topnav a.active {
            color: white;
            font-weight: 700;
            margin-bottom: 10.5px;
          }
          @media screen and (max-width: 600px) {
            .topnav a, .topnav input[type=text] {
              float: none;
              display: block;
              text-align: left;
              width: 100%;
              margin: 0;
              padding: 14px;
            }
            .topnav input[type=text] {
              border: 1px solid #ccc;
            }
          } 
          </style>

          <!--- Label for Add Document-->  
      <div class="main-content">
        <div class="info">
          <h3><b>Repositories / Drafts</b></h3>
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
                    <a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a>
                    <a href="archive.php"><i class="fas fa-file-archive"></i>Archive</a>  
                </div>
              </div>
              <div class="item"><a href="users.php"><i class="fas fa-user"></i>Users</a></div>
              <div class="item"><a href="#"><i class="fas fa-sms"></i>SMS Campaign</a></div>
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


    <!--- View User Table Starts Here! --->
    <div class="container">
      <?php 
          if (isset($_SESSION['status']))
          {
            ?> 
            <div class="alert alert-success alert-right" role="alert" max-width="50px"><?php echo $_SESSION['status']; ?>
          </div>  

            <?php
            unset($_SESSION['status']);
          }
          ?>
      <div class="col-sm-0 upload">
      <!--<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Upload File</span></a>-->
      <!--<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete File</span></a>-->   
      <!--<button type="button" class="btn btn-success">Success</button>-->   
     </div>
      <input type="text" placeholder="Search">
          <!--<button type="submit" ><i class="fa fa-search"></i></button>-->
          <style>
          .material-icons { font-size: 15px;}
          .container .upload{
            margin-bottom: -17px;
            margin-left: 470px;
          }
          .container button[type=submit] {
            float: right;
            width: 5%;
            height: 28px;
            margin-top: -12px;
            margin-bottom: 10px;
            margin-right: 3px;
            padding: 2px;
            background: #2F00FF;
            color: white;
            border: 1px solid #2E75B6;
            border-left: none;
            cursor: pointer;
            border-radius: 0 2px;
            display: block;
          }
          .container button[type=submit]:hover {
              background: #0C56D0;
          }
          .container input[type="text"]{
            width: 40%;
            height: 28px;
            float: left;
            padding-left: 15px;
            border: 1px solid #C9C7C7;
            margin-top: -15px;
            margin-bottom: 10px;
            margin-left: 515px;
            font-size: 13px;
            border-radius: 2px;
            background-color: #transparent;
            display: block;
          }
        
        </style>
  <?php
    $mysqli = new mysqli('localhost', 'root', '', 'documenttrackingsystem_db') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM register") or die($mysqli->error);
  ?>
        <div class="content-table">
            <!--Table panel-->
                <div class="table-wrapper">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <!-- check box -->
                        <!--<th class="text-center">
                          <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="check_all"  aria-label="...">
                          </div>
                        </th>-->
                        <th>User ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>User Email</th>
                        <th>Department</th>
                        <th>Phone Number</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while ($row = $result->fetch_assoc()): ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['num']; ?></td>
                        <td>
                          <a href="user_code.php?delete=<?php echo $row['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete" style="color: red">&#xE872;</i></a>
                        </td> 
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
                <?php 
                  function pre_r($array)
                  {
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                  }
                ?>

</body>
</html>
      <style>
      /*@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');*/
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
      /*.btnDelete:hover
      {
        color: red;
      }
      .btnDelete:active
      {
        text-shadow: 2px 2px 8px #FF0000;
      }*/
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
              /* Modal styles */
         .modal .modal-dialog {
          max-width: 400px;
         }
         .modal .modal-header, .modal .modal-body, .modal .modal-footer {
          padding: 20px 30px;
         }
         .modal .modal-content {
          border-radius: 1px;
         }
         .modal .modal-footer {
          background: #ecf0f1;
          border-radius: 0 0 1px 1px;
         }
            .modal .modal-title {
                display: inline-block;
            }
         .modal .form-control {
          border-radius: 1px;
          box-shadow: none;
          border-color: #dddddd;
         }
         .modal textarea.form-control {
          resize: vertical;
         }
         .modal .btn {
          border-radius: 1px;
          min-width: 100px;
         } 
         .modal form label {
          font-weight: normal;

         }
      /* VIEW USER DESIGN */
          *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
          }
          table.table tr th:first-child {
          width: 90px;
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
            width: 100%;
          }
          /*body{
              display: block;
              height: 100vh;
              justify-content: center;
              align-items: center;
              background: #86ABF9;
          }*/
          .container{
              max-height: 500px;
              height: 75%;
              max-width: 75%;
              background: white;
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

  function btnDelete($tracking_no){
    start_load()
    $.ajax({
      url:'ajax.php?action=btnDelete',
      method:'POST',
      data:{id:$id},
      success:function(resp){
        if(resp==1){
          alert_toast("Data successfully deleted",'success')
          setTimeout(function(){
            location.reload()
          },1500)

        }
      }
    })
  }
</script>
<script>
$(document).ready(function(){
  $('.edit').on('click', function(){
    $('#editEmployeeModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(functionn(){
      return $(this).text();
    }).get();

    console.log(data);

    $('#update_id').val(data[0]);
    $('#file_name').val(data[1]);
    $('#file_description').val(data[2]);
    $('#type_document').val(data[3]);

  });
});
</script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

</script>

