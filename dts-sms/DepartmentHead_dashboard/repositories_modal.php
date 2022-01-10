

<!--- modal for view files ---->
<div class="modal fade" id="send_modal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h4 style="font-size: 18px; font-weight: 550; color: gray;">View Files</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div>
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
                              $folder_names = $row["folder_name"];
                              $sql = "SELECT * FROM user_repositories where folder_name = '$folder_names'";
                              $query = $conn->query($sql);
                              while($rowFiles = $query->fetch_assoc()){
                                echo 
                                "<tr style='font-size: 12px'>
                                  <td style='text-align: left;'>".$rowFiles['id']."</td>
                                  <td style='text-align: left;'>".$rowFiles['file_name']."</td>
                                  <td><a href='../uploads/".$rowFiles['file_name']."' download>Download</td>
                                </tr>";
                                include('edit_delete_modal.php');
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>