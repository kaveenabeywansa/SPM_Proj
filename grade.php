<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "","spm");
// Selecting Database
//$db = mysql_select_db("spm", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
	 $user = $_POST["Username"]; 
	$grade = $_POST["Grade"];
	 //others 
	 if('$user' == '$user_check')
	 {
		  
		$sql = "UPDATE student SET Grading= '$grade' WHERE Email_student= '$user'";
		if(mysqli_query($connection,$sql )){
			
			header('Location: grading.html'); 
			echo "<script type='text/javascript'>alert('Records were updated successfully.')</script>";
	} else {
		echo  "<script type='text/javascript'>alert('failed!')</script>" . mysqli_error($connection);
} 
	 }
	else{
		echo "<script type='text/javascript'>alert('check the user name')</script>";
		header('Location: grading.html');
	}
?>