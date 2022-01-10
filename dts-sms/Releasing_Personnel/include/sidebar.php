<!--- side navigation start--->
    <div class="wrapper">
      <div class="side-bar" style="background-color: #0062CC">
        <div class="imgcontainer">
              <img src="img/lk.png" width="170px" height="100px;" class="img-fluid" style="margin-bottom: -1%; margin-top: 2%;">
               <h5 class="d1">Document Tracking System</h5>
               <h6 class="d2">with SMS Notification</h6>
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
                <div class="item"><a href="pending_docu.php"><i class="fa fa-exclamation-circle"></i>Pending for Release</a></div>
                <div class="item"><a href="outgoingDocuments.php"><i class="fa fa-paper-plane"></i>Outgoing Documents</a></div>
                <!--<div class="item"><a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a></div>-->
                <div class="item"><a href="#"><i class="fas fa-file-archive"></i>Archive</a></div>
             

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