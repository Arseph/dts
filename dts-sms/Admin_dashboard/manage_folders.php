<?php
include "connection_db/connection.php";
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM folders where id=".$_GET['id']);
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $v){
			$meta[$k] = $v;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document Tracking System | Repositories</title>
	<link rel="stylesheet" href="navbar.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  	<script src="https://kit.fontawesome.com/b99e675b6e"></script>
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
		<!-----Top bar navigation---->
			<div class="wrapper">
				<div class="topnav">
		  			<a class="active" href="#home">Mailbox</a>
		  			<div class="user">
						<a href="#" class="btn"></a>
						<img src="notifications.png" alt="">
						<div class="img-case">
							<img src="user.png" alt="">			
						</div>	
					</div>	
				</div>
			</div>
			<!--Label for Add Document --> 
			<div class="main-content">
			  <div class="info">
			    <h2>Repositories</h2>
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
						margin-left: 713px;
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
  						box-shadow: 0 2px 8px 0 lightgray, 0 6px 12px 0 rgba(0, 0, 0, 0.10);
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
					  	margin-bottom: 15px;
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
					/*** LABEL ***/
					.main-content .info{
					    margin: 10px;
					    margin-left: 23.5%;
					    color: #1F4E79;;
					    margin-top: 20px;
					    margin-bottom: 0px;
					    border-bottom: 1px solid #2F5597;
					  }		
					</style>
<!--- side navigation start--->
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
				            <a href="#"><i class="fas fa-folder"></i>Repositories</a>
				            <a href="archive.php"><i class="fas fa-file-archive"></i>Archive</a>  
				        </div>
			        </div>
			        <div class="item"><a href="#"><i class="fas fa-users"></i>Batch Upload</a></div>
			        <div class="item"><a href="users.php"><i class="fas fa-user"></i>View Users</a></div>
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

		<style>
			  /* SIDEBARR STYLE */
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
<!---------main container start here--------->
<div class="container">
	<div class="create">
      <input type="submit" value="Create new folder">
  </div>
	<div class="delete">
      <input type="submit" value="Delete folder">
  </div>
  <div class="cards">
    <div class="card">
      <div class="box">
        <div class="row">
        <div class="col-25">
          <table class="table table-bordered">           
      		<thead bgcolor="white">
		      <tr>
			    <th scope = "col">Tracking No.</th>
          <th scope = "col">File Name</th>
			    <th scope = "col">File Description</th>
			    <th scope = "col">Date Uploaded</th>
          <th scope = "col">Originating Department</th>
			    <th scope = "col">Actions</th>
		      </tr>
      		</thead>
		      <?php 

		      $conn = mysqli_connect ("localhost", "root", "", "documenttrackingsystem_db");
		      if($conn-> connect_error) {
		        die("Connection failed:". $conn-> connect_error);
		      }

		      $sql = "SELECT tracking_no, file_name, file_description, select_date, department from file_upload";
		      $result = $conn-> query($sql);

		      if($result-> num_rows > 0 )
		      {
		        while ($row = $result-> fetch_assoc()) 
		        {
		          echo 
		          "<tr><td>" .  $row["tracking_no"] . 
              "</td><td>" . $row["file_name"] .
		          "</td><td>" . $row["file_description"] .  
		          "</td><td>" . $row["select_date"] . 
		          "</td><td>" . $row["department"] .
              "</td><td>" .

		           #' <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button> ' . 

		           #' <button type="button" class="btn btn-success"><i class="fas fa-edit  "></i></button> ' . 

		           ' <button type="button" class="btnDelete"><i class="far fa-trash-alt"></i>Delete</button> ';

		          "</td><td>"; 
		        }
		        echo "</table>";  
		      }
		      else
		      {
		        echo "0 result";
		      }
		      
		      $conn-> close();
		       ?> 
		</table> 
      </div>     
    </div>   
  </div>
</div>

<style>
.table-bordered{
	border: 1px solid black;
}
/* Delete folder css */
.container .delete input{
    background-color: red;
    color: white;
    border: 1px solid grey;
    cursor: pointer;
    float: right;
    margin-right: 10px;
    margin-top: 10px;
    padding: 10px 30px;
  }
 .container .delete input:hover{
 	background-color: #C10000;
 }
 .container .delete input:active{
  box-shadow: 0 3px #CCCCCC;
  transform: translateY(4px);
 }
/* Create folder css */
.container .create input{
    background-color: limegreen;
    color: white;
    border: 1px solid grey;
    cursor: pointer;
    float: right;
    margin-right: 30px;
    margin-top: 10px;
    padding: 10px 15px;
  }
  .container .create input:hover{
  	background-color: forestgreen;
  }
  .container .create input:active{
  box-shadow: 0 3px #CCCCCC;
  transform: translateY(4px);
 }
  .container .cards {
    padding: 20px 15px;
    display: block;
    align-items: center;  
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .container .cards .card {
    width: 75%;
    height: 420px;
    background: white;
    margin: 0px 10px;
    margin-left: 300px;
    margin-top: 35px;
    display: flex;
    justify-content: space-around;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 12px 0 rgba(0, 0, 0, 0.10);
  }
  .container .cards .card .box {
  	color: #1F4E79;
  	margin-top: 10px;
  }
</style>
</body>
</html>