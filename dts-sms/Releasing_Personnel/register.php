<?php
include('js/script.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container">
      <?php 
          if (isset($_SESSION['status']))
          {
            ?> 
            <div class="alert alert-success alert-right" role="alert" max-width="50px"><?php echo $_SESSION['status']; ?>
          </div>  

            <?php
            unset($_SESSION['status']);
          }
          ?>
      <div class="imgcontainer">
          <img src="img/reg.png" width="150px" height="80px" style="vertical-align: left">
          <h2><b>Document Tracking System | Registration Form</b></h2>
          <style>
            .imgcontainer
            {
              text-align: left;
              margin: 0px 0 30px 0;
            }

            h2
            {
              font-size: 24px;
              font-weight: 700;
              margin-top: 5px;
              margin-bottom: 5px;
              color: #1F4E79;
            }
          </style>
          <hr>

      <div class="title">Fill out all the information below to set up the account.</div>
      <form action="register_code.php" method="POST">
        <div class="user-details">
            <div class="col-25">
            <label for="typeD">Select Department</label>
          </div>
          <div class="col-75">
            <select id="department" name="department">
              <option selected="true" disabled="disabled">Select department</option>
              <option value="ict">ICT Department</option>
              <option value="bce">BCE Department</option>
              <option value="thm">THM Department</option>
              <option value="bacomm">BACOMM Department</option>
            </select>
          </div>           
          <div class="input-box">
            <span class = "required error" id="firstname-info"> First Name </span>
            <div class="inputGroupContainer">
            <input type="text" id="fname" name="firstname" placeholder="Enter your first name" required>
          </div>
          </div>

          <div class="input-box">
            <span class = "required error" id="lastname-info"> Last Name </span>
            <input type="text" id="lname" name="lastname" placeholder="Enter your last name" required>
          </div>

          <div class="input-box">
            <span class = "required error" id="email-info"> Username </span>
            <input type="text" placeholder="ex. juandelacruz22" name="email" id="email" required>
          </div>

          <div class="input-box">
            <span class="required error" id="signup-password-info">Password</span>
            <input type="password" placeholder="Enter Password" name="password" id="psw" data-minLength="5"
                       data-error="some error" required>
          </div>

          <div class="input-box">
            <span class="required error" id="confirm-password-info">Confirm Password</span>
            <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" data-match-error="some error 2" required>
          </div>

          <div class="input-box">
            <span class="required error" id="number-info">Phone Number</span>
            <input type="text" name="num" placeholder="Phone Number" onkeypress="javascript:return isNumber(event)" required>
          </div>
<!---
          <div class="gender-details">
            <span class="gender-title">Gender</span>
            
            <div class="category">
              <label for="dot-1">
                <input type="radio" name="Gender" id = "dot-1">
                <span class="one"></span>
                
                <span class="Gender">Male</span>
                
              </label>
              <label for="dot-2">
                <input type="radio" name="Gender" id = "dot-2">
                <span class=" two"></span>
                
                <span class="Gender">Female</span></div>
                <hr>--->

          <!-- register button -->

          <label class="lbl1">By creating an account you agree to our <a href="#">Terms & Privacy</a>.<br>
          <label class="lbl">Already have an account? <a href="#">Login</a>

          <div class="btnCancel">
            <input type="submit" value ="Cancel" name="btnCancel">
          </div>
          <div class="btnRegister">
          <input type="submit" value="Register" name="btnRegister">
          </div>    
</div>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body {
  display: flex;
  height: 100vh;
  justify-content: center;
  align-items: center;
  background: white;
  position: fixed;
}
.col-25{
  display: inline-block;
  height: 30px; 
  width: 100%;
  padding-left: -1px;
  font-size: 16px;
  align-items: inherit;
  transition: all 0.3 ease;
}
.col-75
{
  float: left;
  width: 75%;
  margin-top: -2px;
  margin-bottom: 20px;
}
.container{
  max-height: 900px;
  height: 100%;
  max-width: 1350px;
  width: 83%;
  /*margin-left: 18%;*/
  background: white;
  padding: 40px 50px;
  border-radius: 5px;
}
.container .title{
  font-size: 18px;
  font-weight: 500;
  position: relative;
}
.container form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 30px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 3 - 50px);
}
.user-details .input-box .details{
  display: block;
  font-weight: 500;
  margin-bottom: 4px;
}
.user-details .input-box input{
  height: 35px; 
  width: 100%;
  outline: none;
  border-radius: 10px;
  border: 1px solid #ccc;
  padding-left: 20px;
  font-size: 12px;
  transition: all 0.3 ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: blue;
}
form .gender-details .gender-title{
  /* margin-bottom: 10px; */
  font-size: 18px;
  font-weight: 300;
}
form .gender-details .category{
    display: flex;
    width: 30%;
    margin: 10px 5px;
    justify-content: space-between;
}
.gender-details .category label {
  display: flex; 
  align-items: center;
}
.gender-details .category .dot {
  height: 18px;
  width: 18px;
  background: #d9d9d9;
  border-radius: 50%;
  margin-right: 5px;
  border: 5px solid transparent;
}
#dot-1:checked ~ .category label .one,
#dot-2:checked ~ .category label .two{

  border-color: #d9d9d9;
  background: #9b59b6;
}
form input [type="radio"]{
  display: none;
}
form .button{
  height: 45px;
  margin: 45px 0;
}
form .btnCancel input {
      border-radius: 7px;
      background: #AFABAB;
      border: medium none;
      color: white;
      height: 40px;
      left: 78%;
      position: fixed;
      bottom: 80px;
      width: 100px;
}
form .btnCancel input:hover{
  color: white;
  background: #2F5597;
  transition: 0.2s ease;
}
form .btnRegister input {
      border-radius: 7px;
      background: #86ABF9;
      border: medium none;
      color: white;
      height: 40px;
      left: 69%;
      position: fixed;
      bottom: 80px;
      width: 100px;
}
form .btnRegister input:hover{
  color: white;
  background: #2F5597;
  transition: 0.2s ease;
}
span {
  font-size: 14px;
}
</style>
<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 2000);

       $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstname: {
                validators: {
                    notEmpty: {
                      message: 'First name is required.'
                    },
                    stringLength: {
                        min: 3,
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_\.]+$/,
                    }
                }
            },
             last_name: {
                validators: {
                    notEmpty: {
                      //message: 'Last name is required.'
                    },
                    stringLength: {
                        min: 3,
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_\.]+$/,
                    }
                }
            },
           
            phone_number: {
                validators: {
                    notEmpty: {
                        //message: 'Please input a valid phone number'
                    },
                    stringLength: {
                        max: 11,
                        min: 11,
                    },
                    phone_number: {
                        //message: 'Active phone number are allowed'
                    }
                }
            },

   username: {
                validators: {
                    notEmpty: {
                        //message: 'Username is required'
                    },
                }
            },
          
  password: {
            validators: {
                identical: {
                    field: 'confirmPassword',
                    //message: 'Confirm your password below - retype your password'
                }
            }
        },
        confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    //message: 'The password and Confirm password not match'
                }
            }
         },
      
            
            }
        })
</script>            
        </div>
      </form>
    </div>
    </div>
  </body>
</html>