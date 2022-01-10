<?php 

$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>