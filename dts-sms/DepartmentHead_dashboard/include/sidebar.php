<!--- side navigation start--->
    <div class="wrapper">
      <div class="side-bar" style="background-color: #0062CC">
        <div class="imgcontainer">
                <img src="img/lk.png" width="170px" height="100px;" class="img-fluid" style="margin-bottom: -1%; margin-top: 2%;">
                <h5 class="d1">Document Tracking System</h5>
                <br>
                <!--<h6 class="d2">with SMS Notification</h6>-->
               <style>
                  .imgcontainer{
                    margin-left: -5px;
                    text-align: center;
                    line-height: 20px;
                    border-bottom: 1px solid #0181CA;
                  }
                  .d1{
                    font-size: 18px;
                    font-weight: 500;
                    color: #E7F5FE;
                    font-family: 'Trebuchet MS', sans-serif;
                  }
                  .d2{
                    margin-top: -2%;
                    font-size: 12px;
                    font-weight: 500;
                    color: #E7F5FE;
                    font-family: 'Trebuchet MS', sans-serif;
                    font-style: italic;
                    margin-bottom: 10%;
                  }
                </style>
              </div>
              <div class="menu">
                <div class="item"><a href="navbar.php"><i class="fas fa-home"></i>Dashboard</a></div>
              <div class="item">
                  <a class="sub-btn"><i class="fas fa-folder-open"></i>Documents<i class="fas fa-angle-right dropdown"></i>

                <div class="sub-menu">
                    <a href="add_document.php"><i class="fas fa-folder-plus"></i>Add New Document</a>
                    <a href="outgoingDocuments.php"><i class="fas fa-file-import"></i>Outgoing Documents</a>
                    <a href="draft_files.php"><i class="fas fa-pencil-alt"></i>Drafts</a>
                    <a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a>
                    <a href="archive.php"><i class="fas fa-file-archive"></i>Archive</a>  
                </div>

                <a class="sub-btn"><i class="fas fa-cogs"></i>Setup Categories<i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                    <a href="viewDocumentType.php"><i class="fas fa-file"></i>Manage Document Type</a>
                    <a href="viewActionType.php"><i class="fas fa-tasks"></i>Manage Action Type</a>  
                </div> 

                <a class="sub-btn"><i class="fas fa-users"></i>Department Users<i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                  <a href="employeeProfile.php"><i class="fas fa-users"></i>Employee Profiles</a>
                  <a href="users.php"><i class="fas fa-user-plus"></i>Create Users</a>
                  <a href="manageUsers.php"><i class="fas fa-user"></i>Manage Users</a>  
                </div>
              </div>
              <div class="item"><a href="sms.php"><i class="fas fa-sms"></i>SMS Notification</a></div>
            
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