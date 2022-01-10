<?php require_once 'add.php'; ?>

<!-- Add New File-->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
			<div class="modal-header">      
		      <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Create Users</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		     </div>
            <div class="modal-body" class="modal fade">
			<div class="container-fluid">
			<form method="POST" action="addUserFunction.php">
			<div class="modal-body">

	<!--- DROPDOWN/SELECTION BOX FUNCTION START--->
			<?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM tbl_department";
            $result = mysqli_query($conn, $query);
            $options = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options = $options."<option>$row2[1]</option>";
            }

          	?>
			<div class=" form-group">
			  <label style="font-size: 13px;">Department</label>
			  <select id="department" name="department" class="form-control" style="font-size: 13px;margin-top: -3%; width: 100%;">
				  <option selected="true" disabled="disabled" value="<?php echo $row['department']; ?>" ></option>
				   <?php echo $options;?>
			  </select>
      		</div> 
    <!--- END --->
    
      		<div class=" form-group">
      			<label style="font-size: 13px;">User type: </label>
      			<div class="form-check">
					<input class="form-check-input" type="radio" name="usertype" value="Employee" style="font-size: 13px;"/> Employee
      			</div>
      		</div>

				 <div class=" form-group">
	       			  <label style="font-size: 13px;">First name: </label>
	       			  	<input class="form-control" type="text" name="firstname" id = "txt" onkeyup = "Validate(this)" placeholder="Enter first name" style="font-size: 13px;margin-top: -3%; width: 100%;" required /> 
                        	<div id="errFirst"></div>
	      		  </div>


				 <div class=" form-group">
	       			  <label style="font-size: 13px;">Last name: </label>
	       			  	<input class="form-control" type="text" name="lastname" id = "txt" onkeyup = "Validate(this)" placeholder="Enter last name" style="font-size: 13px;margin-top: -3%; width: 100%;" required /> 
                        	<div id="errFirst"></div>
	      		  </div>


	      		  <div class=" form-group">
	       			  	<label for="email" style="font-size: 13px;">Email address:  <small style="font-size: 11px;" class="form-text text-muted">By providing an email address, it will help you to restore your account password.</small> </label> 
                    		<input class="form-control" type="text" name="email" id = "email" onkeyup = "email_validate(this)" placeholder="e.g (sticollegecotabato@gmail.com)" style="font-size: 13px;margin-top: -3%; width: 100%;" required />  
                        	<div id="errLast"></div>
	      		  </div>

	      		  <div class=" form-group">
			       <label style="font-size: 13px;">Date of birth:</label>
			       <input type="date" class="form-control" id="bday" name="bday" value="<?php echo $row['bday']; ?>" style="font-size: 13px;margin-top: -3%; width: 100%; margin-left: -1%;">
      			 </div>


      			 <div class=" form-group">
	       			  <label style="font-size: 13px;">Username: </label>
	       			  	<input class="form-control" type="text" name="username" id = "username" onkeyup = "Validate_username(this)"  minlength="6" placeholder="Minimum of 6 letters" style="font-size: 13px;margin-top: -3%; width: 100%;" required />  
                        	<div id="errLast"></div>
	      		  </div>


	      		  <div class=" form-group">
	       			  <label style="font-size: 13px;">Password: </label>
	       			  	<input required name="password" type="password" class="form-control inputpass" minlength="6" placeholder="Enter a valid password" id="password" onkeyup="passwordChecker()" style="font-size: 13px;margin-top: -3%; width: 100%;"/>
	      		  </div>

	      		  <div class=" form-group">
	       			  <label style="font-size: 13px;">Phone number: </label>
	       			  	<input required type="text" name="phone_number" id="phone" class="form-control phone" maxlength="11" onkeyup="validatephone(this);" placeholder="The phone number must be 11 digits long" style="font-size: 13px;margin-top: -3%; width: 100%;" required/> 
	      		  </div>

	      		   <div class=" form-group">
	       			  <label for="address" style="margin-bottom: 4px; margin-top: -2%;">Address: <small class="form-text text-muted"> House#,block,lot,building,etc./ Street name/ Barangay/ City/Municipality/ Province</small></label>
	       			  	<textarea class="form-control" name="address" placeholder="Write your complete address" style="font-size: 13px;height:100px; margin-top: -3%; width: 100%;" required></textarea> 
	      		  </div>
			</div>
            </div> 
			</div>
            <div class="modal-footer" style="margin-top: -3%">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="addUser" class="btn btn-primary" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
            </div>

        </div>
    </div>
</div>

<style>


</style>

<script>
	
	// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\rA-Za-z\s]+/g, '');
}

// validate email
function email_validate(email)
{
	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function Validate_username(username){
	username.value = username.value.replace(/[^a-zA-Z-'\n\rA-Za-z0-9\s]+/g, '');
}

function validatephone(phone) 
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}

</script>