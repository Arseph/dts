<?php
session_start(); 
require_once('connection_db/connection.php');

$departmentErr = $firstnameErr = $lastnameErr = $emailErr = $passwordErr = $confirm_passwordErr = $numErr ="";
$department = $fname = $lname = $uname = $password = $confirm_password = $phonenumber= '';

    if(isset($_POST['submit_reg']))
    {

    $department = $_POST['department'];
    $query = $conn -> prepare("INSERT INTO admin_account (department) VALUES (:department)");
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $uname = $_POST['email'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['confirm_password'];
    $phone = $_POST['num'];


    if ($pass1 == $pass2) 
    {   
        $query = "SELECT * FROM admin_account WHERE email = '$uname'"; 
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run)>0) 
        {
            #echo '<script type = "text/javascript"> alert("Email already exist, try another email....")</script>';
            $_SESSION['status'] = "Email already exist, try another email....!";
            //echo '<script type = "text/javascript"> alert("Email already exist, try another email....")</script>';
            header("Location: register.php"); 
        }
        else
        {

        $query = "INSERT INTO admin_account (department, firstname, lastname, email, password, confirm_password, num) VALUES ('$department', '$fname', '$lname', '$uname', '$pass1', '$pass2', '$phone')";

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
}

?>