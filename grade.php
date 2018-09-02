<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("#db name", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
	 $user = $_POST["username"]; 
	 //others 
	 if($user== $user_check)
	 {
		 //insert query
	 }
	else{
		echo "check the user name";
	}
?>