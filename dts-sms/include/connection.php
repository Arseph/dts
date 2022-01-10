<?php
	//for MySQLi OOP
	$conn = new mysqli('localhost', 'root', '', 'documenttrackingsystem_db');
	if($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
	}
?>