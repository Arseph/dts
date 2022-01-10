<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 45%;">
        <div class="modal-content" style="width: 90%; border: none; background-color: #FFFFFF;">
            <div class="modal-header" style="background-color: #0062CC; height: 40px;">      
		      <h4 class="modal-title" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%"><span><i class="fas fa-edit"></i></span> &nbsp;Edit File</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #F0F0F0; margin-top: -5%">&times;</button>
		     </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php" enctype="multipart/form-data">
			<input type="hidden" class="form-control rounded-0" name="id" value="<?php echo $row['id']; ?>">

				 <div class="form-group">
				 	<span class="asterisk" style="color: red; margin-left: 2%;">*</span>
	       			  <label style="font-size: 13px; margin-left: 2%; font-weight: 550;">File Name: </label>
	       			  	<input class="form-control rounded-0" name="file_name" value="<?php echo $row['file_name']; ?>" style="font-size: 13px;margin-top: 3px; width: 90%; margin-left: 4%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
	      		  </div>
	      		  <div class="form-group">
	      		   <span class="asterisk" style="color: red; margin-left: 2%;">*</span>
			       <label style="font-size: 13px; margin-left: 2%; font-weight: 550;">Details</label>
			       <textarea class="form-control rounded-0" name="file_description" placeholder="Write something.." style="width: 100%;height:140px; font-size: 13px; width: 90%; margin-left: 4%; background-color: #F0F0F0; border: 0.5px solid lightgrey;"><?php echo $row['file_description']; ?></textarea>
			       
      			 </div>
      			 <div class="form-group">
      			 	<span class="asterisk" style="color: red; margin-left: 2%;">*</span>
			       <label style="font-size: 13px; margin-left: 2%; font-weight: 550;">Attached File:</label>
			       	<input type="file" class="upload-box form-control rounded-0" name="myfile" value="<?php echo $row['attach_file']; ?>" style="font-size: 13px;margin-top: 3px; width: 90%; margin-left: 4%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
      			 </div>
				  <div class="form-group">
				  	<span class="asterisk" style="color: red; margin-left: 2%;">*</span>
			       <label style="font-size: 13px; margin-left: 2%; font-weight: 550; ">Type of Document</label>
			       <select id="typeD" name="type_document" class="form-control rounded-0" style="font-size: 13px;margin-top: 3px; width: 90%; margin-left: 4%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
			          <option selected="true" style="font-size: 13px" hidden=""><?php echo $row['type_document']; ?></option>
			          <?php echo $options;?>
			        </select>
      			</div> 
            </div> 
			</div>
            <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 33px; font-size: 12px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-primary rounded-0" style="width: 20%;margin-top: -1%; height: 33px; font-size: 12px;"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none;">
            <div class="modal-header" style="background-color: #E60026; height: 40px">      
		      <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%;"><span><i class="fas fa-trash" style="color: #F0F0F0;"></i></span> Delete Confirmation</h5>
		     </div>
            <div class="modal-body" style="border: none; margin-top: 2%;">    
                <p class="text-center" style="font-size: 14px; color: black; font-weight: 550;">Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer" style="border: none; margin-top: -3%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px; border: none; margin-left: -28%"> No</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px;  border: none; margin-right: 28%"> Yes</a>
            </div>

        </div>
    </div>
</div>

<!-- send modal -->
<div class="modal fade" id="send_modal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['id']; ?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">      
		      <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Send File</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		     </div>
            <div class="modal-body">
		        <table id="recUser" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #A8A8A8; color: white; font-size: 12px;">
            <!--search-->
            <div class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="text" class="searchDept form-control" placeholder="Search by department" style="font-size: 12px; float: right; margin-left: 51%; margin-top: 1px; margin-bottom: 1%; width: 50%; height: 30px; border-radius: 0px; background-color: #F5F5F5;">
            </div>

            <tr class="myHead">
              <th style="width: 40%; text-align: left; font-size: 11px">NAME</th>
              <th style="width: 35%; text-align: left; font-size: 11px">POSITION</th>
              <th style="width: 25%; text-align: left; font-size: 11px">DEPARTMENT</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM register where usertype = 'Receiving Officer' and status =0";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: left;' id='".$row['id']."'>".$row['fullname']."</td>
                  <td style='text-align: left;'>(".$row['usertype'].")</td>
                  <td style='text-align: left;'>".$row['department']."</td>
                  <td>
                    <button id='send_btn_".$row['id']."' href='#' class='btn btn-sm m-0' role='button' data-toggle='tooltip'title='Send Document' style='font-size: 18px; color: #3993DE;' onclick='sendDocu(".$row['id'].")'><span><i class='fas fa-paper-plane'></i></span></button>
                  </td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
            <div class="modal-footer" style="height: 50px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> No</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> Yes</a>
            </div>


<style>
	.upload-box{
    font-size: 14px;
    background-color: white;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button{
    color: white;
    background: #357EDD;
    border: none;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button:hover{
    background: #2C5EBA;
  }
</style>
