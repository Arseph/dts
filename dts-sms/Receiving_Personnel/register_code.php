<?php
session_start(); 
require_once('connection_db/connection.php');

$departmentErr = $firstnameErr = $lastnameErr = $emailErr = $passwordErr = $confirm_passwordErr = $numErr ="";
$department = $fname = $lname = $email = $password = $confirm_password = $num= '';

    if(isset($_POST['btnRegister']))
    {

    $department = $_POST['department'];
    $query = $conn -> prepare("INSERT INTO admin_account (department) VALUES (:department)");
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $num = $_POST['num'];


    if ($password == $confirm_password) 
    {   
        $query = "SELECT * FROM admin_account WHERE email = '$email'"; 
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run)>0) 
        {
            $_SESSION['status'] = "Account already exist, try another email....!";
            header("Location: register.php"); 
        }
        else
        {

        $query = "INSERT INTO admin_account (department, firstname, lastname, email, password, confirm_password, num) VALUES ('$department', '$fname', '$lname', '$email', '$password', '$confirm_password', '$num')";

        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            #echo '<script type = "text/javascript">alert("Register succesfully")</script>';
            #header("Location: index.php");
            $_SESSION['status'] = "Registered succesfully!";
            header("Location: register.php"); 
        }
        else
        {
            #echo '<script type = "text/javascript"> alert("Registration Failed!")</script>';
            $_SESSION['status'] = "Register Failed!";
            //echo '<script type = "text/javascript"> alert("Registration Failed!")</script>';
            header("Location: register.php"); 
            
        }
    }
}
        else{
            #echo '<script type = "text/javascript"> alert("Password not match!")</script>';
            $_SESSION['status'] = "Password not match!";
            //echo '<script type = "text/javascript"> alert("Password not match!")</script>';
            header("Location: register.php"); 
            
        }
//check if email already exists   
function is_valid_email($email)
{
     if (empty($email)) {
         echo "Username is required.";
         return false;
     } else {
         $email = test_input($email);
         // check if e-mail address is well-formed
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           echo "Invalid username format."; 
           return false;
     } 
     // now check if the mail is already registered
     $slquery = "SELECT 1 FROM register WHERE email = '$email'";
     $selectresult = mysql_query($slquery);
     if(mysql_num_rows($selectresult)>0) {
       echo 'Username already exists.';
       return false;
     }
     // now returns the true- means you can proceed with this mail
     return true;
}

}

function validate_phone_number($num)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }

     $num = "+91-444-444-5555";
    if (validate_phone_number($num) == true) {
    echo "Phone number is valid";
} else {
  echo "Invalid phone number";
}
}


}

?>