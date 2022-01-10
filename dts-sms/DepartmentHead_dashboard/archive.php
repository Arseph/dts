<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document Tracking System | Archive</title>
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
			    <h2>Archive</h2>
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
  						box-shadow: 0 2px 4px 0 lightgray, 0 6px 12px 0 rgba(0, 0, 0, 0.10);
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
				            <a href="draft_files.php"><i class="fas fa-folder"></i>Drafts</a>
				            <a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a>
				            <a href="#"><i class="fas fa-file-archive"></i>Archive</a>  
				        </div>
			        </div>
			        <div class="item"><a href="users.php"><i class="fas fa-user"></i>View Users</a></div>
			        <div class="item"><a href="#"><i class="fas fa-sms"></i>SMS Campaign</a></div>
			        <div class="item">
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
<!-------------------------------main container start here---------------------------------
-->

</body>
</html>