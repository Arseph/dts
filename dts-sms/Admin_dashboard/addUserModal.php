<!-- Add New File-->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 65%;">
        <div class="modal-content" style="border: none;">
            <div class="modal-header" style="background-color: #0062CC; height: 40px">   
 	            <h4 class="modal-title" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%"><span><i class="fas fa-user-plus"></i></span> &nbsp;Add Employee</h4>   
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #F0F0F0; margin-top: -3.5%">&times;</button>
		     </div>
            <div class="modal-body" class="modal fade">
			<div class="container-fluid">

			<form method="POST" action="addUserFunction.php" id="form" onSubmit="return valid();">
			<div class="modal-body">

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

          <div style="margin-top: -3%; border-bottom: 1px solid lightgrey; margin-bottom: 2.5%;">
          	<small style="font-style: italic; font-weight: 550; color: red; font-size: 12px;">Fields with </small><small style="color: red;">*</small><small style="font-style: italic; font-weight: 550; color: red; font-size: 12px;"> are required.</small>
          </div>

				 <div class="row form-group" style="margin-bottom: 2%">
				 	<div class="col-sm-6">
	       			  <label style="font-size: 13px; margin-top: -8%;"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Full Name: <span style="font-size: 11px; color: gray">(Last Name/First Name/Middle Name) <span></label>
	       			  	<input class="form-control rounded-0" type="text" name="fullname" id = "fullname" onkeydown="validationName()" placeholder="Smith, David A." style="font-size: 13px;margin-top: -3%;"  /> 
                        <span id="text1" style="font-size: 11px; font-weight: 500; margin-top: 3px; font-style: italic;"></span>
                   </div>
                   <div class="col-sm-6">
	       			 	<label style="font-size: 13px;"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Department:</label>
			       		  <select id="department" name="department" class="form-control rounded-0" style="font-size: 13px;margin-top: -3%;">
			       			<option selected="true" disabled="disabled">Select here</option>
			          		<?php echo $options;?>
			        	  </select>
			        	  <div>
			        	  	<a href="#myModal2" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left: 93%; margin-top: -8%"></i></a>
			        	  </div>
	       			 </div>
	      		 </div>

	      		  <div class="row form-group" style="margin-bottom: 2%">
	      		  	<div class="col-sm-6">
	       			  	<label for="email" style="font-size: 13px;"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Email Address:</label> 
                    		<input class="form-control rounded-0" type="text" name="email" id = "email" maxlength="30" onkeydown="validationEmail()" placeholder="ex. (name@example.com)" style="font-size: 13px;margin-top: -3%;" />  
                        	<span id="text" style="font-size: 11px; font-weight: 500; margin-top: 3px; font-style: italic;"></span>
                    </div>
                    <div class="col-sm-6">
	       			  <label style="font-size: 13px;"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Mobile Number: </label>
	       			  	<input  type="tel" name="phone_number" id="phone_number" class="form-control phone rounded-0" maxlength="11" onkeydown="validationPhone()" placeholder="ex. 09123456789" style="font-size: 13px;margin-top: -3%;" pattern = "((^(\+)(\d){12}$)|(^\d{11}$))" /> 
	       			  	<span id="text2" style="font-size: 11px; font-weight: 500; margin-top: 3px; font-style: italic;"></span>
	       			 </div>
	      		  </div>

      			 <div class="row form-group" style="margin-bottom: 2%">
      			 	<div class="col-sm-6">
	       			  <label style="font-size: 13px;"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Username: </label>
	       			  	<input class="form-control rounded-0" type="text" name="username" id = "username" onkeyup = "Validate_username(this)" minlength="6" placeholder="Minimum of 6 letters" style="font-size: 13px;margin-top: -3%;"  />  
                        	<div id="errLast"></div>
                    </div>
                    <!--<div class="col-sm-6">
                    	<label style="font-size: 13px;"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Password: </label>
	       			  	<input  name="password" type="text" class="form-control inputpass rounded-0" maxlength="45" placeholder="Generate password" id="password" onkeyup="passwordChecker()" style="font-size: 13px;margin-top: -3%; background-color: white; color: blue;" readonly />
	       			  	<div class="input-group-append rounded-0">
						    <a type="button" class="generate" onclick="generate()">
						    	<span class="input-group-text rounded-0" id="basic-addon2">Generate</span>
						    </a>
						 </div>
                    </div>-->
	      		  </div>


	      		   <div class="row form-group" style="margin-bottom: 2%">
	      		   	 	<label for="address" style="font-size: 13px;">Address: <small class="form-text text-muted"> House#,block,lot,building,etc./ Street name/ Barangay/ City/Municipality/ Province</small></label>
	       			  	<textarea class="form-control rounded-0" name="address" placeholder="Write your complete address" style="height:142px; font-size: 12px;" ></textarea> 
	      		  </div>
			</div>
            </div> 
			</div>
            <div class="modal-footer" style="border: none; margin-top: -3%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px; border: none; margin-left: -28%"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="addNewEmployee" class="btn btn-info" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px;  border: none; margin-right: 28%"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
            </div>

        </div>
    </div>
</div>

<style>
	.input-group-append, .input-group-text  {
		margin-top: -8%;
		font-size: 13px;
		float: right;
		cursor: pointer;
		background-color: #DADADA;
	}
</style>

<div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" style="max-width: 30%;">
      <div class="modal-content" style="background-color: #F2F2F2; margin-top: 20%;">
       <div class="container"></div>
        <div class="modal-body" class="modal fade">
        <form method="POST" action="addDepartmentFunction.php">
          <div class="container-fluid">
          	 	<div class="form-group">
	          		<br>
	                <label style="font-size: 13px; margin-bottom: 4%;">&nbsp;Add New Department: &nbsp;</label>
		       		<input required name="addDepartment" type="addDepartment" class="form-control rounded-0" placeholder="Enter here" id="addDepartment" required style="font-size: 13px;margin-top: -3%;"/>
            	</div>
          </div>
          <div class="modal-footer" style="height: auto;">
          <a href="#" data-dismiss="modal" class="btn btn-secondary" style="font-size: 12px; width: 20%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-left: -28%">Cancel</a>
          <button type="submit" name="add_dept" class="btn btn-primary"  style="font-size: 12px; width: 20%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 28%">Save</button>  
          </div>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
//generate password

function generate()
{
	var charset="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ@";
	var passwordLength=6;
	var password="";
	for (var i=0;i<passwordLength;i++){
		var randomnum = Math.floor(Math.random()*charset.length);
		password += charset.substring(randomnum,randomnum+1);
	}
	document.getElementById("password").value = password;

}

	// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\rA-Za-z,.\s]+/g, '');
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


//email validation
	function validationEmail()
	{
		var form = document.getElementById("form");
		var email = document.getElementById("email").value;
		var text = document.getElementById("text");
		var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

		if (email.match(pattern))
		{
			form.classList.add("valid");
			form.classList.remove("invalid");
			text.innerHTML = "";
			text.style.color = "green";
		}
		else
		{
			form.classList.remove("invalid");
			form.classList.add("valid");
			text.innerHTML = "Incorrect email. The email should be in this format (abc@gmail.com)";
			text.style.color = "#ff0000";
		}
		if (email == "")
		{
			form.classList.remove("valid");
			form.classList.remove("invalid");
			text.innerHTML = "";
			text.style.color = "#00ff00";
		}
	}

  //fullname validation
  function validationName()
  {
    var form = document.getElementById("form");
    var fullname = document.getElementById("fullname").value;
    var text = document.getElementById("text1");
    var pattern = /^[a-zA-Z/./,/ ]+$/;

    if (fullname.match(pattern))
    {
      form.classList.add("valid");
      form.classList.remove("invalid");
      text.innerHTML = "";
      text.style.color = "green";
    }
    else
    {
      form.classList.remove("invalid");
      form.classList.add("valid");
      text.innerHTML = "The name should not contain numbers and/or special characters.";
      text.style.color = "#ff0000";
    }
    if (fullname == "")
    {
      form.classList.remove("valid");
      form.classList.remove("invalid");
      text.innerHTML = "";
      text.style.color = "#00ff00";
    }
  }

      //phone number validation
  function validationPhone()
  {
    var form = document.getElementById("form");
    var phone_number = document.getElementById("phone_number").value;
    var text = document.getElementById("text2");
    var pattern = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;

    if (phone_number.match(pattern))
    {
      form.classList.add("valid");
      form.classList.remove("invalid");
      text.innerHTML = "";
      text.style.color = "green";
    }
    else
    {
      form.classList.remove("invalid");
      form.classList.add("valid");
      text.innerHTML = "Mobile numbers should not contain letters and/or special characters.";
      text.style.color = "#ff0000";
    }
    if (phone_number == "")
    {
      form.classList.remove("valid");
      form.classList.remove("invalid");
      text.innerHTML = "";
      text.style.color = "#00ff00";
    }
  }
</script>