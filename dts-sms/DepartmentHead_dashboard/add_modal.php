<?php require_once'add.php';?>
<?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
            $department = $_SESSION['department'];
            $query = "SELECT * FROM tbl_typedocument WHERE department = '$department'";
            $result = mysqli_query($conn, $query);
            $options = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options = $options."<option>$row2[2]</option>";
            }

          ?>
<!-- Add New File-->
<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 45%;">
        <div class="modal-content">
          	<div class="modal-header">      
		      <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Upload File</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		     </div>
            <div class="modal-body" class="modal fade">
			<div class="container-fluid">
			<form method="POST" action="add.php"  enctype="multipart/form-data">
			<div class="modal-body">
				 <div class=" form-group">
	       		<label style="font-size: 13px;">Tracking Number: </label>
	       			<input class="form-control" name="tracking_no" value="<?php echo $tracking_no;?>" readonly="" style="font-size: 13px;margin-top: -3%; width: 100%;">
	       </div>

				 <div class=" form-group">
				 	<span class="asterisk" style="color: red;">*</span>
	       			  <label style="font-size: 13px;">File Name: </label>
	       			  	<input class="form-control" type="text" id="file_name" name="file_name" onkeyup = "Validate_filename(this)" data-toggle="tooltip" title="A file name can't contain the following characters: \ /:*?`<>|" required style="font-size: 13px;margin-top: -3%; width: 100%;">
        				<div id="errLast"></div>
	       			  	
	      	</div>
	      		  <div class=" form-group">
			       <label style="font-size: 13px;">File Description</label>
			       	<textarea class="form-control" name="file_description" placeholder="Write a brief description of the file you've selected." style="font-size: 13px;height:100px; margin-top: -3%; width: 100%;"></textarea>
      			 </div>
      			 <div class=" form-group">
      			 	<span class="asterisk" style="color: red;">*</span>
			       <label style="font-size: 13px;">Attach File:</label>
			       	<input type="file" class="form-control" name="myfile" style="font-size: 13px;margin-top: -3%; width: 100%;">
      			 </div>
				  <div class=" form-group">
				  	<span class="asterisk" style="color: red;">*</span>
			       <label style="font-size: 13px;">Type of Document</label>
			       <select id="typeD" name="type_document" class="form-control" style="font-size: 13px;margin-top: -3%; width: 100%;"> 
			          <option selected="true" disabled="disabled">Select here</option>
			          <?php echo $options;?>
			        </select>
      			</div> 
			</div>
            </div> 
			</div>
            <div class="modal-footer" style="margin-top: -5%">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
            </div>

        </div>
    </div>
</div>

<style>


</style>

<script>

  //ito ang gamitin ko kapag i validate ko na din ang file name ng add docu hehe
function Validate_filename(file_name){
  file_name.value = file_name.value.replace(/[^a-zA-Z_'\n\rA-Za-z0-9\s]+/g, '');
}

</script>