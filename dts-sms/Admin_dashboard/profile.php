<?php 
  session_start();
  include_once('connection_db/connection.php');
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $username = $_SESSION['username'];
  $usertype = $_SESSION['usertype'];
  #$department = $_SESSION['department'];
  #$address = $_SESSION['address'];

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Departmemnt Head | Document Tracking System</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body style="background-color: #F5F5F5;">
<!-----Top bar navigation---->
<div class="wrapper">
  <?php include_once"include/topbar.php"; ?>

  <?php include_once"include/sidebar.php";?>
</div>

<div class="main-content">
        <?php
        if(isset($_SESSION['errorStat'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            ".$_SESSION['errorStat']."
          </div>
          ";
          unset($_SESSION['errorStat']);
        }
        if(isset($_SESSION['success1'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            ".$_SESSION['success1']."
          </div>
          ";
          unset($_SESSION['success1']);
        }
      ?>
<style>
        .alert
        {
          font-size: 12px;
          width: 20%;
          margin-left: 77%;
          margin-top: -2.6%;
          float: right;
          margin-right: 1%;
          z-index: 1;
          position: fixed;
        }

          .main-content .info{
          margin: 10px;
          margin-left: 23.5%;
          color: #1F4E79;;
          margin-top: 20px;
          margin-bottom: 15px;
          font-size: 12px; 
          border-bottom: 1px solid #2F5597;

        }
</style>
</div>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="wrapper1 bg-white mt-sm-5" style="border: none">
    <h4 class="pb-4 border-bottom">Account Profile</h4>
    <div class="d-flex align-items-start py-3 border-bottom"> 
      <span>

<?php 
    $id = $_SESSION['id'];
    $image_query = mysqli_query($conn,"SELECT imageProfile FROM admin_account WHERE id='$id'");
    while($rows = mysqli_fetch_array($image_query))
    {
        $imageProfile = $rows['imageProfile'];
    ?>
    <img src="img/<?php echo $imageProfile; ?>" title="<?php echo $imageProfile; ?>" onerror="this.onerror=null; this.src='img/noimage2.png';" class="img">
    <?php
    }

?>
        
          <button type="button" class="btn d-flex align-items-start" data-toggle="modal" data-target="#upload_pic" style="font-size: 11px; font-weight: 550; color: blue; display: inline-block; margin-top: 4px;  border-radius: 50px; margin-left: -1%; margin-bottom: 4%">Change Image</button>
          <!--<button type="button" class="btn d-flex align-items-start" name=""style="font-size: 11px; font-weight: 550; color: blue; display: inline-block; margin-top: 4px;  border-radius: 50px; margin-left: -1%; margin-bottom: 4%">Remove Image</button>-->
 
          <button name="edit" id="edit" class="btn btn-secondary btn-sm" style="font-size: 11px; margin-left: 680%; width: 90%; border-radius: 50px;"><i class="fas fa-edit"></i> Edit profile</button>

      </span>

<?php  
$uname = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$sql = "SELECT * FROM admin_account WHERE username = '$uname'";
$result = mysqli_query($conn,$sql);

if($result)
{
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            ?>
            <div class="pl-sm-4 pl-2" id="img-section" style="margin-top: 2%"><b style="margin-left: -10%; font-size: 18px; "><?php echo $firstname; ?> <?php echo $lastname; ?>
            <?php
        }
    }
}

?>
      
      <p style="margin-left: -10%;"><?php echo $usertype; ?> Head</p></b>
        <!--<center><p><?php echo $username; ?></p></center>-->
      </div>
    </div>
    <div class="py-2">
   

    <form method="POST" action="profileFunction.php">

        <?php 
            $uname = $_SESSION['username'];
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            #$email = $_SESSION['email'];
            $sql = "SELECT * FROM admin_account WHERE username = '$uname'";
            $res = mysqli_query($conn,$sql);

            if ($res)
            {
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_array($res)){
                        //print_r($row['username']);
                        ?>

                        <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                        <div class="frow form-group" style="margin-bottom: -2%;">
                        <div class="form-inline">
                        <!--<label class="control-label" style="font-size: 14px; margin-right: 4%">First Name:</label>
                        <input style="font-size: 14px; font-weight: 500; padding: 10px; border: none; border-bottom: 1px solid gray; text-align: center; margin-right: 11%; width: 30%; background-color: white;" class="form-control rounded-0 fnameDisabled" value="<?php echo $firstname; ?>" name="updateFname" disabled></input>-->

                        <label class="control-label" style="font-size: 14px; margin-right: 4%;">First Name:</label>
                        <input style="font-size: 14px; font-weight: 500; padding: 10px; border: none; border-bottom: 1px solid gray; text-align: center; width: 30%; background-color: white; margin-right: 11%; " class="form-control rounded-0 fnameDisabled" value="<?php echo $row['firstname']; ?>" name="updateFname" disabled></input>

                        <!--<label class="control-label" style="font-size: 14px; margin-right: 3%">Last Name:</label>
                        <input style="font-size: 14px; font-weight: 500; padding: 10px; border: none; border-bottom: 1px solid gray; text-align: center; margin-right: 10%; width: 30%; background-color: white;" class="form-control rounded-0" value="<?php echo $lastname; ?>" name="updateFname" readonly></input>-->
                        
                        <label class="control-label" style="font-size: 14px; margin-right: 6%;">Last Name:</label>
                        <input style="font-size: 14px; font-weight: 500; padding: 10px; border: none; border-bottom: 1px solid gray; text-align: center; width: 30%; background-color: white " class="form-control rounded-0 emailDisabled" value="<?php echo $row['lastname']; ?>" name="updateLname" disabled></input>


                    </div>

                    <div class="frow form-group" style="margin-top: 5%;">
                        <div class="form-inline">
                        <label class="control-label" style="font-size: 14px; margin-right: 5%">Username:</label>
                        <input style="font-size: 14px; font-weight: 500; padding: 10px; border: none; border-bottom: 1px solid gray; text-align: center; margin-right: 10%; width: 30%; background-color: white " class="form-control rounded-0 unameDisabled" value="<?php echo $username; ?>" name="updateUname" disabled></input>

                        <label class="control-label" style="font-size: 14px; margin-right: 3%;">Phone Number:</label>
                        <input style="font-size: 14px; font-weight: 500; padding: 10px; border: none; border-bottom: 1px solid gray; text-align: center; width: 30%; background-color: white " class="form-control rounded-0 numDisabled" value="<?php echo $row['phone_number']; ?>"  name="updateNum" disabled></input>
                        </div>
                    </div>
                    <div class="frow form-group" style="margin-top: 5%;">
                        <div class="form-inline">
                        <label class="control-label" style="font-size: 14px; margin-right: 2%;">Email Address:</label>
                        <input style="font-size: 14px; font-weight: 500; padding: 10px; border: none; border-bottom: 1px solid gray; text-align: center; width: 30%; background-color: white " class="form-control rounded-0 emailDisabled" value="<?php echo $row['email']; ?>" name="updateEmail" disabled></input>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="button" class="btn btn-secondary btn-sm discardDisabled" onClick="window.location.href='profile.php'" value="Discard Changes" disabled style="margin-left: 68%; width: 16%; font-size: 12px;">
                        <input type="submit" name="updateBtn" id="updateBtn" class="btn btn-info btn-sm buttonDisabled" value="Save Changes" disabled style="margin-left: 85%; margin-top: -7.2%; font-size: 12px;">
                    </div>


    </form>


    <!-- upload pic -->
    <div class="modal fade" id="upload_pic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
      <div class="modal-dialog" style="max-width: 30%;">
          <div class="modal-content" style="background-color: #F2F2F2; margin-top: 20%;">
           <div class="container"></div>
           <div class="modal-header"><i class="fas fa-image">&nbsp;&nbsp;Select profile image</i></div>
            <div class="modal-body" class="modal fade">

            <form method="POST" action="profileFunction.php" enctype='multipart/form-data'>
            <input type="hidden" class="form-control" name="pid" value="<?php echo $row['id']; ?>">
              <div class="container-fluid">
                  <div class="form-group">
                      <label style="font-size: 13px; margin-bottom: 4%;">&nbsp;Upload image: &nbsp;</label>
                        <input required name="uploadPic" type="file" class="upload-box form-control rounded-0" placeholder="Enter here" id="uploadPic" required style="font-size: 13px;margin-top: -3%;" accept=".jpg, .png, .jpeg" />
                        <!--<input required name="uploadPic" type="hidden" class="upload-box form-control rounded-0" placeholder="Enter here" id="uploadPic_old" name="uploadPic_old" />-->
                  </div>
              </div>
              <div class="modal-footer" style="height: auto;">
              <a href="#" data-dismiss="modal" class="btn btn-secondary" style="font-size: 12px; width: 20%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-left: -28%">Cancel</a>
              <button type="submit" name="updateProfile" class="btn btn-primary"  style="font-size: 12px; width: 20%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 28%">Save</button>  
              </div>
              </form>
              
            </div>
          </div>
        </div>
    </div>
                        <?php 
                    }
                }
            }
        ?>
            


        <!--<div class="row py-2">
            <div class="col-md-6"> <label for="firstname">Name</label> <input type="text" class="bg-light form-control" placeholder="Steve" name="firstname" value="<?php echo $fullname; ?>" style="font-size: 13px;"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname">Last Name</label> <input type="text" class="bg-light form-control" placeholder="Smith" name="lastname" value="<?php echo $fullname; ?>" style="font-size: 13px;"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> <label for="email">Email Address</label> <input type="text" class="bg-light form-control" placeholder="steve_@email.com" name="email" style="font-size: 13px;"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Phone Number</label> <input type="tel" class="bg-light form-control" name="phone" placeholder="+1 213-548-6015" style="font-size: 13px;"> </div>
        </div>
        <div class="row py-2">
          <div class="col-md-6"> <label for="username">Username</label> <input type="text" class="bg-light form-control" value="<?php echo $username; ?>" name="username" style="font-size: 13px;"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="address">Address</label> <input type="address" class="bg-light form-control" name="address" value="<?php echo $address; ?>" style="font-size: 13px;"> </div>
         </div>
         <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3" type="submit" name="update">Save Changes</button> <button class="btn border button">Cancel</button> </div>-->
    </div>
</div>


</body>
</html>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}
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

body {
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue
}

.wrapper1 {
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 900px;
    margin-left: 26%;
}

h4 {
    letter-spacing: -1px;
    font-weight: 400
}

.img {
    width: 100px;
    height: 80px;
    border-radius: 0px;
    object-fit: cover
}

#img-section p,
#deactivate p {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    text-align: justify
}

#img-section b,
#img-section button,
#deactivate b {
    font-size: 14px
}

label {
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px
}

.form-control {
    border-radius: 10px
}

input[placeholder] {
    font-weight: 500
}

.form-control:focus {
    box-shadow: none;
    border: 1.5px solid #0779e4
}

select {
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px
}

select:focus {
    outline: none
}

.button {
    background-color: #fff;
    color: #0779e4
}

.button:hover {
    background-color: #0779e4;
    color: #fff
}

.btn-primary {
    background-color: #0779e4
}

.danger {
    background-color: #fff;
    color: #e20404;
    border: 1px solid #ddd
}

.danger:hover {
    background-color: #e20404;
    color: #fff
}

@media(max-width:576px) {
    .wrapper {
        padding: 25px 20px
    }

    #deactivate {
        line-height: 18px
    }
}
</style>

<script>
    
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 8000);

$("#edit").click(function(event){
    event.preventDefault();
    $('.emailDisabled').removeAttr("disabled")
    $('.numDisabled').removeAttr("disabled")
    $('.unameDisabled').removeAttr("disabled")
    $('.buttonDisabled').removeAttr("disabled")
    $('.discardDisabled').removeAttr("disabled")
    $('.fnameDisabled').removeAttr("disabled")
});
</script>