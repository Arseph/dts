<?php
include('js/script.php');
session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form action="register_code.php" method="post" id="fileForm" role="form">
            <fieldset><legend class="text-center">Fill out the information bellow to set up the account. <span class="req"><small> required *</small></span></legend>

         <div class="col-25">
            <label for="typeD">Select Department</label>
          </div>
          <div class="col-75">
            <select id="department" name="department" class="form-control">
              <option selected="true" disabled="disabled">Select department</option>
              <option value="ict">ICT Department</option>
              <option value="bce">BCE Department</option>
              <option value="thm">THM Department</option>
              <option value="bacomm">BACOMM Department</option>
            </select>
          </div>
          <br> 
            <div class="form-group">
            <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                    <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="11" onkeyup="validatephone(this);" placeholder="The phone number must be 11 digits long"/> 
            </div>

            <div class="form-group">     
                <label for="firstname"><span class="req">* </span> First name: </label>
                    <input class="form-control" type="text" name="firstname" id = "fname" onkeyup = "Validate(this)" placeholder="Please enter your first name" required /> 
                        <div id="errFirst"></div>    
            </div>

            <div class="form-group">
                <label for="lastname"><span class="req">* </span> Last name: </label> 
                    <input class="form-control" type="text" name="lastname" id = "lname" onkeyup = "Validate(this)" placeholder="Please enter your last name" required />  
                        <div id="errLast"></div>
            </div>
            <div class="form-group">
                        <label for="dob">Date Of Birth *</label>
                        <input type="date" name="dob" id="dob" class="form-control">
                        <span id="error_dob" class="text-danger"></span>
                    </div>

            <div class="form-group">
                <label for="username"><span class="req">* </span> Username:  <small>This will be your login username</small> </label> 
                    <input class="form-control" type="text" name="username" id = "uname" onkeyup = "Validate(this)" placeholder="Minimum of 6 letters" required />  
                        <div id="errLast"></div>
            </div>

            <div class="form-group">
                <label for="password"><span class="req">* </span> Password: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>

                <label for="password"><span class="req">* </span> Confirm Password: </label>
                    <input required name="confirm_password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
                        <span id="confirmMessage" class="confirmMessage"></span>
            </div>

            <div class="form-group">
            
                <?php //$date_entered = date('m/d/Y H:i:s'); ?>
                <input type="hidden" value="<?php //echo $date_entered; ?>" name="dateregistered">
                <input type="hidden" value="0" name="activate" />
                <hr>

                <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
            </div>

            <div class="form-group">
              <div style="text-align:center;">
                <input class="btn btn-danger" type="submit" name="submit_reg" value="Cancel" disabled="">
                <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
              </div>
            </div>

            </fieldset>
            </form><!-- ends register form -->

<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
        </div><!-- ends col-6 -->

    </div>
</div>

<style>

body {
    padding-top:50px;
}
fieldset {
    border: thin solid #1F4E79; 
    border-radius: 4px;
    padding: 20px;
    padding-left: 40px;
    background: #fbfbfb;
}
legend {
   color:black;
   font-size: 20px;
}
.form-control {
    width: 95%;
}
label small {
    color: #678 !important;
}
span.req {
    color:red;
    font-size: 112%;
}
.row{
    margin-left: 25%;
    width: auto;
    display: block;
    position: relative;
}
html body {
    background-color: #AEC7FB;

}
</style>

<script>
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
                                         $('#message10').html('Please enter your username first !!');
                                         return false;
                                    }
                                    return true;
                                
                                }
    
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password Matched"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Password Do Not Match"
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
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\rA-Za-z0-9_]+/g, '');
}
// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML = "<span class='valid'>Thanks, you have entered a valid Email address!</span>"; 
    }
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