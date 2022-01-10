

<!--- modal for view files ---->
<div class="modal fade" id="send_modal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h4 style="font-size: 18px; font-weight: 550; color: gray;">View Files</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div>
               <form method="POST" action="../file_upload.php" enctype="multipart/form-data">
                <div class="form-group">
                  <small><b>Rename Folder:</b></small>
                  <input type="hidden" name="repoID" value="<?php echo $row['id']; ?>">
                  <input type="text" class="form-control" name="repository" placeholder="Enter Folder Name" style="font-size: 13px; width: 100%;" value="<?php echo $row["folder_name"]; ?>">
                </div>
                <div class="form-group">
                  <small><b>Upload File:</b></small>
                  <div class="myfile">
                    <input type="file" class="upload-box form-control" name="myfile[]" style="font-size: 13px; width: 100%;" multiple>
                  </div>
                  <div class="form-group">
                    <br>
                    <a href="../repo_delete.php?repo_id=<?php echo$row['id'] ?>" class="btn btn-danger">Delete Folder</a>
                    <button type="submit" name="save" class="btn btn-secondary">Save</button>
                    <br>
                  </div>
          </form>
                </div>
              </div>
              <br>
                <div>
                  <label>Uploaded Files</label>
                    <table class="table-responsive table-hover table-striped table-sm m-0" width="100%" cellspacing="0">
                        <thead style="background-color: #0062CC; color: white; font-size: 12px;">
                            <tr>
                                <th style="width: 50%; text-align: left; font-size: 12px;">ID</th>
                                <th style="width: 50%; text-align: left; font-size: 12px;">FILE NAME</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              include_once('connection_db/connection.php');
                              $folder_names = $row["id"];
                              $sql = "SELECT * FROM user_repositories where folder_name = '$folder_names'";
                              $query = $conn->query($sql);
                              while($rowFiles = $query->fetch_assoc()){
                                echo 
                                "<tr style='font-size: 12px'>
                                  <td style='text-align: left;'>".$rowFiles['id']."</td>
                                  <td style='text-align: left;'>".$rowFiles['file_name']."</td>
                                  <td><a href='../download.php?file_name=".$rowFiles['file_name']."' download>Download</td>
                                </tr>";
                                include('edit_delete_modal.php');
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>