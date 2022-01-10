<?php $department = $_SESSION['department']; ?>
<?php $fullname = $_SESSION['fullname']; ?>  

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fullname; ?> (<?php echo $department;?> Employee)</span>
                    </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php" style="color: gray;">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" style="color: lightgray;"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="changePassword.php" style="color: gray;">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400" style="color: lightgray;"></i>
                                  Change Password
                                </a>
                       
                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray;" data-target="#logout_modal" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: lightgray;"></i>
                                    Logout
                                </a>
                            </div>
                </li>
              </ul>
        </nav>


<!--- Logout Modal Confirmation --->
<div class="modal fade" id="logout_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 17px; font-weight: 500; color: gray;">Ready to leave?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="text-left" style="font-size: 14px; color: black;">Select "Logout" below if you are ready to end your current session.</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: -1%;"> Cancel</button>
        <button type="button" class="btn btn-primary" onclick="location.href = 'logout.php';" data-dismiss="modal" style="margin-top: -1%;"> Logout</button>
      </div>
    </div>
  </div>
</div>