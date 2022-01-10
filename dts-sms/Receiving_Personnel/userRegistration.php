<?php 
if( !isset( $_SESSION ) ) session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>

	<div class="container register-form">
		<?php 
          if (isset($_SESSION['status']))
          {
            ?> 
            <div class="alert alert-success alert-right" role="alert" max-width="50px"><?php echo $_SESSION['status']; ?>
           </div>  

            <?php
            unset($_SESSION['status']);
          }
          if (isset($_SESSION['warning']))
          {
            ?> 
            <div class="alert alert-warning alert-right" role="alert" max-width="50px"><?php echo $_SESSION['warning']; ?>
           </div>  

            <?php
            unset($_SESSION['status']);
          }
          ?>
            <div class="form">
                <div class="note">
                	<div class="imgcontainer">
                		<img src="logo2.png" width="150px" height="80px" style="vertical-align: left">
                		<h2>Fill out all the information bellow to set up the account.</h2>
				          <style>
				            .imgcontainer
				            {
				              text-align: left;
				              margin: 0px 0 30px 0;
				              margin-left: 3%;
				            }
				            h2
				            {
				              margin-right: 17%;
				              float: right;
				              font-size: 20px;
				              margin-top: 20px;
				              margin-bottom: 5px;
				              color: #1F4E79;
				            }
				          </style>
         				 <hr>
                	</div>
                    
                </div>
                <?php
            include_once('connection_db/connection.php');
            $query = "SELECT * FROM tbl_department";

            $result2 = mysqli_query($conn, $query);

            $options = "";

            while($row2 = mysqli_fetch_array($result2))
            {
                $options = $options."<option>$row2[1]</option>";
            }

          ?>
                <div class="form-content">
                    <div class="row register-form">
                       <div class="col-md-6" style="margin-top: -5%;">
                         <form action="userRegistration_function.php" method="post">
                         	<div class="col-25">
				           <label for="typeD" style="margin-bottom: 4px; font-weight: 600;">Select Department:</label>
				          </div>
				         <div class="col-75">
				            <select id="department" name="department" class="form-control" style="font-size: 12px;" >
				              <option selected="true" disabled="disabled">Select department</option>
				              <?php echo $options;?>
				            </select>
	          			</div>
	          			<div class="form-group">
							<label for="firstname" style="margin-bottom: 4px; margin-top: 3%; font-weight: 600;">First name: </label>
							<input class="form-control" type="text" name="firstname" id = "txt" onkeyup = "Validate(this)" placeholder="Please enter your first name" style="font-size: 12px;" required /> 
                        	<div id="errFirst"></div>
                        </div> 

                        <div class="form-group">
							<label for="lastname" style="margin-bottom: 4px; margin-top: -1%; font-weight: 600;">Last name: </label> 
							<input class="form-control" type="text" name="lastname" id = "txt" onkeyup = "Validate(this)" placeholder="Please enter your last name" style="font-size: 12px;" required />  
                        	<div id="errLast"></div>
						</div>

						<div class="form-group">
            				<label for="phonenumber" style="margin-bottom: 4px; margin-top: -1%; font-weight: 600;">Phone Number: </label>
                    		<input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="11" onkeyup="validatephone(this);" placeholder="The phone number must be 11 digits long" style="font-size: 12px;" required/> 
            			</div>

            			<div class="form-group">
                			<label for="email" style="margin-bottom: 4px; margin-top: -1%; font-weight: 600;">Email:  <small style="font-size: 11px;" class="form-text text-muted">By providing an email address, it will help you to restore your account password.</small> </label> 
                    		<input class="form-control" type="text" name="email" id = "email" onkeyup = "email_validate(this)" placeholder="e.g (sticollegecotabato@gmail.com)" style="font-size: 12px;" required />  
                        	<div id="errLast"></div>
            			</div>

            		   <div class="form-group">
                        <label for="bday" style="margin-bottom: 4px; margin-top: -1%; font-weight: 600;">Date Of Birth:</label>
                        <input type="date" name="bday" id="bday" class="form-control" style="font-size: 12px;" required>
                        <span id="error_dob" class="text-danger"></span>
                       </div>
                        </div>

                        <div class="col-md-6" style="margin-top: -5%;">
                           <div class="form-group">
                			<label for="username" style="margin-bottom: 4px; font-weight: 600;">Username:  <small class="form-text text-muted" style="font-size: 11px">This will be your login username.</small> </label> 
                    		<input class="form-control" type="text" name="username" id = "username" onkeyup = "Validate_username(this)"  minlength="6" placeholder="Minimum of 6 letters" style="font-size: 12px;" required />  
                        	<div id="errLast"></div>
            			 </div>

	            	<div class="form-group">
	                	<label for="password" style="margin-bottom: 4px; margin-top: -2%; font-weight: 600;">Password: </label>
	                	<input required name="password" type="password" class="form-control inputpass" minlength="6" placeholder="Enter a valid password" id="password" onkeyup="passwordChecker()" style="font-size: 12px;"/>
	                	<button class="btn btn-defaultCUST" id="view_button3" style="font-size: 12px;font-weight: 600;color: green;height: 30px; width: 48px;margin-left: 101%;" type="button">Show</button>
	            	</div>

		            <div class="form-group" style="margin-bottom: 5px;">
		                    <div class=""></div><div class="col-sm-4 col-md-10 col-lg-20 col-xs-10 mobilePad" id="message8" style=" font-size: 9pt; margin-left: 8%; font-weight: 500;"></div>                      

		                           <div class="col-sm-4 col-md-4 col-lg-5 col-xs-1"></div><div class="col-sm-8 col-md-8 col-lg-7 col-xs-10 mobilePad" id="message" style=" font-size: 9pt; margin-left: 23%;"></div>
		                            <div class="col-sm-4 col-md-4 col-lg-5 col-xs-1"></div><div class="col-sm-8 col-md-8 col-lg-7 col-xs-10 mobilePad" id="message2" style=" font-size: 9pt; margin-left: 23%;"></div>
		                            <div class="col-sm-4 col-md-4 col-lg-5 col-xs-1"></div><div class="col-sm-8 col-md-8 col-lg-7 col-xs-10 mobilePad" id="message3" style=" font-size: 9pt; margin-left: 23%;"></div>
		                            <div class="col-sm-4 col-md-4 col-lg-5 col-xs-1"></div><div class="col-sm-8 col-md-8 col-lg-7 col-xs-10 mobilePad" id="message4" style=" font-size: 9pt; margin-left: 23%;"></div>
		                            <div class="col-sm-4 col-md-4 col-lg-5 col-xs-1"></div><div class="col-sm-8 col-md-8 col-lg-7 col-xs-10 mobilePad" id="message5" style=" font-size: 9pt; margin-left: 23%;"></div> 
		                            <div class="col-sm-4 col-md-4 col-lg-5 col-xs-1"></div><div class="col-sm-8 col-md-8 col-lg-7 col-xs-10 mobilePad" id="message6" style=" font-size: 9pt;padding-left: 0px; margin-left: 23%;"></div>
		                            <div class="col-sm-4 col-md-4 col-lg-5 col-xs-1"></div><div class="col-sm-8 col-md-8 col-lg-7 col-xs-10 mobilePad" id="message7" style=" font-size: 9pt;padding-left: 0px; margin-left: 23%;"></div>
		            </div>

		            <div class="form-group">
		                  <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" id="message1" style="font-weight: bold; text-align: center;font-size: 10pt;">
		                  </div>
		              </div> 

		            <div class="form-group">
		            	<label for="password" style="margin-bottom: 4px; margin-top: 1%;  font-weight: 600;">Confirm Password: </label>
		            	<input required name="verifypassword" type="password" class="form-control inputpass" minlength="6" placeholder="Enter again to validate"  style="font-size: 12px;" id="verifypassword" onkeyup="checkPass(); return false;"/><span id="confirmMessage" class="confirmMessage"></span>       
		            </div> 
 
                       <div class="form-group">
                       	<label for="address" style="margin-bottom: 4px; margin-top: -2%; font-weight: 600;">Address: <small class="form-text text-muted">Province / City/Municipality / House#,block,lot,building,etc. / Street address,village / Barangay</small></label>
                       	<textarea name="address" id="address" class="form-control" style="font-size: 12px; height:142px" required></textarea>
                       </div>
                       </div>
                    </div>

                   <div class="form-group">
                	<input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label>
                	<br>
                	<label class="lbl">Already have an account? <a href="index.php">Login</a>.</label>
            	  </div>
            	 <br>
                 <div class="form-group">
              		<div style="text-align:center;">
                		<input class="btn btn-success" type="submit" name="submit_reg" value="Register">
                		<input class="btn btn-danger" type="submit" name="cancel" value="Cancel" onclick="document.location.href='http://localhost/doc_tracking_system/userRegistration.php';">
              		</div>
            	</div>
               </form>
              </div>
           </div>

</body>
  

<style>
*{
	font-size: 13px;
}
.btn{
	width: 20%;
	margin-top: 1%;
	height: 6%;
	margin: 5px;
	margin-bottom: -35px;
	margin-top: -30px;
}
p{
	font-size: 22px;
}
body {
	background-color: white;
}
.note
{
	font-weight: 500;
    text-align: center;
    height: 80px;
    background: #DCDCDC;
    color: #fff;
    line-height: 90px;
    width: 75%;
    margin-left: 15%;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
    width: 75%;
    margin-left: 15%;
    background-color: #F5F5F5;
}

.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #5CB323;
    color: #fff;
}

.btnCancel
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #AFABAB;
    color: #fff;
}

</style>
<script type="text/javascript">
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 2000);

 document.getElementById("field_terms").setCustomValidity("Please check the box indicating that you agree to the terms and conditions.");

$(document).ready(function() {
 $("#view_button3").bind("mousedown touchstart", function() {
        $("#password").attr("type", "text");
    }), $("#view_button3").bind("mouseup touchend", function() {
        $("#password").attr("type", "password");
    }), $("#view_button4").bind("mousedown touchstart", function() {
        $("#verifypassword").attr("type", "text");
    }), $("#view_button4").bind("mouseup touchend", function() {
        $("#verifypassword").attr("type", "password")
    })
});
function passwordChecker(){
     $('#verifypassword').val('');
     $('#message1').html(''); $('#message8').html(''); $('#message10').html('');
     $('#message').html('');$('#message2').html('');$('#message3').html('');$('#message4').html('');$('#message5').html('');$('#message6').html('');$('#message7').html('');
     if($('#password').val().length>=4){
     if(newValPassPoilcy()===true ){
     $('#message').css('color','green');
     $('#message').html('Although looks like a good password, attempt to make it even stronger.');
     if($('#password').val().length>=9){
     $('#message').html('');
     $('#message1').html('');
} 
    return true;
    }
   }
}
function NumAndWordRep(){
     var password = $('#password').val().toLowerCase();
     if(password.match(/(.)\1\1/)){
     //  alert("Your Password cannot contain Character or Number repetition");
     $('#message7').css('color','red');
     $('#message7').html('Repeated characters or numbers are not allowed in your password.');
        return false;
     }
        return true;
    }
function userNameAsPass(){
     var password = $('#password').val().toLowerCase();
     var uname=$('#username').val().toLowerCase();
                                
     var uname1 = new RegExp(uname);
     if(null!==uname &&''!==uname){
     if( uname1.test(password)){
                                        
     $('#message6').css('color','red');
     $('#message6').html('Your Password cannot contain your Username.');
       return false;
     }}
       else{
     $('#message6').html('');
     $('#message10').css('color','red');
     $('#message10').css('font-weight','bold');
     $('#message10').html('Please enter your username first');
     return false;
     }
      return true;
                                
      }

 function  newValPassPoilcy(){                            
    var password = $('#password').val();
    if(!password.match(/^(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&_+=\\*\\-\\(\\)\\{\\}\\:\\;\\<\\>\\|\\,\\.\\?\\/\\'\\"]).*$/) || userNameAsPass()===false || NumAndWordRep()===false){
                                        
    $('#message8').css('color','red');
    $('#message8').html('Your password must contain the following characters:');
    if(!password.match(/^(?=.{6,}).*$/)){
    $('#message').css('color','red');
    $('#message').html(' - minimum of 6 characters');
                                         
   }
    if(!password.match(/^(?=.*[0-9]).*$/)){
    $('#message2').css('color','red');
    $('#message2').html(' - at least 1 number');
                                          
   }
    if(!password.match(/^(?=.*[a-z]).*$/))
   {
    $('#message3').css('color','red');
    $('#message3').html(' - at least 1 lowercase character');
                                      
   }
    if(!password.match(/^(?=.*[A-Z]).*$/)){
   $('#message4').css('color','red');
   $('#message4').html(' - at least 1 uppercase character');
                                          
   }
   if(!password.match(/^(?=.*[!@#$%^&_+=\\*\\-\\(\\)\\{\\}\\:\\;\\<\\>\\|\\,\\.\\?\\/\\'\\"]).*$/)){
                                         
   $('#message5').css('color','red');
   $('#message5').html(' - at least 1 special character in (!@#$%^&*)');
                                         
   }
   if(userNameAsPass()===false){
   if(password.match(/^(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&_+=\\*\\-\\(\\)\\{\\}\\:\\;\\<\\>\\|\\,\\.\\?\\/\\'\\"]).*$/)){
   $('#message8').html('');  
   }
                                        
   }
   if(NumAndWordRep()===false){
   if(password.match(/^(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&_+=\\*\\-\\(\\)\\{\\}\\:\\;\\<\\>\\|\\,\\.\\?\\/\\'\\"]).*$/)){
   $('#message8').html('');  
   }
                                          
   } 
       return false;
   } 
       else{
                                         
       return true;
   }
                                     
   } 

function userNameAsPass(){
        var password = $('#password').val().toLowerCase();
        var uname=$('#username').val().toLowerCase();
                                
        var uname1 = new RegExp(uname);
        if(null!==uname &&''!==uname){
        if( uname1.test(password)){
                                        
        $('#message6').css('color','red');
        $('#message6').html('You cannot use your username as a password.');
        return false;
        }}
        else{
           $('#message6').html('');
           $('#message10').css('color','red');
           $('#message10').css('font-weight','bold');
           $('#message10').html('Please enter your username first.');
           return false;
          }
           return true;                     
           }

function checkPass()
{
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('verifypassword');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        //The passwords match. 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password matched"
    }else{
        //The passwords do not match.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Password not match"
    }
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

//ito ang gamitin ko kapag i validate ko na din ang file name ng add docu hehe
function Validate_username(username){
	username.value = username.value.replace(/[^a-zA-Z-'\n\rA-Za-z0-9\s]+/g, '');
}

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
// validate date of birth
function dob_validate(dob)
{
var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

    if(regDOB.test(dob) == false)
    {
    document.getElementById("statusDOB").innerHTML  = "<span class='warning'>DOB is only used to verify your age.</span>";
    }
    else
    {
    document.getElementById("statusDOB").innerHTML  = "<span class='valid'>Thanks, you have entered a valid DOB!</span>";   
    }
}
// validate address
function add_validate(address)
{
var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;
  
    if(regAdd.test(address) == false)
    {
    document.getElementById("statusAdd").innerHTML  = "<span class='warning'>Address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("statusAdd").innerHTML  = "<span class='valid'>Thanks, Address looks valid!</span>";    
    }
}

</script>