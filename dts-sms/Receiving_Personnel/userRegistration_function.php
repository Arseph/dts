<?php
session_start(); 
require_once('connection_db/connection.php');

$department = $firstname = $lastname = $phonenumber = $email = $username = $password = $verifypassword = $address ='';

    if(isset($_POST['submit_reg']))
    {

    $department = $_POST['department'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $bday       = date('Y-m-d', strtotime($_POST['bday']));
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verifypassword = $_POST['verifypassword'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];

    if ($password == $verifypassword) 
    {   
        $query = "SELECT * FROM register WHERE firstname = '$firstname'"; 
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run)>0) 
        {
            $_SESSION['status'] = "This account already exists.";
            header("Location: userRegistration.php"); 
        }
        else
        {

         $sql = "INSERT INTO register (department, firstname, lastname, bday, email, username, password, confirm_password, phone_number, address) VALUES ('$department', '$firstname', '$lastname', '$bday', '$email', '$username', '$password', '$verifypassword', '$phonenumber', '$address')";

        $query_run = mysqli_query($conn, $sql);

        if($query_run)
        {
            #echo '<script type = "text/javascript">alert("Register succesfully")</script>';
            #header("Location: index.php");
            $_SESSION['status'] = "Registered succesfully";
            header("Location: userRegistration.php"); 
        }
        else
        {
            #echo '<script type = "text/javascript"> alert("Registration Failed!")</script>';
            $_SESSION['status'] = "Register Failed!";
            //echo '<script type = "text/javascript"> alert("Registration Failed!")</script>';
            header("Location: userRegistration.php"); 
            
        }
    }
}

}
//check if user already exists   
function is_valid_email($firstname)
{
     // now check if the mail is already registered
     $slquery = "SELECT 1 FROM register WHERE firstname AND lastname = '$department, $firstname'";
     $selectresult = mysql_query($slquery);
     if(mysql_num_rows($selectresult)>0) {
        $_SESSION['warning'] = "This account already exists.";
       return false;
     }
     // now returns the true- means you can proceed with this mail
     return true;
}


?>