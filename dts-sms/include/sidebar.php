<!--- side navigation start--->
    <div class="wrapper">
      <div class="side-bar">
        <div class="imgcontainer">
           <img src="img/dts2.png" width="240px" height="100px;" class="img-fluid" alt="">
                <style>
                  .imgcontainer{
                    margin-left: -5px;
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
                    <!---<a href="receive_docu.php"><i class="fas fa-file-import"></i>Received Document</a>-->
                    <a href="draft_files.php"><i class="fas fa-folder"></i>Drafts</a>
                    <a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a>
                    <a href="archive.php"><i class="fas fa-file-archive"></i>Archive</a>  
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